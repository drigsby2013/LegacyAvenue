<?php
/**
 * Template Name: Your Journey template
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

?>

<style>


</style>


<div id="primary" class="content-area">
	<main id="main" class="page-your-journey">

		<?php
		// Start the loop.
		while ( have_posts() ) :
			the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<!-- <?php the_post_thumbnail(); ?> -->

			<div class="entry-content">

				<!--
				<div class="journey-hero">
				  <div class="journey-hero-image-mobile mobile-only">
				    <img class="alignnone size-full wp-image-250" src="/wp-content/uploads/2022/12/JesusListen-1.jpg" alt="" width="740" height="500" />
				  </div>
				  <div class="journey-hero-text">
				    <div class="columns">
				      <div class="hero-column large-only">
				        <div class="journey-hero-image-large">
				          <img class="alignnone size-full wp-image-250" src="/wp-content/uploads/2022/12/JesusListen-1.jpg" alt="" width="740" height="500" />
				        </div>
				      </div>
				      <div class="hero-column">

				        <h1>A true ONE ON ONE EXPERIENCE
				        </h1>
				        <b>With many firms,
				        </b> your experience can be diluted by being shuffled from department to department. We stand by a process that allows us to give you true one-on-one, undivided attention; where Jesus can listen and actually hear your needs, hopes, and even worries. Because Legacy Avenue isn’t about departments, it’s about people.
				      </div>
				    </div>
				  </div>
				</div>
				 -->

				<?php the_content(); ?>


			</div><!-- .entry-content -->


			<?php //require __DIR__ . '/templates/vue-products.php'; ?>


<!--
			<section class="journey-cta">
				<p>
			  		Tell us about your goals and learn about more of what we offer over coffee or Zoom.
				</p>
			  <div class="wp-block-button">
			    <a class="wp-block-button__link wp-element-button" href="/contact-us">Talk With Us
			    </a>
			  </div>
			</section>
-->

		</article><!-- #post-<?php the_ID(); ?> -->
		<?php endwhile; ?>

	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
