var app = new Vue({
	el: '#recommended-container',

	data: {
		posts: [],
		isLoading: true,
	},

	methods: {

		async fetchPosts(args={}) {
			this.isLoading = true

			args = Object.assign({  }, args)

			let [ posts, headers ] = await queryApi('posts', args)

			this.posts = await Promise.all(posts.map(normalizePost))

			this.isLoading = false
		},


		/**
		 * Loads a category.
		 *
		 * @param      {<type>}   $e      { parameter_description }
		 * @return     {Promise}  { description_of_the_return_value }
		 */
		async loadCategory($e) {
			console.log($e)
		},

		formatDate,
	},


	async created() {
		let tagId = postsTags.find(tag => tag.slug === 'recommended').term_id

		this.fetchPosts({
			tags: tagId,
			limit: 3,
		})
	},
})
