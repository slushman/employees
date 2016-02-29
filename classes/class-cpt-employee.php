<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines a custom post type and other related functionality.
 *
 * @link       http://slushman.com
 * @since      1.0.0
 *
 * @package    Employees
 * @subpackage Employees/classes
 * @author     Slushman <chris@slushman.com>
 */
class Employees_CPT_Employee {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Constructor
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Registers additional image sizes
	 */
	public function add_image_sizes() {

		add_image_size( 'tiny-headshot', 75, 75, true );

	} // add_image_sizes()

	/**
	 * Changes the placeholder text for the Custom Post Type title field
	 *
	 * @param 	string 	$title 			The current palceholder text
	 * @return 	string 					The modified placeholder text
	 */
	function change_title_text( $title ) {

		$screen = (object) get_current_screen();

		if  ( 'employee' == $screen->post_type ) {

			$title = esc_html__( 'Created from the Title, First, and Last Name fields below.', 'employees' );

		}

		apply_filters( $this->plugin_name . '-title-text', $title );

		return $title;

	} // change_title_text()

	/**
	 * Populates the custom columns with content.
	 *
	 * @param 		string 		$column_name 		The name of the column
	 * @param 		int 		$post_id 			The post ID
	 *
	 * @return 		string 							The column content
	 */
	public function employee_column_content( $column_name, $post_id  ) {

		if ( empty( $post_id ) ) { return; }

		if ( 'job-title' === $column_name ) {

			$job_title = get_post_meta( $post_id, 'job-title', true );

			echo $job_title;

		}

		if ( 'display-order' === $column_name ) {

			$order = get_post_meta( $post_id, 'display-order', true );

			echo $order;

		}

		if ( 'first-name' === $column_name ) {

			$first = get_post_meta( $post_id, 'first-name', true );

			echo '<a href="' . esc_url( get_edit_post_link( $post_id ) ) .  '">';
			echo $first;
			echo '</a>';

		}

		if ( 'headshot' === $column_name ) {

			$thumb = get_the_post_thumbnail( $post_id, 'tiny-headshot' );

			echo $thumb;

		}

		if ( 'last-name' === $column_name ) {

			$last = get_post_meta( $post_id, 'last-name', true );

			echo '<a href="' . esc_url( get_edit_post_link( $post_id ) ) .  '">';
			echo $last;
			echo '</a>';

		}

	} // employee_column_content()

	/**
	 * Sorts the employee admin list by the display order
	 *
	 * @param 		array 		$vars 			The current query vars array
	 * @return 		array 						The modified query vars array
	 */
	public function employee_order_sorting( $vars ) {

		if ( empty( $vars ) ) { return $vars; }
		if ( ! is_admin() ) { return $vars; }
		if ( ! isset( $vars['post_type'] ) || 'employee' !== $vars['post_type'] ) { return $vars; }

		if ( isset( $vars['orderby'] ) && 'display-order' === $vars['orderby'] ) {

			$vars = array_merge( $vars, array(
				'meta_key' => 'display-order',
				'orderby' => 'meta_value_num'
			) );

		}

		if ( isset( $vars['orderby'] ) && 'first-name' === $vars['orderby'] ) {

			$vars = array_merge( $vars, array(
				'meta_key' => 'first-name',
				'orderby' => 'meta_value'
			) );

		}

		if ( isset( $vars['orderby'] ) && 'last-name' === $vars['orderby'] ) {

			$vars = array_merge( $vars, array(
				'meta_key' => 'last-name',
				'orderby' => 'meta_value'
			) );

		}

		return $vars;

	} // employee_order_sorting()

	/**
	 * Registers additional columns for the Employees admin listing
	 * and reorders the columns.
	 *
	 * @param 		array 		$columns 		The current columns
	 *
	 * @return 		array 						The modified columns
	 */
	public function employee_register_columns( $columns ) {

		$new['cb'] 				= '<input type="checkbox" />';
		$new['headshot'] 		= __( 'Headshot', 'employees' );
		$new['first-name'] 		= __( 'First Name', 'employees' );
		$new['last-name'] 		= __( 'Last Name', 'employees' );
		$new['job-title'] 		= __( 'Job Title', 'employees' );
		$new['display-order'] 	= __( 'Display Order', 'employees' );
		$new['date'] 			= __( 'Date' );

		return $new;

	} // employee_register_columns()

	/**
	 * Registers sortable columns
	 *
	 * @param 		array 		$sortables 			The current sortable columns
	 * @return 		array 							The modified sortable columns
	 */
	public function employee_sortable_columns( $sortables ) {

		$sortables['first-name'] = 'display-order';
		$sortables['last-name'] = 'display-order';
		$sortables['display-order'] = 'display-order';

		return $sortables;

	} // employee_sortable_columns()

	public function employees_heartbeat_footer_js() {

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

	} // employees_heartbeat_footer_js()

	/**
	 * Creates a new custom post type
	 *
	 * @uses   register_post_type()
	 */
	public static function new_cpt_employee() {

		$cap_type 	= 'post';
		$plural 	= 'Employees';
		$single 	= 'Employee';
		$cpt_name 	= 'employee';

		$opts['can_export']								= TRUE;
		$opts['capability_type']						= $cap_type;
		$opts['description']							= '';
		$opts['exclude_from_search']					= FALSE;
		$opts['has_archive']							= FALSE;
		$opts['hierarchical']							= FALSE;
		$opts['map_meta_cap']							= TRUE;
		$opts['menu_icon']								= 'dashicons-groups';
		$opts['menu_position']							= 25;
		$opts['public']									= TRUE;
		$opts['publicly_querable']						= TRUE;
		$opts['query_var']								= TRUE;
		$opts['register_meta_box_cb']					= '';
		$opts['rewrite']								= FALSE;
		$opts['show_in_admin_bar']						= TRUE;
		$opts['show_in_menu']							= TRUE;
		$opts['show_in_nav_menu']						= TRUE;
		$opts['show_ui']								= TRUE;
		$opts['supports']								= array( 'title', 'editor', 'thumbnail' );
		$opts['taxonomies']								= array();

		$opts['capabilities']['delete_others_posts']	= "delete_others_{$cap_type}s";
		$opts['capabilities']['delete_post']			= "delete_{$cap_type}";
		$opts['capabilities']['delete_posts']			= "delete_{$cap_type}s";
		$opts['capabilities']['delete_private_posts']	= "delete_private_{$cap_type}s";
		$opts['capabilities']['delete_published_posts']	= "delete_published_{$cap_type}s";
		$opts['capabilities']['edit_others_posts']		= "edit_others_{$cap_type}s";
		$opts['capabilities']['edit_post']				= "edit_{$cap_type}";
		$opts['capabilities']['edit_posts']				= "edit_{$cap_type}s";
		$opts['capabilities']['edit_private_posts']		= "edit_private_{$cap_type}s";
		$opts['capabilities']['edit_published_posts']	= "edit_published_{$cap_type}s";
		$opts['capabilities']['publish_posts']			= "publish_{$cap_type}s";
		$opts['capabilities']['read_post']				= "read_{$cap_type}";
		$opts['capabilities']['read_private_posts']		= "read_private_{$cap_type}s";

		$opts['labels']['add_new']						= esc_html__( "Add New {$single}", 'employees' );
		$opts['labels']['add_new_item']					= esc_html__( "Add New {$single}", 'employees' );
		$opts['labels']['all_items']					= esc_html__( $plural, 'employees' );
		$opts['labels']['edit_item']					= esc_html__( "Edit {$single}" , 'employees');
		$opts['labels']['menu_name']					= esc_html__( $plural, 'employees' );
		$opts['labels']['name']							= esc_html__( $plural, 'employees' );
		$opts['labels']['name_admin_bar']				= esc_html__( $single, 'employees' );
		$opts['labels']['new_item']						= esc_html__( "New {$single}", 'employees' );
		$opts['labels']['not_found']					= esc_html__( "No {$plural} Found", 'employees' );
		$opts['labels']['not_found_in_trash']			= esc_html__( "No {$plural} Found in Trash", 'employees' );
		$opts['labels']['parent_item_colon']			= esc_html__( "Parent {$plural} :", 'employees' );
		$opts['labels']['search_items']					= esc_html__( "Search {$plural}", 'employees' );
		$opts['labels']['singular_name']				= esc_html__( $single, 'employees' );
		$opts['labels']['view_item']					= esc_html__( "View {$single}", 'employees' );

		$opts['rewrite']['ep_mask']						= EP_PERMALINK;
		$opts['rewrite']['feeds']						= FALSE;
		$opts['rewrite']['pages']						= TRUE;
		$opts['rewrite']['slug']						= esc_html__( $cpt_name, 'employees' );
		$opts['rewrite']['with_front']					= TRUE;

		$opts = apply_filters( 'employees-cpt-employee-options', $opts );

		register_post_type( $cpt_name, $opts );

	} // new_cpt_employee()

} // class
