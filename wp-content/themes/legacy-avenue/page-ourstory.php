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
$titleFirstLine      = carbon_get_post_meta( get_the_ID(), 'crb_first_line') ? : '';
$titleSecondLine     = carbon_get_post_meta( get_the_ID(), 'crb_second_line');

//Team Member on Left
$tLFirstName      = carbon_get_post_meta( get_the_ID(), 'crb_tl_first_name');
$tLLastName       = carbon_get_post_meta( get_the_ID(), 'crb_tl_last_name');
$tLPosition       = carbon_get_post_meta( get_the_ID(), 'crb_tl_position');
$tLBio       	  = carbon_get_post_meta( get_the_ID(), 'crb_tl_bio');
$tLGalleryID      = carbon_get_post_meta( get_the_ID(), 'crb_tl_gallery_id');

//Team Member on Right
$tRFirstName      = carbon_get_post_meta( get_the_ID(), 'crb_tr_first_name');
$tRLastName       = carbon_get_post_meta( get_the_ID(), 'crb_tr_last_name');
$tRPosition       = carbon_get_post_meta( get_the_ID(), 'crb_tr_position');
$tRBio       	  = carbon_get_post_meta( get_the_ID(), 'crb_tr_bio');
$tRGalleryID      = carbon_get_post_meta( get_the_ID(), 'crb_tr_gallery_id');


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
							<div class="story-hero-image-mobile mobile-only"><img src="/wp-content/uploads/2022/12/Team2-1-1.jpg" alt="" width="735" height="500" class="alignnone size-full wp-image-270" /></div>
							<div class="story-hero-text">
								<h1><?php echo $titleFirstLine; ?><br><?php echo $titleSecondLine; ?></h1>
								<div class="columns">
									<div class="hero-column">
										<p>For Jesus Pineda, finance wasn’t his first career choice, but it feels as though it may have been his calling.</p>
										<p>He often jokes that while he started his career in 2009, he sold his first policy at 12 years old. During that time, Jesus’ mother had a life insurance agent come to their home. And, because his mother didn’t speak English, Jesus translated as the man sold her $250,000 worth of term life insurance. </p>
										<p>So, you see, it is in his very nature to bring a high level of care, patience and compassion to Legacy Avenue clients.</p>
									</div>
									<div class="hero-column">
										<p>With every interaction, Jesus and his assistant, Leanna, strive to foster a welcoming, intimate environment; one of attentiveness, guidance and connection. They understand that finances, in many cases, equate to a certain level of strain and uncertainty. With a multitude of options, a constantly shifting economy and overly complicated jargon, clients can feel isolated and lost along their financial journey, especially with large, impersonal financial firms.</p>
										<p>As with his mother so many years ago, Jesus continues to translate the world of finance to clients, no matter their challenges or experience level, in a simplified, easy-to-understand way that promotes confidence, provides individual solutions and delivers peace of mind.</p>
									</div>
								</div>
							</div>
							<div class="story-hero-image-large large-only"><img src="/wp-content/uploads/2022/12/Team2-1-1.jpg" alt="" width="735" height="500" class="alignnone size-full wp-image-270" /></div>
						</div>
						<div id="meet-the-team" class="meet-team">
							<h2>Meet<br>The TEAM</h2>
							<div class="wide-columns large-only">
								<div class="column"><img src="/wp-content/uploads/2022/12/mhollerLegacyAvenue2022_14-1.jpg" alt="" width="735" height="550" class="alignnone size-full wp-image-98" /></div>
								<div class="column"><img src="/wp-content/uploads/2022/12/mhollerLegacyAvenue2022_13-1.jpg" alt="" width="735" height="550" class="alignnone size-full wp-image-99" /></div>
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
									<div class="image mobile-only"><img src="/wp-content/uploads/2022/12/mhollerLegacyAvenue2022_14-1.jpg" alt="" width="735" height="550" class="alignnone size-full wp-image-98" /></div>
									<div class="text">
										<h3><?php echo $tLFirstName; ?><br>
											<?php echo $tLLastName; ?>
											<span class="member-title"><?php echo $tLPosition; ?></span></h3>
										<p><?php echo $tLBio ?></p>
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
									<div class="image mobile-only"><img src="/wp-content/uploads/2022/12/mhollerLegacyAvenue2022_13-1.jpg" alt="" width="735" height="550" class="alignnone size-full wp-image-99" /></div>
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
						<div class="story-cta">
							<p>Okay, enough about us. Tell us more about you.</p>
							<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us">Talk With Us</a></div>
						</div>

					<div style="visibility: hidden;"><?php the_content(); ?></div>


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