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

//Hero Section
$titleFirstLine   = carbon_get_post_meta( get_the_ID(), 'crb_first_line') ? : '';
$titleSecondLine  = carbon_get_post_meta( get_the_ID(), 'crb_second_line');
$heroImage 		  = carbon_get_post_meta( get_the_ID(), 'crb_hero_image');
$heroBody 	 	  = apply_filters( 'the_content', carbon_get_the_post_meta( 'crb_hero_body' ) );

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
					<div class="library-hero">
						<div class="image"><img src="<?php echo $heroImage; ?>" alt="" width="1200" height="500" /></div>
						<div class="text">
							<h1><?php echo $titleFirstLine; ?><br><?php echo $titleSecondLine; ?></h1>
							<?php echo $heroBody; ?>
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
