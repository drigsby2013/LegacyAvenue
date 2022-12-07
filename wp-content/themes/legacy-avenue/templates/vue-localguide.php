<?php

wp_enqueue_script('legacyavenue_template_dayjs', 'https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.6/dayjs.min.js', [], null, true);
wp_enqueue_script('legacyavenue_template_vue', 'https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js', [], null, true);
wp_enqueue_script('legacyavenue_template_helpers', get_theme_file_uri() . '/js/vue-helpers.js', [], null, true);
wp_enqueue_script('legacyavenue_template_localguide', get_theme_file_uri() . '/js/vue-localguide.js', [], null, true);
// <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.7.14/vue.min.js" integrity="sha512-BAMfk70VjqBkBIyo9UTRLl3TBJ3M0c6uyy2VMUrq370bWs7kchLNN9j1WiJQus9JAJVqcriIUX859JOm12LWtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


$title = carbon_get_post_meta( get_the_ID(), 'crb_recommendations_header' );

?>

<section id="recommended-container" class="container">

	<h2><?php echo $title; ?></h2>

	<div class="">
		<div v-if="isLoading">
			Loading articles...
		</div>

		<ul v-if="posts.length > 0" class="library-items flex row">
			<li v-for="post in posts"
				:key="post.id"
				class="library-item xs-12 md-6 lg-4"
			>
				<div v-if="!!post.featured_media" class="image">
					<img decoding="async"
						loading="lazy"
						:src="post.image_url"
						:alt="post.image_alt"
						class="alignnone size-full wp-image-128"
						width="300"
						height="150"
					/>
				</div>

				<div class="title">
					<h2 v-html="post.title.rendered"></h2>
				</div>

				<div class="excerpt">
					<p v-html="post.excerpt"></p>
				</div>

				<time class="date"
					:datetime="post.date"
				>{{ formatDate(post.date) }}</time>

				<div class="link">
					<a :href="post.link">Learn More</a>
				</div>
			</li>
		</ul>
		<p v-else
			class="empty-posts"
		>
			There are no posts to display. Please check back later.
		</p>
	</div>
</section>


<script>
	const postsTags = <?php echo json_encode(get_tags()); ?>

	const defaultHero = '<?php echo get_theme_file_uri() . '/assets/default-hero.png'; ?>'
</script>

