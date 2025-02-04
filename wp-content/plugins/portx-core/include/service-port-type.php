<?php
/**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */
function service_page_template( $template ) {
    if ( is_singular( 'service' )  ) {
        $new_template = __DIR__.'/template/service-single.php';
	if ( '' != $new_template ) {
	    return $new_template ;
	}
    }
    return $template;
}

add_filter( 'template_include', 'service_page_template', 99 );


// function service_archive_page_template( $template ) {
//     if ( is_post_type_archive( 'service' ) ) {
//         $new_template = __DIR__ . '/template/service-archive.php';
//         if ( file_exists( $new_template ) ) {
//             return $new_template;
//         }
//     }
//     return $template;
// }

// add_filter( 'template_include', 'service_archive_page_template', 99 );



function portx_service_init() {

    $labels = array(
        'name'              => _x( 'Services Categories', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Service Category', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Services', 'textdomain' ),
        'all_items'         => __( 'All Services', 'textdomain' ),
        'view_item'         => __( 'View Service', 'textdomain' ),
        'parent_item'       => __( 'Parent Service', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Service:', 'textdomain' ),
        'edit_item'         => __( 'Edit Service', 'textdomain' ),
        'update_item'       => __( 'Update Service', 'textdomain' ),
        'add_new_item'      => __( 'Add New Service Categories', 'textdomain' ),
        'new_item_name'     => __( 'New Service Name', 'textdomain' ),
        'not_found'         => __( 'No Services Found', 'textdomain' ),
        'back_to_items'     => __( 'Back to Services', 'textdomain' ),
        'menu_name'         => __( 'Service Categories', 'textdomain' ),
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'service-cat' ),
        'show_in_rest'      => true,
    );

    if( !taxonomy_exists('service-cat') ) {
        register_taxonomy( 'service-cat', 'service', $args );
    }
    


    unset($labels);
	$labels = array(
		'name'                  => esc_html_x( 'Services', 'Post type general name', 'textdomain' ),
		'singular_name'         => esc_html_x( 'Service', 'Post type singular name', 'textdomain' ),
		'menu_name'             => esc_html_x( 'Services', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar'        => esc_html_x( 'Service', 'Add New on Toolbar', 'textdomain' ),
		'add_new'               => esc_html__( 'Add New', 'textdomain' ),
		'add_new_item'          => esc_html__( 'Add New Service', 'textdomain' ),
		'new_item'              => esc_html__( 'New Service', 'textdomain' ),
		'edit_item'             => esc_html__( 'Edit Service', 'textdomain' ),
		'view_item'             => esc_html__( 'View Service', 'textdomain' ),
		'all_items'             => esc_html__( 'All Services', 'textdomain' ),
		'search_items'          => esc_html__( 'Search Services', 'textdomain' ),
		'parent_item_colon'     => esc_html__( 'Parent Services:', 'textdomain' ),
		'not_found'             => esc_html__( 'No Services found.', 'textdomain' ),
		'not_found_in_trash'    => esc_html__( 'No Services found in Trash.', 'textdomain' ),
		'featured_image'        => esc_html_x( 'Service Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => esc_html_x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => esc_html_x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => esc_html_x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => esc_html_x( 'Service archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => esc_html_x( 'Insert into Service', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => esc_html_x( 'Uploaded to this Service', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => esc_html_x( 'Filter Services list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => esc_html_x( 'Services list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => esc_html_x( 'Services list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

    unset($args);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'services' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', ),
        'menu_icon'          => 'dashicons-admin-generic',
	);

	register_post_type( 'service', $args );
}

add_action( 'init', 'portx_service_init' );


