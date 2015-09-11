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
		//Biến tạo các giá trị mặc định trong form
		$default = array(
		        'title' => 'Tên của bạn'
		);
		//Gộp các giá trị trong mảng $default vào biến $instance để nó trở thành các giá trị mặc định
		$instance = wp_parse_args( (array) $instance, $default);
		//Tạo biến riêng cho giá trị mặc định trong mảng $default
		$title = esc_attr( $instance['title'] );
		//Hiển thị form trong option của widget
		echo "Nhập tiêu đề <input class=".'widefat'." type=".'text'." name=".$this->get_field_name('title')."' value='".$title."' />";
	}

	/**
	 * save widget form
	 */

	function update( $new_instance, $old_instance ) {
		parent::update( $new_instance, $old_instance );
		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	/**
	 * Show widget
	 */

	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo $before_widget;
		
		//In tiêu đề widget
		echo $before_title.$title.$after_title;
		
		// Nội dung trong widget
		
		echo "ABC XYZ";
		
		// Kết thúc nội dung trong widget
		
		echo $after_widget;
	}

}