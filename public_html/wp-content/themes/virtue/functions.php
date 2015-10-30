<?php
/*-----------------------------------------------------------------------------------*/
/* Include Theme Functions */
/*-----------------------------------------------------------------------------------*/

function virtue_lang_setup() {
	load_theme_textdomain('virtue', get_template_directory() . '/languages');
}
add_action( 'after_setup_theme', 'virtue_lang_setup' );
require_once locate_template('/themeoptions/options/virtue_extension.php'); // Options framework extension
require_once locate_template('/themeoptions/framework.php');        // Options framework
require_once locate_template('/themeoptions/options.php');     		// Options framework
require_once locate_template('/lib/utils.php');           			// Utility functions
require_once locate_template('/lib/init.php');            			// Initial theme setup and constants
require_once locate_template('/lib/sidebar.php');         			// Sidebar class
require_once locate_template('/lib/config.php');          			// Configuration
require_once locate_template('/lib/cleanup.php');        			// Cleanup
require_once locate_template('/lib/nav.php');            			// Custom nav modifications
require_once locate_template('/lib/metaboxes.php');     			// Custom metaboxes
require_once locate_template('/lib/gallery_metabox.php');     		// Custom metaboxes
require_once locate_template('/lib/comments.php');        			// Custom comments modifications
require_once locate_template('/lib/widgets.php');         			// Sidebars and widgets
require_once locate_template('/lib/aq_resizer.php');      			// Resize on the fly
require_once locate_template('/lib/scripts.php');        			// Scripts and stylesheets
require_once locate_template('/lib/custom.php');          			// Custom functions
require_once locate_template('/lib/admin_scripts.php');          	// Icon functions
require_once locate_template('/lib/authorbox.php');         		// Author box
require_once locate_template('/lib/custom-woocommerce.php'); 		// Woocommerce functions
require_once locate_template('/lib/virtuetoolkit-activate.php'); 	// Plugin Activation
require_once locate_template('/lib/custom-css.php'); 			    // Fontend Custom CSS
//require_once locate_template('/MyThemeOptions.php');

function j_get_thumnail($post_id){
	global $wpdb;
	$post_thumnail_value = get_post_custom_values('thumnail', $post_id);
	$sql = 'select guid
			from wp_posts
			where id = ' . $post_thumnail_value[0];

	$results = $wpdb->get_results( $sql, OBJECT );

	return $results[0]->guid;
}

function j_get_news($main_news = true){
	global $wpdb;
	$term = ($main_news == true?J_CATE_MAIN_NEWS:J_CATE_SUB_NEWS);
	$limit = ($main_news == true?3:2);	
	$sql = 'select p.* 
			from wp_posts p
				join wp_term_relationships r on p.id = r.object_id
				join wp_term_taxonomy ta on r.term_taxonomy_id
				join wp_terms t on t.term_id = ta.term_id
			where p.post_type like \'post\'
				and t.term_id = '. $term .' 
				and r.term_taxonomy_id = ' . $term . ' 
				order by p.post_date desc
				limit ' . $limit;

	$results = $wpdb->get_results( $sql, OBJECT );	
	$news = array();
	foreach($results as $res){
		$post_thumnail = j_get_thumnail($res->ID);
		$post_des = get_post_custom_values('description', $res->ID);
		$news[] = array(
			'post_id' => $res->ID
			,'post_date' => $res->post_date
			,'post_title' => $res->post_title
			,'post_content' => $res->post_content						
			,'post_guid' => $res->guid
			,'post_thumnail' => $post_thumnail
			,'post_des' => $post_des[0]
			);		
	}

	return $news;
}

function j_get_exam($loc){
	global $wpdb;
	$sql = 'select p.* 
			from wp_posts p
				join wp_term_relationships r on p.id = r.object_id
				join wp_term_taxonomy ta on r.term_taxonomy_id
				join wp_terms t on t.term_id = ta.term_id
				join wp_postmeta pm on pm.post_id = p.id and pm.meta_key like \'location\' and pm.meta_value like \''.$loc.'\' 
			where p.post_type like \'post\'
				and t.term_id = '. J_CATE_EXAM .' 
				and r.term_taxonomy_id = ' . J_CATE_EXAM . ' 				
				order by p.post_date desc 
				limit 1';	
	
	$results = $wpdb->get_results( $sql, OBJECT );	

	$res = $results[0];
	$post_time_exam = get_post_custom_values('time', $res->ID);	 
	$post_time_slot = get_post_custom_values('time_slot', $res->ID);	 
	$post_place_exam = get_post_custom_values('place_exam', $res->ID);	 
	$post_address_exam = get_post_custom_values('address_exam', $res->ID);	 

	return array(
		'post_id' => $res->ID
		,'post_date' => $res->post_date
		,'post_time_exam' => $post_time_exam[0]
		,'post_time_slot' => $post_time_slot[0]
		,'post_place_exam' => $post_place_exam[0]
		,'post_address_exam' => $post_address_exam[0]
		);
}
function j_sub_news($p){
	global $wpdb;
	$sql = 'select p.* 
			from wp_posts p
				join wp_term_relationships r on p.id = r.object_id
				join wp_term_taxonomy ta on r.term_taxonomy_id
				join wp_terms t on t.term_id = ta.term_id
			where p.post_type like \'post\'
				and t.term_id = '. J_CATE_SUB_NEWS .' 
				and r.term_taxonomy_id = ' . J_CATE_SUB_NEWS . ' 
				order by p.post_date desc
				limit ' . $limit;

}

function j_get_post($cate_id){
	global $wpdb;	
	switch($cate_id){
		case J_CATE_WHAT_JLIT:			
			$limit = 'limit 5';
			$order = '';
			break;		
		case J_CATE_AWARD:
		case J_CATE_POLICY_EXAM:
			$limit = 'limit 1';
			$order = '';
			break;
		case J_CATE_SCOPE_EXAM:
		case J_CATE_VOICE:
			$limit = 'limit 3';
			$order = '';
			break;
		default:
			$limit = '';
			$order = '';
	}

	$sql = 'select p.* 
			from wp_posts p
				join wp_term_relationships r on p.id = r.object_id
				join wp_term_taxonomy ta on r.term_taxonomy_id
				join wp_terms t on t.term_id = ta.term_id
			where p.post_type like \'post\'
				and t.term_id = '. $cate_id .' 
				and r.term_taxonomy_id = ' . $cate_id . ' 
				' . $order .' ' . $limit;

	$results = $wpdb->get_results( $sql, OBJECT );	
	$p = array();

	foreach($results as $res){
		$post_thumnail = j_get_thumnail($res->ID);
		$p[] = array(
			'post_id' => $res->ID
			,'post_date' => $res->post_date
			,'post_title' => $res->post_title
			,'post_content' => $res->post_content
			,'post_guid' => $res->guid
			,'post_thumnail' => $post_thumnail						
			);
	}

	return $p;
}

function j_get_post_by_id($pid){
	global $wpdb;	
	$sql = 'select p.* 
			from wp_posts p				
			where p.post_type like \'post\'
				and p.ID = ' . $pid;
				
	$results = $wpdb->get_results( $sql, OBJECT );	
	$res = $results[0];
	$post_thumnail = j_get_thumnail($res->ID);
	return array(
		'post_id' => $res->ID
		,'post_date' => $res->post_date
		,'post_title' => $res->post_title
		,'post_content' => $res->post_content
		,'post_guid' => $res->guid
		,'post_thumnail' => $post_thumnail						
		);

	return $p;
}

function j_get_post_example_exam(){
	global $wpdb;	
	$sql = 'select p.* 
			from wp_posts p
				join wp_term_relationships r on p.id = r.object_id
				join wp_term_taxonomy ta on r.term_taxonomy_id
				join wp_terms t on t.term_id = ta.term_id
			where p.post_type like \'post\'
				and t.term_id = '. J_CATE_QUESTION .' 
				and r.term_taxonomy_id = ' . J_CATE_QUESTION . ' 
				order by p.post_date desc 
				limit 1';
				
	$results = $wpdb->get_results( $sql, OBJECT );	
	$res = $results[0];	
	return array(
		'post_id' => $res->ID
		,'post_date' => $res->post_date
		,'post_title' => $res->post_title
		,'post_content' => $res->post_content
		,'post_guid' => $res->guid		
		);

	return $p;
}

function j_register($data){
	global $wpdb;
	$res = $wpdb->insert('wp_candidate', $data);

	return $res;
}

function j_is_register(){
	global $wpdb;
	$res = $wpdb->get_row('select option_value from wp_options where option_name like  \'is_register\'' );
	if($res->option_value == 1)
		return true;
	
	return false;
}

function j_jlit(){
	global $wpdb;
	$res = $wpdb->get_results('select * from wp_candidate');	
	$j = array();
	foreach($res as $r){
		//$loc = ($r->location==HCMLOCATION?'Tp.HCM':'Ha Noi');
                switch ($r->location) {
                    case HCMLOCATION:
                        $loc = 'Tp.HCM';
                        break;
                    case HANOILOCATION:
                        $loc = 'Ha Noi';
                        break;
                    default:
                        $loc = 'Da Nang';
                        break;
                }
		$j[] = array(
			'id' => $r->id,
			'id_number' => $r->id_number,
			'fullname' => $r->fullname,
			'dob' => $r->dob,
			'gender' => $r->gender,
			'email' => $r->email,
			'cellphone' => $r->cellphone,
			'location' => $loc,
			'address' => $r->address,
			'preferred_date' => $r->preferred_date,
			'preferred_first_time' => $r->preferred_first_time,
			'preferred_second_time' => $r->preferred_second_time,
			'preferred_third_time' => $r->preferred_third_time,
			'test_level' => $r->test_level,
			'register_date' => $r->register_date
			);
	}

	return $j;
}

function lock(){
	global $wpdb;	
	if(j_is_register() == true){
		$res = $wpdb->query('update wp_options set option_value = 0 where option_name like  \'is_register\'');
		return 'Unlock register';
	}

	$res = $wpdb->query('update wp_options set option_value = 1 where option_name like  \'is_register\'');
	return 'Lock register';	
}

function j_excel(){		
    $test_level = array('', 'JI1', 'JI2', 'JI3');
    $users = j_jlit();
    //$fields = array('Id','ID number','Fullname','Dob','Gender','Email','Cellphone','Address','Location', 'Referred date','Referred first time','Referred second time','Referred third time','Registered date','test level');
    $fields = array('Id','ID number','Fullname','Dob','Gender','Email','Cellphone','Address','Location','Registered date','Test Level');
    $header = array(
              array('EVOLABLE ASIA'),
              array(date('Y') . ' - USER REGISTERED'),
              array(''),
              array(''),
              $fields,
              );
    $dir = untrailingslashit( dirname( __FILE__ ) );
    //$fn = $dir . '/assets/csv/user_registered.csv';
    $date_filename = date('Y.m.d');
    $fn = $dir . '/../../uploads/user_registered_'.$date_filename.'.csv';
    $fp = fopen ( $fn, 'w');  

    foreach ($header as $lines) {
        fputcsv($fp, $lines);
    }

    if(! empty($users)) {        
        foreach($users as $user) {
        	//$loc = ($user['location']==HCMLOCATION?'Tp.HCM':'Ha Noi');
        	$r = array();
            // $r['id'] = $u->id;
            // $r['fullname'] = $u->fullname;
            // $r['dob'] = $u->dob;
            // $r['gender'] = $u->gender;
            // $r['email'] = $u->email;
            // $r['cellphone'] = $u->cellphone;
            // $r['address'] = $u->address;
            // $r['location'] = 'Tp.HCM';
            // $r['preferred_date'] = $u->preferred_date;
            // $r['preferred_first_time'] = $u->preferred_first_time;
            // $r['preferred_second_time'] = $u->preferred_second_time;
            // $r['preferred_third_time'] = $u->preferred_third_time;
            // $r['register_date'] = $u->register_date;

            // if($u->test_level > 0){
            //     $r['test_level'] = $test_level[$u->test_level];
            // }else{
            //     $r['test_level'] = '';
            // }

            $r['id'] = $user['id'];
            $r['id_number'] = $user['id_number'];
            $r['fullname'] = $user['fullname'];
            $r['dob'] = $user['dob'];
            $r['gender'] = $user['gender'];
            $r['email'] = $user['email'];
            $r['cellphone'] = $user['cellphone'];
            $r['address'] = $user['address'];
            $r['location'] = $user['location'];
            //$r['preferred_date'] = $user['preferred_date'];
            //$r['preferred_first_time'] = $user['preferred_first_time'];
            //$r['preferred_second_time'] = $user['preferred_second_time'];
            //$r['preferred_third_time'] = $user['preferred_third_time'];
            $r['register_date'] = $user['register_date'];       

            if($user['test_level'] > 0){
                $r['test_level'] = $test_level[$user['test_level']];
            }else{
                $r['test_level'] = '';
            }
                    
            fputcsv($fp, $r);
        }

        fclose($fp);
        
        $fp = fopen($fn, 'r');
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private", false);
        header("Content-Type: application/octet-stream");
        //header("Content-Disposition: attachment; filename=\"user_registered.csv\";");
	header("Content-Disposition: attachment; filename=\"user_registered_".$date_filename.".csv\";");
        header("Content-Transfer-Encoding: binary");
        fpassthru($fp);
        fclose($fp);

        die;
    }
}

function get_vietnamworks_options(){
    $theme_option = get_option('my_theme_option');
    $args = array();
    if ($theme_option['ct_vnw_real_staging'] == 'real'){
        $args['host'] = $theme_option['ct_vnw_url'];
        $args['api'] = $theme_option['ct_vnw_api_key'];
    } elseif($theme_option['ct_vnw_real_staging'] == 'staging'){
        $args['host'] = $theme_option['ct_vnw_url_staging'];
        $args['api'] = $theme_option['ct_vnw_api_key_staging'];
    }
    return $args;
}
/*Status: 
    * NEW : not exists
    * NON_ACTIVATED : registered but dont't active
    * ACTIVATED : registered and actived
  */
function vietnamworks_is_exists($email){	
	$res = false;
        //
        $options = get_vietnamworks_options();
	$apiKey         = $options['api'];
	$apiHost        = $options['host'];
        //
	$apiPath        = '/users/account-status/';
	$emailToCheck   = $email;
	$ch = curl_init();
	curl_setopt_array($ch, array(
	    CURLOPT_URL             => $apiHost.$apiPath."email/".urlencode($emailToCheck),
	    CURLOPT_RETURNTRANSFER  => true,
	    CURLOPT_SSL_VERIFYPEER  => false,   // ignore SSL verification
	    CURLOPT_HTTPGET         => true,    // http request method is GET
	    CURLOPT_HTTPHEADER      => array("CONTENT-MD5: $apiKey"),
	));

	$response = curl_exec($ch);
	$info = curl_getinfo($ch);
	//	echo "exists";
	//	print_r($info);
	if ($info['http_code'] == 400) {
	    $response = json_decode($response, true);
	    echo 'Server returned an error with message: '.$response['meta']['message'];
	} elseif ($info['http_code'] == 200 && !empty($response))  {    
	    $response = json_decode($response, true);
	    $res = ($response['data']['accountStatus'] == 'NEW'?false:true);        
	} else {        
	    //unknown error
	    echo "An error happened: \n".curl_error($ch)."\nInformation: ".print_r($info, true)."\nResponse: $response";
	}    
	curl_close($ch); 

	return $res;    
}

/*Status: 
* Success and userId: 3666686    
* Duplicate
*/
function vietnamworks_register($user){
        //
        $options = get_vietnamworks_options();
	$apiKey         = $options['api'];
	$apiHost        = $options['host'];
        //
	$apiPath    = '/users/register';
	//print_r($user);
	$genderid = ($user['gender']=='Male')?1:2;
	$fullname = explode(' ', $user['fullname']);
	$firstname  = '';
	$lastname= '';
	if(count($fullname)>1){
		$firstname = $fullname[0];
		$lastname = str_replace($fullname[0],'',$user['fullname']);
	}
	else{
		$firstname = $fullname[0];
		$lastname = $fullname[0];
	}
	$password = substr(md5($user['email']), 0, 12);
	$jsonString = json_encode(array(
	    'email' => $user['email'],
	    'password' => $password,
	    //'firstname' => $user['fullname'],
	    'firstname'=>$firstname,
	    //'lastname' => '',
	    'lastname' => $lastname,
	    'birthday' => $user['dob'],//yyyy-mm-dd
	    //'genderid' => $user['gender'], // 1:Male
	    'genderid' => $genderid,
	    'nationality' => 1, // Vietnam
	    'residence' => $user['vietnamworks_location'],
	    'home_phone' => '',
	    'cell_phone' => $user['cellphone'],
	    'lang' => 1 // Vietnamese
	));

	$ch = curl_init();
	curl_setopt_array($ch, array(
	    CURLOPT_URL             => $apiHost.$apiPath,
	    CURLOPT_RETURNTRANSFER  => true,
	    CURLOPT_SSL_VERIFYPEER  => false, // ignore SSL verification
	    CURLOPT_POST            => true,  // http request method is POST
	    CURLOPT_HTTPHEADER      => array(
	        "CONTENT-MD5: $apiKey",
	        'Content-Type: application/json',
	        'Content-Length: '.strlen($jsonString)
	    ),
	    CURLOPT_POSTFIELDS      => $jsonString
	));
	$response = curl_exec($ch);
	$responseArray = (array)json_decode($response, true);
	//print_r($responseArray);
        global $wpdb;
	if ($responseArray['meta']['code'] == 400) { // error happened
	    //echo 'Server returned an error with message: '.$responseArray['meta']['message'];
            $res = $wpdb->insert('wp_vietnamworks_log', array('email'=>$user['email'], 'code'=>400, 'message'=>$responseArray['meta']['message']));
	} elseif ($responseArray['meta']['code'] == 200)  {
	    //success => return userId: 303602848
	    //echo "Response status: ".$responseArray['meta']['message']."\nNew userID: ".$responseArray['data']['userID'];
            $res = $wpdb->insert('wp_vietnamworks_log', array('email'=>$user['email'], 'code'=>200, 'message'=>$responseArray['meta']['message']."\nNew userID: ".$responseArray['data']['userID']));
	} else {
	    //unknown error
	    $info = curl_getinfo($ch);
	    //echo "An error happened: \n".curl_error($ch)."\nInformation: ".print_r($info, true)."\nResponse: $response";
	}
	curl_close($ch);
}
function get_template_email_content($keyname){
       global $wpdb;
       $res = $wpdb->get_results("select * from wp_email_content where key_name='".$keyname."' AND is_visible=1 LIMIT 1");
       if(count($res)>0){
              return $res[0];
       }
       return null;
}

function remove_menus_from_plugins() {

    remove_menu_page('edit.php?post_type=acf');     // ACF
    remove_menu_page('cptui_main_menu');          // CPT
}

add_action('admin_init', 'remove_menus_from_plugins');

function remove_menus() {

    global $user_ID;

    $user = new WP_User($user_ID);    
    $roles = $user->roles;
    $role = $roles[0];
    //$arr_roles = array('editor');//vietnamworks

    if ($user->user_login == API_MANAGER_NAME) {
        remove_menu_page('index.php');                  //Dashboard
        remove_menu_page('edit.php');                   //Posts
        remove_menu_page('upload.php');                 //Media
        remove_menu_page('edit.php?post_type=page');    //Pages
        remove_menu_page('edit-comments.php');          //Comments
        remove_menu_page('themes.php');                 //Appearance
        remove_menu_page('plugins.php');                //Plugins
        remove_menu_page('admin.php?page=metaslider'); 
        remove_menu_page('users.php');                  //Users
        remove_menu_page('tools.php');                  //Tools
        remove_menu_page('options-general.php');        //Settings        
        //show_admin_bar( true );
    }
}

add_action('admin_menu', 'remove_menus');

function login_redirect( $redirect_to, $request, $user ){
    if ($user->user_login == API_MANAGER_NAME){
        return admin_url().'?page=workpress-api-setting';
    }
    return admin_url();    
}
add_filter( 'login_redirect', 'login_redirect', 10, 3 );
define(API_MANAGER_NAME, 'api-register');


add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );
function remove_wp_logo( $wp_admin_bar ) {
    $current_user = wp_get_current_user();
    if ($current_user->user_login == API_MANAGER_NAME) {
        $wp_admin_bar->remove_node( 'wp-logo' );
        $wp_admin_bar->remove_node( 'site-name' );
        $wp_admin_bar->remove_node( 'updates' );
        $wp_admin_bar->remove_node( 'comments' );
        $wp_admin_bar->remove_node( 'new-content' );
        $wp_admin_bar->remove_node( 'all-in-one-seo-pack' );
    }
    
}


add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
    $current_user = wp_get_current_user();
    
    if ($current_user->user_login == API_MANAGER_NAME) {
      //show_admin_bar(false);
    }
}