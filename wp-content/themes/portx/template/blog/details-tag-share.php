<div class="postbox__details-share-wrapper">
    <div class="row">
        <div class="col-xl-6 col-lg-12  col-md-12 col-12">
            <div class="postbox__details-tag tagcloud">
                <span><?php esc_html_e('Tag:', 'portx'); ?></span>
                <?php the_tags('', '', ''); ?>
            </div>
        </div>
        <div class="col-xl-6 col-lg-12 col-md-12 col-12">
            <div class="postbox__details-share text-end">
                <span><?php esc_html_e('Share:', 'portx'); ?></span>
                <?php 
                    $url = urlencode(get_permalink());
                    $title = urlencode(get_the_title());
                ?>
                <a href="https://www.youtube.com/share?url=<?php echo $post_url; ?>" target="_blank">
                    <i class="fa-brands fa-youtube"></i>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_url; ?>" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://instagram.com/share?url=<?php echo $post_url; ?>&title=<?php echo $post_title; ?>" target="_blank">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?text=<?php echo $post_title; ?>&url=<?php echo $post_url; ?>" target="_blank">
                    <i class="fab fa-twitter"></i>
                </a>
            </div>
        </div>
    </div>
</div>