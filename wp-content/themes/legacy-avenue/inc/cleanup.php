<?php



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
    wp_dequeue_style('twentyfifteen-block-style'); // Inline CSS
}, 20);

// Remove blank SVGs
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');

//Disable emojis in WordPress
add_action('init', 'legacyavenue_disable_emojis');

function legacyavenue_disable_emojis() {
    remove_action('wp_head',                'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts',    'print_emoji_detection_script');
    remove_action('wp_print_styles',        'print_emoji_styles');
    remove_filter('the_content_feed',       'wp_staticize_emoji');
    remove_action('admin_print_styles',     'print_emoji_styles');
    remove_filter('comment_text_rss',       'wp_staticize_emoji');
    remove_filter('wp_mail',                'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins',          'disable_emojis_tinymce');
}

function disable_emojis_tinymce($plugins) {
    if (is_array($plugins)) {
        return array_diff($plugins, [ 'wpemoji' ]);
    } else {
        return [];
    }
}

// Remove jQuery migrate
function remove_jquery_migrate($scripts) {
    if (is_admin() && !isset($scripts->registered['jquery'])) {
        return;
    }
    // if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];

        if (!$script->deps) { return; }

        $script->deps = array_diff($script->deps, [ 'jquery-migrate' ]);
    // }
}
add_action('wp_default_scripts', 'remove_jquery_migrate');



// /**
//  * For security reasons, we disable the REST API support for non-logged in users
//  */
// /* Disable REST API link in HTTP headers */
// remove_action('template_redirect', 'rest_output_link_header', PHP_INT_MAX);

// /* Disable REST API links in HTML */
// remove_action('wp_head', 'rest_output_link_wp_head', PHP_INT_MAX);
// remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');

// /* Disable REST API */
// if (version_compare(get_bloginfo('version'), '4.7', '>=')) {
//     add_filter('rest_authentication_errors', 'disable_wp_rest_api');
// } else {
//     disable_wp_rest_api_legacy();
// }

// function disable_wp_rest_api($access) {
//     if (is_user_logged_in()) {
//         return $access;
//     }

//     $message = apply_filters('disable_wp_rest_api_error', __('REST API restricted to logged in users.', 'disable-wp-rest-api'));
//     return new WP_Error('rest_login_required', $message, [ 'status' => rest_authorization_required_code() ]);
// }

// function disable_wp_rest_api_legacy() {
//     // REST API 1.x
//     add_filter('json_enabled', '__return_false');
//     add_filter('json_jsonp_enabled', '__return_false');

//     // REST API 2.x
//     add_filter('rest_enabled', '__return_false');
//     add_filter('rest_jsonp_enabled', '__return_false');
// }



/**
 * Allows us to modify CDN import scripts
 * @sauce: https://stackoverflow.com/a/49704639
 */
// TODO: make a script/style loader filter that intelligently modulates CDNJS assets links
// function manipulate_cdn_resources( $tag, $handle, $src ) {

//     $resources = [

//         https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css



//             <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.7.14/vue.min.js" integrity="sha512-BAMfk70VjqBkBIyo9UTRLl3TBJ3M0c6uyy2VMUrq370bWs7kchLNN9j1WiJQus9JAJVqcriIUX859JOm12LWtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


//     ]




//     if (str_contains($handle, 'cdn_')) {
//         $tag = str_replace( 'src=', 'data-cfasync="false" src=', $tag );
//     }
//     return $tag;
// }
// add_filter( 'script_loader_tag', 'manipulate_cdn_resources', 10, 3 );
