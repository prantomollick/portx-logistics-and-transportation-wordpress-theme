<?php
class Portx_Recent_Posts_Widget extends WP_Widget {

public function __construct() {
    parent::__construct(
        'recent_post_widget',
        __('Recent Post Widget', 'text_domain'),
        array('description' => __('Custom recent post widget with settings', 'text_domain'))
    );
}

public function widget($args, $instance) {
    extract($args);
    $title = apply_filters('widget_title', $instance['title']);
    $post_count = $instance['post_count'];
    $order = $instance['order'];

    echo $before_widget;

    if (!empty($title)) {
        echo $before_title . esc_html($title) . $after_title;
    }

    $query_args = array(
        'post_type' => 'post',
        'posts_per_page' => $post_count,
        'order' => $order,
        'orderby' => 'date'
    );

    $recent_posts = new WP_Query($query_args);

    if ($recent_posts->have_posts()) :
        while ($recent_posts->have_posts()) : $recent_posts->the_post();
            ?>
            <div class="rc__post d-flex align-items-center">
                <div class="rc__post-thumb mr-20">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('sidebar-thumb'); ?>
                        <?php endif; ?>
                    </a>
                </div>
                <div class="rc__post-content">
                    <div class="rc__meta">
                        <span><i class="fal fa-comments"></i> <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></span>
                    </div>
                    <h3 class="rc__post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                </div>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>' . __('No posts found', 'text_domain') . '</p>';
    endif;

    echo $after_widget;
}

public function form($instance) {
    $defaults = array(
        'title' => __('Recent Posts', 'text_domain'),
        'post_count' => 3,
        'order' => 'DESC'
    );
    $instance = wp_parse_args((array) $instance, $defaults);
    ?>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'text_domain'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" 
               name="<?php echo esc_attr($this->get_field_name('title')); ?>" 
               type="text" 
               value="<?php echo esc_attr($instance['title']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('post_count')); ?>"><?php _e('Number of posts:', 'text_domain'); ?></label>
        <select id="<?php echo esc_attr($this->get_field_id('post_count')); ?>" 
                name="<?php echo esc_attr($this->get_field_name('post_count')); ?>" 
                class="widefat">
            <?php for ($i = 1; $i <= 10; $i++) : ?>
                <option value="<?php echo $i; ?>" <?php selected($instance['post_count'], $i); ?>><?php echo $i; ?></option>
            <?php endfor; ?>
        </select>
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('order')); ?>"><?php _e('Order:', 'text_domain'); ?></label>
        <select id="<?php echo esc_attr($this->get_field_id('order')); ?>" 
                name="<?php echo esc_attr($this->get_field_name('order')); ?>" 
                class="widefat">
            <option value="ASC" <?php selected($instance['order'], 'ASC'); ?>><?php _e('Oldest First', 'text_domain'); ?></option>
            <option value="DESC" <?php selected($instance['order'], 'DESC'); ?>><?php _e('Newest First', 'text_domain'); ?></option>
        </select>
    </p>
    <?php
}

public function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = sanitize_text_field($new_instance['title']);
    $instance['post_count'] = absint($new_instance['post_count']);
    $instance['order'] = in_array($new_instance['order'], array('ASC', 'DESC')) ? $new_instance['order'] : 'DESC';
    return $instance;
}
}

// Register the widget
function register_portx_sidebar_posts_widget() {
    register_widget('Portx_Recent_Posts_Widget');
}
add_action('widgets_init', 'register_portx_sidebar_posts_widget');