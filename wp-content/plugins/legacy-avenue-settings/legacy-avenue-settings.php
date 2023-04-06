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

   	// =============================================
   	//  COMPANY SETTINGS PAGE
   	// =============================================

	$basic_options_container = Container::make( 'theme_options', __( 'Company Info' ) )
		->set_icon('dashicons-clipboard')
	    ->add_fields([
	        Field::make( 'text', 'crb_customer_login', __( 'Customer Login URL' ) ),
	        Field::make( 'text', 'crb_customer_relationship', __( 'Customer Relationship Summary URL' ) ),
	        Field::make( 'text', 'crb_company_legalname', __( 'Company Name' ) ),
	        Field::make( 'text', 'crb_company_phone', __( 'Phone Number' ) ),
	        Field::make( 'text', 'crb_operating_hours', __( 'Hours of Operation' ) ),
	        Field::make( 'text', 'crb_address_address1', __( 'Address' ) ),
	        Field::make( 'text', 'crb_address_address2', __( 'Address' ) ),
	        Field::make( 'text', 'crb_address_city',     __( 'City' ) ),
	        Field::make( 'text', 'crb_address_state',   __( 'State' ) ),
	        Field::make( 'text', 'crb_address_zipcode',  __( 'Zipcode' ) ),
	        Field::make( 'textarea', 'crb_footer_disclaimer', __( 'Footer Disclaimer' ) ),
	        Field::make( 'text', 'crb_finra', __( 'Finra Broker URL' ) ),
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



   	// =============================================
   	//  LOCAL GUIDE META BLOCKS
   	// =============================================

	Container::make( 'post_meta', __( 'Recommendations' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-localguide.php' )
		->add_fields([
	        Field::make( 'text', 'crb_recommendations_header', __( 'Recommendations Heading' ) ),
	        // Field::make( 'textarea', 'crb_calendar_description', __( 'Calendar Description' ) ),
	        // Field::make( 'text', 'crb_calendar_embed', __( 'Calendar Embed' ) ),
		]);

	Container::make( 'post_meta', __( 'Calendar Settings' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-localguide.php' )
		->add_fields([
	        Field::make( 'text', 'crb_calendar_header', __( 'Calendar Heading' ) ),
	        Field::make( 'textarea', 'crb_calendar_description', __( 'Calendar Description' ) ),
	        Field::make( 'text', 'crb_calendar_embed', __( 'Calendar Embed' ) ),
		]);

}
