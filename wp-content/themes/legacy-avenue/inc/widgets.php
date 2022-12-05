<?php



function legacyavenue_footer_widgets() {
    register_sidebar([
        'name'              => 'Footer Navigation',
        'id'                => 'footer_navigation',
        'before_widget'     => '<div id="mytraining-widget">',
        'after_widget'      => '</div>',
        'before_title'      => '<h2>',
        'after_title'       => '</h2>',
    ]);
}
add_action( 'widgets_init', 'legacyavenue_footer_widgets' );



// function legacyavenue_load_widgets() {
//     register_widget('legacyavenue_footernav_widget');
// }


// class legacyavenue_footernav_widget extends WP_Widget {
//     function __construct() {
//         parent::__construct(
//             'legacyavenue_footernav_widget',
//             __('Legacy Avenue Footer Nav Widget', 'legacyavenue_widget_domain'),
//             [
//                 'description' => __('Use this to make new footer nav columns', 'legacyavenue_widget_domain'),
//             ],
//         );
//     }

//     public function widget($args, $instance) {

//     }


//     public function form($instance) {

//     }

// }

