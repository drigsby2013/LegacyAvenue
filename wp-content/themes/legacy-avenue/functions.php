<?php
/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @link https://developer.wordpress.org/themes/advanced-topics/child-themes/
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://developer.wordpress.org/plugins/}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */


/**
 * RUN THROUGH SOME OPTIMIZATIONS
 * - https://www.youtube.com/watch?v=T0U6wxU8cvA
 * - https://simplerevolutions.design/making-wordpress-faster-with-and-without-plugins/
 */

// Remove Gutenberg CSS.
add_action('wp_enqueue_scripts', function() {
    wp_dequeue_style('wp-block-library'); // External CSS
    wp_dequeue_style('wp-block-library-theme'); // Inline CSS
    wp_dequeue_style('global-styles'); // Inline CSS
}, 20);

// Remove blank SVGs
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');

//Disable emojis in WordPress
add_action('init', 'smartwp_disable_emojis');

function smartwp_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
}

function disable_emojis_tinymce($plugins) {
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

// Remove jQuery migrate
function remove_jquery_migrate($scripts) {
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];

        if ($script->deps) {
            $script->deps = array_diff($script->deps, array('jquery-migrate'));
        }
    }
}
add_action('wp_default_scripts', 'remove_jquery_migrate');



/**
 * For security reasons, we disable the REST API support for non-logged in users
 */
/* Disable REST API link in HTTP headers */
remove_action('template_redirect', 'rest_output_link_header', PHP_INT_MAX);

/* Disable REST API links in HTML */
remove_action('wp_head', 'rest_output_link_wp_head', PHP_INT_MAX);
remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');

/* Disable REST API */
if (version_compare(get_bloginfo('version'), '4.7', '>=')) {
    add_filter('rest_authentication_errors', 'disable_wp_rest_api');
} else {
    disable_wp_rest_api_legacy();
}

function disable_wp_rest_api($access) {
    if (!is_user_logged_in()) {
        $message = apply_filters('disable_wp_rest_api_error', __('REST API restricted to logged in users.', 'disable-wp-rest-api'));
        return new WP_Error('rest_login_required', $message, array('status' => rest_authorization_required_code()));
    }
    return $access;
}

function disable_wp_rest_api_legacy() {
    // REST API 1.x
    add_filter('json_enabled', '__return_false');
    add_filter('json_jsonp_enabled', '__return_false');

    // REST API 2.x
    add_filter('rest_enabled', '__return_false');
    add_filter('rest_jsonp_enabled', '__return_false');
}
