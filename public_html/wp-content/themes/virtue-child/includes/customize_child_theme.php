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
        'label' => __('Enter your message'),
        'section' => 'general',
        'settings' => 'virtue_child_notification_message',
        'priority' => 1,
        'type' => 'textarea',
    ));
}

add_action('customize_register', 'virtue_child_theme_customize_register');


function get_virtue_child_notification_check() {
    return get_theme_mod('virtue_child_notification_check');
}

function get_virtue_child_notification_message() {
    return get_theme_mod('virtue_child_notification_message');
}