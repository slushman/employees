<?php

/**
 * Defines the methods for working with WP_Query.
 *
 * @link 		http://slushman.com
 * @since 		1.5
 *
 * @package		Employees\Includes
 */

namespace Employees\Includes;

class Query {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 		1.0.0
	 */
	public function __construct() {} // __construct()

	/**
	 * Returns a cache name based on the attributes.
	 *
	 * @param 	array 		$args 			The WP_Query args
	 * @param   string 		$cache 			Optional cache name
	 * @return 	string 						The cache name
	 */
	private function get_cache_name( $args, $cache = '' ) {

		if ( empty( $args ) ) { return ''; }

		$return = 'employees_list';

		if ( ! empty( $cache ) ) {

			$return = 'employees_' . $cache . '_employees';

		}

		if ( ! empty( $args['department'] ) ) {

			$return = 'employees_' . $cache . $args['department'] . '_employees';

		}

		return $return;

	} // get_cache_name()

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
	 * Returns a WP_Query for employees with displayOrder
	 *
	 * @param 	array 		$params 			Array of parameters for WP_Query
	 * @return 	array 							Results of WP_Query
	 */
	private function get_ordered_employees( $params ) {

		$params['orderby'] 					= 'meta_value_num title';
		$params['meta_query'][0]['compare'] = '>';
		$params['meta_query'][0]['key'] 	= 'displayOrder';
		$params['meta_query'][0]['value'] 	= 0;
		$args 								= $this->set_args( $params );

		if ( empty( $args ) ) { return FALSE; }

		/**
		 * The employees_ordered_query_args filter.
		 * 
		 * @param 	array 		$args	The order employees args.
		 */
		$args 	= apply_filters( 'employees_list_ordered_query_args', $args );
		$query 	= new \WP_Query( $args );

		return $query;

	} // get_ordered_employees()

	/**
	 * Returns a WP_Query for employees without displayOrder
	 *
	 * @param 	array 		$params 			Array of parameters for WP_Query
	 * @return 	array 							Results of WP_Query
	 */
	private function get_unordered_employees( $params ) {

		$params['orderby'] 	= 'title';
		$args 				= $this->set_args( $params );

		if ( empty( $args ) ) { return FALSE; }

		/**
		 * The employees_ordered_query_args filter.
		 * 
		 * @param 	array 		$args	The order employees args.
		 */
		$args 	= apply_filters( 'employees_list_unordered_query_args', $args );
		$query 	= new \WP_Query( $args );

		return $query;

	} // get_unordered_employees()

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
	public function query( $params = array(), $cache = '' ) {

		$return 	= '';
		$cache_name = $this->get_cache_name( $params, $cache );
		$cachedList = wp_cache_get( $cache_name, 'employees_posts' );

		if ( false !== $cachedList ) { return $cachedList; }

		$ordered 				= $this->get_ordered_employees( $params );
		$ordered_ids 			= $this->get_ids( $ordered );
		$params['post__not_in'] = $ordered_ids;
		$unordered 				= $this->get_unordered_employees( $params );

		if ( is_wp_error( $ordered )
			&& empty( $ordered )
			&& is_wp_error( $unordered )
			&& empty( $unordered )
		) {

			$options = get_option( EMPLOYEES_SETTINGS );

			return $options['none-found-message'];

		} 

		if ( empty( $ordered->posts ) && ! empty( $unordered->posts ) ) {

			$query = $unordered->posts;

		} elseif ( ! empty( $ordered->posts ) && empty( $unordered->posts ) ) {

			$query = $ordered->posts;

		} else {

			$query = array_merge( $ordered->posts, $unordered->posts );

		}

		wp_cache_set( $cache_name, $query, 'employees_posts', 5 * MINUTE_IN_SECONDS );

		return $query;

	} // query()

	/**
	 * Sets the args array for a WP_Query call
	 *
	 * @param 	array 		$params 		Array of shortcode parameters
	 * @return 	array 						An array of parameters for WP_Query
	 */
	private function set_args( $params ) {

		if ( empty( $params ) ) { return; }

		$args = array();

		$args['no_found_rows']			= true;
		$args['order'] 					= $params['order'];
		$args['post_type'] 				= 'employee';
		$args['post_status'] 			= 'publish';
		$args['posts_per_page'] 		= absint( $params['quantity'] );
		$args['update_post_term_cache'] = false;

		unset( $params['order'] );
		unset( $params['quantity'] );
		unset( $params['listview'] );
		unset( $params['singleview'] );

		if ( empty( $params ) ) { return $args; }

		if ( ! empty( $params['department'] ) ) {

			$args['tax_query'][0]['field'] 		= 'slug';
			$args['tax_query'][0]['taxonomy'] 	= 'department';
			$args['tax_query'][0]['terms'] 		= $params['department'];

			unset( $args['department'] );

		}

		$args = wp_parse_args( $params, $args );

		return $args;

	} // set_args()

} // class
