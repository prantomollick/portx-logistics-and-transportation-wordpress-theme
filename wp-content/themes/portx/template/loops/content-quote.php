<?php if (is_single()) : ?>

<article class="postbox__item format-image mb-50 transition-3">
    <?php if( has_post_thumbnail() ) : ?>
    <div class="postbox__thumb m-img p-relative">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('full', ['class' => 'w-100', 'alt' => esc_attr(get_the_title())]); ?>

            <div class="postbox__meta-date ">
                <span><a href="<?php the_permalink(); ?>"><?php echo get_the_date('d M'); ?></a></span>
            </div>
        </a>
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

            <?php if( !empty(get_field('quote_text')) ) :  // Blockquote custom field ?>
                <blockquote class="d-flex justify-content-between">
                    <span>
                        <p><?php echo esc_html(get_field('quote_text')); ?></p>
                        <?php if ( !empty(get_field('quote_author')) ) : ?>
                        <cite><?php echo esc_html(get_field('quote_author')); ?></cite>
                        <?php endif; ?>
                    </span>
                    <span><i class="flaticon-quote"></i></span>
                </blockquote>
            <?php endif; ?>  
            
            <?php if ( !empty( get_field('after_quote_content') ) ) : ?>
                <?php echo esc_html(get_field('after_quote_content')); ?>
            <?php endif; ?>
            
        </div>

        <?php get_template_part('template/blog/details-tag-share'); ?>
        <?php get_template_part('template/blog/postbox-author-biography'); ?>
    </div>

</article>

<?php else : ?>    
<article id="post-<?php the_ID(); ?>" <?php post_class('postbox__item format-image mb-50 transition-3'); ?>>
    <?php if( has_post_thumbnail() ) : ?>
        <div class="postbox__thumb m-img">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(); ?>
            </a>
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