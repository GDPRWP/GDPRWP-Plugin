<?php
/**
 * GDPR interface
 *
 * @package GDPR Interface
 * @author  Jesper V Nielsen
 *
 * Plugin Name:       GDPR for WP
 * Plugin URI:        http://github.com
 * Description:       This provides an interface for other developers to use, and implement in their code.
 * Version:           1.0
 * Author:            Peytz & Co (Kåre Mulvad Steffensen, Jesper V Nielsen, Stephan Victor Schønbeck & others)
 * Author URI:        http://peytz.dk/medarbejdere/
 * GitHub Plugin URI: http://github.com
 */

require_once( 'includes/GdprDataContainer.php' );

class GdprMain extends GdprDataContainer {

	private static $plugin_path;

	public function __construct() {

		require_once( 'includes/API/GdprApiBootstrap.php' );
		require_once( 'includes/GdprToolbox.php' );
		require_once( 'includes/Enqueue.php' );


		// Uncomment to see the magic happen
		add_action( 'admin_init', [ $this, 'run' ] );
	}

	public static function get_plugin_path() {

		if ( empty( self::$plugin_path ) ) {
			self::$plugin_path = plugin_dir_url( __FILE__ );
		}
		return self::$plugin_path;
	}

	public static function get_assets_path() {
		return self::get_plugin_path() . '/assets';
	}

	public static function get_js_path() {
		return self::get_assets_path() . '/js';
	}

	public function run() {
		$email = 'example@example.com';

		do_action( 'gdpr_init', new GdprToolbox( $email ) );
		// Call GdprDataContainer::Instance() to see data

		//TO TEST / DEBUG:
		//check if GDPR is set as parameter, then make a var_dump and kill site.
		//http://yoursite.com/wp-admin/?debug-gdpr
		if ( isset( $_GET['debug-gdpr'] ) ) {
			print '<pre>';
			var_dump( GdprDataContainer::Instance() );
			print '</pre>';

			/**
			 * This is an example of how callacks can be used.
			 * The plugin registeres the callbacks there should be run when anonymize is run.
			 * This part will be implemented in ajax calls, so each callback gets its own request, while maintaining a structuere for plugin developers,
			 * to register all data, in one function.
			 */
			$gdpr = GdprDataContainer::Instance();
			foreach ( $gdpr->get_data() as $plugin_data ) {
				foreach ( $plugin_data->get_anonymize_cb() as $callback ) {
					if ( ! is_callable( $callback ) ) {
						continue;
					}
					//This will be run in a seperatly ajax request.
					call_user_func_array( $callback, [ $plugin_data ] );
					// if the plugin developer updates the $gdpr object ($plugin_data) with the corresponding functions, such as $gdpr->set_field() (or other functions), we can then find the updated date our GdprDataContainer

					print '<pre>';
					var_dump( GdprDataContainer::Instance() );
					print '</pre>';
				}
			}

			wp_die();
		}
	}

}

$gdpr_main = new GdprMain();
