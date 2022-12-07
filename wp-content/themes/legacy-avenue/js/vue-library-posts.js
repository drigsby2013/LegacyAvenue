var app = new Vue({
	el: '#library-container',

	data: {
		categories: libraryCateogories,
		categoryId: null,
		currentPage: 1,
		totalPages: false,

		posts: [],
		isLoading: true,
	},

	methods: {

		async fetchPosts() {

			this.isLoading = this.currentPage === 1 // true

			const args = { limit: 6, page: this.currentPage }

			if (this.categoryId) {
				args.categories = this.categoryId
			}

			let [ posts, headers ] = await queryApi('posts', args)

			this.totalPages = Number(headers.get('X-WP-TotalPages'))

			console.log({ totalPages: this.totalPages })

			posts = await Promise.all(posts.map(normalizePost))

			if (this.currentPage > 1) {
				this.posts = this.posts.concat(posts)
			} else {
				this.posts = posts
			}

			this.isLoading = false
		},


		loadMore() {
			this.currentPage += 1
			this.fetchPosts()
		},


		resetCategory() {
			this.currentPage = 1
			this.totalPages = false
			this.categoryId = null
			this.fetchPosts()
		},


		/**
		 * Loads a category.
		 *
		 * @param      {<type>}   $e      { parameter_description }
		 * @return     {Promise}  { description_of_the_return_value }
		 */
		async loadCategory($e) {

			this.categoryId = Number($e.target.dataset.categoryId)

			this.currentPage = 1
			this.totalPages = false
			// this.categoryId = null

			this.fetchPosts()

			console.log({ $e, categoryId: this.categoryId})
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


	computed: {
		showLoadMore: function() {
			return this.totalPages > this.currentPage
		},
	},


	async created() {
		if (this.posts.length) { return }
		this.fetchPosts()

	},
})
