<?php

class GdprSettings {

	public static function instance() {
		static $inst = null;
		if ( $inst === null ) {
			$inst = new GdprSettings();
		}

		return $inst;
	}

	public function __construct() {
		// Register the menu page
		add_action( 'admin_menu', [ $this, 'add_menu_pages' ] );
	}

	/**
 * Add a submenu page in the admin
 * @return void
 */
	public function add_menu_pages() {

		add_menu_page(
			__( 'GDPRWP', 'textdomain' ),
			__( 'GDPRWP', 'textdomain' ),
			'manage_options',
			'gdprwp',
			[ $this, 'get_main_page_view' ],
			'dashicons-admin-settings',
			6
		);

	}

	public function get_main_page_view() {
		echo GdprMain::get_view( 'admin/main-page.php' );
	}

}

$gdpr_settings = GdprSettings::instance();
