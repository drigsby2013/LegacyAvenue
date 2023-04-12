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

//Hero
$heroImage		  = carbon_get_post_meta( get_the_ID(), 'crb_hero_image');
$heroColOne       = apply_filters( 'the_content', carbon_get_the_post_meta( 'crb_hero_col_one' ) );
$heroColTwo       = apply_filters( 'the_content', carbon_get_the_post_meta( 'crb_hero_col_two' ) );
$displayColTwo 	  = ($heroColTwo != '') ? true : false;

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
						<div class="story-hero">
							<div class="story-hero-image-mobile mobile-only"><img src="<?php echo $heroImage; ?>" alt="" class="alignnone" /></div>
							<div class="story-hero-text">
								<h1><?php echo $titleFirstLine; ?><br><?php echo $titleSecondLine; ?></h1>
								<div class="columns">
									<div class="hero-column">
										<?php echo $heroColOne; ?>
									</div>
									<?php if ($displayColTwo == true) {?>
										<div class="hero-column">
											<?php echo $heroColTwo; ?>
										</div>
									<?php }; ?>
								</div>
							</div>
							<div class="story-hero-image-large large-only"><img src="<?php echo $heroImage; ?>" alt="" class="alignnone" /></div>
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