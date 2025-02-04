<?php

/**
 * Retrieves a list of categories or custom taxonomy terms.
 *
 * @param string $taxonomy Taxonomy name. Default is 'category'.
 * @return array Associative array of term slugs and names.
 */
function portx_get_categories($taxonomy = 'category') {
    // Get all terms for the specified taxonomy
    $terms = get_categories([
        'taxonomy' => $taxonomy,
        'orderby' => 'name',
        'order' => 'ASC',
    ]);

    // Check for errors or empty result
    if (is_wp_error($terms) || empty($terms)) {
        return [];
    }

    // Build an associative array of term slugs and names
    $categories = [];
    foreach ($terms as $term) {
        $categories[$term->slug] = $term->name;
    }

    return $categories;
}



/**
 * Retrieves a list of posts for a specified post type.
 *
 * @param string $post_type_name Post type name. Default is 'post'.
 * @return array Associative array of post IDs and titles.
 */
function portx_get_posts($post_type_name = 'post') {
    // Fetch all posts for the specified post type, ordered by title in ascending order
    $posts = get_posts( [
        'post_type' => $post_type_name,
        'orderby' => 'title',
        'order' => 'ASC',
    ]);

    // Check if there was an error fetching posts or if the result is empty
    if (is_wp_error($posts) || empty($posts)) {
        return [];
    }

    // Initialize an associative array to hold post IDs and titles
    $post_list = [];

    // Iterate over the fetched posts to populate the associative array
    foreach ($posts as $post) {
        $post_list[$post->ID] = $post->post_title;
    }

    // Return the associative array of post IDs and titles
    return $post_list;
}
