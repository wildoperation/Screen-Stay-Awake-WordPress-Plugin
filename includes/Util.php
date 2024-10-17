<?php
namespace SCRNSA;

use SCRNSA\Vendor\WOAdminFramework\WOUtilities;

/**
 * Misc helper classes used throughout this plugin.
 * Also bridges some vendor frameworks, so we don't have to interface with those in other classes.
 */
class Util {

	/**
	 * Get the version of the plugin from the database.
	 *
	 * @param string $key The option key for the plugin version.
	 *
	 * @return float
	 */
	public static function get_dbversion( $key = 'version' ) {
		$version = Options::instance()->get( $key );

		if ( ! $version || is_array( $version ) ) {
			return '';
		}

		return $version;
	}

	/**
	 * Converts a string into the correct bool.
	 * Interfaces with WOUtilities::truthy
	 *
	 * @param mixed $value Any string or bool.
	 *
	 * @return bool
	 */
	public static function truthy( $value ) {
		return WOUtilities::truthy( $value );
	}

	/**
	 * If a variable is not an array, bool, or WP_Error, make it an array. Interfaces with WOUtilities.
	 *
	 * @param mixed $arr Variable to check and convert to array.
	 * @param bool  $force Force an array return in some cases.
	 *
	 * @return mixed
	 */
	public static function arrayify( $arr, $force = false ) {
		return WOUtilities::arrayify( $arr, $force );
	}

	/**
	 * Create a prefixed string for use throughout plugin to avoid conflicts.
	 *
	 * @param string $str The string to prefix.
	 * @param string $sep The seperator.
	 * @param string $ns The prefix.
	 *
	 * @return string
	 */
	public static function ns( $str, $sep = '-', $ns = null ) {
		if ( ! $ns ) {
			$ns = Plugin::ns();
		}

		return $ns . $sep . $str;
	}

	/**
	 * Add javascript data variable for an euqneue script.
	 *
	 * @param string $handle The script handle.
	 * @param array  $data The data to add.
	 * @param string $jsvar The javascript object.
	 * @param string $position Before or after the enqueued script.
	 *
	 * @return void
	 */
	public static function enqueue_script_data( $handle, $data, $jsvar = null, $position = 'before' ) {
		$data = wp_json_encode( $data );

		if ( $data ) {
			if ( ! $jsvar ) {
				$jsvar = str_replace( '-', '_', $handle );
			}

			$jsvar = trim( wp_strip_all_tags( $jsvar ) );

			$script = 'var ' . $jsvar . ' = ' . $data . ';';
			wp_add_inline_script( $handle, $script, $position );
		}
	}
}
