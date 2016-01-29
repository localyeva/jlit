<?php
/*  Plugin Name: jlit
	Plugin URI: #
	Description: jlit management
	Version: 0.1
	Author: Nam.Do
	Author URI: #
	License: GPL2
*/
?>

<?php function jlit_options_page () { ?>
	<div class="container">
		<?php get_template_part('templates/j-admin'); ?>
	</div>
<?php } ?>

<?php
	function jlit_menu () {
            global $current_user;
            if($current_user->user_login != API_MANAGER_NAME){
                add_menu_page('JLIT Admin','jlit', 'manage_options', 'jlit', jlit_options_page );
            }
	}

	add_action('admin_menu','jlit_menu');
?>
