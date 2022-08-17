<?php
/**
 * @package air-notifications
 *
 * Plugin Name:       Notifications
 * Plugin URI:
 * Description:       Easy way to crete and manage public notifications at the site.
 * Author:            Digitoimisto Dude
 * Author URI:        https://dude.fi
 * License:           GPLv3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Version:           0.1.0
 */

namespace Air_Notifications;

const PLUGIN_VERSION = '0.1.0';

/**
 * Register CPT.
 */
include plugin_dir_path( __FILE__ ) . '/cpt-settings.php';
add_action( 'init', __NAMESPACE__ . '\register_notification_post_type' );

/**
 * Register ACF field
 */
include plugin_dir_path( __FILE__ ) . '/acf-field.php';
add_action( 'init', __NAMESPACE__ . '\register_acf_field' );

include plugin_dir_path( __FILE__ ) . '/helpers.php';
// add_action( 'template_redirect', __NAMESPACE__ . '\show_notifications' );
add_action( 'air_notifications_show_notifications', __NAMESPACE__ . '\show_notifications' );

// Adding a notification location
add_filter( 'air_notifications_locations', function( $locations ) {
  $locations['before-content'] = 'Before Content';

  return $locations;
} );