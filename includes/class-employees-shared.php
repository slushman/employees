<?php

/**
 * Shared methods
 *
 * @link 		http://slushman.com
 * @since 		1.0.0
 *
 * @package		Employees
 * @subpackage 	Employees/includes
 */

class Employees_Shared {

	/**
	 * The plugin options.
	 *
	 * @since 		1.0.0
	 * @access 		private
	 * @var 		string 			$options    The plugin options.
	 */
	private $options;

	/**
	 * The ID of this plugin.
	 *
	 * @since 		1.0.0
	 * @access 		private
	 * @var 		string 			$plugin_name 		The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since 		1.0.0
	 * @access 		private
	 * @var 		string 			$version 		The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 		1.0.0
	 * @var 		string 			$plugin_name 			The name of this plugin.
	 * @var 		string 			$version 				The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	} // __construct()

	/**
	 * Returns a post object of employee posts
	 *
	 * Check for cache first, if it exists, returns that
	 * If not, gets the ordered posts, collects their IDS,
	 * sets those as post__not_in for the unordered posts.
	 * Gets the unordered posts. Merges both into one array
	 *
	 * @param 	array 		$params 			An array of optional parameters
	 * @param 	string 		$cache 				String to create a new cache of posts
	 *
	 * @return 	object 		A post object
	 */
	public function get_employees( $params = array(), $cache = '' ) {

		$return 	= '';
		$cache_name = $this->plugin_name . '_posts';

		if ( ! empty( $cache ) ) {

			$cache_name = $this->plugin_name . $cache . '_posts';

		}

		$return = wp_cache_get( $cache_name, $this->plugin_name . '_posts' );

		if ( false === $return ) {

			$options 				= get_option( $this->plugin_name . '-options' );
			$ordered 				= $this->get_ordered_employees( $params );
			$ordered_ids 			= $this->get_ids( $ordered );
			$params['post__not_in'] = $ordered_ids;
			$unordered 				= $this->get_unordered_employees( $params );

			if ( is_wp_error( $ordered )
				&& empty( $ordered )
				&& is_wp_error( $unordered )
				&& empty( $unordered ) ) {

				$options 	= get_option( $this->plugin_name . '-options' );
				$return 	= $options['none-found-message'];

			} else {

				if ( empty( $ordered->posts ) && ! empty( $unordered->posts ) ) {

					$query = $unordered->posts;

				} elseif ( ! empty( $ordered->posts ) && empty( $unordered->posts ) ) {

					$query = $ordered->posts;

				} else {

					$query = array_merge( $ordered->posts, $unordered->posts );

				}

				wp_cache_set( $cache_name, $query, $this->plugin_name . '_posts', 5 * MINUTE_IN_SECONDS );

				$return = $query;

			}

		}

		return $return;

	} // get_employees()

	/**
	 * Returns an array of post IDS from the results of WP_Query
	 *
	 * @param 	array 		$post_objects 		An array of post objects
	 * @return 	array 							An array of post IDs
	 */
	private function get_ids( $post_objects ) {

		if ( empty( $post_objects->posts ) ) { return; }

		$return = array();

		foreach ( $post_objects->posts as $post ) {

			if ( empty( $post ) ) { continue; }

			$return[] = $post->ID;

		} // foreach

		return $return;

	} // get_ids()

	/**
	 * Returns a WP_Query for employees with display-order
	 *
	 * @param 	array 		$params 			Array of parameters for WP_Query
	 * @return 	array 							Results of WP_Query
	 */
	private function get_ordered_employees( $params ) {

		$params['meta_key'] = 'display-order';
		$params['orderby'] 	= 'meta_value_num title';
		$args 				= $this->set_args( $params );

		if ( empty( $args ) ) { return FALSE; }

		apply_filters( $this->plugin_name . '-get-ordered-employees-query-args', $args );

		$query = new WP_Query( $args );

		return $query;

	} // get_ordered_employees()

	/**
	 * Returns a WP_Query for employees without display-order
	 *
	 * @param 	array 		$params 			Array of parameters for WP_Query
	 * @return 	array 							Results of WP_Query
	 */
	private function get_unordered_employees( $params ) {

		$params['orderby'] 	= 'title';
		$args 				= $this->set_args( $params );

		if ( empty( $args ) ) { return FALSE; }

		apply_filters( $this->plugin_name . '-get-unordered-employees-query-args', $args );

		$query = new WP_Query( $args );

		return $query;

	} // get_unordered_employees()

	/**
	 * Sets the args array for a WP_Query call
	 *
	 * @param 	array 		$params 		Array of shortcode parameters
	 * @return 	array 						An array of parameters for WP_Query
	 */
	private function set_args( $params ) {

		if ( empty( $params ) ) { return; }

		$args = array();

		$args['no_found_rows']				= true;
		$args['order'] 						= $params['order'];
		$args['post_type'] 					= 'employee';
		$args['post_status'] 				= 'publish';
		$args['posts_per_page'] 			= absint( $params['quantity'] );
		$args['update_post_term_cache'] 	= false;

		unset( $params['order'] );
		unset( $params['quantity'] );
		unset( $params['listview'] );
		unset( $params['singleview'] );

		if ( empty( $params ) ) { return $args; }

		if ( ! empty( $params['department'] ) ) {

			$args['tax_query'][]['field'] 		= 'slug';
			$args['tax_query'][]['taxonomy'] 	= 'department';
			$args['tax_query'][]['terms'] 		= $params['department'];

			unset( $args['department'] );

		}

		if ( empty( $params ) ) { return $args; }

		foreach ( $params as $key => $value ) {

			$args[$key] = $value;

		}

		return $args;

	} // set_args()

} // class