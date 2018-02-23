<?php

class GdprEnqueues {

	public $email;

	private $data = []; // array( array( plugin_navn, fields => array () ) );

	public static function instance() {
		static $inst = null;
		if ( $inst === null ) {
			$inst = new GdprEnqueues();
		}

		return $inst;
	}

	public function __construct() {
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}

	public function enqueue_scripts() {
		// Define the URL path to the plugin...
		$js_path = GdprMain::get_js_path();

		// Enqueue the scripts if not already.
		if ( ! wp_script_is( 'ajax_requests', 'enqueued' ) ) {
			// wp_enqueue_script( 'jquery' );
			wp_register_script(
				'ajax_requests',
				$js_path . '/' . 'ajax_requests' . '.js',
				[ 'jquery' ],
				1.0
			);

			wp_localize_script(
				'ajax_requests', 'gdprwp', [
					// 'DataContainer' => GdprDataContainer::Instance(),
					// 'PluginsData' => $gdpr->get_data(),
					'endpoints' => [
						'get-data' => GdprApiBootstrap::get_route( 'get-data' ),
					],
				]
			);
			wp_enqueue_script( 'ajax_requests' );
		}

	}

}

$gdpr_enqueues = GdprEnqueues::instance();
