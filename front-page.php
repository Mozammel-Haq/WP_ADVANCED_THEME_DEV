<?php get_header(); ?>

<main id="primary" class="site-main">

    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content(); // Elementor content appears if edited
        endwhile;
    endif;

    // Fallback default template sections if page content is empty
    if (empty(get_the_content())) {
        get_template_part('template-parts/home/hero');
        get_template_part('template-parts/home/about');
        get_template_part('template-parts/home/offer');
        get_template_part('template-parts/home/services');
        get_template_part('template-parts/home/products');
        get_template_part('template-parts/home/why-us');
        get_template_part('template-parts/home/process');
        get_template_part('template-parts/home/faq');
        get_template_part('template-parts/home/gallery');
        get_template_part('template-parts/home/testimonials');
        get_template_part('template-parts/home/blogs');
        get_template_part('template-parts/home/brands');
    }
    ?>

</main>

<?php get_footer(); ?>