<?php
/**
 * GDPR interface
 *
 * @package GDPR Interface
 * @author  Jesper V Nielsen
 *
 * Plugin Name:       gdpr for wp, Interface
 * Plugin URI:        http://github.com
 * Description:       This provides an interface for other developers to use, and implement in their code.
 * Version:           1.0
 * Author:            Peytz & Co (Kåre Mulvad Steffensen, Jesper V Nielsen & others)
 * Author URI:        http://peytz.dk/medarbejdere/
 * GitHub Plugin URI: http://github.com
 */

Class GdprMain
{

	public function __construct() {
		require_once('includes/GdprDataContainer.php');
		require_once('includes/GdprToolbox.php');

		// Uncomment to see the magic happen
		// add_action('admin_init', [ $this, 'output_read' ] );
	}

	public function output_read() {
		$email = 'example@example.com';
		
		do_action('gdpr_set_userdata', new GdprToolbox( $email ) );

		// Call GdprDataContainer::Instance() to see data
	}

}

$gdpr_main = new GdprMain();
