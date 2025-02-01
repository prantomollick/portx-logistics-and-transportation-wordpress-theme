<?php get_header(); ?>

<section class="postbox__area pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12">
                <div class="postbox__wrapper pr-20">
                    <?php
                        if ( have_posts() ) {
                            while( have_posts() ) {
                                the_post();
                                echo get_template_part('template/loops/content', get_post_format());
                                
                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) {
                                    comments_template();
                                }
                            }
                        }
                    ?>
                </div>
            </div>

            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12">
                <div class="sidebar__wrapper">
                    <?php if ( is_active_sidebar('blog-sidebar')) : ?>
                        <?php echo get_sidebar();  ?>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</section>


<?php get_footer(); 