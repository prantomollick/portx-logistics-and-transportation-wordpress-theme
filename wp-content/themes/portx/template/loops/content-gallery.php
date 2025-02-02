<?php
    $post_format_gallery = function_exists('get_field') ? get_field('post_format_gallery') : '';
    if ( is_single() ) : 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('postbox__item format-image mb-50 transition-3'); ?>>
    <div class="postbox__thumb w-img">
        <div class="postbox__thumb-slider p-relative">
            <div
                class="swiper-container postbox__thumb-slider-active swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
                <div class="swiper-wrapper">
                    
                    <?php foreach ( $post_format_gallery as $gallery ) : ?>
                        <div class="swiper-slide">
                            <img src="<?php echo $gallery['url']; ?>" alt="<?php $gallery['title']; ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="postbox__slider-arrow-wrap">
                <button class="postbox-arrow-prev">
                    <i class="fa-sharp fa-regular fa-arrow-left"></i>
                </button>
                <button class="postbox-arrow-next">
                    <i class="fa-sharp fa-regular fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>


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
    <div class="postbox__thumb w-img">
        <div class="postbox__thumb-slider p-relative">
            <div
                class="swiper-container postbox__thumb-slider-active swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
                <div class="swiper-wrapper">
                    
                    <?php foreach ( $post_format_gallery as $gallery ) : ?>
                        <div class="swiper-slide">
                            <img src="<?php echo $gallery['url']; ?>" alt="<?php $gallery['title']; ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="postbox__slider-arrow-wrap">
                <button class="postbox-arrow-prev">
                    <i class="fa-sharp fa-regular fa-arrow-left"></i>
                </button>
                <button class="postbox-arrow-next">
                    <i class="fa-sharp fa-regular fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>

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
            <a class="thm-btn" href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE', 'portx'); ?></a>
        </div>
    </div>

</article>
<?php endif; ?>