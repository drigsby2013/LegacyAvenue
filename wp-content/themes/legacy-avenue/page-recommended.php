<?php
/**
 * Template Name: Recommendations template
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

$calendarHeader         = carbon_get_post_meta( get_the_ID(), 'crb_calendar_header');
$calendarDescription    = carbon_get_post_meta( get_the_ID(), 'crb_calendar_description');
$calendarEmbed          = carbon_get_post_meta( get_the_ID(), 'crb_calendar_embed');

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

			<!-- <?php the_post_thumbnail(); ?> -->

			<div class="entry-content">
				<?php the_content(); ?>
			</div><!-- .entry-content -->

		</article><!-- #post-<?php the_ID(); ?> -->
		<?php endwhile; ?>


		<div id="recommended">
			<?php require __DIR__ . '/templates/vue-localguide.php'; ?>
		</div>

		<hr>


		<section id="happenings" class="container calendar flex xl gap-2">

			<div class="yokel-heading">
				<h2><?php echo $calendarHeader; ?></h2>

				<p><?php echo $calendarDescription; ?></p>
			</div>


			<div class="iframe-container">
				<?php echo $calendarEmbed; ?>
			</div>

		</section>


		<section class="contact-for-more my-3 text-center">
			<p>
				<?php echo __('Have a recommendation we should know about?'); ?>
			</p>

			<?php legacyavenue_contact_button(__('Tell us about it')); ?>

		</section>



	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>

<style>

.hero-graphic {
	position: relative;
	padding: 0;
}

.hero-graphic img {
	width: 100%;
	height: auto;
}




.hero-graphic .entry-content {
  position: absolute;
  top: 50%;
  width: 100%;
  max-width: 1000px;
  text-align: center;
  margin: auto;
}


</style>
