<?php
/**
 * wo-log
 *
 * A simple logging utility for WordPress plugins and themes.
 *
 * @package wo-log
 * @author  Wild Operation
 */
if ( ! function_exists( 'wo_log' ) ) {
	/**
	 * Logging function.
	 * In wp-config.php define the WP_DEBUG_LOG constant: define('WP_DEBUG_LOG', true);
	 *
	 * You can then use this function anywhere in your themes or plugin:
	 *
	 * wo_log("log message here");
	 *
	 * This will write to wp-content/debug.log.
	 * In terminal: tail -f debug.log
	 *
	 * @param string|int|object|array $log Debug info to log.
	 */
	function wo_log( $log ) {
		try {
			if ( true === WP_DEBUG ) {
				if ( is_array( $log ) || is_object( $log ) ) {
					error_log( print_r( $log, true ) );
				} else {
					error_log( $log );
				}
			}
		} catch ( \Throwable $e ) {
			// ignore
		}
	}
}