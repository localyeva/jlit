<?php 

/*JLIT finction define*/

/**
 * Enqueue scripts and styles.
 *
 * JLIT ver1.0
 */
function jlit_scripts() {

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style( 'styles', get_template_directory_uri() . '/css/styles.css');

	wp_enqueue_script( 'jquery-script', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ));
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ));
	
}
add_action( 'wp_enqueue_scripts', 'jlit_scripts' );

//Nav menu
register_nav_menu('primary', 'Primary Menu');

/**
 * Register widget area.
 *
 *JLIT 1.0
 *
 */
function jlit_widgets_init() {
	register_sidebar( array(
			'name'          => __( 'Widget Area', 'jlit' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'jlit' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'jlit_widgets_init' );
/*
 * Khởi tạo widget item
 */


