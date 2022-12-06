<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js?ver=3.7.0"></script>
	<![endif]-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyfifteen' ); ?></a>

	<header class="flex">
		<div class="is-layout-constrained wp-block-group gapless-group header-contents">
			<div class="flex space-between site-header" style="padding-top:var(--wp--custom--gap--vertical);padding-bottom:var(--wp--custom--gap--vertical)">
				<div class="flex space-between align-center wp-block-group site-brand">
					<div class="wp-block-site-logo">
						<?php twentyfifteen_the_custom_logo(); ?>
					</div>

					<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<?php
						// Primary navigation menu.
						wp_nav_menu([
							'menu_class'      	=> 'nav-menu',
							'theme_location'  	=> 'primary',
							'container'       	=> 'nav',
							'container_id'    	=> 'site-navigation',
							'container_class' 	=> 'main-navigation',
						]);
					?>
					<!-- TODO: make menu mobile -->
					<!-- NOTE: accessibilty concerns -->
					<!-- <button>Menu</button> -->
					<?php endif; ?>


					<div class="flex align-center wp-block-buttons">
						<div class="wp-block-button">
							<a class="wp-block-button__link wp-element-button" href="/contact-us">Talk with us</a>
						</div>
					</div>

					<!-- <button class="secondary-toggle"><?php _e( 'Menu and widgets', 'twentyfifteen' ); ?></button> -->
				</div>
			</div>
		</div>
	</header>

</div>





<div id="content" class="site-content">
