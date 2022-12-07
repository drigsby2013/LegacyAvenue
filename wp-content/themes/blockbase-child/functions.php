<?php
function my_theme_enqueue_styles() {
    $parent_style = 'blockbase-style'; // This is 'parent-style' for the Blockbase theme.
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


add_filter('use_block_editor_for_post', '__return_false', 10);

add_filter('use_block_editor_for_post_type', '__return_false', 10);
add_filter('use_widgets_block_editor', '__return_false');
add_action('wp_enqueue_scripts', function() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('global-styles');
    // wp_dequeue_style('wc-blocks-style'); // woocomerce block styles
}, 20);
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');