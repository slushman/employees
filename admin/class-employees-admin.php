<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://slushman.com
 * @since      1.0.0
 *
 * @package    Employees
 * @subpackage Employees/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Employees
 * @subpackage Employees/admin
 * @author     Slushman <chris@slushman.com>
 */
class Employees_Admin {

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
	 * Initialize the class and set its properties.
	 *
	 * @since 	1.0.0
	 * @param 	string 		$plugin_name 		The name of this plugin.
	 * @param 	string 		$version 			The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	} // __construct()

	/**
	 * Load the required dependencies for the admin class
	 *
	 * Includes the following files:
	 * - Employees_Sanitize. Sanitizes user input
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for sanitizing user input
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-employees-sanitize.php';

		$this->sanitizer = new Employees_Sanitize();

	}

	/**
	 * Registers metaboxes with WordPress
	 *
	 * @since 	1.0.0
	 * @access 	public
	 */
	public function add_metaboxes() {

		// add_meta_box( $id, $title, $callback, $screen, $context, $priority, $callback_args );

		add_meta_box(
			'employees_contact_info',
			apply_filters( $this->plugin_name . 'metabox-contact-info-title', esc_html__( 'Contact Info', 'employees' ) ),
			array( $this, 'metabox_contact_info' ),
			'employees',
			'side',
			'default'
		);

		add_meta_box(
			'employees_location_info',
			apply_filters( $this->plugin_name . 'metabox-location-info-title', esc_html__( 'Location Info', 'employees' ) ),
			array( $this, 'metabox_location_info' ),
			'employees',
			'normal',
			'default'
		);

	} // add_metaboxes()

	/**
	 * Adds vCard as a filter for the Media Library
	 *
	 * @param 	array 		$post_mime_types 		The current MIME types
	 * @return 	array 								The modified MIME types
	 */
	function add_mime_types( $post_mime_types ) {

		$post_mime_types['text/x-vcard'] = array( esc_html__( 'vCards', 'employees' ), esc_html__( 'Manage vCards', 'employees' ), _n_noop( 'vCard <span class="count">(%s)</span>', 'vCards <span class="count">(%s)</span>' ) );

		return $post_mime_types;

	} // add_mime_types

	/**
	 * Adds a settings page link to a menu
	 *
	 * @link 		https://codex.wordpress.org/Administration_Menus
	 * @since 		1.0.0
	 * @return 		void
	 */
	public function add_menu() {

		// Top-level page
		// add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );

		// Submenu Page
		// add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function);

		add_submenu_page(
			'edit.php?post_type=employees',
			apply_filters( $this->plugin_name . '-settings-page-title', esc_html__( 'Employees Settings', 'employees' ) ),
			apply_filters( $this->plugin_name . '-settings-menu-title', esc_html__( 'Settings', 'employees' ) ),
			'manage_options',
			$this->plugin_name . '-settings',
			array( $this, 'page_options' )
		);

		add_submenu_page(
			'edit.php?post_type=employees',
			apply_filters( $this->plugin_name . '-settings-page-title', esc_html__( 'Employees Help', 'employees' ) ),
			apply_filters( $this->plugin_name . '-settings-menu-title', esc_html__( 'Help', 'employees' ) ),
			'manage_options',
			$this->plugin_name . '-help',
			array( $this, 'page_help' )
		);

	} // add_menu()

	/**
	 * Changes the placeholder text for the Custom Post Type title field
	 *
	 * @param 	string 	$title 			The current palceholder text
	 * @return 	string 					The modified placeholder text
	 */
	function change_title_text( $title ) {

		$screen = (object) get_current_screen();

		if  ( 'employees' == $screen->post_type ) {

			$title = 'Enter employee name here';

		}

		return $title;

	} // change_title_text()


	/**
	 * Allows vCards to be uploading to the Media Library
	 *
	 * @param 	array 		$existing_mimes 		The current MIME list
	 * @return 	array 								The modified MIME list
	 */
	function custom_upload_mimes( $existing_mimes = array() ) {

		$existing_mimes['vcf'] = 'text/x-vcard';

		return $existing_mimes;

	} // custom_upload_mimes()

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/employees-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_media();

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/employees-admin-min.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add subtitle field to
	 */
	public function field_job_title( $post ) {

		if ( ! is_admin() ) { return; }

		$screen = (object) get_current_screen();

		if  ( 'employees' !== $screen->post_type ) { return; }

		$post_id = (int) absint( $post->ID );
		$subtitle = (string) get_post_meta( $post_id, 'title-job', true );

		include( plugin_dir_path( __FILE__ ) . 'partials/employees-admin-field-title-job.php' );

	} // field_job_title()

	/**
	 * Displays a settings field
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	public function field_message_none_found() {

		include( plugin_dir_path( __FILE__ ) . 'partials/employees-admin-field-nonefoundmessage.php' );

	} // field_message_none_found()

	/**
	 * Adds a link to the plugin settings page
	 *
	 * @since 		1.0.0
	 * @param 		array 		$links 		The current array of links
	 * @return 		array 					The modified array of links
	 */
	public function link_settings( $links ) {

		$settings_link = sprintf( '<a href="%s">%s</a>', admin_url( 'edit.php?post_type=employees&page=employees-settings' ), esc_html__( 'Settings', 'employees' ) );

		array_unshift( $links, $settings_link );

		return $links;

	} // link_settings()

	/**
	 * Adds links to the plugin links row
	 *
	 * @since 		1.0.0
	 * @param 		array 		$links 		The current array of row links
	 * @param 		string 		$file 		The name of the file
	 * @return 		array 					The modified array of row links
	 */
	public function link_row_meta( $links, $file ) {

		if ( $file == $this->plugin_name ) {

			$link = '<a href="http://twitter.com/slushman">Twitter</a>';

			array_push( $links, $link );

		}

		return $links;

	} // link_row_meta()

	/**
	 * Displays a metabox
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @return 	mixed 		Code for a metabox
	 */
	public function metabox_contact_info( $object, $box ) {

		include( plugin_dir_path( __FILE__ ) . 'partials/employees-admin-metabox-contact-info.php' );

	} // metabox_contact_info()

	/**
	 * Displays a metabox
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @return 	mixed 		Code for a metabox
	 */
	public function metabox_location_info( $object, $box ) {

		include( plugin_dir_path( __FILE__ ) . 'partials/employees-admin-metabox-location-info.php' );

	} // metabox_location_info()

	/**
	 * Creates a new custom post type
	 *
	 * @uses   register_post_type()
	 */
	public static function new_cpt_employees() {

		$cap_type 	= 'post';
		$plural 	= 'Employees';
		$single 	= 'Employee';

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
		$opts['rewrite']['slug']						= esc_html__( strtolower( $plural ), 'employees' );
		$opts['rewrite']['with_front']					= FALSE;

		$opts = apply_filters( 'employees-cpt-options', $opts );

		register_post_type( strtolower( $plural ), $opts );

	} // new_cpt_employees()

	/**
	 * Creates a new taxonomy for a custom post type
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @uses 	register_taxonomy()
	 */
	public static function new_taxonomy_department() {

		$plural 	= 'Departments';
		$single 	= 'Department';
		$tax_name 	= 'department';

		$opts['hierarchical']							= TRUE;
		//$opts['meta_box_cb'] 							= '';
		$opts['public']									= TRUE;
		$opts['query_var']								= $tax_name;
		$opts['show_admin_column'] 						= FALSE;
		$opts['show_in_nav_menus']						= TRUE;
		$opts['show_tag_cloud'] 						= TRUE;
		$opts['show_ui']								= TRUE;
		$opts['sort'] 									= '';
		//$opts['update_count_callback'] 					= '';

		$opts['capabilities']['assign_terms'] 			= 'edit_posts';
		$opts['capabilities']['delete_terms'] 			= 'manage_categories';
		$opts['capabilities']['edit_terms'] 			= 'manage_categories';
		$opts['capabilities']['manage_terms'] 			= 'manage_categories';

		$opts['labels']['add_new_item'] 				= esc_html__( "Add New {$single}", 'employees' );
		$opts['labels']['add_or_remove_items'] 			= esc_html__( "Add or remove {$plural}", 'employees' );
		$opts['labels']['all_items'] 					= esc_html__( $plural, 'employees' );
		$opts['labels']['choose_from_most_used'] 		= esc_html__( "Choose from most used {$plural}", 'employees' );
		$opts['labels']['edit_item'] 					= esc_html__( "Edit {$single}" , 'employees');
		$opts['labels']['menu_name'] 					= esc_html__( $plural, 'employees' );
		$opts['labels']['name'] 						= esc_html__( $plural, 'employees' );
		$opts['labels']['new_item_name'] 				= esc_html__( "New {$single} Name", 'employees' );
		$opts['labels']['not_found'] 					= esc_html__( "No {$plural} Found", 'employees' );
		$opts['labels']['parent_item'] 					= esc_html__( "Parent {$single}", 'employees' );
		$opts['labels']['parent_item_colon'] 			= esc_html__( "Parent {$single}:", 'employees' );
		$opts['labels']['popular_items'] 				= esc_html__( "Popular {$plural}", 'employees' );
		$opts['labels']['search_items'] 				= esc_html__( "Search {$plural}", 'employees' );
		$opts['labels']['separate_items_with_commas'] 	= esc_html__( "Separate {$plural} with commas", 'employees' );
		$opts['labels']['singular_name'] 				= esc_html__( $single, 'employees' );
		$opts['labels']['update_item'] 					= esc_html__( "Update {$single}", 'employees' );
		$opts['labels']['view_item'] 					= esc_html__( "View {$single}", 'employees' );

		$opts['rewrite']['ep_mask']						= EP_NONE;
		$opts['rewrite']['hierarchical']				= FALSE;
		$opts['rewrite']['slug']						= esc_html__( $tax_name, 'employees' );
		$opts['rewrite']['with_front']					= FALSE;

		$opts = apply_filters( 'employee-department-taxonomy-options', $opts );

		register_taxonomy( $tax_name, 'employees', $opts );

	} // new_taxonomy_department()

	/**
	 * Displays the help page
	 *
	 * @since 		1.0.0
	 * @return 		void
	 */
	public function page_help() {

		include( plugin_dir_path( __FILE__ ) . 'partials/employees-admin-page-help.php' );

	} // page_help()

	/**
	 * Displays the options page
	 *
	 * @since 		1.0.0
	 * @return 		void
	 */
	public function page_options() {

		include( plugin_dir_path( __FILE__ ) . 'partials/employees-admin-page-settings.php' );

	} // page_options()

	/**
	 * Registers plugin settings, sections, and fields
	 *
	 * @since 		1.0.0
	 * @return 		void
	 */
	public function register_settings() {

		// register_setting( $option_group, $option_name, $sanitize_callback );

		register_setting(
			$this->plugin_name . '-options',
			$this->plugin_name . '-options',
			array( $this, 'validate_options' )
		);

		// add_settings_section( $id, $title, $callback, $menu_slug );

		add_settings_section(
			$this->plugin_name . '-messages',
			apply_filters( $this->plugin_name . '-section-messages-title', esc_html__( 'Messages', 'employees' ) ),
			array( $this, 'section_messages' ),
			$this->plugin_name
		);

		// add_settings_field( $id, $title, $callback, $menu_slug, $section, $args );

		add_settings_field(
			'none-found-message',
			apply_filters( $this->plugin_name . '-field-none-found-message-label', esc_html__( 'None Found Message', 'employees' ) ),
			array( $this, 'field_message_none_found' ),
			$this->plugin_name,
			$this->plugin_name . '-messages'
		);

	} // register_settings()

	/**
	 * Displays a settings section
	 *
	 * @since 		1.0.0
	 * @param 		array 		$params 		Array of parameters for the section
	 * @return 		mixed 						The settings section
	 */
	public function section_messages( $params ) {

		include( plugin_dir_path( __FILE__ ) . 'partials/employees-admin-section-messages.php' );

	} // section_messages()

	/**
	 * Validates and saves metabox data
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @param 	int 		$post_id 		The post ID
	 * @param 	object 		$object 		The post object
	 * @return 	void
	 */
	public function validate_meta( $post_id, $object ) {

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return $post_id; }
		if ( ! current_user_can( 'edit_post', $post_id ) ) { return $post_id; }
		if ( ! current_user_can( 'edit_page', $post_id ) ) { return $post_id; }
		if ( ! isset( $_POST['nonce_employees_contact_info'] ) ) { return $post_id; }
		if ( ! wp_verify_nonce( $_POST['nonce_employees_contact_info'], $this->plugin_name ) ) { return $post_id; }
		if ( 'employees' !== $object->post_type ) { return $post_id; }

		$custom 	= get_post_custom( $post_id );

		// Enter each meta field, name first, then field type
		$metas[] 	= array( 'title-job', 'text' );
		$metas[] 	= array( 'phone-office', 'text' );
		$metas[] 	= array( 'phone-cell', 'text' );
		$metas[] 	= array( 'fax-number', 'text' );
		$metas[] 	= array( 'email-address', 'email' );
		$metas[] 	= array( 'url-linkedin', 'url' );
		$metas[] 	= array( 'url-vcard', 'url' );
		$metas[] 	= array( 'address', 'text' );
		$metas[] 	= array( 'address2', 'text' );
		$metas[] 	= array( 'city', 'text' );
		$metas[] 	= array( 'state', 'text' );
		$metas[] 	= array( 'zipcode', 'text' );
		$metas[] 	= array( 'building', 'text' );
		$metas[] 	= array( 'office', 'text' );

		foreach ( $metas as $meta ) {

			$value 		= ( empty( $custom[$meta[0]][0] ) ? '' : $custom[$meta[0]][0] );
			$sanitizer 	= new Employees_Sanitize();

			$sanitizer->set_data( $_POST[$meta[0]] );
			$sanitizer->set_type( $meta[1] );

			$new_value = $sanitizer->clean();

			if ( $new_value && $new_value != $value ) {

				// If the new meta value does not match the old value, update it.
				update_post_meta( $post_id, $meta[0], $new_value );

			} elseif ( '' == $new_value && $value ) {

				// If there is no new meta value but an old value exists, delete it.
				delete_post_meta( $post_id, $meta[0], $value );

			} elseif ( $new_value && '' == $value ) {

				// If a new meta value was added and there was no previous value, add it.
				add_post_meta( $post_id, $meta[0], $new_value, true );

			} // End of meta value checks

			unset( $sanitizer );

		} // End of foreach loop

	} // validate_meta()

	/**
	 * Validates saved options
	 *
	 * @since 		1.0.0
	 * @param 		array 		$input 			array of submitted plugin options
	 * @return 		array 						array of validated plugin options
	 */
	public function validate_options( $input ) {

		$valid = array();

		$options[] = array( 'none-found-message', 'text' );

		foreach ( $options as $option ) {

			$sanitizer = new Employees_Sanitize();

			$sanitizer->set_data( $input[$option[0]] );
			$sanitizer->set_type( $option[1] );

			$valid[$option[0]] = $sanitizer->clean();

			if ( $valid[$option[0]] != $input[$option[0]] ) {

				add_settings_error( $option[0], $option[0] . '_error', esc_html__( $option[0] . ' error.', 'employees' ), 'error' );

			}

			unset( $sanitizer );

		}

		return $valid;

	} // validate_options()

} // class