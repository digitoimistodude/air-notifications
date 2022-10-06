<?php

namespace Air_Notifications;

/**
 * Register notification post type
 */
// Register Custom Post Type
function register_notification_post_type() {
  $labels = [
		'name'               => __( 'Ilmoitukset', 'air-notifications' ),
    'singular_name'      => __( 'Ilmoitus', 'air-notifications' ),
    'add_new'            => __( 'Lisää uusi ilmoitus', 'air-notifications' ),
    'add_new_item'       => __( 'Lisää uusi ilmoitus', 'air-notifications' ),
    'edit_item'          => __( 'Muokkaa ilmoitusta', 'air-notifications' ),
    'new_item'           => __( 'Uusi ilmoitus', 'air-notifications' ),
    'view_item'          => __( 'Näytä ilmoitus', 'air-notifications' ),
    'search_items'       => __( 'Hae ilmoituksia', 'air-notifications' ),
    'not_found'          => __( 'Ilmoituksia ei löytynyt', 'air-notifications' ),
    'not_found_in_trash' => __( 'Ilmoituksia ei löytynyt roskakorista', 'air-notifications' ),
    'parent_item_colon'  => __( 'Ilmoituksen vanhempi', 'air-notifications' ),
    'menu_name'          => __( 'Ilmoitukset', 'air-notifications' ),
  ];

	$args = [
    'labels'              => $labels,
    'hierarchical'        => false,
    'description'         => 'description',
    'taxonomies'          => array(),
    'public'              => false,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => null,
    'menu_icon'           => 'dashicons-megaphone',
    'show_in_nav_menus'   => false,
    'publicly_queryable'  => true,
    'exclude_from_search' => true,
    'has_archive'         => false,
    'query_var'           => true,
    'can_export'          => true,
    'rewrite'             => true,
    'show_in_rest'        => false,
    'capability_type'     => 'post',
    'supports'            => array(
      'title',
      'revisions',
    ),
  ];
	register_post_type( 'air-notification', $args );
}
