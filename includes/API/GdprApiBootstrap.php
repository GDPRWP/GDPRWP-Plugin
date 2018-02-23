<?php

class GdprApiBootstrap {

	public static function instance() {
		static $inst = null;
		if ( $inst === null ) {
			$inst = new GdprApiBootstrap();
		}

		return $inst;
	}

	public function __construct() {
			$this->init();
	}

	public function init() {
		add_action( 'rest_api_init', [ $this, 'register_routes' ] );
	}

	public static function get_route( $endpoint ) {
		return rest_url( 'gdprwp/v1/' . $endpoint );
	}

	public function register_routes() {
		register_rest_route(
			'gdprwp/v1', '/get-data', [
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => [ $this, 'read_callback' ],
				'permission_callback' => [ $this, 'permissions' ],
				'args'                => [
					'email' => [
						'description'       => '',
						'type'              => 'string',
						'required'          => true,
						'validate_callback' => [ $this, 'validate_email' ],
						'sanitize_callback' => '',
					],
				],
			]
		);
		register_rest_route(
			'gdprwp/v1', '/run-callback', [
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => [ $this, 'read_callback' ],
				'permission_callback' => [ $this, 'permissions' ],
				'args'                => [
					'email'           => [
						'description'       => '',
						'type'              => 'string',
						'required'          => true,
						'validate_callback' => [ $this, 'validate_email' ],
						'sanitize_callback' => '',
					],
					'plugin_callback' => [
						'description'       => '',
						'required'          => true,
						'validate_callback' => [ $this, 'pre_callback_plugins_callback' ],
					],
				],
			]
		);
	}

	public function permissions() {
		if ( ! current_user_can( 'administrator' ) ) {
			return new WP_Error( 'rest_forbidden', esc_html__( 'you can not view private data.', 'gdprwp' ), [ 'status' => 401 ] );
		}
		return true;
	}

	public function validate_email( $value, $request, $param ) {
		return is_email( $value );
	}

	public function validate_emails( $value, $request, $param ) {
		if ( ! is_string( $value ) || ! is_array( $value ) ) {
			return new WP_Error( 'rest_invalid_param', esc_html__( 'The email argument must be a string or array.', 'gdprwp' ), [ 'status' => 400 ] );
		}
		//@TODO - handle multiple emails
		// (array) $value
	}

	public function read_callback( $request ) {

		//For now, only handle one email. @TODO handle multiple

		// if ( isset( $request['email'] ) && ! empty( $request['email'] ) ) {
		// 	$emails = $request['email'];
		// 	if ( is_string( $emails ) ) {
		// 		$emails = explode( ',', $email );
		// 	}
		// 	return rest_ensure_response( (array) $emails );
		// }
		//

		if ( isset( $request['email'] ) ) {
			return rest_ensure_response( $request['email'] );
		}

		return new WP_Error( 'rest_invalid', esc_html__( 'The email parameter is required.', 'gdprwp' ), [ 'status' => 400 ] );

	}

	public function pre_callback_plugins_callback( $request ) {
		if ( ! is_callable( $request['plugin_callback'] ) ) {
			return false;
		}
		return true;
	}

}

$gdpr_api_bootstrap = GdprApiBootstrap::instance();
