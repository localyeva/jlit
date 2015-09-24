<?php
function mediatheque_add_item(){
    global $wpdb;
    $table_name = $wpdb->prefix . "email_content";
    if(isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['content']) && !empty($_POST['content'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $is_visible = $_POST['is_visible'];
        $key_name = $_POST['key_name'];
        if (isset($_POST['idpost']) && !empty($_POST['idpost'])) {

            $itemid = $_POST['idpost'];
            $wpdb->update(
                $table_name,
                array(
                    'title' => $title,
                    'content' => $content,
                    'is_visible' => $is_visible,
                    'key_name' => $key_name,
                ),
                array('id' => $itemid)
            );
        } else {
            $itemid = $wpdb->insert(
                $table_name,
                array(
                    'title' => $title,
                    'content' => $content,
                    'is_visible' => $is_visible,
                    'key_name' => $key_name,
                    'createdate' => date("Y-m-d h:i:s")
                ));
        }
        ob_flush();
        $url_redirect = $_SERVER['PHP_SELF']."?page=mediatheque-items-page&idinsert=".$itemid;
        ?>
        <script type="text/javascript">
            document.location.href="<?php echo $url_redirect; ?>";
        </script>
        <?php
        exit;
    }
    $id = "";
    if(isset($_GET['id']) && !empty($_GET['id']))
    {
        $id = $_GET['id'];
    }
    if($id!="")
    {
        $retrieve_data = $wpdb->get_results( "SELECT * FROM $table_name WHERE id=".$id );
        if(count($retrieve_data)>0){
            $row = $retrieve_data[0];
        }
    }
    $template_default = "Hi {fullname},<p></p>";
    ?>
    <div id="mediatheque">
        <h1>Email Template</h1>
        <h3><?php echo ($row->id=="")?"Create New Item":"Update a item"; ?></h3>
        <div id="data_form">
            <form action="<?php echo $_SERVER["REQUEST_URI"] ?>" method="post">
                <input type="hidden" name="idpost" value="<?php echo ($row->id=="")?"":$row->id; ?>" />
                <table class="form-table">
                    <tr class="form-field form-required">
                        <th scope="row">
                            <label for="key_name">Key name</label>
                        </th>
                        <td>
                            <input id="key_name" type="text" aria-required="true" value="<?php echo $row->key_name; ?>" name="key_name">
                        </td>
                    </tr>
                    <tr class="form-field form-required">
                        <th scope="row">
                            <label for="title">Title/Emission</label>
                        </th>
                        <td>
                            <input id="title" type="text" aria-required="true" value="<?php echo $row->title; ?>" name="title">
                        </td>
                    </tr>
                    <tr class="form-field form-required">
                        <th scope="row">
                            <label for="content">Content</label>
                        </th>
                        <td>
                               <textarea name="content" id="content" style="height: 350px;"><?php echo stripslashes($row->content); ?></textarea>
                        </td>
                    </tr>
                    <tr class="form-field form-required">
                        <th scope="row">
                            <label for="is_visible">Active</label>
                        </th>
                        <td>
                               <input type="radio" name="is_visible" <?php echo (($row->is_visible==1)?"checked='true'":""); ?>" value="1">Active &nbsp;&nbsp;&nbsp;
                               <input type="radio" name="is_visible" <?php echo (($row->is_visible==0)?"checked='true'":""); ?>" value="0">Unactive
                        </td>
                    </tr>
                </table>
                <p class="submit">
                    <input id="createnewitem" class="button button-primary" type="submit" value="<?php echo ($row->id=="")?"Add New item":"Update item"; ?> " name="createitem">
                </p>
            </form>
            </div>
    </div>
    <?php
}