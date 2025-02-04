<?php

function portx_breadcrumb() {
    global $post;

    //default settings.

    $breadcrumb_class = '';
    $breadcrumb_show = true;
    $title = ''; //default title

    //determine the page type and set the breadcrumb title accordingly.
    if ( is_front_page()  && is_home() ) {
        //Blog page on the front page.
        $title = get_theme_mod('breadcrumb_blog_title', esc_html__('Blog', 'portx'));
        $breadcrumb_class = 'home_front_page';

    } elseif ( is_front_page() ) {
        //Front Page only.
        $title = get_theme_mod('breadcrumb_blog_title', esc_html__('Blog', 'portx'));
        $breadcrumb_show = false; //Do not show breadcrumb

    } elseif ( is_home() ) {
        //post Page
        $posts_page_id = get_option('page_for_posts');

        if ( $posts_page_id ) {
            $title = get_the_title($posts_page_id);
        } 

    } elseif ( is_single() ) {
        //single post pages
        $post_type = get_post_type();

        if ( 'post' === $post_type || 'service' === $post_type ) {
            $title = get_the_title();
        } elseif ( 'product' === $post_type ) {
            $title = get_theme_mod('breadcrumb_product_details', esc_html__('Shop', 'portx'));
        }

    } elseif ( is_search() ) {
        // Search Results page
        $title = sprintf( esc_html__( 'Search Results for: %s', 'aidzone' ), get_search_query() );

    } elseif ( is_404() ) {
        //404 error page.
        $title = esc_html__('Page Not Found', 'portx');

    } elseif ( is_archive() ) {
        //Archive pages 
        if (is_post_type_archive( 'service' )) {
            $title = get_theme_mod('breadcrumb_service_title', esc_html__('Services', 'portx'));
        } elseif ( is_category() ) {
            $title = single_cat_title('', false);
        } elseif ( is_tag() ) {
            $title = single_tag_title('', false);
        } elseif ( is_author() ) {
            $title = get_the_author();
        } elseif ( is_date() ) {
            if ( is_day() ) {
                $title = get_the_date();
            } elseif ( is_month() ) {
                $title = get_the_date('F Y');
            } elseif ( is_year() ) {
                $title = get_the_date('Y');
            } else {
                $title = esc_html__('Archives', 'portx');
            }
        }

        // $title = get_the_archive_title();
    } else {
        // Fallback: use the current page title
        $title = get_the_title();
    }

    $blog_page_id = get_option('page_for_posts');
    $current_page_id = is_home() ? $blog_page_id : get_the_ID();

    $default_breadcrumb_bg = get_theme_mod( 'breadcrumb_kirki' );
    
    
    // Get the background image URL from theme customizer or page custom field.
    if (is_home() || is_category() || is_tag() || is_author() || is_date() || is_singular('post') || is_post_type_archive( 'service' )) {
        $page_breadcrumb_image = function_exists( 'get_field' ) ? get_field( 'breadcrumb_image', $blog_page_id ) : null;
        $breadcrumb_hide = get_field('is_breadcrumb_hide', $blog_page_id);
    } else {
        $page_breadcrumb_image = function_exists( 'get_field' ) ? get_field( 'breadcrumb_image', $current_page_id ) : null;
        $breadcrumb_hide = get_field('is_breadcrumb_hide', $current_page_id);
    }

    // Use the page-specific image if available, otherwise fall back to the default.
    $bg_url = ! empty( $page_breadcrumb_image ) && ! empty( $page_breadcrumb_image['url'] )
    ? $page_breadcrumb_image['url']
    : $default_breadcrumb_bg;
    
    // Check if the breadcrumb is hidden on this page.
    // $breadcrumb_hide = function_exists( 'get_field' ) ? get_field( 'is_breadcrumb_hide') : null;

    if ( ! empty( $breadcrumb_hide ) && $breadcrumb_hide ) :
    ?>

    <div class="wrapper-box p-relative ">
        <div class="breadcrumb__bg breadcrumb__bg__overlay pt-130 pb-130 "
            data-background="<?php echo esc_url($bg_url); ?>">
            <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1 ">
                        <div class="breadcrumb__list mb-10">
                            <h3 class="breadcrumb__title mb-15"><?php echo portx_kses($title); ?></h3>

                            <?php if ( function_exists('bcn_display') ) : ?>
                            <div class="breadcrumb__item">
                                <?php bcn_display(); ?>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <?php
    endif;
}