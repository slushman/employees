<?php
/**
 * The metabox-specific functionality of the theme.
 *
 * @since 			1.5
 * @package 		Employees\Admin
 */

namespace Employees\Admin;
use Employees\Fields as Fields;

class Metabox_Contact extends \Employees\Admin\Metabox {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 		1.0.0
	 * @param 		Fields_Admin 		$fields 		Instance of Fields_Admin()
	 */
	public function __construct( Fields\Fields_Admin $fields ) {

		$this->set_fields( $fields );
		$this->set_nonce( 'nonce_employee_contact' );

		$field1['attributes']['id'] 			= 'phone-office';
		$field1['properties']['label'] 			= esc_html__( 'Office Phone', 'employees' );
		$metabox_fields[] 						= array( 'phoneOffice', 'text', '', 'field_text', $field1 );

		$field2['attributes']['id'] 			= 'phone-cell';
		$field2['properties']['label'] 			= esc_html__( 'Cell Phone', 'employees' );
		$metabox_fields[] 						= array( 'phoneCell', 'text', '', 'field_text', $field2 );

		$field3['attributes']['id'] 			= 'fax-number';
		$field3['properties']['label'] 			= esc_html__( 'Fax Number', 'employees' );
		$metabox_fields[] 						= array( 'faxNumber', 'text', '', 'field_text', $field3 );

		$field4['attributes']['id'] 			= 'email';
		$field4['attributes']['type'] 			= 'email';
		$field4['properties']['label'] 			= esc_html__( 'Email Address', 'employees' );
		$metabox_fields[] 						= array( 'email', 'email', '', 'field_text', $field4 );

		$field5['attributes']['id'] 			= 'url-vcard';
		$field5['attributes']['type'] 			= 'url';
		$field5['properties']['label'] 			= esc_html__( 'vCard URL', 'employees' );
		$field5['properties']['label-remove'] 	= __( 'Remove file', 'employees' );
		$field5['properties']['label-upload'] 	= __( 'Choose/Upload file', 'employees' );
		$metabox_fields[] 								= array( 'urlVcard', 'url', '', 'field_file_uploader', $field5 );

		$this->set_metabox_fields( $metabox_fields );
		$this->set_post_type( 'employee' );

	} // __construct()

	/**
	 * Registers all the WordPress hooks and filters for this class.
	 */
	public function hooks() {

		add_action( 'add_meta_boxes', 	array( $this, 'add_metaboxes' ), 10, 2 );
		add_action( 'save_post', 		array( $this, 'validate_meta' ), 10, 2 );
		add_action( 'add_meta_boxes', 	array( $this, 'set_meta' ), 1, 2 );
		add_action( 'rest_api_init', 	array( $this, 'register_meta_fields' ), 99 );

	} // hooks()

	/**
	 * Registers metaboxes with WordPress
	 *
	 * @hooked 		add_meta_boxes
	 * @since 		1.0.0
	 * @access 		public
	 * @param 		string 			$post_type 		The post type name.
	 * @param 		object 			$post 			The post object.
	 */
	public function add_metaboxes( $post_type, $post ) {

		if ( 'employee' !== $post_type ) { return; }

		add_meta_box(
			'employee_contact',
			esc_html__( 'Contact information', 'employees' ),
			array( $this, 'metabox' ),
			'employee',
			'normal',
			'default',
			array()
		);

	} // add_metaboxes()

} // class
