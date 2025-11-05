<?php
if (!defined('ABSPATH')) {
    exit;
}

function wp_advanced_theme_customize_hero($wp_customize)
{
    $wp_customize->add_section('hero_section', [
        'title'       => __('Hero Section', 'wp-advanced-theme'),
        'priority'    => 20,
        'description' => __('Manage hero slider content.', 'wp-advanced-theme'),
    ]);

    // Custom repeater (simplified array JSON)
    $wp_customize->add_setting('hero_slides', [
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ]);

    $wp_customize->add_control('hero_slides', [
        'label'       => __('Slides JSON (for now)', 'wp-advanced-theme'),
        'description' => __('Enter slides as JSON. Later we can add a proper repeater control.', 'wp-advanced-theme'),
        'section'     => 'hero_section',
        'type'        => 'textarea',
    ]);
}
add_action('customize_register', 'wp_advanced_theme_customize_hero');
