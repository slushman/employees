<?php
/**
 * The metabox-specific functionality of the theme.
 *
 * @since 			1.5
 * @package 		Employees\Admin
 */

namespace Employees\Admin;
use Employees\Fields as Fields;

class Metabox_Name extends \Employees\Admin\Metabox {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 		1.0.0
	 */
	public function __construct( Fields\Fields_Admin $fields ) {

		$this->set_fields( $fields );
		$this->set_nonce( 'nonce_employee_name' );

		$metabox_fields = array();

		$field1['attributes']['id'] 	= 'prefix';
		$field1['properties']['label'] 	= esc_html__( 'Prefix', 'employees' );
		$metabox_fields[] 				= array( 'prefix', 'text', '', 'field_text', $field1 );

		$field2['attributes']['id'] 	= 'nameFirst';
		$field2['properties']['label'] 	= esc_html__( 'First Name', 'employees' );
		$metabox_fields[] 				= array( 'nameFirst', 'text', '', 'field_text', $field2 );

		$field3['attributes']['id'] 	= 'nameLast';
		$field3['properties']['label'] 	= esc_html__( 'Last Name', 'employees' );
		$metabox_fields[] 				= array( 'nameLast', 'text', '', 'field_text', $field3 );

		$field4['attributes']['id'] 	= 'suffix';
		$field4['properties']['label'] 	= esc_html__( 'Suffix', 'employees' );
		$metabox_fields[] 				= array( 'suffix', 'text', '', 'field_text', $field4 );

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
			'employee_name',
			esc_html__( 'Name Details', 'employees' ),
			array( $this, 'metabox' ),
			'employee',
			'normal',
			'default',
			array()
		);

	} // add_metaboxes()

} // class
