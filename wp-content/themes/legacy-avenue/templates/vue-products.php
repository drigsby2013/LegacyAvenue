<?php

wp_enqueue_script('legacyavenue_template_dayjs', 'https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.6/dayjs.min.js', [], null, true);
wp_enqueue_script('legacyavenue_template_vue', 'https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js', [], null, true);
wp_enqueue_script('legacyavenue_template_helpers', get_theme_file_uri() . '/js/vue-helpers.js', [], null, true);
wp_enqueue_script('legacyavenue_template_library', get_theme_file_uri() . '/js/vue-library-posts.js', [], null, true);
// <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.7.14/vue.min.js" integrity="sha512-BAMfk70VjqBkBIyo9UTRLl3TBJ3M0c6uyy2VMUrq370bWs7kchLNN9j1WiJQus9JAJVqcriIUX859JOm12LWtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


$maxItems = 6;

$products = array_fill(0,$maxItems, [

]);


?>



<section id="offerings" class="product-gallery grid md-cols-2 lg-cols-3 gap-4">
	<?php foreach ($products as $product) : ?>
	<div class="product">
	<div class="image">
	  <img class="alignnone size-full wp-image-116" src="/wp-content/uploads/2022/12/Rectangle-20.png" alt="" width="50" height="50" />
	</div>
	<div class="title">
	  <h2>Product
	  </h2>
	</div>
	<div class="text">
		<p>
		  	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
		</p>
	</div>
	<div class="wp-block-button">
	  <a class="wp-block-button__link wp-element-button" href="/contact-us">Learn More
	  </a>
	</div>
	</div>
	<?php endforeach; ?>
</section>



<!--

<section id="library-container" class="library">
	<div class="library-index">
		<ul>
			<li>
				<a href=""
					@click.prevent="resetCategory"
				>All Categories</a>
			</li>
			<li v-for="category in categories" :key="category.id">
				<a href=""
					:data-category-id="category.term_id"
					@click.prevent="loadCategory"
				>{{ category.name }}</a>
			</li>
		</ul>
	</div>


	<div class="">
		<div v-if="isLoading"
			class="loader"
		>
			<span class="fas fa-spinner fa-spin"></span>
			Loading articles...
		</div>

		<ul v-if="!isLoading && posts.length > 0" class="library-items grid cols-1 md-cols-2 lg-cols-3 gap-2 lg-gap-4">
			<li v-for="post in posts"
				:key="post.id"
				class="library-item"
			>
			  	<div class="product">
				    <div class="image">
				      	<img class="alignnone size-full wp-image-116" src="/wp-content/uploads/2022/12/Rectangle-20.png" alt="" width="50" height="50" />
				    </div>
				    <div class="title">
				      	<h2>Product</h2>
				    </div>
				    <div class="text">
				      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
				    </div>
				    <div class="wp-block-button">
				      	<a class="wp-block-button__link wp-element-button" href="/contact-us">Learn More</a>
				    </div>
			  	</div>

			</li>
		</ul>
		<p v-if="!isLoading && posts.length === 0"
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


<style>
	.loader {
		text-align: center;
		padding: 2em;
		font-size: 1.5em;
		font-style: italic;
	}

</style>

<script>
</script>
 -->
