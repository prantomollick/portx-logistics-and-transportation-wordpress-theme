<?php

if (!function_exists('portx_setup')) : 

    function portx_setup() {

        // Make theme available for translation.
        load_theme_textdomain( 'portx', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Let WordPress manage the document title.
        add_theme_support('title-tag');

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'main-menu' => esc_html__('Main Menu', 'portx'),
            'footer-menu-1' => esc_html__('Footer Menu 1', 'portx'),
        ));

        // Switch search form, comment form, and comments to output valid HTML5.
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Enable support for Post Formats.
        add_theme_support( 'post-formats', array(
            'video', 'quote', 'gallery'
         ) );


        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('portx_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

         //Remove block editor support for widget
        remove_theme_support('widgets-block-editor');
    }

endif; //portx_setup

add_action('after_setup_theme', 'portx_setup');


// Enqueue scripts and styles.
include_once('inc/portx-scripts.php');

if ( class_exists( 'Kirki' ) ) {
    include_once('inc/portx-kirki.php');
}

include_once('inc/template-functions.php');
include_once('inc/nav-walker.php');
include_once('inc/portx-widget-list.php');
include_once('inc/sidebar-recent-post.php');

// 2. Add custom icon to category links
add_filter('wp_list_categories', function($output) {
    $output = str_replace('</a>', ' <i class="fa-sharp fa-regular fa-arrow-right"></i></a>', $output);
    return $output;
});


