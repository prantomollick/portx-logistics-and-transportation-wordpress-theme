<?php
if (post_password_required()) {
    return;
}
if (comments_open()) :
?>

<div class="postbox-details-comment-wrapper">
    <h3 class="postbox-details-comment-title">
        <?php
        printf(
            _nx('%1$s Comment', '%1$s Comments', get_comments_number(), 'comments title', 'portx'),
            number_format_i18n(get_comments_number())
        );
        ?>
    </h3>

    <div class="postbox-details-comment-inner">
        <?php if (have_comments()) : ?>
            <ul class="comment-list">
                <?php
                wp_list_comments(array(
                    'style'       => 'ul',
                    'short_ping'  => true,
                    'avatar_size' => 80,
                    'callback'    => 'portx_custom_comments',
                    'type'        => 'comment',
                    'reply_text'  => __('Reply', 'portx'),
                ));
                ?>
            </ul>
        <?php endif; ?>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="comment-navigation">
                <?php paginate_comments_links(); ?>
            </nav>
        <?php endif; ?>
    </div>

    <?php
    // Set a custom class for logged-in users.
    $comment_textarea_class = is_user_logged_in() ? 'loginformuser' : '';

    // Get current commenter info.
    $commenter = wp_get_current_commenter();
    $is_required = get_option('require_name_email');

    $fields = array(
        'author' => '<div class="row"><div class="col-xxl-6 col-xl-6 col-lg-6">
            <div class="postbox__comment-input">
                <input id="author" name="author" type="text" placeholder="' . esc_attr__('Your Name', 'yourthemename') . '" required>
            </div>
        </div>',
        'email'  => '<div class="col-xxl-6 col-xl-6 col-lg-6">
            <div class="postbox__comment-input">
                <input id="email" name="email" type="email" placeholder="' . esc_attr__('Email Address', 'yourthemename') . '" required>
            </div>
        </div></div>',
    );

    $defaults = array(
        'title_reply'          => __('Leave Your Comment', 'portx'),
        'title_reply_before'   => '<h3 class="postbox__comment-form-title">',
        'title_reply_after'    => '</h3>',
        'comment_notes_before' => '',
        'class_submit'         => 'thm-btn',
        'label_submit'         => __('SUBMIT COMMENTS', 'portx'),
        'fields'               => $fields,
        'comment_field'        => '<div class="col-xxl-12 '. esc_attr($comment_textarea_class) .'">
            <div class="postbox__comment-input">
                <textarea id="comment" name="comment" placeholder="' . esc_attr__('Write Your Comment', 'yourthemename') . '" required></textarea>
            </div>
        </div>',
        'submit_button'        => '<div class="col-xxl-12">
            <div class="postbox__comment-btn">
                <button type="submit" name="%1$s" id="%2$s" class="%3$s">%4$s</button>
            </div>
        </div>',
    );

    comment_form($defaults);
    ?>
</div>
<?php endif;


/**
 * Moves the comment textarea field to the bottom.
 *
 * @param array $fields The comment fields.
 * @return array The modified comment fields.
 */
function move_comment_textarea_to_bottom($fields) {
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}
add_action('comment_form_fields', 'move_comment_textarea_to_bottom');

function portx_custom_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;

    if ($comment->comment_type == 'pingback' || $comment->comment_type == 'trackback') : ?>
        <li class="pingback">
            <p><?php esc_html_e('Pingback:', 'portx'); ?> <?php comment_author_link(); ?></p>
        </li>
    <?php else : ?>
    <li <?php comment_class('comment'); ?> id="comment-<?php comment_ID(); ?>">
        <div class="postbox-details-comment-box d-sm-flex align-items-start">
            <div class="postbox-details-comment-thumb">
                <?php echo get_avatar($comment, 80, '', '', array('class' => 'avatar')); ?>
            </div>
            
            <div class="postbox-details-comment-content">
                <div class="postbox-details-comment-top d-flex justify-content-between align-items-start">
                    <div class="postbox-details-comment-avater">
                        <h4 class="postbox-details-comment-avater-title">
                            <?php comment_author_link(); ?>
                        </h4>
                        <span class="comment-time">
                            <?php printf('%1$s at %2$s', get_comment_date(), get_comment_time()); ?>
                        </span>
                    </div>
                </div>
                
                <?php if ($comment->comment_approved == '0') : ?>
                    <em><?php esc_html_e('Your comment is awaiting moderation.', 'yourthemename'); ?></em>
                <?php endif; ?>
                
                <?php comment_text(); ?>
                
                <div class="postbox-details-comment-reply">
                    <?php
                    comment_reply_link(array_merge($args, array(
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth'],
                        'reply_text' => __('Reply', 'portx'),
                        'before'    => '',
                        'after'     => ''
                    )));
                    ?>
                </div>
            </div>
        </div>
    <?php endif;
}