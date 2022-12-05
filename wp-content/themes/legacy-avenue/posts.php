<?php
/**
 * Template Name: Library Template
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


wp_enqueue_script('library_template_vue', 'https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js', [], null, true);
wp_enqueue_script('library_template_app', get_theme_file_uri() . '/js/library-posts.js', [], null, true);
// <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.7.14/vue.min.js" integrity="sha512-BAMfk70VjqBkBIyo9UTRLl3TBJ3M0c6uyy2VMUrq370bWs7kchLNN9j1WiJQus9JAJVqcriIUX859JOm12LWtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			// Start the loop.
			while ( have_posts() ) :
				the_post();

				// Include the page content template.
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php
					// Post thumbnail.
					twentyfifteen_post_thumbnail();
				?>

			<!--
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>
			 -->
				<div class="entry-content">
					<?php the_content(); ?>
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


			<section id="library-container" class="library">
				<div class="library-index">
					<ul>
						<li v-for="category in categories">
							<a href="#">{{ category.name }}</a>
						</li>
					</ul>
				</div>

				<ul class="library-items">
					<li v-for="post in posts"
						:key="post.id"
						class="library-item"
					>
						<div v-if="!!post.featured_media" class="image">
							<img decoding="async"
								loading="lazy"
								:src="post.featured_media"
								alt=""
								class="alignnone size-full wp-image-128"
								width="300"
								height="150"
							>
						</div>

						<div class="title">
							<h2>{{ post.title.rendered }}</h2>
						</div>

						<div class="excerpt">
							{{ post.excerpt.rendered }}
							<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p> -->
						</div>

						<time class="date">{{ post.date }}</time>

						<div class="link"><a :href="post.link">Learn More</a></div>
					</li>
				</ul>
			</section>

			<div class="pagination">
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">See More</a></div>
			</div>

			<script>
				const libraryCateogories = <?php echo json_encode(get_categories()); ?>
			</script>


		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
