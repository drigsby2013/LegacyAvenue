<?php

/*
Plugin Name: Legacy Avenue Settings
Plugin URI:
Description: Add custom settings fields for the site to consume
Author: Brandtley McMinn
Author URI:
Version: 1.0.0
*/

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {

	// Default options page
	$basic_options_container = Container::make( 'theme_options', __( 'Company Info' ) )
		->set_icon('dashicons-clipboard')
	    ->add_fields([
	        Field::make( 'text', 'crb_company_legalname', __( 'Company Name' ) ),
	        Field::make( 'text', 'crb_operating_hours', __( 'Hours of Operation' ) ),
	        Field::make( 'select', 'crb_timezone', __( 'Timezone' ) )
		        ->add_options([
		        	'PST',
		        	'MST',
		        	'CST',
		        	'EST',
		        ]),
	        Field::make( 'text', 'crb_address_address1', __( 'Address' ) ),
	        Field::make( 'text', 'crb_address_address2', __( 'Address' ) ),
	        Field::make( 'text', 'crb_address_city',     __( 'City' ) ),
	        Field::make( 'text', 'crb_address_state',   __( 'State' ) ),
	        Field::make( 'text', 'crb_address_zipcode',  __( 'Zipcode' ) ),
	    ]);


	// // Add second options page under 'Basic Options'
	// Container::make( 'theme_options', __( 'Social Links' ) )
	//     ->set_page_parent( $basic_options_container ) // reference to a top level container
	//     ->add_fields( array(
	//         Field::make( 'text', 'crb_facebook_link', __( 'Facebook Link' ) ),
	//         Field::make( 'text', 'crb_instagram_link', __( 'Instagram Link' ) ),
	//         // Field::make( 'text', 'crb_twitter_link', __( 'Twitter Link' ) ),
	//     ) );

	// // Add third options page under "Appearance"
	// Container::make( 'theme_options', __( 'Customize Background' ) )
	//     ->set_page_parent( 'themes.php' ) // identificator of the "Appearance" admin section
	//     ->add_fields( array(
	//         Field::make( 'color', 'crb_background_color', __( 'Background Color' ) ),
	//         Field::make( 'image', 'crb_background_image', __( 'Background Image' ) ),
	//     ) );


	// Container::make( 'user_meta', 'Address' )
	//     ->add_fields([
	//         Field::make( 'text', 'crb_city_and_post', 'City and post code' ),
	//         Field::make( 'text', 'crb_street', 'Street Name' ),
	//     ]);


}



// function lapPrefix($label) {
// 	$label = trim(strtolower($label));
// 	$label = preg_replace('/[^\w\d]/', '_', $label);
// 	return 'legacyavenue_' . $label;
// }

