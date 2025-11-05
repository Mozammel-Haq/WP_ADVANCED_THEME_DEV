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

    <!-- QuickView / sidemenu / search / menu wrapper (keep your original markup) -->
    <div id="QuickView" class="white-popup mfp-hide">
        <div class="container bg-white rounded-10">
            <div class="row gx-60">
                <div class="col-lg-6">
                    <div class="product-big-img">
                        <div class="img">
                            <img
                                src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/product/product_details_1_1.jpg'); ?>"
                                alt="Product Image" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="product-about">
                        <p class="price">$120.85<del>$150.99</del></p>
                        <h2 class="product-title">Bosco Apple Fruit</h2>
                        <div class="product-rating">
                            <div
                                class="star-rating"
                                role="img"
                                aria-label="Rated 5.00 out of 5">
                                <span style="width: 100%">Rated <strong class="rating">5.00</strong> out of 5 based
                                    on <span class="rating">1</span> customer rating</span>
                            </div>
                            <a href="shop-details.html" class="woocommerce-review-link">(<span class="count">4</span> customer reviews)</a>
                        </div>
                        <p class="text">
                            Prepare to embark on a sensory journey with the Bosco Apple, a
                            fruit that transcends the ordinary and promises an unparalleled
                            taste experience. These apples are nothing short of nature’s
                            masterpiece, celebrated for their distinctive blend of flavors
                            and their captivating visual allure.
                        </p>
                        <div class="mt-2 link-inherit">
                            <p>
                                <strong class="text-title me-3">Availability:</strong>
                                <span class="stock in-stock"><i class="far fa-check-square me-2 ms-1"></i>In Stock</span>
                            </p>
                        </div>
                        <div class="actions">
                            <div class="quantity">
                                <input
                                    type="number"
                                    class="qty-input"
                                    step="1"
                                    min="1"
                                    max="100"
                                    name="quantity"
                                    value="1"
                                    title="Qty" />
                                <button class="quantity-plus qty-btn">
                                    <i class="far fa-chevron-up"></i>
                                </button>
                                <button class="quantity-minus qty-btn">
                                    <i class="far fa-chevron-down"></i>
                                </button>
                            </div>
                            <button class="th-btn">Add to Cart</button>
                            <a href="wishlist.html" class="icon-btn"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="product_meta">
                            <span class="sku_wrapper">SKU: <span class="sku">Bosco-Apple-Fruit</span></span>
                            <span class="posted_in">Category: <a href="shop.html">Fresh Fruits</a></span>
                            <span>Tags: <a href="shop.html">Fruits</a><a href="shop.html">Organic</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <button title="Close (Esc)" type="button" class="mfp-close">×</button>
        </div>
    </div>

    <!-- dynamic sidemenu / cart (replace the static sidemenu-cart block with this) -->
    <?php
    /**
     * Dynamic sidemenu cart partial.
     * Use this to replace the static sidemenu-wrapper block in your header-classic.php.
     * Outputs the mini-cart with markup and classes matching the original template so theme CSS/JS apply.
     */

    if (! function_exists('is_woocommerce_active')) {
        function is_woocommerce_active()
        {
            return class_exists('WooCommerce') && function_exists('WC');
        }
    }
    ?>
    <?php
    get_template_part('template-parts/sidemenu-cart');
    ?>


    <div class="popup-search-box d-none d-lg-block">
        <button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="#">
            <input type="text" placeholder="<?php esc_attr_e('What are you looking for?', 'wp-advanced-theme'); ?>" />
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div>

    <div class="th-menu-wrapper">
        <nav class="main-menu d-none d-lg-inline-block">
            <?php
            wp_nav_menu([
                'theme_location' => 'main-menu',
                'menu_class'     => 'menu',
                'container'      => false,
            ]);
            ?>
        </nav>
    </div>

    <?php
    $header_bg_color = esc_attr(get_theme_mod('header_bg_color', '#ffffff'));
    $header_style = 'background-color:' . $header_bg_color . '; background-image:none;';
    ?>

    <header class="th-header header-layout2" style="<?php echo $header_style; ?>">
        <div class="sticky-wrapper">
            <div>
                <div class="z-index-common">
                    <div class="header-top">
                        <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                            <div class="col-auto d-none d-lg-block">
                                <p class="header-notice"><?php esc_html_e('Orders of $50 or more qualify for free shipping!', 'wp-advanced-theme'); ?></p>
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
                                                <?php if ($fb = get_theme_mod('header_facebook')) : ?>
                                                    <a href="<?php echo esc_url($fb); ?>"><i class="fab fa-facebook-f"></i></a>
                                                <?php endif; ?>
                                                <?php if ($tw = get_theme_mod('header_twitter')) : ?>
                                                    <a href="<?php echo esc_url($tw); ?>"><i class="fab fa-twitter"></i></a>
                                                <?php endif; ?>
                                                <?php if ($ig = get_theme_mod('header_instagram')) : ?>
                                                    <a href="<?php echo esc_url($ig); ?>"><i class="fab fa-instagram"></i></a>
                                                <?php endif; ?>
                                                <?php if ($yt = get_theme_mod('header_youtube')) : ?>
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
                                        <?php if ($logo = get_theme_mod('header_logo')) : ?>
                                            <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                        <?php else : ?>
                                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo-white.svg'); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                        <?php endif; ?>
                                    </a>
                                </div>
                            </div>

                            <div class="col-auto">
                                <nav class="main-menu d-none d-lg-inline-block">
                                    <?php
                                    wp_nav_menu([
                                        'theme_location' => 'main-menu',
                                        'menu_class'     => 'menu',
                                        'container'      => false,
                                    ]);
                                    ?>
                                </nav>
                                <button type="button" class="th-menu-toggle d-block d-lg-none"><i class="far fa-bars"></i></button>
                            </div>

                            <div class="col-auto d-none d-xl-block ms-auto">
                                <div class="header-button">
                                    <!-- Search icon -->
                                    <button type="button" class="simple-icon searchBoxToggler"><i class="far fa-search"></i></button>

                                    <!-- Cart: button with badge to match theme, only if WooCommerce active and Customizer toggle enabled -->
                                    <?php if (class_exists('WooCommerce') && get_theme_mod('header_show_cart', true)) : ?>
                                        <button type="button" class="simple-icon sideMenuToggler" aria-label="<?php esc_attr_e('Open cart', 'wp-advanced-theme'); ?>">
                                            <span class="badge">
                                                <?php echo intval((function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0); ?>
                                            </span>
                                            <i class="fa-regular fa-cart-shopping"></i>
                                        </button>
                                    <?php endif; ?>

                                    <!-- Account: icon-only anchor, only if WooCommerce active and Customizer toggle enabled -->
                                    <?php if (class_exists('WooCommerce') && get_theme_mod('header_show_account', true)) : ?>
                                        <?php $myaccount_url = get_permalink(get_option('woocommerce_myaccount_page_id')); ?>
                                        <a href="<?php echo esc_url($myaccount_url); ?>" class="icon-btn" aria-label="<?php esc_attr_e('My account', 'wp-advanced-theme'); ?>">
                                            <i class="far fa-user"></i>
                                        </a>
                                    <?php endif; ?>

                                    <!-- CTA button -->
                                    <a href="<?php echo esc_url(get_theme_mod('header_button_url', home_url('/contact'))); ?>" class="th-btn style4">
                                        <?php echo esc_html(get_theme_mod('header_button_text', __('Get A Quote', 'wp-advanced-theme'))); ?>
                                        <i class="fas fa-chevrons-right ms-2"></i>
                                    </a>
                                </div>
                            </div>

                        </div><!-- .row -->
                    </div><!-- .menu-area -->

                </div><!-- .z-index-common -->
            </div>
        </div>
    </header>