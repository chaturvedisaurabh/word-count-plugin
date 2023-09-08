<?php
/**
 * Plugin Name: Word Count WOS
 * Description: Adds a column to all posts page showing each post’s word count.
 * Version: 1.0
 * Author: Saurabh Chaturvedi
 * Author URI: https://github.com/chaturvedisaurabh
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Requires at least: 6.0
 * Tags: word count, posts, admin, dashboard
 */


// Add a column to the posts table
function add_word_count_column($columns) {
    $columns['word_count'] = 'Word Count';
    return $columns;
}
add_filter('manage_posts_columns', 'add_word_count_column');

// Populate the word count column
function populate_word_count_column($column, $post_id) {
    if ($column == 'word_count') {
        $post = get_post($post_id);
        $content = $post->post_content;
        $word_count = str_word_count(strip_tags($content));
        echo $word_count;
    }
}
add_action('manage_posts_custom_column', 'populate_word_count_column', 10, 2);
