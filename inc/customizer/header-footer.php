<?php
function wp_advanced_theme_customize_register($wp_customize)
{
    // ===================== HEADER BUILDER ===================== //
    $wp_customize->add_section('header_builder_section', array(
        'title' => __('Header Builder', 'wp-advanced-theme'),
        'priority' => 10,
    ));

    // Header Layout (switcher)
    $wp_customize->add_setting('header_layout', array(
        'default' => 'classic',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('header_layout', array(
        'label' => __('Header Layout', 'wp-advanced-theme'),
        'section' => 'header_builder_section',
        'type' => 'select',
        'choices' => array(
            'classic' => __('Classic', 'wp-advanced-theme'),
            'centered' => __('Centered', 'wp-advanced-theme'),
            // Add more layouts as you create them
        ),
    ));

    // Custom Logo Upload
    $wp_customize->add_setting('header_logo', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'header_logo',
            array(
                'label' => __('Header Logo', 'wp-advanced-theme'),
                'section' => 'header_builder_section',
                'settings' => 'header_logo',
            )
        )
    );

    // Social links
    $socials = ["facebook", "twitter", "instagram", "youtube"];
    foreach ($socials as $social) {
        $wp_customize->add_setting("header_{$social}", array(
            'default' => '',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("header_{$social}", array(
            'label' => __('Header ' . ucfirst($social) . ' URL', 'wp-advanced-theme'),
            'section' => 'header_builder_section',
            'type' => 'url',
        ));
    }

    // Header Button
    $wp_customize->add_setting('header_button_text', array(
        'default' => __('Get A Quote', 'wp-advanced-theme'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('header_button_text', array(
        'label' => __('Header Button Text', 'wp-advanced-theme'),
        'section' => 'header_builder_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('header_button_url', array(
        'default' => home_url('/contact'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('header_button_url', array(
        'label' => __('Header Button URL', 'wp-advanced-theme'),
        'section' => 'header_builder_section',
        'type' => 'url',
    ));

    // Header Background Color
    $wp_customize->add_setting('header_bg_color', array(
        'default'   => '#ffffff',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_bg_color',
            array(
                'label' => __('Header Background Color', 'wp-advanced-theme'),
                'section' => 'header_builder_section',
            )
        )
    );

    // ------------------ New toggle: Show Cart ------------------ //
    $wp_customize->add_setting('header_show_cart', array(
        'default'           => true,
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('header_show_cart', array(
        'label'   => __('Show Cart Icon', 'wp-advanced-theme'),
        'section' => 'header_builder_section',
        'type'    => 'checkbox',
    ));

    // ------------------ New toggle: Show Account ------------------ //
    $wp_customize->add_setting('header_show_account', array(
        'default'           => true,
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('header_show_account', array(
        'label'   => __('Show Account Icon', 'wp-advanced-theme'),
        'section' => 'header_builder_section',
        'type'    => 'checkbox',
    ));

    // ===================== FOOTER BUILDER ===================== //
    $wp_customize->add_section('footer_builder_section', array(
        'title' => __('Footer Builder', 'wp-advanced-theme'),
        'priority' => 20,
    ));

    // Footer Layout (switcher)
    $wp_customize->add_setting('footer_layout', array(
        'default' => 'classic',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('footer_layout', array(
        'label' => __('Footer Layout', 'wp-advanced-theme'),
        'section' => 'footer_builder_section',
        'type' => 'select',
        'choices' => array(
            'classic' => __('Classic', 'wp-advanced-theme'),
            'centered' => __('Centered', 'wp-advanced-theme'),
            // Add more layouts as you create them
        ),
    ));

    // Footer Logo Upload
    $wp_customize->add_setting('footer_logo', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'footer_logo',
            array(
                'label' => __('Footer Logo', 'wp-advanced-theme'),
                'section' => 'footer_builder_section',
                'settings' => 'footer_logo',
            )
        )
    );

    // Footer Copyright Text
    $wp_customize->add_setting('footer_copyright', array(
        'default' => 'Copyright &copy; ' . date('Y') . ' ' . get_bloginfo('name') . '. All Rights Reserved.',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('footer_copyright', array(
        'label' => __('Footer Copyright Text', 'wp-advanced-theme'),
        'section' => 'footer_builder_section',
        'type' => 'text',
    ));

    // Footer Background Color
    $wp_customize->add_setting('footer_bg_color', array(
        'default'   => '#222222',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_bg_color',
            array(
                'label' => __('Footer Background Color', 'wp-advanced-theme'),
                'section' => 'footer_builder_section',
            )
        )
    );
}
add_action('customize_register', 'wp_advanced_theme_customize_register');
