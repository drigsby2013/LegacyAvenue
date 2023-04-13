<?php
/**
 * Template Name: Local Guide template
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


//Hero Section
$titleFirstLine   = carbon_get_post_meta( get_the_ID(), 'crb_first_line') ? : '';
$titleSecondLine  = carbon_get_post_meta( get_the_ID(), 'crb_second_line');
$heroImage 		  = carbon_get_post_meta( get_the_ID(), 'crb_hero_image');
$heroBody 	 	  = apply_filters( 'the_content', carbon_get_the_post_meta( 'crb_hero_body' ) );

//Calendar Section
$calendarHeader         = carbon_get_post_meta( get_the_ID(), 'crb_calendar_header');
$calendarDescription    = carbon_get_post_meta( get_the_ID(), 'crb_calendar_description');
$calendarEmbed          = carbon_get_post_meta( get_the_ID(), 'crb_calendar_embed');

//Bottom CTA
$bottomCTABody    = carbon_get_post_meta( get_the_ID(), 'crb_bottom_cta_body');
$bottomCTAButtonText  = carbon_get_post_meta( get_the_ID(), 'crb_bottom_cta_button_text');
$bottomCTALink    = carbon_get_post_meta( get_the_ID(), 'crb_bottom_cta_link');
$displayBottomCTA = ($bottomCTABody && $bottomCTAButtonText && $bottomCTALink != '') ? true : false;
?>

<style>

.iframe-container {
  overflow: hidden;
  width: 100%;
  padding-top: 56.25%; /* 16:9*/
  position: relative;
}

.iframe-container iframe {
   border: 0;
   height: 100%;
   left: 0;
   position: absolute;
   top: 0;
   width: 100%;
}


@media (min-width: 75rem) {
	.yokel-heading {
		max-width: 19em;
	}
}

.contact-for-more {
	margin: 5em auto;
}

.contact-for-more p {
	font-size: 1.5em;
}


</style>


<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php
		// Start the loop.
		while ( have_posts() ) :
			the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-content">
				<div class="guide-hero">
					<div class="image"><img src="<?php echo $heroImage; ?>" alt="" width="1200" height="500" class="alignnone size-full wp-image-122" /></div>
					<div class="text">
						<h1><?php echo $titleFirstLine; ?><br><?php echo $titleSecondLine; ?></h1>
						<?php echo $heroBody; ?>
					</div>
				</div>
				<?php //the_content(); ?>
			</div><!-- .entry-content -->

		</article><!-- #post-<?php the_ID(); ?> -->
		<?php endwhile; ?>


		<div id="recommendations">
			<?php require __DIR__ . '/templates/vue-localguide.php'; ?>
		</div>

		<hr>


		<section id="happenings" class="calendar xl p-0 flex gap-2">

			<div class="yokel-heading">
				<h2><?php echo $calendarHeader; ?></h2>

				<p><?php echo $calendarDescription; ?></p>
			</div>


			<div class="iframe-container">
				<?php echo $calendarEmbed; ?>
			</div>

		</section>


		<section class="contact-for-more my-3 text-center">
			<p><?php echo $bottomCTABody; ?></p>
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo $bottomCTALink; ?>"><?php echo $bottomCTAButtonText; ?></a></div>

		</section>



	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
