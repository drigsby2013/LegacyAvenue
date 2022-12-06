

var app = new Vue({
	el: '#library-container',

	data: {
		categories: libraryCateogories,
		category: null,
		posts: [],
		isLoading: true,
		showLoadMore: false,
	},

	methods: {

		async fetchPosts(categoryId) {

			this.isLoading = true

			const args = { limit: 6 }

			if (categoryId) {
				args.categories = categoryId
			}

			let posts = await queryApi('posts', args)

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


		/**
		 * { function_description }
		 *
		 * @param      {<type>}             date                   The date
		 * @param      {(Function|string)}  [format='YYYY-MM-DD']  The format
		 * @return     {<type>}             { description_of_the_return_value }
		 */
		formatDate(date, format='YYYY-MM-DD') {
			return dayjs(date).format(format)
		},
	},


	async created() {
		if (this.posts.length) { return }
		this.fetchPosts()
	},
})