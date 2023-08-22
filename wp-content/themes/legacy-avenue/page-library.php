<?php
/**
 * Template Name: Library template
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

//Quote
$quoteText    = carbon_get_post_meta( get_the_ID(), 'crb_quote_text');
$quoteAuthor  = carbon_get_post_meta( get_the_ID(), 'crb_quote_author');
$quoteDisplay = ($quoteText && $quoteAuthor != '') ? true : false;
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			// Start the loop.
			while ( have_posts() ) :
				the_post();

				// Include the page content template.
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
					<?php if ($quoteDisplay != false) { ?>
					<div class="library-quote">
						<div class="quote">
							<p><?php echo $quoteText; ?></p>
						</div>
						<div class="author">
							<p>- <?php echo $quoteAuthor; ?></p>
						</div>
					</div>
					<?php }; ?>
					
					<?php //the_content(); ?>
					
					<?php
						wp_link_pages(
							array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							)
						);
						?>
				</div><!-- .entry-content -->

			</article><!-- #post-<?php the_ID(); ?> -->
			<?php endwhile; ?>


			<?php require __DIR__ . '/templates/vue-library-posts.php'; ?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
