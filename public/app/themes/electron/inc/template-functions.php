<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Electron
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function electron_body_classes($classes) {
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'electron_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function electron_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'electron_pingback_header');

/**
 * Change the excerpt length
 */
function electron_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'electron_excerpt_length');

/**
 * Change the excerpt more string
 */
function electron_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'electron_excerpt_more');

/**
 * Add custom image sizes
 */
function electron_image_sizes() {
    add_image_size('electron-featured', 800, 400, true);
    add_image_size('electron-thumbnail', 300, 200, true);
}
add_action('after_setup_theme', 'electron_image_sizes'); 
