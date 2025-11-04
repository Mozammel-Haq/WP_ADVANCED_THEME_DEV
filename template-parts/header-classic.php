<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />

    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <meta name="author" content="<?php bloginfo('name'); ?>" />
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <meta name="robots" content="INDEX,FOLLOW" />

    <?php // Favicon assets 
    ?>
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Preloader (unchanged) -->
    <div class="preloader">
        <button class="th-btn preloaderCls">Cancel Preloader</button>
        <div class="preloader-inner">
            <div class="loader"><span></span><span></span><span></span><span></span><span></span><span></span></div>
        </div>
    </div>

    <!-- QuickView Modal (unchanged) -->
    <div id="QuickView" class="white-popup mfp-hide">
        <!-- ... your original modal content ... -->
    </div>

    <div class="sidemenu-wrapper sidemenu-cart d-none d-lg-block">
        <!-- ... your original sidemenu content ... -->
    </div>

    <div class="popup-search-box d-none d-lg-block">
        <button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="#">
            <input type="text" placeholder="What are you looking for?" />
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div>

    <div class="th-menu-wrapper">
        <nav class="main-menu d-none d-lg-inline-block">
            <?php
            wp_nav_menu([
                'theme_location' => 'main-menu',
                'menu_class' => 'menu',
                'container' => false,
            ]);
            ?>
        </nav>
    </div>

    <!-- HEADER markup with Customizer options -->
    <header
        class="th-header header-layout2"
        style="background:<?php echo esc_attr(get_theme_mod('header_bg_color', '#ffffff')); ?>!important;">
        <div class="sticky-wrapper">
            <div>
                <div class="z-index-common">
                    <div class="header-top">
                        <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                            <div class="col-auto d-none d-lg-block">
                                <p class="header-notice">Orders of $50 or more qualify for free shipping!</p>
                            </div>
                            <div class="col-auto">
                                <div class="header-links">
                                    <ul>
                                        <li class="d-none d-xxl-inline-block">
                                            <i class="fal fa-location-dot"></i>
                                            <a href="https://www.google.com/maps">8502 Preston Rd. Inglewood, Maine 98380</a>
                                        </li>
                                        <li>
                                            <div class="social-links">
                                                <?php if ($fb = get_theme_mod('header_facebook')): ?>
                                                    <a href="<?php echo esc_url($fb); ?>"><i class="fab fa-facebook-f"></i></a>
                                                <?php endif; ?>
                                                <?php if ($tw = get_theme_mod('header_twitter')): ?>
                                                    <a href="<?php echo esc_url($tw); ?>"><i class="fab fa-twitter"></i></a>
                                                <?php endif; ?>
                                                <?php if ($ig = get_theme_mod('header_instagram')): ?>
                                                    <a href="<?php echo esc_url($ig); ?>"><i class="fab fa-instagram"></i></a>
                                                <?php endif; ?>
                                                <?php if ($yt = get_theme_mod('header_youtube')): ?>
                                                    <a href="<?php echo esc_url($yt); ?>"><i class="fab fa-youtube"></i></a>
                                                <?php endif; ?>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="menu-area">
                        <div class="logo-bg"></div>
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto">
                                <div class="header-logo">
                                    <a href="<?php echo esc_url(home_url('/')); ?>">
                                        <?php if (get_theme_mod('header_logo')): ?>
                                            <img src="<?php echo esc_url(get_theme_mod('header_logo')); ?>" alt="<?php bloginfo('name'); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-white.svg" alt="<?php bloginfo('name'); ?>">
                                        <?php endif; ?>
                                    </a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <nav class="main-menu d-none d-lg-inline-block">
                                    <?php
                                    wp_nav_menu([
                                        'theme_location' => 'main-menu',
                                        'menu_class' => 'menu',
                                        'container' => false,
                                    ]);
                                    ?>
                                </nav>
                                <button type="button" class="th-menu-toggle d-block d-lg-none"><i class="far fa-bars"></i></button>
                            </div>
                            <div class="col-auto d-none d-xl-block ms-auto">
                                <div class="header-button">
                                    <!-- Search Icon (always visible) -->
                                    <button type="button" class="simple-icon searchBoxToggler">
                                        <i class="far fa-search"></i>
                                    </button>

                                    <!-- Cart Icon (WooCommerce only) -->
                                    <?php if (class_exists('WooCommerce')) : ?>
                                        <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="icon-btn sideMenuToggler">
                                            <span class="badge">
                                                <?php echo WC()->cart->get_cart_contents_count(); ?>
                                            </span>
                                            <i class="fa-regular fa-cart-shopping"></i>
                                        </a>
                                    <?php endif; ?>

                                    <!-- Wishlist Icon (YITH WooCommerce Wishlist only) -->
                                    <?php if (function_exists('YITH_WCWL')) : ?>
                                        <a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>" class="icon-btn">
                                            <i class="far fa-heart"></i>
                                        </a>
                                    <?php endif; ?>

                                    <!-- My Account Icon (WooCommerce only) -->
                                    <?php if (class_exists('WooCommerce')) : ?>
                                        <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" class="icon-btn">
                                            <i class="far fa-user"></i>
                                            <!-- Optional label for logged-in user -->
                                            <?php if (is_user_logged_in()) : ?>
                                                <span class="d-none d-xl-inline"><?php echo esc_html__('My Account', 'wp-advanced-theme'); ?></span>
                                            <?php else : ?>
                                                <span class="d-none d-xl-inline"><?php echo esc_html__('Sign In', 'wp-advanced-theme'); ?></span>
                                            <?php endif; ?>
                                        </a>
                                    <?php endif; ?>

                                    <!-- Your custom button (Customizer) -->
                                    <a href="<?php echo esc_url(get_theme_mod('header_button_url', home_url('/contact'))); ?>" class="th-btn style4">
                                        <?php echo esc_html(get_theme_mod('header_button_text', 'Get A Quote')); ?>
                                        <i class="fas fa-chevrons-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>