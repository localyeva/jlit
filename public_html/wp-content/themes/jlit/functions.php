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