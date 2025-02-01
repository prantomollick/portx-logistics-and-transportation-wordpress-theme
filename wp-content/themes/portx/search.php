<?php get_header(); ?>
<section class="postbox__area pt-120 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-xxl-8 col-xl-8 col-lg-8">
                <div class="postbox__wrapper pr-20 mb-40">
                    <?php 
                        $postsQuery = new WP_Query(array(
                            'post_type' => 'post',
                            's' => get_search_query(),
                        ));

                        if ( $postsQuery->have_posts() ) {
                            while( $postsQuery->have_posts() ) {
                                $postsQuery->the_post();
                                echo get_template_part('template/loops/content', get_post_format());
                            }
                            wp_reset_postdata();
                        }
                    ?>
                    <div class="col-xl-12">
                        <div class="tp-pagination">
                            <?php portx_pagination(); ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xxl-4 col-xl-4 col-lg-4">
                <div class="sidebar__wrapper">
                    <?php echo get_sidebar();  ?>
                </div>
            </div>
            
        </div>
    </div>
</section>

<?php
get_footer();