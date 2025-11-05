<?php
if (!defined('ABSPATH')) {
    exit;
}

// Get hero slides from Customizer
$hero_slides_json = get_theme_mod('hero_slides', '');
$hero_slides = [];

// Decode JSON safely
if (!empty($hero_slides_json)) {
    $decoded = json_decode($hero_slides_json, true);
    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
        $hero_slides = $decoded;
    }
}

// Fallback to original static slides if JSON is empty or invalid
if (empty($hero_slides)) {
    $hero_slides = [
        [
            'subtitle' => '100% Quality Foods',
            'title1'   => 'Our Organic',
            'title2'   => 'Collection.',
            'btn_text' => 'Shop Now',
            'btn_url'  => esc_url(home_url('/shop')),
            'hero_img' => get_template_directory_uri() . '/assets/img/hero/hero_2_1.png',
            'shapes'   => [
                'hero_shape_1_1.png',
                'hero_shape_1_2.png',
                'hero_shape_1_3.png',
                'hero_shape_2_1.png',
            ],
        ],
        [
            'subtitle' => '100% Quality Foods',
            'title1'   => 'Our Organic',
            'title2'   => 'Vegetable',
            'btn_text' => 'Shop Now',
            'btn_url'  => esc_url(home_url('/shop')),
            'hero_img' => get_template_directory_uri() . '/assets/img/hero/hero_2_2.png',
            'shapes'   => [
                'hero_shape_1_1.png',
                'hero_shape_1_2.png',
                'hero_shape_1_3.png',
                'hero_shape_2_1.png',
            ],
        ],
        [
            'subtitle' => '100% Quality Foods',
            'title1'   => 'Our Organic',
            'title2'   => 'Vegetable',
            'btn_text' => 'Shop Now',
            'btn_url'  => esc_url(home_url('/shop')),
            'hero_img' => get_template_directory_uri() . '/assets/img/hero/hero_2_3.png',
            'shapes'   => [
                'hero_shape_1_1.png',
                'hero_shape_1_2.png',
                'hero_shape_1_3.png',
                'hero_shape_2_1.png',
            ],
        ],
    ];
}
?>

<!-- HOMEPAGE HERO SECTION -->
<div class="th-hero-wrapper hero-2" id="hero" data-bg-src="<?php echo get_template_directory_uri(); ?>/assets/img/hero/hero_bg_2_1.jpg">
    <div class="swiper th-slider" id="heroSlider2" data-slider-options='{"effect":"fade"}'>
        <div class="swiper-wrapper">
            <?php foreach ($hero_slides as $slide_index => $slide): ?>
                <div class="swiper-slide">
                    <div class="hero-inner">
                        <div class="container">
                            <div class="hero-style2">
                                <?php if (!empty($slide['subtitle'])): ?>
                                    <span class="sub-title" data-ani="slideinup" data-ani-delay="0.2s">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/theme-img/title_icon.svg" alt="shape">
                                        <?php echo esc_html($slide['subtitle']); ?>
                                    </span>
                                <?php endif; ?>

                                <h1 class="hero-title">
                                    <?php if (!empty($slide['title1'])): ?>
                                        <span class="title1" data-ani="slideinup" data-ani-delay="0.4s"><?php echo esc_html($slide['title1']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($slide['title2'])): ?>
                                        <span class="title2" data-ani="slideinup" data-ani-delay="0.5s"><?php echo esc_html($slide['title2']); ?></span>
                                    <?php endif; ?>
                                </h1>

                                <?php if (!empty($slide['btn_text']) && !empty($slide['btn_url'])): ?>
                                    <div class="btn-group" data-ani="slideinup" data-ani-delay="0.7s">
                                        <a href="<?php echo esc_url($slide['btn_url']); ?>" class="th-btn">
                                            <?php echo esc_html($slide['btn_text']); ?><i class="fas fa-chevrons-right ms-2"></i>
                                        </a>
                                        <div class="arrow">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/hero/hero_arrow.svg" alt="Icon">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if (!empty($slide['hero_img'])): ?>
                            <div class="hero-img" data-ani="slidebottomright" data-ani-delay="0.1s">
                                <img src="<?php echo esc_url($slide['hero_img']); ?>" alt="Image">
                            </div>
                        <?php endif; ?>

                        <?php
                        // Render shapes (always 4 divs, even if image missing)
                        $shape_classes = ['hero-shape1', 'hero-shape2', 'hero-shape3', 'hero-shape4'];
                        for ($i = 0; $i < 4; $i++):
                            $shape_img = $slide['shapes'][$i] ?? '';
                            $class = $shape_classes[$i];
                            $animation = ($i === 3) ? 'slidebottomright' : 'slideinup';
                            $delay = 0.7 + ($i * 0.1);
                        ?>
                            <div class="<?php echo esc_attr($class); ?>" data-ani="<?php echo esc_attr($animation); ?>" data-ani-delay="<?php echo esc_attr($delay); ?>s">
                                <?php if ($shape_img): ?>
                                    <img src="<?php echo get_template_directory_uri() . '/assets/img/hero/' . esc_attr($shape_img); ?>" alt="shape">
                                <?php endif; ?>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="icon-box">
            <button data-slider-prev="#heroSlider2" class="slider-arrow default"><i class="far fa-arrow-left"></i></button>
            <button data-slider-next="#heroSlider2" class="slider-arrow default"><i class="far fa-arrow-right"></i></button>
        </div>
    </div>
</div>