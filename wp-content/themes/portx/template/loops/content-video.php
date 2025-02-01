<?php
    $post_format_video_url = function_exists('get_field') ? get_field('post_format_video_url') : '';
    if ( is_single() ) : 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('postbox__item format-image mb-50 transition-3'); ?>>

    <?php if( has_post_thumbnail() ) : ?>
        <div class="postbox__thumb m-img">

            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(); ?>
            </a>

            <div class="postbox__play-btn">
                <a class="popup-video pulse-btn" href="<?php echo esc_url($post_format_video_url); ?>">
                    <i class="fa-sharp fa-solid fa-play"></i>
                </a>
            </div>
            
        </div>
    <?php endif; ?>

    <div class="postbox__content">
        <?php get_template_part('template/blog/postbox-meta') ?>

        <h3 class="postbox__title"><?php the_title(); ?></h3>

        <div class="postbox__text">
            <?php the_content(); 
            
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'portx' ),
                    'after'  => '</div>',
                ) );
                
            ?>
        </div>

        <?php get_template_part('template/blog/details-tag-share'); ?>
        <?php get_template_part('template/blog/postbox-author-biography'); ?>
    </div>

</article>

<?php else: ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('postbox__item format-image mb-50 transition-3'); ?>>

    <?php if( has_post_thumbnail() ) : ?>
        <div class="postbox__thumb m-img">

            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(); ?>
            </a>

            <div class="postbox__play-btn">
                <a class="popup-video pulse-btn" href="<?php echo esc_url($post_format_video_url); ?>">
                    <i class="fa-sharp fa-solid fa-play"></i>
                </a>
            </div>
            
        </div>
    <?php endif; ?>

    <div class="postbox__content">

        <?php get_template_part('template/blog/postbox-meta') ?>

        <h3 class="postbox__title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <div class="postbox__text">
            <?php if ( has_excerpt() ) : ?>
                <p><?php echo wp_trim_words(get_the_excerpt(), 39, '...'); ?></p>
            <?php else : ?>
                <p><?php echo wp_trim_words(get_the_content(), 39, '...'); ?></p>
            <?php endif; ?>
        </div>
        <div class="tp-slide-btn-box">
            <a class="thm-btn" href="<?php the_permalink(); ?>">READ MORE</a>
        </div>
    </div>

</article>

<?php endif;