<?php

function portx_widget_list() {
    register_sidebar( array(
        'name'          => __( 'Blog Sidebar', 'aidzone' ),
        'id'            => 'blog-sidebar',
        'description'   => __( 'Widgets in this area will be shown on blog sidebar', 'aidzone' ),
        'before_widget' => '<div id="%1$s" class="sidebar__widget mb-40 %2$s" >',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="sidebar__widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widget 1', 'aidzone' ),
        'id'            => 'footer-widget-1',
        'description'   => __( 'Widgets in this area will be shown on footer', 'textdomain' ),
        'before_widget' => '<div id="%1$s" class="tp-footer__widget  tp-footer-col-1 mb-40  wow fadeInUp %2$s" data-wow-duration=".9s" data-wow-delay=".3s" >',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="tp-footer__widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widget 2', 'aidzone' ),
        'id'            => 'footer-widget-2',
        'description'   => __( 'Widgets in this area will be shown on footer', 'textdomain' ),
        'before_widget' => '<div id="%1$s" class="tp-footer__widget tp-footer-col-2 mb-40 fix wow fadeInUp %2$s" data-wow-duration=".9s" data-wow-delay=".5s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="tp-footer__widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widget 3', 'aidzone' ),
        'id'            => 'footer-widget-3',
        'description'   => __( 'Widgets in this area will be shown on footer', 'textdomain' ),
        'before_widget' => '<div id="%1$s" class="tp-footer__widget tp-footer-col-3  mb-40 wow fadeInUp %2$s" data-wow-duration=".9s" data-wow-delay=".7s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="tp-footer__widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widget 4', 'aidzone' ),
        'id'            => 'footer-widget-4',
        'description'   => __( 'Widgets in this area will be shown on footer', 'textdomain' ),
        'before_widget' => '<div id="%1$s" class="tp-footer__widget tp-footer-col-4 wow fadeInUp %2$s" data-wow-duration=".9s" data-wow-delay=".9s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="tp-footer__widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'portx_widget_list' );

function custom_nav_menu_widget_classes($nav_menu_args, $nav_menu, $args, $instance) {
    // Add container class to the menu widget
    $nav_menu_args['container_class'] = 'tp-footer__content'; // Replace with your container class
    $nav_menu_args['link_before'] = '<i class="fa-sharp fa-solid fa-plus"></i> '; // Replace with your container class
    return $nav_menu_args;
}
add_filter('widget_nav_menu_args', 'custom_nav_menu_widget_classes', 10, 4);
