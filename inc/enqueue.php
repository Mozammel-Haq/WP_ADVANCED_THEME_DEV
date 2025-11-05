<?php

/**
 * Enqueue theme styles and scripts
 */

if (!defined('ABSPATH')) {
    exit;
}

function wp_advanced_theme_enqueue_assets()
{
    // Styles
    wp_enqueue_style('wp-advanced-theme-style', get_stylesheet_uri());
    wp_enqueue_style('template-style', get_template_directory_uri() . '/assets/css/style.css', [], '1.0.0');
    wp_enqueue_style('template-app', get_template_directory_uri() . '/assets/css/app.min.css', [], '1.0.0');
    wp_enqueue_style('template-fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.min.css', [], '6.0.0');

    // Scripts
    wp_enqueue_script('template-jquery', get_template_directory_uri() . '/assets/js/vendor/jquery-3.6.0.min.js', [], '3.6.0', true);
    wp_enqueue_script('template-app', get_template_directory_uri() . '/assets/js/app.min.js', ['template-jquery'], '1.0.0', true);
    wp_enqueue_script('template-main', get_template_directory_uri() . '/assets/js/main.js', ['template-jquery'], '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'wp_advanced_theme_enqueue_assets');
