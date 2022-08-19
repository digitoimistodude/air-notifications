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
 * Version:           1.0.0
 */

namespace Air_Notifications;

const PLUGIN_VERSION = '1.0.0';

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
add_action( 'air_notifications_show_notifications', __NAMESPACE__ . '\show_notifications' );

// Enqueue template style
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_scripts' );

function enqueue_scripts() {
  wp_enqueue_script( 'air-notifications-scripts', plugin_dir_url( __FILE__ ) . 'assets/scripts.js', [], filemtime( plugin_dir_path( __FILE__ ) . 'assets/scripts.js' ), true );
  if ( ! apply_filters( 'air_notifications_disable_css', __return_false() ) ) {
    wp_enqueue_style( 'air-notifications-styles', plugin_dir_url( __FILE__ ) . 'assets/styles.css', [], filemtime( plugin_dir_path( __FILE__ ) . 'assets/styles.css' ) );
  }
}