<?php get_header(); ?>

<main class="portx-page-area main-area">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
</main>

<?php get_footer(); ?>
