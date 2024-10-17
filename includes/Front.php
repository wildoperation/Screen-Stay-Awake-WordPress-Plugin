<?php
namespace SCRNSA;

/**
 * Frontend scripts, styles, ajax handling, etc.
 */
class Front {
	/**
	 * Create hooks.
	 *
	 * @return void
	 */
	public function hooks() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
	}

	/**
	 * Enqueue front-end scripts.
	 */
	public function enqueue() {
		/**
		* Use the scrnsa_stayawake_should_enqueue filter to limit where this script should load.
		*/
		if ( Options::instance()->get( 'enable_stay_awake', 'general', true ) && apply_filters( 'scrnsa_stayawake_should_enqueue', true ) ) {
			wp_register_script(
				'scrnsa_stayawake',
				Plugin::assets_url() . 'js/stayawake.js',
				array(),
				Plugin::version(),
				array(
					'strategy'  => 'defer',
					'in_footer' => true,
				)
			);
			wp_enqueue_script( 'scrnsa_stayawake' );
		}
	}
}
