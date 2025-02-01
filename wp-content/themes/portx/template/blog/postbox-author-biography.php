<?php
    $author_id = get_the_author_meta('ID');

    $author_name = get_the_author_meta('display_name', $author_id);
    $author_description = get_the_author_meta('description', $author_id);
    $author_social = array(
        'facebook' => get_the_author_meta('facebook'),
        'twitter' => get_the_author_meta('twitter'),
        'linkedin-in' => get_the_author_meta('linkedin_url'),
        'vimeo' => get_the_author_meta('vimeo')
    );
?>
<div class="postbox-details-author d-sm-flex align-items-start">
    <div class="postbox-details-author-thumb">
        <a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>">
            <?php echo get_avatar( $author_id, 100, '', '', array('class' => 'img') ); ?>
        </a>
    </div>

    <div class="postbox-details-author-content">
        <h5 class="postbox-details-author-title">
            <a href="#">
                <?php printf( esc_html__('About %s', 'portx'), $author_name ); ?>
            </a>
        </h5>
        
        <p><?php echo portx_kses($author_description); ?></p>

        <div class="postbox-details-author-social">
            <?php
                foreach ($author_social as $key => $value) {
                    if ( !empty($value) ) {
                        echo '<a href="' . esc_url($value) . '"><i class="fa-brands fa-' . $key . '"></i></a>';
                    }
                }
            ?>
        </div>
    </div>
</div>