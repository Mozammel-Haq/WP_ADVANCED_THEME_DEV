<?php
if (!defined('ABSPATH')) exit;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Hero_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'hero_widget';
    }

    public function get_title()
    {
        return __('Hero Section', 'wp-advanced-theme');
    }

    public function get_icon()
    {
        return 'eicon-slider-push';
    }

    public function get_categories()
    {
        return ['general'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'hero_section',
            [
                'label' => __('Hero Slides', 'wp-advanced-theme'),
            ]
        );

        $this->add_control(
            'slides',
            [
                'label' => __('Slides', 'wp-advanced-theme'),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'subtitle',
                        'label' => __('Subtitle', 'wp-advanced-theme'),
                        'type' => Controls_Manager::TEXT,
                        'default' => '100% Quality Foods',
                    ],
                    [
                        'name' => 'title1',
                        'label' => __('Title Line 1', 'wp-advanced-theme'),
                        'type' => Controls_Manager::TEXT,
                        'default' => 'Our Organic',
                    ],
                    [
                        'name' => 'title2',
                        'label' => __('Title Line 2', 'wp-advanced-theme'),
                        'type' => Controls_Manager::TEXT,
                        'default' => 'Collection.',
                    ],
                    [
                        'name' => 'btn_text',
                        'label' => __('Button Text', 'wp-advanced-theme'),
                        'type' => Controls_Manager::TEXT,
                        'default' => 'Shop Now',
                    ],
                    [
                        'name' => 'btn_url',
                        'label' => __('Button URL', 'wp-advanced-theme'),
                        'type' => Controls_Manager::URL,
                        'default' => ['url' => esc_url(home_url('/shop'))],
                    ],
                    [
                        'name' => 'hero_img',
                        'label' => __('Hero Image', 'wp-advanced-theme'),
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'shape1',
                        'label' => __('Shape 1', 'wp-advanced-theme'),
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'shape2',
                        'label' => __('Shape 2', 'wp-advanced-theme'),
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'shape3',
                        'label' => __('Shape 3', 'wp-advanced-theme'),
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'shape4',
                        'label' => __('Shape 4', 'wp-advanced-theme'),
                        'type' => Controls_Manager::MEDIA,
                    ],
                ],
                'title_field' => '{{{ title1 }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $slides = $settings['slides'];

?>
        <div class="th-hero-wrapper hero-2" id="hero" data-bg-src="<?php echo get_template_directory_uri(); ?>/assets/img/hero/hero_bg_2_1.jpg">
            <div class="swiper th-slider" id="heroSlider2" data-slider-options='{"effect":"fade"}'>
                <div class="swiper-wrapper">
                    <?php foreach ($slides as $slide): ?>
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

                                        <?php if (!empty($slide['btn_text']) && !empty($slide['btn_url']['url'])): ?>
                                            <div class="btn-group" data-ani="slideinup" data-ani-delay="0.7s">
                                                <a href="<?php echo esc_url($slide['btn_url']['url']); ?>" class="th-btn">
                                                    <?php echo esc_html($slide['btn_text']); ?><i class="fas fa-chevrons-right ms-2"></i>
                                                </a>
                                                <div class="arrow">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/hero/hero_arrow.svg" alt="Icon">
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <?php if (!empty($slide['hero_img']['url'])): ?>
                                    <div class="hero-img" data-ani="slidebottomright" data-ani-delay="0.1s">
                                        <img src="<?php echo esc_url($slide['hero_img']['url']); ?>" alt="Image">
                                    </div>
                                <?php endif; ?>

                                <?php
                                $shape_classes = ['hero-shape1', 'hero-shape2', 'hero-shape3', 'hero-shape4'];
                                for ($i = 1; $i <= 4; $i++):
                                    $shape_img = $slide['shape' . $i]['url'] ?? '';
                                    $class = $shape_classes[$i - 1];
                                    $animation = ($i === 4) ? 'slidebottomright' : 'slideinup';
                                    $delay = 0.7 + ($i - 1) * 0.1;
                                ?>
                                    <div class="<?php echo esc_attr($class); ?>" data-ani="<?php echo esc_attr($animation); ?>" data-ani-delay="<?php echo esc_attr($delay); ?>s">
                                        <?php if ($shape_img): ?>
                                            <img src="<?php echo esc_url($shape_img); ?>" alt="shape">
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
<?php
    }
}

// Register widget
function register_hero_widget($widgets_manager)
{
    require_once(__DIR__ . '/hero-widget.php');
    $widgets_manager->register(new Hero_Widget());
}
add_action('elementor/widgets/register', 'register_hero_widget');
