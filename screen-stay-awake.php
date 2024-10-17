<?php
/**
 * Plugin Name:     Screen Stay Awake
 * Plugin URI:      https://github.com/wildoperation/Screen-Stay-Awake-WordPress-Plugin
 * Description:     Request a visitor's screen stay active while viewing your website. Implements Screen Wake Lock API.
 * Version:         1.0.1
 * Author:          Wild Operation
 * Author URI:      https://wildoperation.com
 * License:         GPL-3.0
 * License URI:     http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:     screen-stay-awake
 *
 * @package WordPress
 * @subpackage Screen Stay Awake
 * @since 1.0.0
 * @version 1.0.1
 */

/* Abort! */
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'SCRNSA_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'SCRNSA_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * Load
 */
require SCRNSA_PLUGIN_DIR . 'vendor/autoload.php';

/**
 * Initialize; plugins_loaded
 */
add_action(
	'plugins_loaded',
	function () {
		/**
		 * Initiate classes and their hooks.
		 */
		$classes = array(
			'SCRNSA\Admin',
			'SCRNSA\Front',
		);

		foreach ( $classes as $class ) {
			$instance = new $class();

			if ( method_exists( $instance, 'hooks' ) ) {
				$instance->hooks();
			}
		}
	},
	10
);
