<?php
/**
 * Template Name: Our Story template
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

//Two Column Title
$twoColTitleFirstLine    = carbon_get_post_meta( get_the_ID(), 'crb_2colhd_first_line') ? : '';
$twoColTitleSecondLine   = carbon_get_post_meta( get_the_ID(), 'crb_2colhd_second_line');

//Team Member on Left
$tLPhoto 	     = carbon_get_post_meta( get_the_ID(), 'crb_tl_photo');
$tLFirstName     = carbon_get_post_meta( get_the_ID(), 'crb_tl_first_name');
$tLLastName      = carbon_get_post_meta( get_the_ID(), 'crb_tl_last_name');
$tLPosition      = carbon_get_post_meta( get_the_ID(), 'crb_tl_position');
$tLBio           = apply_filters( 'the_content', carbon_get_the_post_meta( 'crb_tl_bio' ) );
$tLGalleryID     = carbon_get_post_meta( get_the_ID(), 'crb_tl_gallery_id');

//Team Member on Right
$tRPhoto 	     = carbon_get_post_meta( get_the_ID(), 'crb_tr_photo');
$tRFirstName     = carbon_get_post_meta( get_the_ID(), 'crb_tr_first_name');
$tRLastName      = carbon_get_post_meta( get_the_ID(), 'crb_tr_last_name');
$tRPosition      = carbon_get_post_meta( get_the_ID(), 'crb_tr_position');
$tRBio       	 = apply_filters( 'the_content', carbon_get_the_post_meta( 'crb_tr_bio' ) );
$tRGalleryID     = carbon_get_post_meta( get_the_ID(), 'crb_tr_gallery_id');

//Bottom CTA
$bottomCTAText   = carbon_get_post_meta( get_the_ID(), 'crb_cta_text');
$bottomCTAButton = carbon_get_post_meta( get_the_ID(), 'crb_cta_button');
$bottomCTALink   = carbon_get_post_meta( get_the_ID(), 'crb_cta_link');
$displayCTA 	 = ($bottomCTAText && $bottomCTAButton && $bottomCTALink != '') ? true : false;

?>


	<div id="primary" class="content-area">
		<main id="main" class="page-our-story">
			<?php
				// Start the loop.
				while ( have_posts() ) :
					the_post();
			?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<div class="story-hero" id="story">
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
						</div>
						<div id="meet-the-team" class="meet-team">
							<h2><?php echo $twoColTitleFirstLine; ?><br><?php echo $twoColTitleSecondLine; ?></h2>
							<div class="wide-columns large-only">
								<div class="column"><img src="<?php echo $tLPhoto; ?>" alt="<?php echo $tLFirstName . ' ' . $tLLastName; ?>" /></div>
								
								<div class="column"><img src="<?php echo $tRPhoto; ?>" alt="<?php echo $tRFirstName . ' ' . $tRLastName; ?>" /></div>
							</div>
							
							<div class="narrow-columns">
								<div class="column">
									<?php

										$content = get_the_content();

										$galleries = [];
										preg_match_all("/\[rl_gallery.+id=[\"\']([\d]{1,8})[\"\']/i", $content, $galleries);

										$galleries = isset($galleries[1]) ? $galleries[1] : null; 
										
										$galleryLeftId = $galleries[0] ?? null;
										$galleryRightId = $galleries[1] ?? null;
									?>
									<div class="image mobile-only">
										<img src="<?php echo $tLPhoto; ?>" alt="<?php echo $tLFirstName . ' ' . $tLLastName; ?>" />
									</div>
									<div class="text">
										<h3><?php echo $tLFirstName; ?><br>
											<?php echo $tLLastName; ?>
											<span class="member-title"><?php echo $tLPosition; ?></span></h3>
										<?php echo $tLBio ?>
									</div>
									<div class="team-gallery">
										<?php 
											if ( $galleryLeftId && function_exists( 'rl_gallery' ) ) { 
												rl_gallery( ["id"=>$galleryLeftId] ); 
											}
										?>
									</div>
								</div>
								<div class="column">
									<div class="image mobile-only">
										<img src="<?php echo $tRPhoto; ?>" alt="<?php echo $tRFirstName . ' ' . $tRLastName; ?>" />
									</div>
									<div class="text">
										<h3><?php echo $tRFirstName; ?><br>
											<?php echo $tRLastName; ?>
											<span class="member-title"><?php echo $tRPosition; ?></span></h3>
										<p><?php echo $tRBio ?></p>

									</div>
									<div class="team-gallery">
										<?php 
											if ( $galleryRightId && function_exists( 'rl_gallery' ) ) { 
												rl_gallery( ["id"=>$galleryRightId] ); 
											}
										?>
									</div>
								</div>
							</div>
						</div>
						<?php if ($displayCTA == true){ ?>
							<div class="story-cta">
								<p><?php echo $bottomCTAText; ?></p>
								<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo $bottomCTALink; ?>"><?php echo $bottomCTAButton; ?></a></div>
							</div>

						<?php }?>
					<div style="display: none;"><?php the_content(); ?></div>

				</div>
				<!-- .entry-content -->

			</article>
			<!-- #post-<?php the_ID(); ?> -->
			<?php endwhile; ?>

	</main>
	<!-- .site-main -->
</div>
<!-- .content-area -->

<?php get_footer(); ?>