<?php

wp_enqueue_script('legacyavenue_template_dayjs', 'https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.6/dayjs.min.js', [], null, true);
wp_enqueue_script('legacyavenue_template_vue', 'https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js', [], null, true);
wp_enqueue_script('legacyavenue_template_helpers', get_theme_file_uri() . '/js/vue-helpers.js', [], null, true);
wp_enqueue_script('legacyavenue_template_library', get_theme_file_uri() . '/js/vue-library-posts.js', [], null, true);
// <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.7.14/vue.min.js" integrity="sha512-BAMfk70VjqBkBIyo9UTRLl3TBJ3M0c6uyy2VMUrq370bWs7kchLNN9j1WiJQus9JAJVqcriIUX859JOm12LWtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

?>

<section id="library-container" class="library">
	<div class="library-index">
		<ul>
			<li v-for="category in categories" :key="category.id">
				<a href="#"
					:data-categoryid="category.id"
					@click.prevent="loadCategory"
				>{{ category.name }}</a>
			</li>
		</ul>
	</div>


	<div class="container">
		<div v-if="isLoading">
			Loading articles...
		</div>


		<ul v-if="posts.length > 0" class="library-items grid cols-1 md-cols-2 lg-cols-3 gap-2 lg-gap-4">
			<li v-for="post in posts"
				:key="post.id"
				class="library-item"
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

		<div class="pagination" v-if="showLoadMore">
			<div class="wp-block-button">
				<button class="wp-block-button__link wp-element-button"
					@click="loadMore"
				>See More</button>
			</div>
		</div>
	</div>
</section>


<script>
	const libraryCateogories = <?php echo json_encode(get_categories()); ?>

	const defaultHero = '<?php echo get_theme_file_uri() . '/assets/default-hero.png'; ?>'
</script>
