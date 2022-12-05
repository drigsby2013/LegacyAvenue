<?php


/**
 *
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
        legacyavenue_make_url($designedBy, $designedByUrl) . '.'
    ]);
}


/**
 *
 */
function legacyavenue_make_url($label, $href) {
    return '<a href="' . $href . '">' . $label . '</a>';
}


/**
 *
 */
function wp_get_menu_array($menu_name) {

    $locations = get_nav_menu_locations();
    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
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