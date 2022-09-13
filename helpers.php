<?php

namespace Air_Notifications;

function get_locations() {
  $locations = [
    'default'  => 'Sivun yläreuna',
  ];

  return apply_filters( 'air_notifications_locations', $locations );
}

function show_notifications( $location = null ) {
  $notifications = get_notifications( $location );

  foreach ( $notifications as $notification ) {
    // Try to get custom template from theme
    $template_path = locate_template( "templates/notification-template-{$notification['location']}.php" );
    if ( empty( $template_path ) ) {
      // Try to get custom default template, if location specific wasnt found
      $template_path = locate_template( 'templates/notification-template-default.php' );
    }

    // If no custom template was found, use themes template
    if ( empty( $template_path ) ) {
      $template_path = plugin_dir_path( __FILE__ ) . 'templates/notification-template-default.php';
    }

    include $template_path;
  }
}

function get_notifications( $location = null ) {
  if ( is_admin() ) {
    return;
  }

  $current_post_id = get_the_ID();
  $meta_query = [
    [
    'meta_key' => 'stop',
    'value'    => wp_date( 'Y-m-d H:i:s' ),
    'compare'  => '>',
    'type'     => 'DATETIME',
    ],
  ];

  if ( $location ) {
    $meta_query[] = [
      'meta_key' => 'location',
      'value'    => $location,
    ];
  }

  $notifications_query = new \WP_Query( [
    'post_type'      => 'air-notification',
    'posts_per_page' => 100,
    'meta_query'     => [ $meta_query ],
  ] );

  $notifications = [];
  if ( $notifications_query->have_posts() ) {
    while ( $notifications_query->have_posts() ) {
      $notifications_query->the_post();

      $start = get_post_meta( get_the_ID(), 'start', true );

      if ( $start > wp_date( 'Y-m-d H:i:s' ) ) {
        continue;
      }

      $show_on_pages = get_post_meta( get_the_ID(), 'show_on', true );
      if ( ! empty( $show_on_pages ) && ! in_array( (string) $current_post_id, $show_on_pages, true ) ) {
        continue;
      }

      $notification_temp = [
        'id'             => get_the_ID(),
        'guid'           => crc32( get_the_ID() . get_the_title() . get_post_meta( get_the_ID(), 'content', true ) ),
        'title'          => get_the_title(),
        'content'        => get_post_meta( get_the_ID(), 'content', true ),
        'start'          => $start,
        'stop'           => get_post_meta( get_the_ID(), 'stop', true ),
        'is_dismissable' => get_post_meta( get_the_ID(), 'is_dismissable', true ),
        'location'       => get_post_meta( get_the_ID(), 'location', true ),
      ];

      $notifications[] = $notification_temp;
    }
  }
  wp_reset_postdata();

  return $notifications;
} // end get_notifications
