<?php

require_once( 'GdprInterface.php' );
require_once( 'GdprToolbox.php' );
class GdprDataContainer implements GdprInterface {

	public $email;

	public $data = []; // array( array( plugin_navn, fields => array () ) );

	public static function instance() {
		static $inst = null;
		if ( $inst === null ) {
			$inst = new GdprDataContainer();
		}

		return $inst;
	}

	public function __construct() {

	}

	public function init() {
		$data = $this->get_data();
	}

	protected function get_data() {

		return $this->data;
	}

	public function update_instance( $key, $instance ) {
		$this->data[ $key ] = $instance;
	}

	protected function plugin_name( $plugin_name ) {
		$this->plugin_name = $plugin_name;
	}

	/**
	 * set_field
	 *
	 * @param [array] $field
	 * @return void
	 */
	protected function field( $field ) {
		$this->fields[] = $field;
	}

	public function update_data( $gdpr_privacy ) {
		//maybe thow cactch instead
		if ( ! $gdpr_privacy->get_key() ) {
			return;
		}
		$this->data[ $gdpr_privacy->get_key() ] = $gdpr_privacy;
	}

	//////////////////////
	//////////////////////
	//////////////////////
	//////////////////////

	public function get_gdpr_version() {
		return '1.0.0';
	}

	public function read_userdata( $user_email ) {
		return $user_email;
	}

	public function delete_userdata( $user_email ) {
		return $user_email;
	}

	public function anonymize_userdata( $user_email ) {
		return $user_email;
	}

	public function policy() {
		return '';
	}

}

$gdpr_data_container = GdprDataContainer::instance();
