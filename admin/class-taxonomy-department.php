<?php

/**
 * Defines a taxonomy and other related functionality.
 *
 * @link       http://slushman.com
 * @since      1.0.0
 *
 * @package    Employees\Admin
 * @author     Slushman <chris@slushman.com>
 */

namespace Employees\Admin;

class Taxonomy_Department {

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

		add_action( 'wp_loaded', array( $this, 'new_taxonomy_department' ) );
		add_action( 'after_switch_theme', array( $this, 'flush_rewrites' ) );

	} // hooks()

	/**
	 * Flushes the rewrite rules.
	 *
	 * @hooked 		after_switch_theme
	 * @since 		1.5
	 */
	public function flush_rewrites() {

		$this->new_taxonomy_department();

		flush_rewrite_rules();

	} // flush_rewrites()

	/**
	 * Returns the options for the taxonomy.
	 * 
	 * @since 		1.0.0
	 * @return 		array 		The taxonomy options.
	 */
	public function get_taxonomy_department_options() {

		$opts['hierarchical']							= TRUE;
		$opts['public']									= TRUE;
		$opts['show_in_rest'] 							= TRUE;

		$opts['labels']['add_new_item'] 				= esc_html__( 'Add New Department', 'employees' );
		$opts['labels']['add_or_remove_items'] 			= esc_html__( 'Add or remove departments', 'employees' );
		$opts['labels']['all_items'] 					= esc_html__( 'Departments', 'employees' );
		$opts['labels']['back_to_items'] 				= esc_html__( 'Back to departments', 'employees' );
		$opts['labels']['choose_from_most_used'] 		= esc_html__( 'Choose from most used departments', 'employees' );
		$opts['labels']['edit_item'] 					= esc_html__( 'Edit Department' , 'employees');
		$opts['labels']['items_list_navigation'] 		= esc_html__( 'Departments list navigation', 'employees' );
		$opts['labels']['items_list'] 					= esc_html__( 'Departments list', 'employees' );
		$opts['labels']['menu_name'] 					= esc_html__( 'Departments', 'employees' );
		$opts['labels']['name'] 						= esc_html__( 'Departments', 'employees' );
		$opts['labels']['new_item_name'] 				= esc_html__( 'New Department Name', 'employees' );
		$opts['labels']['no_terms'] 					= esc_html__( 'No departments', 'employees' );
		$opts['labels']['not_found'] 					= esc_html__( 'No Departments Found', 'employees' );
		$opts['labels']['parent_item'] 					= esc_html__( 'Parent Department', 'employees' );
		$opts['labels']['parent_item_colon'] 			= esc_html__( 'Parent Department:', 'employees' );
		$opts['labels']['popular_items'] 				= esc_html__( 'Popular Departments', 'employees' );
		$opts['labels']['search_items'] 				= esc_html__( 'Search Departments', 'employees' );
		$opts['labels']['separate_items_with_commas'] 	= esc_html__( 'Separate departments with commas', 'employees' );
		$opts['labels']['singular_name'] 				= esc_html__( 'Department', 'employees' );
		$opts['labels']['update_item'] 					= esc_html__( 'Update Department', 'employees' );
		$opts['labels']['view_item'] 					= esc_html__( 'View Department', 'employees' );

		/**
		 * The employees_taxonomy_department_options filter.
		 * 
		 * @var 		array 		$opts 		The taxonomy options.
		 */
		$options = apply_filters( 'employees_taxonomy_department_options', $opts );

		if ( is_array( $options ) ) {

			return $options;

		}

		return FALSE;

	} // get_taxonomy_department_options()

	/**
	 * Creates a new taxonomy for a custom post type
	 *
	 * @hooked 		wp_loaded
	 * @since 		1.0.0
	 * @uses 		register_taxonomy()
	 */
	public function new_taxonomy_department() {

		$opts = $this->get_taxonomy_department_options();

		register_taxonomy( 'department', 'employee', $opts );

	} // new_taxonomy_department()

} // class