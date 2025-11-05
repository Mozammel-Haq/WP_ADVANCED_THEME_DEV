<?php

// Load Elementor widgets
function wp_advanced_register_elementor_widgets()
{
    if (defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base')) {
        require get_template_directory() . '/inc/elementor-widgets/hero-widget.php';
    }
}
add_action('elementor/widgets/widgets_registered', 'wp_advanced_register_elementor_widgets');

?>