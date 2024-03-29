<?php

/**
 * { function_description }
 */
function legacyavenue_footer_copyright() {
    $year = date('Y');
    $designedBy = 'Uncommon Crowd';
    $designedByUrl = 'https://www.uncommoncrowd.com/';

    echo implode(' ', [
        '&copy;' . $year,
        carbon_get_theme_option('crb_company_legalname') . '.',
        __('All rights reserved.'),
        __('Site creative by'),
        legacyavenue_make_url($designedBy, $designedByUrl, '_blank') . '.'
    ]);
}


/**
 * { function_description }
 *
 * @param      string  $label  The label
 * @param      string  $href   The href
 *
 * @return     string  ( description_of_the_return_value )
 */
function legacyavenue_make_url($label, $href, $target='_self') {
	$rel = strtolower($target) != "_self" ? "rel='nofollow noopener noreferrer'": "";
    return "<a href=\"$href\" target=\"$target\" $rel>$label</a>";
}


function legacyavenue_contact_button($label) {

    // TODO: do a page lookup for the contact page
    $url = '/contact-us';

    echo implode('', [
        '<a class="button" href="', $url, '">', $label, '</a>',
    ]);
}



/**
 * { function_description }
 *
 * @param      <type>        $menu_name  The menu name
 *
 * @return     array|string  ( description_of_the_return_value )
 */
function wp_get_menu_array($menu_name) {

    $locations = get_nav_menu_locations();
    $menu      = wp_get_nav_menu_object( $locations[ $menu_name ] );
    $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );

    if (!$menuitems) { return "false"; }

    $menu = [];

    foreach ($menuitems as $m) {
        if (empty($m->menu_item_parent)) {
            $menu[$m->ID] = [];
            $menu[$m->ID]['ID']         = $m->ID;
            $menu[$m->ID]['title']      = $m->title;
            $menu[$m->ID]['url']        = $m->url;
            $menu[$m->ID]['children']   = [];
        }
    }

    $submenu = [];
    foreach ($menuitems as $m) {
        if ($m->menu_item_parent) {
            $submenu[$m->ID] = [];
            $submenu[$m->ID]['ID']      = $m->ID;
            $submenu[$m->ID]['title']   = $m->title;
            $submenu[$m->ID]['url']     = $m->url;
            $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
        }
    }
    return $menu;

}


/**
 * Gets the social icon. *
 * @param      <type>       $url    The url
 * @return     bool|string  The social icon.
 */
function getSocialIcon($url) {
    $url = parse_url($url);
    $host = preg_replace('/www\./', '', $url['host']);

    $platform = false;

    $platforms = [
        'amazon.com'        => 'amazon',
        'blogger.com'       => 'blogger',
        'discord.com'       => 'discord',
        'discourse.com'     => 'discourse',
        'dribbble.com'      => 'dribbble',
        'ebay.com'          => 'ebay',
        'etsy.com'          => 'etsy',
        'facebook.com'      => 'facebook',
        'github.com'        => 'github',
        'gitlab.com'        => 'gitlab',
        'instagram.com'     => 'instagram',
        'linkedin.com'      => 'linkedin',
        'pinterest.com'     => 'pinterest',
        'reddit.com'        => 'reddit',
        'slack.com'         => 'slack',
        'snapchat.com'      => 'snapchat',
        'steam.com'         => 'steam',
        'telegram.org'      => 'telegram',
        'tiktok.com'        => 'tiktok',
        'trello.com'        => 'trello',
        'twitch.tv'         => 'twitch',
        'vimeo.com'         => 'vimeo',
        'whatsapp.com'      => 'whatsapp',
        'youtube.com'       => 'youtube',
    ];

    foreach ($platforms as $host => $icon) {
        if (str_contains($url['host'], $host)) {
            $platform = 'fa-' . $icon;
            break;
        }
    }

    return $platform;
}


/**
 * Gets the category url.
 *
 * @param      <type>  $cat    The cat
 */
function getCategoryUrl($cat) {

    echo $cat->slug;

}


/**
 *  Gets the readable timezone.
 *
 * @param      DateTimeZone|string  $timezone  The timezone
 *
 * @return     <type>               The readable timezone.
 */
function getReadableTimezone(string $timezone = null) {
	$timezone = $timezone ?? date_default_timezone_get();

	if (str_contains($timezone, 'UTC')) {
		return $timezone;
	}

	$timezone = new DateTimeZone($timezone);
	$timezone_type = ((array) $timezone)['timezone_type'];
	return $timezone->getTransitions()[$timezone_type]['abbr'];
}

