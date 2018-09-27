<?php

/**
 * Defines the custom columns functionality for the employee custom post type.
 *
 * @link       http://slushman.com
 * @since      1.0.0
 *
 * @package    Employees\Admin
 * @author     Slushman <chris@slushman.com>
 */

namespace Employees\Admin;

class CPT_Employee_Columns {

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

		add_action( 'manage_employee_posts_custom_column', array( $this, 'column_content' ), 10, 2 );
		add_filter( 'manage_employee_posts_columns', array( $this, 'register_columns' ) );

		// add_action( 'request', array( $this, 'order_sorting' ), 10, 2 );
		// add_filter( 'manage_edit-employee_sortable_columns', array( $this, 'sortable_columns' ), 10, 1 );

		//add_action( 'admin_print_footer_scripts', array( $this, 'heartbeat_footer_js' ), 20 );

	} //hooks()

	/**
	 * Populates the custom columns with content.
	 *
	 * @hooked 		manage_employee_posts_custom_column
	 * @since 		1.0.0
	 * @param 		string 		$column_name 		The name of the column
	 * @param 		int 		$post_id 			The post ID
	 * @return 		string 							The column content
	 */
	public function column_content( $column_name, $post_id ) {

		if ( empty( $post_id ) ) { return; }

		if ( 'departments' === $column_name ) {

			$terms = get_the_terms( $post_id, 'department', array() );

			if ( empty( $terms ) || ! is_array( $terms ) ) { return; }

			foreach ( $terms as $term ) {

				$items[] = $term->name;

			}

			echo implode( ', ', $items );

		}

		if ( 'display-order' === $column_name ) {

			$order = get_post_meta( $post_id, 'display-order', true );

			echo $order;

		}

		if ( 'headshot' === $column_name ) {

			$thumb = get_the_post_thumbnail( $post_id, 'tiny-headshot' );

			echo $thumb;

		}

		if ( 'job-title' === $column_name ) {

			$job_title = get_post_meta( $post_id, 'job-title', true );

			echo $job_title;

		}	

		if ( 'name-first' === $column_name ) {

			$first = get_post_meta( $post_id, 'name-first', true );

			echo '<a href="' . esc_url( get_edit_post_link( $post_id ) ) .  '">';
			echo $first;
			echo '</a>';

		}

		if ( 'name-last' === $column_name ) {

			$last = get_post_meta( $post_id, 'name-last', true );

			echo '<a href="' . esc_url( get_edit_post_link( $post_id ) ) .  '">';
			echo $last;
			echo '</a>';

		}

	} // column_content()

	/**
	 * no idea.
	 */
	public function heartbeat_footer_js() {

		global $pagenow;

		if ( '' !== $pagenow ) { return; }

		?><script>

			(function($) {

				$( document ).on( 'heartbeat-send', function( e, data ) {

					data['employees_beat'] = 'autosave_name';

				});

				$( document ).on( 'heartbeat-tick', function( e, data ) {

					if ( ! data['honorific'] && ! data['first-name'] && ! data['last-name'] ) { return; }

					console.log( data['honorific'] );
					console.log( data['first-name'] );
					console.log( data['last-name'] );

				});

			})( jQuery );

		</script><?php

	} // heartbeat_footer_js()

	/**
	 * Sorts the employee admin list by the display order
	 *
	 * @hooked 		request
	 * @since 		1.0.0
	 * @param 		array 		$vars 			The current query vars array
	 * @return 		array 						The modified query vars array
	 */
	public function order_sorting( $vars ) {

		if ( empty( $vars ) ) { return $vars; }
		if ( ! is_admin() ) { return $vars; }
		if ( ! isset( $vars['post_type'] ) || 'employee' !== $vars['post_type'] ) { return $vars; }

		if ( isset( $vars['orderby'] ) && 'display-order' === $vars['orderby'] ) {

			$vars = array_merge( $vars, array(
				'meta_key' => 'display-order',
				'orderby' => 'meta_value_num'
			) );

		}

		if ( isset( $vars['orderby'] ) && 'name-first' === $vars['orderby'] ) {

			$vars = array_merge( $vars, array(
				'meta_key' => 'name-first',
				'orderby' => 'meta_value'
			) );

		}

		if ( isset( $vars['orderby'] ) && 'name-last' === $vars['orderby'] ) {

			$vars = array_merge( $vars, array(
				'meta_key' => 'name-last',
				'orderby' => 'meta_value'
			) );

		}

		return $vars;

	} // order_sorting()

	/**
	 * Registers additional columns for the Employees admin listing
	 * and reorders the columns.
	 *
	 * @hooked 		manage_employee_posts_columns
	 * @since 		1.0.0
	 * @param 		array 		$columns 		The current columns
	 * @return 		array 						The modified columns
	 */
	public function register_columns( $columns ) {

		$new['cb'] 				= '<input type="checkbox" />';
		$new['headshot'] 		= __( 'Headshot', 'employees' );
		$new['name-first'] 		= __( 'First Name', 'employees' );
		$new['name-last'] 		= __( 'Last Name', 'employees' );
		$new['job-title'] 		= __( 'Job Title', 'employees' );
		$new['departments'] 	= __( 'Departments', 'employees' );
		$new['display-order'] 	= __( 'Display Order', 'employees' );
		$new['date'] 			= __( 'Date' );

		return $new;

	} // register_columns()

	/**
	 * Registers sortable columns
	 *
	 * @hooked 		manage_edit-employee_sortable_columns
	 * @since 		1.0.0
	 * @param 		array 		$sortables 			The current sortable columns
	 * @return 		array 							The modified sortable columns
	 */
	public function sortable_columns( $sortables ) {

		$sortables['name-first'] 	= 'display-order';
		$sortables['name-last'] 	= 'display-order';
		$sortables['display-order'] = 'display-order';

		return $sortables;

	} // sortable_columns()

} // class