<?php

/**
 * Register theme menus
 */

if (!defined('ABSPATH')) {
    exit;
}

function wp_advanced_theme_register_menus()
{
    register_nav_menus([
        'main-menu'   => __('Main Menu', 'wp-advanced-theme'),
        'footer-menu' => __('Footer Menu', 'wp-advanced-theme'),
    ]);
}
add_action('init', 'wp_advanced_theme_register_menus');
