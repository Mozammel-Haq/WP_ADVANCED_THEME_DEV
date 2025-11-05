<?php

/**
 * WP Advanced Theme - Main Functions Loader
 */

if (!defined('ABSPATH')) {
    exit; // Prevent direct access
}

// === Include Core Theme Files === //
require get_template_directory() . '/inc/setup.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/menus.php';
require get_template_directory() . '/inc/woocommerce.php';
require get_template_directory() . '/inc/elementor-custom-widgets.php';

// === Include Customizer Files === //
require get_template_directory() . '/inc/customizer/header-footer.php';
require get_template_directory() . '/inc/customizer/hero.php';
