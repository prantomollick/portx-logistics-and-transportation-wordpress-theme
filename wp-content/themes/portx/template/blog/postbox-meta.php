<div class="postbox__meta">
    <span>
        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
            <i class="fa-light fa-user"></i><?php esc_html_e('By', 'portx')?> <?php the_author(); ?>
        </a>
    </span>
    <span><i class="fa-regular fa-location-dot"></i> <?php the_category(', '); ?></span>
    <span><a href="<?php comments_link(); ?>"><i class="fal fa-comments"></i> <?php comments_number('No Comments', '1 Comment', '% Comments'); ?></a></span>
</div>
