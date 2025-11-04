<?php
// Get the selected header layout (default: 'classic')
$header_layout = get_theme_mod('header_layout', 'classic');

// Include the correct template-part
get_template_part('template-parts/header', $header_layout);
