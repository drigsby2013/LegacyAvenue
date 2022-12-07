/**
 * Queries an api.
 *
 * @param      {<type>}   route   The route
 * @param      {<type>}   params  The parameters
 * @return     {Promise}  { description_of_the_return_value }
 */
async function queryApi(route, params) {
	params = Object.assign({ per_page: 6 }, params)

	const url = new URL(window.location)

	url.pathname = `/wp-json/wp/v2/${route}`
	url.search = new URLSearchParams(params)

	const res = await fetch(url.toString(), {
		method: 'get',
	})

	const headers = res.headers

	const data = await res.json()

	return [ data, headers ]
}


/**
 * { function_description }
 *
 * @param      {string}  str     The string
 * @return     {string}  { description_of_the_return_value }
 */
function stripExcerpt(str) {
	return str.replace(/<a[\s\S]+?>[\s\S]+?<\/a>/gi, '')
}


/**
 * { function_description }
 *
 * @param      {<type>}             date                   The date
 * @param      {(Function|string)}  [format='YYYY-MM-DD']  The format
 * @return     {<type>}             { description_of_the_return_value }
 */
function formatDate(date, format='YYYY-MM-DD') {
	return dayjs(date).format(format)
}


/**
 * Gets the post image.
 *
 * @param      {<type>}   imageId  The image identifier
 * @return     {Promise}  The post image.
 */
async function getPostImage(imageId) {
	let [ img, headers ] = await queryApi(`media/${imageId}`)
	return img
}


/**
 * { function_description }
 *
 * @param      {<type>}   post    The post
 * @return     {Promise}  { description_of_the_return_value }
 */
async function normalizePost(post) {
	// modulate the excerpt
	post.excerpt = post.excerpt.rendered.replace(/<\/?p[\s\S]*?>|<a[\s\S]+?>[\s\S]+?<\/a>/gi, '')
		.trim()
		.substr(0,200) + '...'

	// provide
	if (!!post.featured_media) {
		let image = await getPostImage(post.featured_media)
		post.featured_media = true
		post.image_url = image.source_url
		post.image_alt = image.alt_text
	} else {
		post.featured_media = true
		post.image_url = defaultHero
		post.image_alt = 'temp image'
	}

	return post
}
