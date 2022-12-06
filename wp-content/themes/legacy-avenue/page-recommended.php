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

get_header(); ?>

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


		<?php require __DIR__ . '/templates/vue-recommended-posts.php'; ?>


		<hr>


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