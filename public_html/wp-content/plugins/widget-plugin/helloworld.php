<?php
/*
 Plugin Name: HelloWorld
 Plugin URI: http://doanhpham.com
 Description: Thực hành tạo widget item.
 Author: Doanh Pham
 Version: 1.0
 Author URI: http://google.com
 */

function create_helloworld_widget() {
	register_widget('Helloworld_Widget');
}
add_action( 'widgets_init', 'create_helloworld_widget' );
class Helloworld_Widget extends WP_Widget {

	/**
	 * Thiết lập widget: đặt tên, base ID
	 */
	function __construct() {
		parent::__construct (
				'helloworld_widget', // id của widget
				'HelloWorld Widget', // tên của widget

				array(
						'description' => ' Plugin First Wordpress' // mô tả
				)
		);
	}

	/**
	 * Tạo form option cho widget
	 */
	function form( $instance ) {

	}

	/**
	 * save widget form
	 */

	function update( $new_instance, $old_instance ) {

	}

	/**
	 * Show widget
	 */

	function widget( $args, $instance ) {

	}

}