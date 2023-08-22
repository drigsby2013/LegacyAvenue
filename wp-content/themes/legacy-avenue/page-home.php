<?php
/**
 * Template Name: Home Template
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header();

//Visible Page Title
$titleFirstLine   = carbon_get_post_meta( get_the_ID(), 'crb_first_line') ? : '';
$titleSecondLine  = carbon_get_post_meta( get_the_ID(), 'crb_second_line');

//Hero Section
$desktopHeroImage 		  = carbon_get_post_meta( get_the_ID(), 'crb_hero_image_d');
$mobileHeroImage 		  = carbon_get_post_meta( get_the_ID(), 'crb_hero_image_m');
$mobileHeroURL 		 	  = $mobileHeroImage ? $mobileHeroImage : $desktopHeroImage;
$heroBody1 	 	  = apply_filters( 'the_content', carbon_get_the_post_meta( 'crb_hero_body_1' ) );
$heroBody2	 	  = apply_filters( 'the_content', carbon_get_the_post_meta( 'crb_hero_body_2' ) );
$heroTwoColumn = ($heroBody1 && $heroBody2 != '') ? true : false;
$heroSingleColumn = $heroTwoColumn ? '' : 'single';
$heroButtonText	  = carbon_get_post_meta( get_the_ID(), 'crb_hero_button_text');
$heroButtonLink	  = carbon_get_post_meta( get_the_ID(), 'crb_hero_button_link');
$heroButtonDisplay = ($heroButtonText && $heroButtonLink != '') ? true : false;
$heroBorder 	  = carbon_get_post_meta( get_the_ID(), 'crb_border') ? 'add-border' : '';


//Image with Text on Right
$imageWithTextRImage 	     = carbon_get_post_meta( get_the_ID(), 'crb_image_with_text_right_photo');
$imageWithTextRFirstLine     = carbon_get_post_meta( get_the_ID(), 'crb_image_with_text_right_first_line');
$imageWithTextRSecondLine    = carbon_get_post_meta( get_the_ID(), 'crb_image_with_text_right_second_line');
$imageWithTextRBody          = apply_filters( 'the_content', carbon_get_the_post_meta( 'crb_image_with_text_right_body' ) );
$imageWithTextRButtonText    = carbon_get_post_meta( get_the_ID(), 'crb_image_with_text_right_button_text');
$imageWithTextRButtonLink    = carbon_get_post_meta( get_the_ID(), 'crb_image_with_text_right_button_link');
$imageWithTextRButtonDisplay = ($imageWithTextRButtonText && $imageWithTextRButtonLink != '') ? true : false;

//--Two Column Images with Text--//
//First Column
$twoColImageWithTextFirstImage 	       = carbon_get_post_meta( get_the_ID(), 'crb_two_col_first_photo');
$twoColImageWithTextFirstImageMobile   = carbon_get_post_meta( get_the_ID(), 'crb_two_col_first_photo_m');
$twoColImageWithTextFirstFirstLine     = carbon_get_post_meta( get_the_ID(), 'crb_two_col_first_first_line');
$twoColImageWithTextFirstSecondLine    = carbon_get_post_meta( get_the_ID(), 'crb_two_col_first_second_line');
$twoColImageWithTextFirstBody          = apply_filters( 'the_content', carbon_get_the_post_meta( 'two_col_first_body' ) );
$twoColImageWithTextFirstButtonText    = carbon_get_post_meta( get_the_ID(), 'two_col_first_button_text');
$twoColImageWithTextFirstButtonLink    = carbon_get_post_meta( get_the_ID(), 'two_col_first_button_link');
$twoColImageWithTextFirstButtonDisplay = ($twoColImageWithTextFirstButtonText && $twoColImageWithTextFirstButtonLink != '') ? true : false;
//Second Column
$twoColImageWithTextSecondImage 	    = carbon_get_post_meta( get_the_ID(), 'crb_two_col_second_photo');
$twoColImageWithTextSecondImageMobile   = carbon_get_post_meta( get_the_ID(), 'crb_two_col_second_photo_m');
$twoColImageWithTextSecondFirstLine     = carbon_get_post_meta( get_the_ID(), 'crb_two_col_second_first_line');
$twoColImageWithTextSecondSecondLine    = carbon_get_post_meta( get_the_ID(), 'crb_two_col_second_second_line');
$twoColImageWithTextSecondBody          = apply_filters( 'the_content', carbon_get_the_post_meta( 'two_col_second_body' ) );
$twoColImageWithTextSecondButtonText    = carbon_get_post_meta( get_the_ID(), 'two_col_second_button_text');
$twoColImageWithTextSecondButtonLink    = carbon_get_post_meta( get_the_ID(), 'two_col_second_button_link');
$twoColImageWithTextSecondButtonDisplay = ($twoColImageWithTextSecondButtonText && $twoColImageWithTextSecondButtonLink != '') ? true : false;

//Quote
$quoteText = carbon_get_post_meta( get_the_ID(), 'crb_quote_text');
$quoteAuthor = carbon_get_post_meta( get_the_ID(), 'crb_quote_author');
$quoteDisplay = ($quoteText && $quoteAuthor != '') ? true : false;

//Image with Text on Left
$imageWithTextLImage 	     = carbon_get_post_meta( get_the_ID(), 'crb_image_with_text_left_photo');
$imageWithTextLFirstLine     = carbon_get_post_meta( get_the_ID(), 'crb_image_with_text_left_first_line');
$imageWithTextLSecondLine    = carbon_get_post_meta( get_the_ID(), 'crb_image_with_text_left_second_line');
$imageWithTextLBody          = apply_filters( 'the_content', carbon_get_the_post_meta( 'crb_image_with_text_left_body' ) );
$imageWithTextLButtonText    = carbon_get_post_meta( get_the_ID(), 'crb_image_with_text_left_button_text');
$imageWithTextLButtonLink    = carbon_get_post_meta( get_the_ID(), 'crb_image_with_text_left_button_link');
$imageWithTextLButtonDisplay = ($imageWithTextLButtonText && $imageWithTextLButtonLink != '') ? true : false;
?>
<div id="primary" class="content-area">
	<main id="main" class="page-home">
		<?php
			// Start the loop.
			while ( have_posts() ) :
				the_post();
		?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-content">
					<div class="basic-hero-image mobile-only"><img src="<?php echo $mobileHeroURL; ?>" alt=""/></div>
					<div class="basic-hero">
						<div class="basic-heading-text">
							<div class="basic-hero-image large-only"><img src="<?php echo $desktopHeroImage; ?>" alt="" width="990" height="500" /></div>
							<div class="basic-hero-heading">
									<h1><?php echo $titleFirstLine; ?><br><?php echo $titleSecondLine; ?></h1>
									<?php if ($heroButtonDisplay == true) {?>
										<div class="wp-block-button large-only"><a class="wp-block-button__link wp-element-button" href="<?php echo $heroButtonLink; ?>"><?php echo $heroButtonText; ?></a></div>
									<?php }; ?>
							</div>
						</div>
						<div class="basic-hero-body <?php echo $heroBorder; ?>">
							<div class="bh-column <?php echo $heroSingleColumn; ?>">
								<?php echo $heroBody1; ?>
							</div>
							<?php if ($heroTwoColumn == true) {?>
								<div class="bh-column">
									<?php echo $heroBody2; ?>
								</div>
							<?php }; ?>
							<?php if ($heroButtonDisplay == true) {?>
								<div class="wp-block-button mobile-only"><a class="wp-block-button__link wp-element-button" href="<?php echo $heroButtonLink; ?>"><?php echo $heroButtonText; ?></a></div>
							<?php }; ?>
						</div>
					</div>
					<div class="meet" style="background-image: url('<?php echo $imageWithTextRImage; ?>');">
						<div class="basic-hero-image mobile-only"><img src="<?php echo $imageWithTextRImage; ?>" alt=""/></div>
						<div class="meet-text">
							<h2><?php echo $imageWithTextRFirstLine; ?><br/><?php echo $imageWithTextRSecondLine; ?></h2>
							<?php echo $imageWithTextRBody; ?>
							<?php if ($imageWithTextRButtonDisplay == true) {?>
								<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo $imageWithTextRButtonLink; ?>"><?php echo $imageWithTextRButtonText; ?></a></div>
							<?php }; ?>
						</div>
					</div>
					<div class="home-columns">
						<div class="column" style="background-image: url('<?php echo $twoColImageWithTextFirstImage; ?>'); background-position: 90% 0%;">
							<div class="basic-hero-image mobile-only"><img src="<?php echo $twoColImageWithTextFirstImageMobile; ?>" alt=""/></div>
							<div class="text">
								<h2><?php echo $twoColImageWithTextFirstFirstLine; ?><br/><?php echo $twoColImageWithTextFirstSecondLine; ?></h2>
								<?php echo $twoColImageWithTextFirstBody; ?>
								<?php if ($twoColImageWithTextFirstButtonDisplay == true) {?>
									<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo $twoColImageWithTextFirstButtonLink; ?>"><?php echo $twoColImageWithTextFirstButtonText; ?></a></div>
								<?php }; ?>
							</div>
						</div>
						<div class="column" style="background-image: url('<?php echo $twoColImageWithTextSecondImage; ?>'); background-position: 53% 0%;">
							<div class="basic-hero-image mobile-only"><img src="<?php echo $twoColImageWithTextSecondImageMobile; ?>" alt=""/></div>
							<div class="text">
								<h2><?php echo $twoColImageWithTextSecondFirstLine; ?><br/><?php echo $twoColImageWithTextSecondSecondLine; ?></h2>
								<?php echo $twoColImageWithTextSecondBody; ?>
								<?php if ($twoColImageWithTextSecondButtonDisplay == true) {?>
									<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo $twoColImageWithTextSecondButtonLink; ?>"><?php echo $twoColImageWithTextSecondButtonText; ?></a></div>
								<?php }; ?>
							</div>
						</div>
					</div>
					<?php if ($quoteDisplay == true) {?>
						<div class="home-quote">
							<div class="quote">
								<p><?php echo $quoteText; ?></p>
							</div>
							<div class="author">
								<p>- <?php echo $quoteAuthor; ?></p>
							</div>
						</div>
					<?php }; ?>
					<div class="text-image-mobile-only"><img src="<?php echo $imageWithTextLImage; ?>" alt=""/></div>
					<div class="local-guide" style="background-image: url('<?php echo $imageWithTextLImage; ?>'); background-position: 50% 0%;">
						<div class="guide-text">
							<h2><?php echo $imageWithTextLFirstLine; ?><br/><?php echo $imageWithTextLSecondLine; ?></h2>
							<?php echo $imageWithTextLBody; ?>
							<?php if ($imageWithTextLButtonDisplay == true) {?>
								<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo $imageWithTextLButtonLink; ?>"><?php echo $imageWithTextLButtonText; ?></a></div>
							<?php }; ?>
						</div>
					</div>
				
					<?php //the_content(); ?>
				</div>
				<!-- .entry-content -->
			</article>
		<?php endwhile; ?>
	</main>
	<!-- .site-main -->
</div>
<!-- .content-area -->
<?php get_footer(); ?>