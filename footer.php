<?php
// Get the selected footer layout (default: 'classic')
$footer_layout = get_theme_mod('footer_layout', 'classic');

// Include the correct template-part
get_template_part('template-parts/footer', $footer_layout);

// WordPress footer hook and close tags (only if not already in the layout file)
if (!did_action('wp_footer')) {
    wp_footer();
    echo '</body></html>';
}
