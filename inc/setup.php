<?php

/**
 * Theme setup: Add theme supports, image sizes, etc.
 */

if (!defined('ABSPATH')) {
    exit;
}

function wp_advanced_theme_setup()
{
    // Title tag support
    add_theme_support('title-tag');

    // Custom logo
    add_theme_support('custom-logo');

    // Featured images
    add_theme_support('post-thumbnails');

    // Automatic feed links
    add_theme_support('automatic-feed-links');

    // HTML5 markup
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style'
    ]);

    // WooCommerce support
    add_theme_support('woocommerce');

    // Elementor custom header/footer
    add_theme_support('elementor-custom-locations');
}
add_action('after_setup_theme', 'wp_advanced_theme_setup');

// Automatically create "Home" page on theme activation (WP 6.2+ compatible)
function wp_advanced_create_homepage()
{
    // Check if "Home" page exists using WP_Query
    $query = new WP_Query([
        'post_type'      => 'page',
        'title'          => 'Home',
        'posts_per_page' => 1,
        'post_status'    => 'any',
        'fields'         => 'ids',
    ]);

    if (!$query->have_posts()) {
        // Create page
        $home_page_id = wp_insert_post([
            'post_title'   => 'Home',
            'post_name'    => 'home',
            'post_content' => '', // Elementor content can be added later
            'post_status'  => 'publish',
            'post_type'    => 'page',
        ]);

        // Set it as the static front page
        if ($home_page_id && !is_wp_error($home_page_id)) {
            update_option('show_on_front', 'page');
            update_option('page_on_front', $home_page_id);
        }
    }
}
add_action('after_switch_theme', 'wp_advanced_create_homepage');
