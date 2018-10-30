<?php
/**
 * The metabox-specific functionality of the theme.
 *
 * @since 			1.5
 * @package 		Employees\Admin
 */

namespace Employees\Admin;
use Employees\Fields as Fields;

class Metabox_Location extends \Employees\Admin\Metabox {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 		1.0.0
	 */
	public function __construct( Fields\Fields_Admin $fields ) {

		$this->set_fields( $fields );
		$this->set_nonce( 'nonce_employee_location' );

		$metabox_fields = array();

		$field1['attributes']['id'] 	= 'address1';
		$field1['properties']['label'] 	= esc_html__( 'Street Address 1', 'employees' );
		$metabox_fields[] 				= array( 'address1', 'text', '', 'field_text', $field1 );

		$field2['attributes']['id'] 	= 'address2';
		$field2['properties']['label'] 	= esc_html__( 'Street Address 2', 'employees' );
		$metabox_fields[] 				= array( 'address2', 'text', '', 'field_text', $field2 );

		$field3['attributes']['id'] 	= 'city';
		$field3['properties']['label'] 	= esc_html__( 'City', 'employees' );
		$metabox_fields[] 				= array( 'city', 'text', '', 'field_text', $field3 );

		$field4['attributes']['id'] 	= 'state';
		$field4['properties']['label'] 	= esc_html__( 'State', 'employees' );
		$field4['options'][] 			= array( 'value' => 'AL', 'label' => esc_html__( 'Alabama', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'AK', 'label' => esc_html__( 'Alaska', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'AZ', 'label' => esc_html__( 'Arizona', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'AR', 'label' => esc_html__( 'Arkansas', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'CA', 'label' => esc_html__( 'California', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'CO', 'label' => esc_html__( 'Colorado', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'CT', 'label' => esc_html__( 'Connecticut', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'DE', 'label' => esc_html__( 'Delaware', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'DC', 'label' => esc_html__( 'District of Columbia', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'FL', 'label' => esc_html__( 'Florida', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'GA', 'label' => esc_html__( 'Georgia', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'HI', 'label' => esc_html__( 'Hawaii', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'ID', 'label' => esc_html__( 'Idaho', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'IL', 'label' => esc_html__( 'Illinois', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'IN', 'label' => esc_html__( 'Indiana', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'IA', 'label' => esc_html__( 'Iowa', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'KS', 'label' => esc_html__( 'Kansas', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'KY', 'label' => esc_html__( 'Kentucky', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'LA', 'label' => esc_html__( 'Louisiana', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'ME', 'label' => esc_html__( 'Maine', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'MD', 'label' => esc_html__( 'Maryland', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'MA', 'label' => esc_html__( 'Massachusetts', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'MI', 'label' => esc_html__( 'Michigan', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'MN', 'label' => esc_html__( 'Minnesota', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'MS', 'label' => esc_html__( 'Mississippi', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'MO', 'label' => esc_html__( 'Missouri', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'MT', 'label' => esc_html__( 'Montana', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'NE', 'label' => esc_html__( 'Nebraska', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'NV', 'label' => esc_html__( 'Nevada', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'NH', 'label' => esc_html__( 'New Hampshire', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'NJ', 'label' => esc_html__( 'New Jersey', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'NM', 'label' => esc_html__( 'New Mexico', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'NY', 'label' => esc_html__( 'New York', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'NC', 'label' => esc_html__( 'North Carolina', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'ND', 'label' => esc_html__( 'North Dakota', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'OH', 'label' => esc_html__( 'Ohio', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'OK', 'label' => esc_html__( 'Oklahoma', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'OR', 'label' => esc_html__( 'Oregon', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'PA', 'label' => esc_html__( 'Pennsylvania', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'RI', 'label' => esc_html__( 'Rhode Island', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'SC', 'label' => esc_html__( 'South Carolina', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'SD', 'label' => esc_html__( 'South Dakota', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'TN', 'label' => esc_html__( 'Tennessee', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'TX', 'label' => esc_html__( 'Texas', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'UT', 'label' => esc_html__( 'Utah', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'VT', 'label' => esc_html__( 'Vermont', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'VA', 'label' => esc_html__( 'Virginia', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'WA', 'label' => esc_html__( 'Washington', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'WV', 'label' => esc_html__( 'West Virginia', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'WI', 'label' => esc_html__( 'Wisconsin', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'WY', 'label' => esc_html__( 'Wyoming', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'AS', 'label' => esc_html__( 'American Samoa', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'AA', 'label' => esc_html__( 'Armed Forces America (except Canada)', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'AE', 'label' => esc_html__( 'Armed Forces Africa/Canada/Europe/Middle East', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'AP', 'label' => esc_html__( 'Armed Forces Pacific', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'FM', 'label' => esc_html__( 'Federated States of Micronesia', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'GU', 'label' => esc_html__( 'Guam', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'MH', 'label' => esc_html__( 'Marshall Islands', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'MP', 'label' => esc_html__( 'Northern Mariana Islands', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'PR', 'label' => esc_html__( 'Puerto Rico', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'PW', 'label' => esc_html__( 'Palau', 'employees' ) );
		$field4['options'][] 			= array( 'value' => 'VI', 'label' => esc_html__( 'Virgin Islands', 'employees' ) );
		$metabox_fields[] 				= array( 'state', 'select', '', 'field_select', $field4 );

		$field5['attributes']['id'] 	= 'zipCode';
		$field5['properties']['label'] 	= esc_html__( 'Zip Code', 'employees' );
		$metabox_fields[] 				= array( 'zipCode', 'text', '', 'field_text', $field5 );

		$field5['attributes']['id'] 	= 'building';
		$field5['properties']['label'] 	= esc_html__( 'Building', 'employees' );
		$metabox_fields[] 				= array( 'building', 'text', '', 'field_text', $field5 );

		$field5['attributes']['id'] 	= 'officeNumber';
		$field5['properties']['label'] 	= esc_html__( 'Office Number', 'employees' );
		$metabox_fields[] 				= array( 'officeNumber', 'text', '', 'field_text', $field5 );

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
	 * @exits 		If on a Gutenberg page.
	 * @exits 		If not an employee post type.
	 * @hooked 		add_meta_boxes
	 * @since 		1.0.0
	 * @access 		public
	 * @param 		string 			$post_type 		The post type name.
	 * @param 		object 			$post 			The post object.
	 */
	public function add_metaboxes( $post_type, $post ) {

		if ( 'employee' !== $post_type ) { return; }

		add_meta_box(
			'employee_location',
			esc_html__( 'Location Information', 'employees' ),
			array( $this, 'metabox' ),
			'employee',
			'normal',
			'default',
			array(
				'__back_compat_meta_box' => true,
			)
		);

	} // add_metaboxes()

} // class
