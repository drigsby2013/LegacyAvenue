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
   	//  HOME PAGE META BLOCKS
   	// =============================================

	Container::make( 'post_meta', __( 'Visible Page Title' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-home.php' )
		->add_fields([
	        Field::make( 'text', 'crb_first_line', __( 'First Line' ) ),
	        Field::make( 'text', 'crb_second_line', __( 'Second Line' ) ),
		]);
	
	Container::make( 'post_meta', __( 'Hero Section' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-home.php' )
		->add_fields([
			Field::make( 'image', 'crb_hero_image', __( 'Hero Image' ) )->set_value_type( 'url' ),
			Field::make( 'rich_text', 'crb_hero_body', __( 'Hero Text' ) ),
	        Field::make( 'text', 'crb_hero_button_text', __( 'Button Text' ) ),
			Field::make( 'text', 'crb_hero_button_link', __( 'Button Link' ) ),
		]);	
		
	Container::make( 'post_meta', __( 'Image with Text Overlay - Text Right' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-home.php' )
		->add_fields([
			Field::make( 'image', 'crb_image_with_text_right_photo', __( 'Image' ) )->set_value_type( 'url' ),
	        Field::make( 'text', 'crb_image_with_text_right_first_line', __( 'Heading First Line' ) ),
	        Field::make( 'text', 'crb_image_with_text_right_second_line', __( 'Heading Second Line' ) ),
			Field::make( 'rich_text', 'crb_image_with_text_right_body', __( 'Text' ) ),
	        Field::make( 'text', 'crb_image_with_text_right_button_text', __( 'Button Text' ) ),
			Field::make( 'text', 'crb_image_with_text_right_button_link', __( 'Button Link' ) ),
		]);
			
	Container::make( 'post_meta', __( 'Two Column Images with Text Overlay' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-home.php' )
		->add_fields([
			Field::make( 'image', 'crb_two_col_first_photo', __( 'Image' ) )->set_value_type( 'url' ),
	        Field::make( 'text', 'crb_two_col_first_first_line', __( 'Heading First Line' ) ),
	        Field::make( 'text', 'crb_two_col_first_second_line', __( 'Heading Second Line' ) ),
			Field::make( 'rich_text', 'two_col_first_body', __( 'Text' ) ),
	        Field::make( 'text', 'two_col_first_button_text', __( 'Button Text' ) ),
			Field::make( 'text', 'two_col_first_button_link', __( 'Button Link' ) ),
			Field::make( 'image', 'crb_two_col_second_photo', __( 'Image' ) )->set_value_type( 'url' ),
	        Field::make( 'text', 'crb_two_col_second_first_line', __( 'Heading First Line' ) ),
	        Field::make( 'text', 'crb_two_col_second_second_line', __( 'Heading Second Line' ) ),
			Field::make( 'rich_text', 'two_col_second_body', __( 'Text' ) ),
	        Field::make( 'text', 'two_col_second_button_text', __( 'Button Text' ) ),
			Field::make( 'text', 'two_col_second_button_link', __( 'Button Link' ) ),
		]);
	
	Container::make( 'post_meta', __( 'Quote' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-home.php' )
		->add_fields([
	        Field::make( 'text', 'crb_quote_text', __( 'Quote' ) ),
	        Field::make( 'text', 'crb_quote_author', __( 'Author' ) ),
		]);	
	
	Container::make( 'post_meta', __( 'Image with Text Overlay - Text Left' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-home.php' )
		->add_fields([
			Field::make( 'image', 'crb_image_with_text_left_photo', __( 'Image' ) )->set_value_type( 'url' ),
	        Field::make( 'text', 'crb_image_with_text_left_first_line', __( 'Heading First Line' ) ),
	        Field::make( 'text', 'crb_image_with_text_left_second_line', __( 'Heading Second Line' ) ),
			Field::make( 'rich_text', 'crb_image_with_text_left_body', __( 'Text' ) ),
	        Field::make( 'text', 'crb_image_with_text_left_button_text', __( 'Button Text' ) ),
			Field::make( 'text', 'crb_image_with_text_left_button_link', __( 'Button Link' ) ),
		]);
	
   	// =============================================
   	//  LOCAL GUIDE META BLOCKS
   	// =============================================

	Container::make( 'post_meta', __( 'Recommendations' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-localguide.php' )
		->add_fields([
	        Field::make( 'text', 'crb_recommendations_header', __( 'Recommendations Heading' ) ),
		]);

	Container::make( 'post_meta', __( 'Calendar Settings' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-localguide.php' )
		->add_fields([
	        Field::make( 'text', 'crb_calendar_header', __( 'Calendar Heading' ) ),
	        Field::make( 'textarea', 'crb_calendar_description', __( 'Calendar Description' ) ),
	        Field::make( 'text', 'crb_calendar_embed', __( 'Calendar Embed' ) ),
		]);
   
	// =============================================
   	//  OUR STORY META BLOCKS
   	// =============================================

	Container::make( 'post_meta', __( 'Visible Page Title' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-ourstory.php' )
		->add_fields([
	        Field::make( 'text', 'crb_first_line', __( 'First Line' ) ),
	        Field::make( 'text', 'crb_second_line', __( 'Second Line' ) ),
		]);
	
	Container::make( 'post_meta', __( 'Hero Section' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-ourstory.php' )
		->add_fields([
			Field::make( 'image', 'crb_hero_image', __( 'Hero Image' ) )->set_value_type( 'url' ),
			Field::make( 'rich_text', 'crb_hero_col_one', __( 'First Column' ) ),
			Field::make( 'rich_text', 'crb_hero_col_two', __( 'Second Column' ) ),
		]);	
	
	Container::make( 'post_meta', __( 'Two Column Header' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-ourstory.php' )
		->add_fields([
	        Field::make( 'text', 'crb_2colhd_first_line', __( 'First Line' ) ),
	        Field::make( 'text', 'crb_2colhd_second_line', __( 'Second Line' ) ),
		]);
	
	Container::make( 'post_meta', __( 'Team Member Left' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-ourstory.php' )
		->add_fields([
			Field::make( 'image', 'crb_tl_photo', __( 'Image' ) )->set_value_type( 'url' ),
	        Field::make( 'text', 'crb_tl_first_name', __( 'First Name' ) ),
	        Field::make( 'text', 'crb_tl_last_name', __( 'Last Name' ) ),
	        Field::make( 'text', 'crb_tl_position', __( 'Position' ) ),
			Field::make( 'rich_text', 'crb_tl_bio', __( 'Bio' ) ),
		]);
	
	Container::make( 'post_meta', __( 'Team Member Right' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-ourstory.php' )
		->add_fields([
			Field::make( 'image', 'crb_tr_photo', __( 'Image' ) )->set_value_type( 'url' ),
	        Field::make( 'text', 'crb_tr_first_name', __( 'First Name' ) ),
	        Field::make( 'text', 'crb_tr_last_name', __( 'Last Name' ) ),
	        Field::make( 'text', 'crb_tr_position', __( 'Position' ) ),
	        Field::make( 'rich_text', 'crb_tr_bio', __( 'Bio' ) ),
		]);
	
	Container::make( 'post_meta', __( 'Bottom CTA' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-ourstory.php' )
		->add_fields([
	        Field::make( 'text', 'crb_cta_text', __( 'Paragraph Text' ) ),
	        Field::make( 'text', 'crb_cta_button', __( 'Button Text' ) ),
	        Field::make( 'text', 'crb_cta_link', __( 'Button Link' ) ),
		]);
   
	// =============================================
   	//  YOUR JOURNEY META BLOCKS
   	// =============================================

	Container::make( 'post_meta', __( 'Visible Page Title' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-yourjourney.php' )
		->add_fields([
	        Field::make( 'text', 'crb_first_line', __( 'First Line' ) ),
	        Field::make( 'text', 'crb_second_line', __( 'Second Line' ) ),
		]);
	
	Container::make( 'post_meta', __( 'Hero Section' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-yourjourney.php' )
		->add_fields([
			Field::make( 'image', 'crb_hero_image', __( 'Hero Image' ) )->set_value_type( 'url' ),
			Field::make( 'rich_text', 'crb_hero_body', __( 'Hero Body' ) ),
	        Field::make( 'text', 'crb_hero_button', __( 'Button Text' ) ),
	        Field::make( 'text', 'crb_hero_link', __( 'Button Link' ) ),

		]);	
	
	Container::make( 'post_meta', __( 'Timeline Items' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-yourjourney.php' )
		->add_fields([
	        Field::make( 'text', 'crb_timeline_item_numeral_1', __( 'XL Text (Numbers)' ) ),
	        Field::make( 'text', 'crb_timeline_item_title_1', __( 'Item Title' ) ),
	        Field::make( 'text', 'crb_timeline_item_body_1', __( 'Item Body' ) ),
			//...
	        Field::make( 'text', 'crb_timeline_disclaimer', __( 'Timeine Disclaimer' ) ),

		]);	
		
	Container::make( 'post_meta', __( 'Timeline CTA' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-yourjourney.php' )
		->add_fields([
	        Field::make( 'text', 'crb_timeline_cta_body', __( 'Paragraph Text' ) ),
	        Field::make( 'text', 'crb_timeline_cta_button_text', __( 'Button Text' ) ),
	        Field::make( 'text', 'crb_timeline_cta_link', __( 'Button Link' ) ),
		]);
		
	Container::make( 'post_meta', __( 'Second Image Heading' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-yourjourney.php' )
		->add_fields([
	        Field::make( 'text', 'crb_second_heading_first_line', __( 'Title - First Line' ) ),
	        Field::make( 'text', 'crb_second_heading_second_line', __( 'Title - Second Line' ) ),
			Field::make( 'image', 'crb_second_heading_hero_image', __( 'Heading Image' ) )->set_value_type( 'url' ),
			Field::make( 'rich_text', 'crb_second_heading_body', __( 'Paragraph Text' ) ),

		]);	
	
	Container::make( 'post_meta', __( 'Quote' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-yourjourney.php' )
		->add_fields([
	        Field::make( 'text', 'crb_quote_text', __( 'Quote' ) ),
	        Field::make( 'text', 'crb_quote_author', __( 'Author' ) ),
		]);	
	
	Container::make( 'post_meta', __( 'Offerings Grid' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-yourjourney.php' )
		->add_fields([
	        Field::make( 'text', 'crb_og_1_first_line', __( 'Title - First Line' ) ),
	        Field::make( 'text', 'crb_og_1_second_line', __( 'Title - Second Line' ) ),
			Field::make( 'image', 'crb_og_1_image', __( 'Image' ) )->set_value_type( 'url' ),
	        Field::make( 'text', 'crb_og_1_body', __( 'Item Body' ) ),
	        Field::make( 'text', 'crb_og_1_button_text', __( 'Button Text' ) ),
	        Field::make( 'text', 'crb_og_1_link', __( 'Button Link' ) ),
			//...

		]);	
		
	Container::make( 'post_meta', __( 'Bottom CTA' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-yourjourney.php' )
		->add_fields([
	        Field::make( 'text', 'crb_bottom_cta_body', __( 'Paragraph Text' ) ),
	        Field::make( 'text', 'crb_bottom_cta_button_text', __( 'Button Text' ) ),
	        Field::make( 'text', 'crb_bottom_cta_link', __( 'Button Link' ) ),
		]);
	   
	// =============================================
   	//  LIBRARY META BLOCKS
   	// =============================================

	Container::make( 'post_meta', __( 'Hero Section' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-library.php' )
		->add_fields([
	        Field::make( 'text', 'crb_first_line', __( 'First Line' ) ),
	        Field::make( 'text', 'crb_second_line', __( 'Second Line' ) ),
			Field::make( 'image', 'crb_hero_image', __( 'Hero Image' ) )->set_value_type( 'url' ),
			Field::make( 'rich_text', 'crb_hero_body', __( 'Hero Body' ) ),

		]);	
		
	Container::make( 'post_meta', __( 'Quote' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-library.php' )
		->add_fields([
	        Field::make( 'text', 'crb_quote_text', __( 'Quote' ) ),
	        Field::make( 'text', 'crb_quote_author', __( 'Author' ) ),
		]);	
		   
	// =============================================
   	//  LOCAL GUIDE META BLOCKS
   	// =============================================

	Container::make( 'post_meta', __( 'Hero Section' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-localguide.php' )
		->add_fields([
	        Field::make( 'text', 'crb_first_line', __( 'First Line' ) ),
	        Field::make( 'text', 'crb_second_line', __( 'Second Line' ) ),
			Field::make( 'image', 'crb_hero_image', __( 'Hero Image' ) )->set_value_type( 'url' ),
			Field::make( 'rich_text', 'crb_hero_body', __( 'Hero Body' ) ),

		]);	
				
	Container::make( 'post_meta', __( 'Bottom CTA' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-localguide.php' )
		->add_fields([
			Field::make( 'text', 'crb_bottom_cta_body', __( 'Paragraph Text' ) ),
			Field::make( 'text', 'crb_bottom_cta_button_text', __( 'Button Text' ) ),
			Field::make( 'text', 'crb_bottom_cta_link', __( 'Button Link' ) ),
		]);
	
	// =============================================
   	//  CONTACT META BLOCKS
   	// =============================================

	Container::make( 'post_meta', __( 'Visible Page Title' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', '=', 'page-contact.php' )
		->add_fields([
	        Field::make( 'text', 'crb_first_line', __( 'First Line' ) ),
	        Field::make( 'text', 'crb_second_line', __( 'Second Line' ) ),
		]);
	
//	Container::make( 'post_meta', __( 'Calendar Settings' ) )
//		->where( 'post_type', '=', 'page' )
//		->where( 'post_template', '=', 'page-localguide.php' )
//		->add_fields([
//	        Field::make( 'text', 'crb_calendar_header', __( 'Calendar Heading' ) ),
//	        Field::make( 'textarea', 'crb_calendar_description', __( 'Calendar Description' ) ),
//	        Field::make( 'text', 'crb_calendar_embed', __( 'Calendar Embed' ) ),
//		]);

}
