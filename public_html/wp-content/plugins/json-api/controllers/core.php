<?php

/*
  Controller name: Core
  Controller description: Basic introspection methods
 */

define('API_KEY', 'f23a7350e699792634ace077a79c6821628387e2bc95da5307192f277edc3c07');

class JSON_API_Core_Controller {

    public function info() {
        global $json_api;
        $php = '';
        if (!empty($json_api->query->controller)) {
            return $json_api->controller_info($json_api->query->controller);
        } else {
            $dir = json_api_dir();
            if (file_exists("$dir/json-api.php")) {
                $php = file_get_contents("$dir/json-api.php");
            } else {
                // Check one directory up, in case json-api.php was moved
                $dir = dirname($dir);
                if (file_exists("$dir/json-api.php")) {
                    $php = file_get_contents("$dir/json-api.php");
                }
            }
            if (preg_match('/^\s*Version:\s*(.+)$/m', $php, $matches)) {
                $version = $matches[1];
            } else {
                $version = '(Unknown)';
            }
            $active_controllers = explode(',', get_option('json_api_controllers', 'core'));
            $controllers = array_intersect($json_api->get_controllers(), $active_controllers);
            return array(
                'json_api_version' => $version,
                'controllers' => array_values($controllers)
            );
        }
    }

    public function get_recent_posts() {
        global $json_api;
        $posts = $json_api->introspector->get_posts();
        return $this->posts_result($posts);
    }

    public function get_posts() {
        global $json_api;
        $url = parse_url($_SERVER['REQUEST_URI']);
        $defaults = array(
            'ignore_sticky_posts' => true
        );
        $query = wp_parse_args($url['query']);
        unset($query['json']);
        unset($query['post_status']);
        $query = array_merge($defaults, $query);
        $posts = $json_api->introspector->get_posts($query);
        $result = $this->posts_result($posts);
        $result['query'] = $query;
        return $result;
    }

    public function get_post() {
        global $json_api, $post;
        $post = $json_api->introspector->get_current_post();
        if ($post) {
            $previous = get_adjacent_post(false, '', true);
            $next = get_adjacent_post(false, '', false);
            $response = array(
                'post' => new JSON_API_Post($post)
            );
            if ($previous) {
                $response['previous_url'] = get_permalink($previous->ID);
            }
            if ($next) {
                $response['next_url'] = get_permalink($next->ID);
            }
            return $response;
        } else {
            $json_api->error("Not found.");
        }
    }

    public function get_page() {
        global $json_api;
        extract($json_api->query->get(array('id', 'slug', 'page_id', 'page_slug', 'children')));
        if ($id || $page_id) {
            if (!$id) {
                $id = $page_id;
            }
            $posts = $json_api->introspector->get_posts(array(
                'page_id' => $id
            ));
        } else if ($slug || $page_slug) {
            if (!$slug) {
                $slug = $page_slug;
            }
            $posts = $json_api->introspector->get_posts(array(
                'pagename' => $slug
            ));
        } else {
            $json_api->error("Include 'id' or 'slug' var in your request.");
        }

        // Workaround for https://core.trac.wordpress.org/ticket/12647
        if (empty($posts)) {
            $url = $_SERVER['REQUEST_URI'];
            $parsed_url = parse_url($url);
            $path = $parsed_url['path'];
            if (preg_match('#^http://[^/]+(/.+)$#', get_bloginfo('url'), $matches)) {
                $blog_root = $matches[1];
                $path = preg_replace("#^$blog_root#", '', $path);
            }
            if (substr($path, 0, 1) == '/') {
                $path = substr($path, 1);
            }
            $posts = $json_api->introspector->get_posts(array('pagename' => $path));
        }

        if (count($posts) == 1) {
            if (!empty($children)) {
                $json_api->introspector->attach_child_posts($posts[0]);
            }
            return array(
                'page' => $posts[0]
            );
        } else {
            $json_api->error("Not found.");
        }
    }

    public function get_date_posts() {
        global $json_api;
        if ($json_api->query->date) {
            $date = preg_replace('/\D/', '', $json_api->query->date);
            if (!preg_match('/^\d{4}(\d{2})?(\d{2})?$/', $date)) {
                $json_api->error("Specify a date var in one of 'YYYY' or 'YYYY-MM' or 'YYYY-MM-DD' formats.");
            }
            $request = array('year' => substr($date, 0, 4));
            if (strlen($date) > 4) {
                $request['monthnum'] = (int) substr($date, 4, 2);
            }
            if (strlen($date) > 6) {
                $request['day'] = (int) substr($date, 6, 2);
            }
            $posts = $json_api->introspector->get_posts($request);
        } else {
            $json_api->error("Include 'date' var in your request.");
        }
        return $this->posts_result($posts);
    }

    public function get_category_posts() {
        global $json_api;
        $category = $json_api->introspector->get_current_category();
        if (!$category) {
            $json_api->error("Not found.");
        }
        $posts = $json_api->introspector->get_posts(array(
            'cat' => $category->id
        ));
        return $this->posts_object_result($posts, $category);
    }

    public function get_tag_posts() {
        global $json_api;
        $tag = $json_api->introspector->get_current_tag();
        if (!$tag) {
            $json_api->error("Not found.");
        }
        $posts = $json_api->introspector->get_posts(array(
            'tag' => $tag->slug
        ));
        return $this->posts_object_result($posts, $tag);
    }

    public function get_author_posts() {
        global $json_api;
        $author = $json_api->introspector->get_current_author();
        if (!$author) {
            $json_api->error("Not found.");
        }
        $posts = $json_api->introspector->get_posts(array(
            'author' => $author->id
        ));
        return $this->posts_object_result($posts, $author);
    }

    public function get_search_results() {
        global $json_api;
        if ($json_api->query->search) {
            $posts = $json_api->introspector->get_posts(array(
                's' => $json_api->query->search
            ));
        } else {
            $json_api->error("Include 'search' var in your request.");
        }
        return $this->posts_result($posts);
    }

    public function get_date_index() {
        global $json_api;
        $permalinks = $json_api->introspector->get_date_archive_permalinks();
        $tree = $json_api->introspector->get_date_archive_tree($permalinks);
        return array(
            'permalinks' => $permalinks,
            'tree' => $tree
        );
    }

    protected function get_object_posts($object, $id_var, $slug_var) {
        global $json_api;
        $object_id = "{$type}_id";
        $object_slug = "{$type}_slug";
        extract($json_api->query->get(array('id', 'slug', $object_id, $object_slug)));
        if ($id || $$object_id) {
            if (!$id) {
                $id = $$object_id;
            }
            $posts = $json_api->introspector->get_posts(array(
                $id_var => $id
            ));
        } else if ($slug || $$object_slug) {
            if (!$slug) {
                $slug = $$object_slug;
            }
            $posts = $json_api->introspector->get_posts(array(
                $slug_var => $slug
            ));
        } else {
            $json_api->error("No $type specified. Include 'id' or 'slug' var in your request.");
        }
        return $posts;
    }

    protected function posts_result($posts) {
        global $wp_query;
        return array(
            'count' => count($posts),
            'count_total' => (int) $wp_query->found_posts,
            'pages' => $wp_query->max_num_pages,
            'posts' => $posts
        );
    }

    protected function posts_object_result($posts, $object) {
        global $wp_query;
        // Convert something like "JSON_API_Category" into "category"
        $object_key = strtolower(substr(get_class($object), 9));
        return array(
            'count' => count($posts),
            'pages' => (int) $wp_query->max_num_pages,
            $object_key => $object,
            'posts' => $posts
        );
    }

    public function get_sub_news() {
        global $wpdb;
        $p = $_POST['p'];
        $res = j_sub_news($f);

        return $res;
    }

    public function get_post_by_id() {
        global $wpdb;
        $pid = $_POST['pid'];
        $res = j_get_post_by_id($pid);

        return $res;
    }

    /* check validate form */
    /* Doanh Customize */

    public function utf8_strlen($string) {
        return mb_strlen($string);
    }

    public function valid($data = array()) {
        $jsons = array();
        $errors = array();
        if ($data['id_number'] == '') {
            $errors['er_id_number'] = "Nhập số CMND";
        }
        if ($data['fullname'] == '') {
            $errors['er_fullname'] = "Nhập họ và tên";
        }

        if ($data['dob'] == '') {
            $errors['er_dob'] = "Nhập ngày tháng năm sinh";
        } elseif (date("Y/m/d", strtotime($data['dob'])) != $data['dob']) {
            $errors['er_dob'] = "Nhập ngày tháng năm sinh theo định dạng yyyy/mm/dd";
        }
        if ($data['email'] == '') {
            $errors['er_email'] = "Nhập địa chỉ email";
        } elseif (($this->utf8_strlen($data['email']) > 96) || !preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i', $data['email'])) {
            $errors['er_email'] = "Nhập địa chỉ email hợp lệ";
        }

        if ($data['cellphone'] == '') {
            $errors['er_cellphone'] = "Nhập số điện thoại";
        }
        if ($this->utf8_strlen($data['address']) < 10) {
            $errors['er_address'] = "Nhập địa chỉ có ít nhất 10 ký tự";
        }
        if (!in_array($data['test_level'], array(1,2,3))) {
            $errors['er_test_level'] = "Chọn trình độ";
        }
        if (!in_array($data['location'], array(1,2,3))) {
            $errors['er_location'] = "Chọn địa điểm";
        }
        $jsons = $errors;
        return $jsons;
    }

    /* End Doanh Customize */

    public function confirm() {
        $json = array();
        if (!empty($this->valid($_POST))) {
            $json['error'] = $this->valid($_POST);
        } else {
            $json['success'] = true;
        }
        ob_end_clean();
        // Set HTTP Response Content Type
        header('Content-Type: application/json; charset=utf-8');
        // Format data into a JSON response
        $json_response = json_encode($json);
        // Deliver formatted data
        echo $json_response;
        exit();
    }

    public function register() {
        $json = array();
        if (j_is_register() == false) {
            return;
        }
        /* Doanh Customize */
        if (!empty($this->valid($_POST))) {
            $json['error'] = $this->valid($_POST);
        } else {
            /* End Doanh Customize */
            global $wpdb;
            $domain = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s://" : "://") . $_SERVER['HTTP_HOST'];

            $reg = array(
                'id_number' => $_POST['id_number'],
                'fullname' => $_POST['fullname'],
                'dob' => date('Y-m-d', strtotime($_POST['dob'])),
                'gender' => $_POST['gender'],
                'email' => $_POST['email'],
                'cellphone' => $_POST['cellphone'],
                'location' => $_POST['location'],
                'address' => $_POST['address'],
                'test_level' => $_POST['test_level'],
                'register_date' => date('Y-m-d'),
                'vietnamworks_location' => 29//TPHCM
            );

            if ($_POST['location'] == HANOILOCATION) {
                $reg['vietnamworks_location'] = 24; //HaNoi
            }

            $res = j_register($reg);

            if ($res == 1) {
                session_start();
                $_SESSION['register'] = 1;
                $json['success'] = 'Bạn đã đăng ký thành công';
            }

            //process for vietnamworks
            if (vietnamworks_is_exists($_POST['email']) == true) {
                $_SESSION['new_member'] = 0;
            } else {
                //register new member on vietnamwork
                vietnamworks_register($reg);
                $_SESSION['new_member'] = 1;
            }
            //Send email to User registered
            $send_to = $_POST['email'];
            $template_email = get_template_email_content('auto_reply_user_register');
            $send_subject = 'JLIT registeration: ' . __($template_email->title, 'wp_mail_smtp');
            $send_message = str_replace("{fullname}", $_POST['fullname'], $template_email->content);
            $send_message = str_replace("\\", "", $send_message);
            $send_message = __($send_message, 'wp_mail_smtp');
            add_filter('wp_mail_content_type', create_function('', 'return "text/html"; '));
            $result = wp_mail($send_to, $send_subject, $send_message);
        }
        ob_end_clean();
        // Set HTTP Response Content Type
        header('Content-Type: application/json; charset=utf-8');
        // Format data into a JSON response
        $json_response = json_encode($json);
        // Deliver formatted data
        echo $json_response;
        exit();
    }

    public function get_jlit() {
        global $wpdb;
        if (is_user_logged_in() == false) {
            return;
        }

        $u = wp_get_current_user();
        if ($u->user_login != 'admin') {
            return;
        }

        $res = j_jlit();

        return array('status' => '200', 'data' => $res);
    }

    public function lock() {
        global $wpdb;
        if (is_user_logged_in() == false) {
            return;
        }

        $u = wp_get_current_user();
        if ($u->user_login != 'admin') {
            return;
        }

        $res = lock();

        return $res;
    }

    public function excel() {
        j_excel();
    }

    public function get_category_index() {
        global $json_api;
        $args = null;
        if (!empty($json_api->query->parent)) {
            $args = array(
                'parent' => $json_api->query->parent
            );
        }
        $categories = $json_api->introspector->get_categories($args);
        return array(
            'count' => count($categories),
            'categories' => $categories
        );
    }

    public function get_tag_index() {
        global $json_api;
        $tags = $json_api->introspector->get_tags();
        return array(
            'count' => count($tags),
            'tags' => $tags
        );
    }

    public function get_author_index() {
        global $json_api;
        $authors = $json_api->introspector->get_authors();
        return array(
            'count' => count($authors),
            'authors' => array_values($authors)
        );
    }

    public function get_page_index() {
        global $json_api;
        $pages = array();
        $post_type = $json_api->query->post_type ? $json_api->query->post_type : 'page';

        // Thanks to blinder for the fix!
        $numberposts = empty($json_api->query->count) ? -1 : $json_api->query->count;
        $wp_posts = get_posts(array(
            'post_type' => $post_type,
            'post_parent' => 0,
            'order' => 'ASC',
            'orderby' => 'menu_order',
            'numberposts' => $numberposts
        ));
        foreach ($wp_posts as $wp_post) {
            $pages[] = new JSON_API_Post($wp_post);
        }
        foreach ($pages as $page) {
            $json_api->introspector->attach_child_posts($page);
        }
        return array(
            'pages' => $pages
        );
    }

    public function get_nonce() {
        global $json_api;
        extract($json_api->query->get(array('controller', 'method')));
        if ($controller && $method) {
            $controller = strtolower($controller);
            if (!in_array($controller, $json_api->get_controllers())) {
                $json_api->error("Unknown controller '$controller'.");
            }
            require_once $json_api->controller_path($controller);
            if (!method_exists($json_api->controller_class($controller), $method)) {
                $json_api->error("Unknown method '$method'.");
            }
            $nonce_id = $json_api->get_nonce_id($controller, $method);
            return array(
                'controller' => $controller,
                'method' => $method,
                'nonce' => wp_create_nonce($nonce_id)
            );
        } else {
            $json_api->error("Include 'controller' and 'method' vars in your request.");
        }
    }

}

?>
