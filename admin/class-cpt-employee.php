<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines a custom post type and other related functionality.
 *
 * @link       http://slushman.com
 * @since      1.0.0
 *
 * @package    Employees\Admin
 * @author     Slushman <chris@slushman.com>
 */

namespace Employees\Admin;

class CPT_Employee {

	/**
	 * Constructor
	 */
	public function __construct() {} // __construct()

	/**
	 * Registers all the WordPress hooks and filters related to this class.
	 *
	 * @hooked 		init
	 * @since 		1.5
	 */
	public function hooks () {

		add_action( 'wp_loaded', array( $this, 'new_cpt_employee' ) );
		add_action( 'wp_loaded', array( $this, 'add_image_sizes' ) );
		add_action( 'after_switch_theme', array( $this, 'flush_rewrites' ) );

	} // hooks()

	/**
	 * Registers additional image sizes.
	 * 
	 * @hooked 		wp_loaded
	 * @since 		1.0.0
	 */
	public function add_image_sizes() {

		add_image_size( 'tiny-headshot', 75, 75, true );

	} // add_image_sizes()

	/**
	 * Flushes the rewrite rules.
	 *
	 * @hooked 		after_switch_theme
	 * @since 		1.5
	 */
	public function flush_rewrites() {

		$this->new_cpt_employee();

		flush_rewrite_rules();

	} // flush_rewrites()

	/**
	 * Returns the options for the employee custom post type.
	 *
	 * @since 		1.5
	 * @return 		array 		The employee custom post type options array.
	 */
	public function get_cpt_employee_options() {

		$opts = array();

		$opts['menu_icon']								= 'dashicons-groups';
		$opts['public']									= TRUE;
		$opts['show_in_rest'] 							= TRUE;
		$opts['supports'] 								= array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' );
		$opts['templates'] 								= '';

		$opts['labels']['add_new']						= esc_html__( 'Add New Employee', 'employees' );
		$opts['labels']['add_new_item']					= esc_html__( 'Add New Employee', 'employees' );
		$opts['labels']['all_items']					= esc_html__( 'Employees', 'employees' );
		$opts['labels']['archives']						= esc_html__( 'Employee Archives', 'employees' );
		$opts['labels']['attributes']					= esc_html__( 'Employee Attributes', 'employees' );
		$opts['labels']['edit_item']					= esc_html__( 'Edit Employee' , 'employees');
		$opts['labels']['featured_image']				= esc_html__( 'Headshot', 'employees' );
		$opts['labels']['filter_items_list']			= esc_html__( 'Filter employees list', 'employees' );
		$opts['labels']['insert_into_item']				= esc_html__( 'Insert into employees', 'employees' );
		$opts['labels']['items_list']					= esc_html__( 'Employees list', 'employees' );
		$opts['labels']['items_list_navigation']		= esc_html__( 'Employees list navigation', 'employees' );
		$opts['labels']['menu_name']					= esc_html__( 'Employees', 'employees' );
		$opts['labels']['name']							= esc_html__( 'Employees', 'employees' );
		$opts['labels']['name_admin_bar']				= esc_html__( 'Employee', 'employees' );
		$opts['labels']['new_item']						= esc_html__( 'New Employee', 'employees' );
		$opts['labels']['not_found']					= esc_html__( 'No employees found', 'employees' );
		$opts['labels']['not_found_in_trash']			= esc_html__( 'No employees found in trash', 'employees' );
		$opts['labels']['parent_item_colon']			= esc_html__( 'Parent Employees: ', 'employees' );
		$opts['labels']['remove_featured_image'] 		= esc_html__( 'Remove headshot', 'employees' );
		$opts['labels']['search_items']					= esc_html__( 'Search Employees', 'employees' );
		$opts['labels']['set_featured_image']			= esc_html__( 'Set headshot', 'employees' );
		$opts['labels']['singular_name']				= esc_html__( 'Uploaded to this employee', 'employees' );
		$opts['labels']['uploaded_to_this_item']		= esc_html__( 'All Employees', 'employees' );
		$opts['labels']['use_featured_image'] 			= esc_html__( 'Use as headshot', 'employees' );
		$opts['labels']['view_item']					= esc_html__( 'View Employee', 'employees' );
		$opts['labels']['view_items']					= esc_html__( 'View Employees', 'employees' );

		/**
		 * The employees_cpt_employee_options filter.
		 * 
		 * @var 		array 		$options 		The CPT options.
		 */
		$options = apply_filters( 'employees_cpt_employee_options', $opts );

		if ( is_array( $options ) ) {

			return $options;

		}

		return FALSE;

	} // get_cpt_employee_options()

	/**
	 * Creates a new custom post type.
	 *
	 * @hooked 		wp_loaded
	 * @since 		1.0.0
	 * @uses 		register_post_type()
	 */
	public function new_cpt_employee() {

		$opts = $this->get_cpt_employee_options();

		register_post_type( 'employee', $opts );

	} // new_cpt_employee()

} // class