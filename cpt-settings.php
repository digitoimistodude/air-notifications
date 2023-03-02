<?php

namespace Air_Notifications;

/**
 * Register notification post type
 */
// Register Custom Post Type
function register_notification_post_type() {
  $labels = [
		'name'               => __( 'Notifications', 'air-notifications' ),
    'singular_name'      => __( 'Notification', 'air-notifications' ),
    'add_new'            => __( 'Add new notification', 'air-notifications' ),
    'add_new_item'       => __( 'Add new notification', 'air-notifications' ),
    'edit_item'          => __( 'Edit notification', 'air-notifications' ),
    'new_item'           => __( 'New notification', 'air-notifications' ),
    'view_item'          => __( 'View notification', 'air-notifications' ),
    'search_items'       => __( 'Search notifications', 'air-notifications' ),
    'not_found'          => __( 'Notification not found', 'air-notifications' ),
    'not_found_in_trash' => __( 'Notification not found in trash', 'air-notifications' ),
    'parent_item_colon'  => __( 'Notification parent', 'air-notifications' ),
    'menu_name'          => __( 'Notifications', 'air-notifications' ),
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
