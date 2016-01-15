<?php

/**
 * Author: Khang Le
 * 
 */
function virtue_child_theme_customize_register($wp_customize) {

    /* GENERAL SECTION */
    $wp_customize->add_section('general', array(
        'title' => __('GENERAL'),
        'priority' => 20,
    ));

    /* GENERAL */
    $wp_customize->add_setting('virtue_child_notification_check', array(
        'default' => false,
    ));
    $wp_customize->add_control('virtue_child_notification_check_c', array(
        'label' => __('Show Notification'),
        'section' => 'general',
        'settings' => 'virtue_child_notification_check',
        'priority' => 1,
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('virtue_child_notification_message', array(
        'default' => '',
    ));
    $wp_customize->add_control('virtue_child_notification_message_c', array(
        'label' => __('Enter your message here'),
        'section' => 'general',
        'settings' => 'virtue_child_notification_message',
        'priority' => 1,
        'type' => 'textarea',
    ));


    /* NOTIFICATION SECTION */
    $wp_customize->add_section('notification', array(
        'title' => __('NOTIFICATION'),
        'priority' => 20,
    ));

    // START Vietnamese
    // PC Device
    $wp_customize->add_setting('virtue_child_notification_vn_pc', array(
        'default' => '',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'virtue_child_notification_vn_pc_c', array(
        'label' => __('[VN] PC Notification'),
        'section' => 'notification',
        'settings' => 'virtue_child_notification_vn_pc',
        'priority' => 1,
    )));

    //Smartphone
    $wp_customize->add_setting('virtue_child_notification_vn_sp', array(
        'default' => '',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'virtue_child_notification_vn_sp_c', array(
        'label' => __('[VN] SP Notification'),
        'section' => 'notification',
        'settings' => 'virtue_child_notification_vn_sp',
        'priority' => 1,
    )));
    // END Vietnamese
    
    // START Japanese
    // PC Device
    $wp_customize->add_setting('virtue_child_notification_jp_pc', array(
        'default' => '',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'virtue_child_notification_jp_pc_c', array(
        'label' => __('[JP] PC Notification'),
        'section' => 'notification',
        'settings' => 'virtue_child_notification_jp_pc',
        'priority' => 1,
    )));

    //Smartphone
    $wp_customize->add_setting('virtue_child_notification_jp_sp', array(
        'default' => '',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'virtue_child_notification_jp_sp_c', array(
        'label' => __('[JP] SP Notification'),
        'section' => 'notification',
        'settings' => 'virtue_child_notification_jp_sp',
        'priority' => 1,
    )));
    // END Japanese
}

add_action('customize_register', 'virtue_child_theme_customize_register');

function get_virtue_child_notification_check() {
    return get_theme_mod('virtue_child_notification_check');
}

function get_virtue_child_notification_message() {
    return get_theme_mod('virtue_child_notification_message');
}

function get_virtue_child_notification_vn_pc() {
    return get_theme_mod('virtue_child_notification_vn_pc');
}

function get_virtue_child_notification_vn_sp() {
    return get_theme_mod('virtue_child_notification_vn_sp');
}

function get_virtue_child_notification_jp_pc() {
    return get_theme_mod('virtue_child_notification_jp_pc');
}

function get_virtue_child_notification_jp_sp() {
    return get_theme_mod('virtue_child_notification_jp_sp');
}
