
const template = document.querySelector('template#library')


async function queryApi(route, params) {

	params = Object.assign({ per_page: 6 }, params)

	const url = new URL(window.location)

	url.pathname = `/wp-json/wp/v2/${route}`

	url.search = new URLSearchParams(params)

	console.log(url.toString())

	const res = await fetch(url.toString(), {
		method: 'get',
	})

	const data = await res.json()

	console.log({data})

	return data
}



var app = new Vue({
	el: '#library-container',

	data: {
		message: 'Hello Vue!',
		categories: libraryCateogories,
		category: null,
		posts: [],
	},

	methods: {
	},

	async mounted() {

		if (this.posts.length) { return }


		this.posts = await queryApi('posts', { limit: 6 })

		console.log({libraryCateogories})
	},
})