<?php
/**
 * Created by PhpStorm.
 * User: thongnguyen
 * Date: 12/25/14
 * Time: 2:27 PM
 */
function mediatheque_item_process_ajax(){
    if(isset($_POST['postids']) && !empty($_POST['postids']))
    {
        $flag = delete_mediatheque_item($_POST['postids']);

        if($flag == 0)
        {
            echo json_encode(array('status' => 'error','des' => 'Error deleted data'));
        }
        else{
            echo json_encode(array('status' => 'yes','des' => 'Deleted data'));
        }
    }
    else{
        echo json_encode(array('status' => 'error','des' => 'Posted value error'));
    }
    die();
}
add_action("wp_ajax_mediatheque_item_process_results","mediatheque_item_process_ajax");
function delete_mediatheque_item($datastring){
    global $wpdb;
    $table_name = $wpdb->prefix . "email_content";
    $query = "DELETE FROM ".$table_name." WHERE id in (".$datastring."-1000".")";
    $flag = $wpdb->query($query);
    return $flag;
}
function mediatheque_items()
{
    global $wpdb;
    $rows_default = 20;
    $total_rows = 0;
    $total_page = 0;
    $table_name = $wpdb->prefix . "email_content";
    $query = "SELECT id,title,content,createdate,is_visible,key_name FROM " . $table_name . " ";
    $where_condition = "";
    $cid = "";
    $pagelink = $_SERVER['PHP_SELF'] . "?page=mediatheque-items-page";
    
    $total_rows = $wpdb->get_var("SELECT count(*) FROM " . $table_name . $where_condition);
    $total_page = ($total_rows % $rows_default <= 0) ? ((int)($total_rows / $rows_default)) : ((int)($total_rows / $rows_default) + 1);
    $order_by = " ORDER BY createdate DESC";
    $rows_get = "";
    $limit_page = "";
    if (isset($_GET['pagenumber']) && !empty($_GET['pagenumber'])) {
        $limit_page = (int)$_GET['pagenumber'];
        $rows_get = " LIMIT " . ($rows_default * $limit_page) . "," . $rows_default;
    } else {
        $limit_page = 0;
        $rows_get = " LIMIT " . $limit_page . "," . $rows_default;
    }
    $retrieve_data = $wpdb->get_results($query . $where_condition . $order_by . $rows_get);
    echo "<div id='mediatheque'>";
    ?>
    <h1>Email template content <a class="add-new-h2" href="<?php echo $_SERVER['PHP_SELF'] . "?page=mediatheque-add-items"; ?>">Add
            new item</a></h1>
    <?php
    if (count($retrieve_data) > 0) {
        ?>
        <form id="post-item-delete-mediatheque" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <div class="tablenav top alignleft">
                <input id="deleteitem" class="button action" type="submit" value="Delete" name="DeletePost"
                       onclick="return confirm('Are you want to delete?')">
                
            </div>
            <table class="wp-list-table widefat fixed posts" id="sortable-table">
                <thead>
                <tr>
                    <th class="check-column"></th>
                    <th class="column-title">Title</th>
                    <th class="column-title">Key name</th>
                    <th class="column-isdate">Date</th>
                    <th class="column-category">Active</th>
                    <th class="column-createdate">Create date</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $url_link = $_SERVER['PHP_SELF'] . "?page=mediatheque-add-items&id=";
                foreach ($retrieve_data as $therow) {
                    ?>
                    <tr id="post-<?php echo $therow->id; ?>">
                        <td class="column-order">
                            <input id="cb-select-<?php echo $therow->id; ?>" type="checkbox"
                                   value="<?php echo $therow->id; ?>" name="postid[]">
                        </td>
                        <td class="column-name"><a
                                href="<?php echo $url_link . $therow->id; ?>"><?php echo $therow->title; ?></a></td>
                        <td class="column-keyname"><?php echo $therow->key_name; ?></td>
                        <td class="column-isdate"><?php echo $therow->is_date; ?></td>
                        <td class="column-category"><?php echo $therow->is_visible; ?></td>
                        <td class="column-createdate"><?php echo $therow->createdate; ?></td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </form>

        <div class="mediatheque-page-container">
            <?php
            if ($total_page > 0) {
                for ($i = 0; $i < $total_page; $i++) {
                    $selected_page = ($limit_page == $i) ? "page_selected" : "";
                    ?>
                    <a class="mediatheque_page <?php echo $selected_page; ?>"
                       href="<?php echo $pagelink . "&pagenumber=" . ($i); ?>"><?php echo($i + 1); ?></a>
                <?php
                }
            }
            ?>
        </div>
    <?php
    }
    echo "</div>";
}