<?php
/*
Plugin Name: Email Template Content
Plugin URI:
Description: A simple plugin to build and display a listing record for your website.
Version: 1.0.0
Author: Thong Nguyen
Author URI: http://www.zoomtovietnam.com
*/
define( 'MEDIATHEQUE_PATH', plugin_dir_url(__FILE__) );
//include_once('inc/mediatheque-categories-page.php');
//include_once('inc/mediatheque-add-new-category.php');
include_once('inc/mediatheque-items-page.php');
include_once('inc/mediatheque-add-items.php');


function mediatheque_menu() {
    //add_menu_page('MyPlugin', 'Media theque', 'add_users', __FILE__, '#', plugins_url('mediatheque/images/icon.png') );
    add_menu_page('MediathequePlugin', 'Email Template', 'add_users', __FILE__, 'mediatheque_items', '' );
    add_submenu_page(__FILE__, 'Items', 'Items', 8, 'mediatheque-items-page', 'mediatheque_items');
    add_submenu_page(__FILE__, 'Items', 'Add Item', 8, 'mediatheque-add-items', 'mediatheque_add_item');
}
add_action('admin_menu', 'mediatheque_menu');

function mediatheque_loadsstyle()
{
    wp_enqueue_style('mediatheque-style',  plugins_url('mediatheque/css/admin-mediatheque.css'));
    //wp_enqueue_style('mediatheque-style',  WP_CONTENT_URL . '/themes/themename/css/mycss.css');
    //http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css => datepicker css
    wp_enqueue_style('jquery-style', plugins_url('mediatheque/css/jquery-ui.css'));

}

function mediathequeload_script($hook){
    //global $aad_settings;
    //if($hook != $aad_settings) return;
    wp_enqueue_script('mediatheque-script',  plugins_url('mediatheque/js/admin-mediatheque.js'));
    wp_enqueue_script('jquery-ui-datepicker');
}
function mediatheque_name_scripts() {
    //get_template_directory_uri()
    wp_enqueue_style( 'style-name', plugins_url("mediatheque/css/mediatheque.css"));
    wp_enqueue_script( 'script-name', plugins_url('mediatheque/js/mediatheque.js'));
}
if ( is_admin() ){
    add_action('admin_enqueue_scripts','mediatheque_loadsstyle');
    add_action("admin_enqueue_scripts","mediathequeload_script");
}else{
    add_action( 'wp_enqueue_scripts', 'mediatheque_name_scripts' );
}
/*
function add_admin_page() {
    global $aad_settings;
    $aad_settings = add_options_page(__("Admin Ajax Demo","aad"), __("Admin Ajax","aad"), 'manage_options', 'mediatheque', 'aad_render_admin');
}
add_action('admin_menu', 'add_admin_page');
function aad_render_admin()
{
    echo "Render function admin";
}
*/

?>
