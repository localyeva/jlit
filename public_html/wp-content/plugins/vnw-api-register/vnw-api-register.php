<?php

/**
  Plugin Name: Vietnamworks API Register
  Plugin URI:
  Description: API Key Register
  Version:     1.0
  Author:      Khang LD
  Author URI:
  License:
  License URI:
  Domain Path:
  Text Domain:
 */

if (!defined('ABSPATH')) {
    die('No script kiddies please!');
}

/**
 * Description of MyOptions
 *
 * @author khangld
 * 
 * use in front-end by this way get_option('my_theme_option')
 * 
 * @ct_vnw_api
 * @ct_vnw_api_key
 * @ct_vnw_url_staging
 * @ct_vnw_api_key_staging
 * @ct_vnw_real_staging
 * 
 */
class vnw_api_register {

    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options = NULL;

    /**
     * Start up
     */
    public function __construct() {
        add_action('admin_menu', array($this, 'add_plugin_page'));
        //
        add_action('admin_init', array($this, 'page_init'));
    }

    /**
     * Add options page
     */
    function add_plugin_page() {
        // This page will be under "Theme Options"
        // work
        add_menu_page(
                'Vietnamworks Options', 'Vietnamworks Options', 'moderate_comments', 'workpress-api-setting', array($this, 'settings_page')
        );
    }
    
    /**
     * Options page callback
     */
    public function settings_page() {
        // Set class property
        $this->options = get_option('my_theme_option');
        ?>

        <div id="theme-options-wrap">
            <div class="wp-menu-image dashicons-before dashicons-admin-tools" id="icon-tools"> <br/> </div>
            <h2>Vietnamworks Settings</h2>
            <form method="post" action="options.php" enctype="multipart/form-data">
                <?php
                // This prints out all hidden setting fields
                settings_fields('my_theme_option_group');
                do_settings_sections('section_vnw_api');
                do_settings_sections('section_vnw_api_staging');
                do_settings_sections('section_vnw_real_staging');
                submit_button();
                ?>
            </form>
        </div>

        <?php
    }

    /**
     * Register and add settings
     * register_and_build_fields
     */
    public function page_init() {
        register_setting(
                'my_theme_option_group', // Option group
                'my_theme_option', // Option name
                array($this, 'sanitize')    // Sanitize
        );

        // Vietnamwork Section
        add_settings_section(
                'id_vnw_api_settings', // ID
                'Vietnamworks API Service', // Title
                array($this, 'print_section_vietnamwork_api_info'), // Callback
                'section_vnw_api'  // Section
        );

        // Vietnamwork Staging Section
        add_settings_section('id_vnw_api_staging_settings', 'Vietnamworks API Staging Service', array($this, 'print_section_vietnamwork_api_staging_info'), 'section_vnw_api_staging');
        
        // Vietnamwork Real/Staging Section
        add_settings_section('id_vnw_real_staging_settings', 'Vietnamworks Real / Staging Service', array($this, 'print_section_vietnamwork_real_staging_info'), 'section_vnw_real_staging');

        // Custom Script Section
        add_settings_section('id_vnw_real_staging_settings', 'Vietnamworks Real / Staging', array($this, 'print_section_vietnamwork_real_staging_info'), 'section_vnw_real_staging');

        /*
         * add_settings_field(ID, Title Name, Callback function, Section, Setting ID)
         */

        add_settings_field('ct_vnw_url', 'URL host', array($this, 'ct_vnw_url_callback'), 'section_vnw_api', 'id_vnw_api_settings');

        add_settings_field('ct_vnw_api_key', 'API Key', array($this, 'ct_vnw_api_key_callback'), 'section_vnw_api', 'id_vnw_api_settings');

        // Social script
        add_settings_field('ct_vnw_url_staging', 'Url host staging', array($this, 'ct_vnw_url_staging_callback'), 'section_vnw_api_staging', 'id_vnw_api_staging_settings');

        add_settings_field('ct_vnw_api_key_staging', 'API key staging', array($this, 'ct_vnw_api_key_staging_callback'), 'section_vnw_api_staging', 'id_vnw_api_staging_settings');

        //
        add_settings_field('ct_vnw_real_staging', 'Switch', array($this, 'ct_vnw_real_staging_callback'), 'section_vnw_real_staging', 'id_vnw_real_staging_settings');
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize($input) {
        // sanitize_text_field()
        $new_input = array();

        if (isset($input['ct_vnw_url'])) {
            $new_input['ct_vnw_url'] = $input['ct_vnw_url'];
        }

        if (isset($input['ct_vnw_api_key'])) {
            $new_input['ct_vnw_api_key'] = $input['ct_vnw_api_key'];
        }

        if (isset($input['ct_vnw_url_staging'])) {
            $new_input['ct_vnw_url_staging'] = $input['ct_vnw_url_staging'];
        }

        if (isset($input['ct_vnw_api_key_staging'])) {
            $new_input['ct_vnw_api_key_staging'] = $input['ct_vnw_api_key_staging'];
        }

        if (isset($input['ct_vnw_real_staging'])) {
            $new_input['ct_vnw_real_staging'] = $input['ct_vnw_real_staging'];
        }

        return $new_input;
    }

    /**
     * Print the Section text
     */
    public function print_section_vietnamwork_api_info() {
        print 'Vietnamworks API';
    }

    public function print_section_vietnamwork_api_staging_info() {
        print 'Vietnamworks API Staging';
    }

    public function print_section_vietnamwork_real_staging_info() {
        print 'Switch between Real / Staging environment';
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function ct_vnw_url_callback() {
        printf(
                '<input type="text" size="100" id="url" name="my_theme_option[ct_vnw_url]" value="%s"/>', isset($this->options['ct_vnw_url']) ? esc_attr($this->options['ct_vnw_url']) : ''
        );
    }

    public function ct_vnw_api_key_callback() {
        printf(
                '<input type="text" size="100" id="api key" name="my_theme_option[ct_vnw_api_key]" value="%s"/>', isset($this->options['ct_vnw_api_key']) ? esc_attr($this->options['ct_vnw_api_key']) : ''
        );
    }

    public function ct_vnw_url_staging_callback() {
        printf(
                '<input type="text" size="100" id="url staging" name="my_theme_option[ct_vnw_url_staging]" value="%s"/>', isset($this->options['ct_vnw_url_staging']) ? esc_attr($this->options['ct_vnw_url_staging']) : ''
        );
    }

    public function ct_vnw_api_key_staging_callback() {
        printf(
                '<input type="text" size="100" id="api key staging" name="my_theme_option[ct_vnw_api_key_staging]" value="%s"/>', isset($this->options['ct_vnw_api_key_staging']) ? esc_attr($this->options['ct_vnw_api_key_staging']) : ''
        );
    }

    public function ct_vnw_real_staging_callback() {
        printf(
            '<label><input type="radio" name="my_theme_option[ct_vnw_real_staging]" value="real" %s />Real</label><br/>', (isset($this->options['ct_vnw_real_staging']) && $this->options['ct_vnw_real_staging'] == 'real') ? 'checked' : ''
        );
        printf(
            '<label><input type="radio" name="my_theme_option[ct_vnw_real_staging]" value="staging" %s />Staging</label>', (isset($this->options['ct_vnw_real_staging']) && $this->options['ct_vnw_real_staging'] == 'staging') ? 'checked' : ''
        );
    }

}

//if (is_admin()) {
    $vnw_api_register = new vnw_api_register();    
//}
