<?php
/**
 * The metabox-specific functionality of the theme.
 *
 * @since 			1.0.0
 * @package 		Rosh\Admin
 */

namespace Employees\Admin;
use Employees\Fields as Fields;

class Metabox_Job_Title extends \Employees\Admin\Metabox {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 		1.0.0
	 * @param 		Fields_Admin 		$fields 		Instance of Fields_Admin()
	 */
	public function __construct( Fields\Fields_Admin $fields ) {

		$this->set_fields( $fields );
		$this->set_nonce( 'nonce_employee_title' );

		$args_field1['attributes']['id'] 			= 'job-title';
		$args_field1['attributes']['type'] 			= 'text';
		$args_field1['properties']['label'] 		= esc_html__( 'Job Title', 'employees' );
		$check_fields[] 							= array( 'job-title', 'text', '', 'field_text', $args_field1 );

		$this->set_check_fields( $check_fields );
		$this->set_post_type( 'employee' );

	} // __construct()

	/**
	 * Registers all the WordPress hooks and filters for this class.
	 */
	public function hooks() {

		add_action( 'add_meta_boxes', 			array( $this, 'add_metaboxes' ), 10, 2 );
		add_action( 'save_post', 				array( $this, 'validate_meta' ), 10, 2 );
		add_action( 'edit_form_after_title',	array( $this, 'promote_metaboxes' ), 10, 1 );
		add_action( 'add_meta_boxes', 			array( $this, 'set_meta' ), 1, 2 );
		add_action( 'rest_api_init', 			array( $this, 'register_meta_fields' ), 99 );

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
			'employee_job_title',
			esc_html__( 'Job Title', 'employees' ),
			array( $this, 'metabox' ),
			'employee',
			'top',
			'default',
			array(
				//
			)
		);

	} // add_metaboxes()

} // class
