<?php
namespace SCRNSA;

/**
 * Load plugin textdomain
 */
class Localize {
	/**
	 * Hooks
	 *
	 * @return void
	 */
	public function hooks() {
		add_action( 'init', array( $this, 'load_textdomain' ) );
	}

	/**
	 * Loads the lugin textdomain.
	 *
	 * @return void
	 */
	public function load_textdomain() {
		$locale = get_user_locale();
		$locale = apply_filters( 'plugin_locale', $locale, 'screen-stay-awake' );

		unload_textdomain( 'screen-stay-awake' );

		if ( load_textdomain( 'screen-stay-awake', WP_LANG_DIR . '/plugins/screen-stay-awake-' . $locale . '.mo' ) === false ) {
			load_textdomain( 'screen-stay-awake', WP_LANG_DIR . '/screen-stay-awake/screen-stay-awake-' . $locale . '.mo' );
		}

		load_plugin_textdomain( 'screen-stay-awake', false, dirname( SCRNSA_PLUGIN_BASENAME ) . '/languages' );
	}
}
