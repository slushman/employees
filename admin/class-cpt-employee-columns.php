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

		$postMeta = get_post_meta( $post_id );

		if ( 'departments' === $column_name ) {

			$terms = get_the_terms( $post_id, 'department', array() );

			if ( empty( $terms ) || ! is_array( $terms ) ) { return; }

			foreach ( $terms as $term ) {

				$items[] = $term->name;

			}

			echo implode( ', ', $items );

		}

		if ( 'displayOrder' === $column_name ) {

			echo empty( $postMeta['displayOrder'][0] ) ? '' : $postMeta['displayOrder'][0];

		}

		if ( 'headshot' === $column_name ) {

			$thumb = get_the_post_thumbnail( $post_id, 'tiny-headshot' );

			echo $thumb;

		}

		if ( 'jobTitle' === $column_name ) {

			echo empty( $postMeta['jobTitle'][0] ) ? '' : $postMeta['jobTitle'][0];

		}	

		if ( 'nameFirst' === $column_name ) {

			echo '<a href="' . esc_url( get_edit_post_link( $post_id ) ) .  '">';
			echo empty( $postMeta['nameFirst'][0] ) ? '' : $postMeta['nameFirst'][0];
			echo '</a>';

		}

		if ( 'nameLast' === $column_name ) {

			echo '<a href="' . esc_url( get_edit_post_link( $post_id ) ) .  '">';
			echo empty( $postMeta['nameLast'][0] ) ? '' : $postMeta['nameLast'][0];
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

					if ( ! data['prefix'] && ! data['firstName'] && ! data['lastName'] ) { return; }

					console.log( data['prefix'] );
					console.log( data['firstName'] );
					console.log( data['lastMame'] );

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

		if ( isset( $vars['orderby'] ) && 'displayOrder' === $vars['orderby'] ) {

			$vars = array_merge( $vars, array(
				'meta_key' => 'displayOrder',
				'orderby' => 'meta_value_num'
			) );

		}

		if ( isset( $vars['orderby'] ) && 'nameFirst' === $vars['orderby'] ) {

			$vars = array_merge( $vars, array(
				'meta_key' => 'nameFirst',
				'orderby' => 'meta_value'
			) );

		}

		if ( isset( $vars['orderby'] ) && 'nameLast' === $vars['orderby'] ) {

			$vars = array_merge( $vars, array(
				'meta_key' => 'nameLast',
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
		$new['nameFirst'] 		= __( 'First Name', 'employees' );
		$new['nameLast'] 		= __( 'Last Name', 'employees' );
		$new['jobTitle'] 		= __( 'Job Title', 'employees' );
		$new['departments'] 	= __( 'Departments', 'employees' );
		$new['displayOrder'] 	= __( 'Display Order', 'employees' );
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

		$sortables['nameFirst'] 	= 'nameFirst';
		$sortables['nameLast'] 		= 'nameLast';
		$sortables['displayOrder'] 	= 'displayOrder';

		return $sortables;

	} // sortable_columns()

} // class