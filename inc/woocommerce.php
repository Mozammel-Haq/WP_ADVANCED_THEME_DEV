<?php

/**
 * WooCommerce Compatibility & Style Handling
 */

if (!defined('ABSPATH')) {
    exit;
}

// Remove default WooCommerce styles
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

// Alternatively dequeue specific styles
function wp_advanced_theme_dequeue_woocommerce_styles()
{
    wp_dequeue_style('woocommerce-general');
    wp_dequeue_style('woocommerce-layout');
    wp_dequeue_style('woocommerce-smallscreen');
    wp_dequeue_style('woocommerce_frontend_styles');
}
add_action('wp_enqueue_scripts', 'wp_advanced_theme_dequeue_woocommerce_styles', 99);
