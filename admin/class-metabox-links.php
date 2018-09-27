<?php
/**
 * The metabox-specific functionality of the theme.
 *
 * @since 			1.5
 * @package 		Employees\Admin
 */

namespace Employees\Admin;
use Employees\Fields as Fields;

class Metabox_Links extends \Employees\Admin\Metabox {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 		1.0.0
	 */
	public function __construct( Fields\Fields_Admin $fields ) {

		$this->set_fields( $fields );
		$this->set_nonce( 'nonce_employee_links' );

		$check_fields = array();
		$links 	= array();
		$links[] = array( 'facebook', __( 'Facebook', 'employees' ) );
		$links[] = array( 'flickr', __( 'Flickr', 'employees' ) );
		$links[] = array( 'github', __( 'GitHub', 'employees' ) );
		$links[] = array( 'google', __( 'Google+', 'employees' ) );
		$links[] = array( 'instagram', __( 'Instagram', 'employees' ) );
		$links[] = array( 'linkedin', __( 'LinkedIn', 'employees' ) );
		$links[] = array( 'medium', __( 'Medium', 'employees' ) );
		$links[] = array( 'pinterest', __( 'Pinterest', 'employees' ) );
		$links[] = array( 'tumblr', __( 'tumblr', 'employees' ) );
		$links[] = array( 'twitter', __( 'Twitter', 'employees' ) );
		$links[] = array( 'website', __( 'Website', 'employees' ) );
		$links[] = array( 'wordpress', __( 'WordPress', 'employees' ) );

		foreach ( $links as $link ) {

			$field_args 						= array();
			$field_args['attributes'] 			= array();
			$field_args['properties'] 			= array();

			$field_args['attributes']['id'] 	= 'url-' . $link[0];
			$field_args['attributes']['type'] 	= 'url';
			$field_args['properties']['label'] 	= $link[1];

			array_push( $check_fields, array( 'url-' . $link[0], 'url', '', 'field_text', $field_args ) );
			unset( $field_args );

		} // foreach

		$this->set_check_fields( $check_fields );
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
			'employee_links',
			esc_html__( 'Links', 'employees' ),
			array( $this, 'metabox' ),
			'employee',
			'side',
			'low',
			array()
		);

	} // add_metaboxes()

} // class
