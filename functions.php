<?php
require get_template_directory() . '/inc/customizer/header-footer.php';
/**
 * WP Advanced Theme functions and definitions
 */

// 1. Prevent direct access
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// 2. Enqueue styles and scripts
function wp_advanced_theme_enqueue_assets()
{
    // Main stylesheet
    wp_enqueue_style('wp-advanced-theme-style', get_stylesheet_uri()); // Loads style.css (required for WP)
    wp_enqueue_style('template-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0');
    wp_enqueue_style('template-app', get_template_directory_uri() . '/assets/css/app.min.css', array(), '1.0.0');
    wp_enqueue_style('template-fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.min.css', array(), '6.0.0'); // Use real version if possible

    // JS FILES
    // Vendor first (like jQuery if custom)
    wp_enqueue_script('template-jquery', get_template_directory_uri() . '/assets/js/vendor/jquery-3.6.0.min.js', array(), '3.6.0', true);

    // Then your JS files, make sure dependencies are set (ex: jQuery)
    wp_enqueue_script('template-app', get_template_directory_uri() . '/assets/js/app.min.js', array('template-jquery'), '1.0.0', true);
    wp_enqueue_script('template-main', get_template_directory_uri() . '/assets/js/main.js', array('template-jquery'), '1.0.0', true);

    // Additional assets (you can add your CSS/JS here, e.g., custom.js in assets/js/)
    // Example: wp_enqueue_script('wp-advanced-theme-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0.0', true);
    // Elementor frontend styles (optional, if you want to override elementor styles)

}
add_action('wp_enqueue_scripts', 'wp_advanced_theme_enqueue_assets');

// 3. Theme support features
function wp_advanced_theme_setup()
{
    // Title tag support
    add_theme_support('title-tag');
    // Custom logo
    add_theme_support('custom-logo');
    // Post thumbnails (featured images)
    add_theme_support('post-thumbnails');
    // Automatic feed links
    add_theme_support('automatic-feed-links');
    // HTML5 markup support
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    // WooCommerce support
    add_theme_support('woocommerce');
    // Elementor support for theme locations (header/footer builder)
    add_theme_support('elementor-custom-locations');
}
add_action('after_setup_theme', 'wp_advanced_theme_setup');

// 4. Register navigation menus
function wp_advanced_theme_register_menus()
{
    register_nav_menus(array(
        'main-menu'   => __('Main Menu', 'wp-advanced-theme'),
        'footer-menu' => __('Footer Menu', 'wp-advanced-theme'),
    ));
}
add_action('init', 'wp_advanced_theme_register_menus');



// Prevent WooCommerce default styles from loading so theme's styles win
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

// If the above doesn't work in your setup, try dequeuing by handle (alternate):
function wp_advanced_theme_dequeue_woocommerce_styles()
{
    wp_dequeue_style('woocommerce-general');
    wp_dequeue_style('woocommerce-layout');
    wp_dequeue_style('woocommerce-smallscreen');
    wp_dequeue_style('woocommerce_frontend_styles');
}
add_action('wp_enqueue_scripts', 'wp_advanced_theme_dequeue_woocommerce_styles', 99);