<?php

Class GdprToolbox
{
		private $key;
		private $email;
		private $plugin_name;
		private $plugin_slug;
		private $fields;
		private $gdpr_data_container;


	public function __construct( $email ) {
		$this->email = $email;
		// if( $this->plugin_name != '') {
		// 	return new GdprPrivacy( $email );
		// }
		$this->gdpr_data_container = GdprDataContainer::Instance();
		$this->gdpr_data_container->email = $email;
	}

	public function set_key( $key ) {
		$this->key =  $key;
		$this->update_data();
	}

	public function get_key() {
		return $this->key;
	}

	public function set_plugin_name( $name ) {
		$this->plugin_name =  $name;
		$this->update_data();
	}

	public function get_email() {
		return $this->email;
	}

	/**
	 * set_field
	 *
	 * @param [array] $field
	 * @return void
	 */
	public function set_field( $field ) {
		$this->fields[] = $field;
		$this->update_data();
		//update main med data fra denne instance

	}
	private function update_data() {
		$this->gdpr_data_container->update_data( $this
			// [
				// 'plugin_name' => $this->plugin_name,
				// 'fields' => $this->fields,
			// ]
		);
	}
}
