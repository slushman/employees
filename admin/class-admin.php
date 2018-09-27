<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Employees\Admin
 * @author     Slushman <chris@slushman.com>
 */

namespace Employees\Admin;
use \Employees\Fields as Fields;
use \Employees\Includes as Inc;

class Admin {

	/**
	 * An instance of the Fields_Admin class.
	 *
	 * @since 		1.0.0
	 * @access 		private
	 * @var 		Fields_Admin
	 */
	private $fields;

	/**
	 * An instance of the Sanitize class.
	 *
	 * @since 		1.0.2
	 * @access 		private
	 * @var 		Sanitize
	 */
	private $sanitizer;

	/**
	 * Array of plugin settings to validate before saving to the database.
	 *
	 * @since 		1.0.0
	 * @access 		private
	 * @var 		array
	 */
	private $settings;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 		1.0.0
	 * @param 		Fields_Admin 		$fields 		Instance of Fields_Admin()
	 * @param 		Sanitize 			$sanitizer 		Instance of Sanitize()
	 */
	public function __construct( Fields\Fields_Admin $fields, Inc\Sanitize $sanitizer ) {

		$this->fields 		= $fields;
		$this->sanitizer	= $sanitizer;

	} // __construct()

	/**
	 * Registers all the WordPress hooks and filters related to this class.
	 *
	 * @hooked 		init
	 * @since 		1.5
	 */
	public function hooks () {

		//add_action( 'activated_plugin', 				array( $this, 'save_activation_errors' ) );
		add_action( 'admin_enqueue_scripts', 			array( $this, 'enqueue_styles' ) );
		add_action( 'admin_enqueue_scripts', 			array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_init', 						array( $this, 'register_fields' ) );
		add_action( 'admin_init', 						array( $this, 'register_sections' ) );
		add_action( 'admin_init', 						array( $this, 'register_settings' ) );
		add_action( 'admin_menu', 						array( $this, 'add_menu' ) );
		add_action( 'plugin_action_links_' . EMPLOYEES_FILE, array( $this, 'link_settings' ) );
		add_action( 'plugin_row_meta', 					array( $this, 'link_row_meta' ), 10, 2 );

		add_filter( 'upload_mimes', 					array( $this, 'custom_upload_mimes' ) );
		add_filter( 'post_mime_types', 					array( $this, 'add_mime_types' ) );

	} // hooks()

	/**
	 * Displays an error notice displaying the error notice, if there is one.
	 *
	 * @hooked 		admin_notices
	 * @since 		1.0.0
	 */
	public function activation_error_notice() {

		$error = get_option( 'tout_social_buttons_errors' );

		if ( empty( $error ) ) { return; }

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/error-notice.php' );

	} // activation_error_notice()

	/**
	 * Adds vCard as a filter for the Media Library
	 *
	 * @param 	array 		$post_mime_types 		The current MIME types
	 * @return 	array 								The modified MIME types
	 */
	function add_mime_types( $post_mime_types ) {

		$post_mime_types['text/x-vcard'] = array( esc_html__( 'vCards', 'employees' ), esc_html__( 'Manage vCards', 'employees' ), _n_noop( 'vCard <span class="count">(%s)</span>', 'vCards <span class="count">(%s)</span>' ) );

		/**
		 * The employees_post_mime_types filter.
		 * 
		 * @var 		array 		$post_mime_types 		The current mime types array.
		 */
		apply_filters( 'employees_post_mime_types', $post_mime_types );

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
			'edit.php?post_type=employee',
			esc_html__( 'Employees Settings', 'employees' ),
			esc_html__( 'Settings', 'employees' ),
			'manage_options',
			EMPLOYEES_SLUG . '-settings',
			array( $this, 'page_options' )
		);

		add_submenu_page(
			'edit.php?post_type=employee',
			esc_html__( 'Employees Help', 'employees' ),
			esc_html__( 'Help', 'employees' ),
			'manage_options',
			EMPLOYEES_SLUG . '-help',
			array( $this, 'page_help' )
		);

	} // add_menu()

	/**
	 * Allows vCards to be uploading to the Media Library
	 *
	 * @param 	array 		$existing_mimes 		The current MIME list
	 * @return 	array 								The modified MIME list
	 */
	function custom_upload_mimes( $existing_mimes = array() ) {

		$existing_mimes['vcf'] = 'text/x-vcard';

		/**
		 * The employees_upload_mime_types filter.
		 * 
		 * @var 		array 		$existing_mimes 		The current mime types array.
		 */
		apply_filters( 'employees_upload_mime_types', $existing_mimes );

		return $existing_mimes;

	} // custom_upload_mimes()

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( EMPLOYEES_SLUG . '-admin', plugin_dir_url( dirname( __FILE__ ) ) . 'admin/css/employees-admin.css', array(), EMPLOYEES_VERSION, 'all' );

	} // enqueue_styles()

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_media();

		wp_enqueue_script( EMPLOYEES_SLUG . '-file-uploader', plugin_dir_url( dirname( __FILE__ ) ) . 'admin/js/employees-admin.min.js', array( 'jquery' ), EMPLOYEES_VERSION, true );

	} // enqueue_scripts()

	/**
	 * Returns an array of options names, fields types, and default values
	 *
	 * @return 		array 			An array of options
	 */
	public static function get_options_list() {

		$options = array();

		$options[] = array( 'message-none-found', 'text', '' );
		$options[] = array( 'default-loop-nav', 'select', 'no-navigation' );

		return $options;

	} // get_options_list()

	/**
	 * Adds a link to the plugin settings page
	 *
	 * @since 		1.0.0
	 * @param 		array 		$links 		The current array of links
	 * @return 		array 					The modified array of links
	 */
	public function link_settings( $links ) {

		$links[] = sprintf( '<a href="%s">%s</a>', admin_url( 'edit.php?post_type=employee&page=employees-settings' ), esc_html__( 'Settings', 'employees' ) );

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

		if ( $file == EMPLOYEES_FILE ) {

			$links[] = '<a href="http://twitter.com/slushman">Twitter</a>';

		}

		return $links;

	} // link_row_meta()

	/**
	 * Includes the help page view
	 *
	 * @since 		1.0.0
	 * @return 		void
	 */
	public function page_help() {

		include( plugin_dir_path( __FILE__ ) . 'partials/page-help.php' );

	} // page_help()

	/**
	 * Includes the settings page view
	 *
	 * @since 		1.0.0
	 * @return 		void
	 */
	public function page_options() {

		include( plugin_dir_path( __FILE__ ) . 'partials/page-settings.php' );

	} // page_options()

	/**
	 * Registers settings fields with WordPress
	 */
	public function register_fields() {

		// add_settings_field( $id, $title, $callback, $menu_slug, $section, $args );

		add_settings_field(
			'message-none-found',
			__( 'None Found Message', 'employees' ),
			array( $this->fields, 'field_text' ),
			EMPLOYEES_SETTINGS,
			EMPLOYEES_SETTINGS . '_messages',
			array(
				'attributes' 		=> array(
					'id' 			=> 'message-none-found',
					'value' 		=> __( 'No one actually works here...', 'employees' )
				),
				'properties' 		=> array(
					'description' 	=> __( 'This message displays on the page if no job postings are found.', 'employees' ),
				),
			)
		);
		$this->settings[] = array( 'message-none-found', 'text' );

		add_settings_field(
			'default-loop-nav',
			__( 'Default List Navigation Type', 'employees' ),
			array( $this->fields, 'field_select' ),
			EMPLOYEES_SETTINGS,
			EMPLOYEES_SETTINGS . '_display',
			array(
				'attributes' 		=> array(
					'id' 			=> 'default-loop-nav',
					'value' 		=> 'no-navigation'
				),
				'properties' 		=> array(
					'description' 	=> __( 'This is the default navigation above the employee list.', 'employees' ),
				),
				'options'			=> array( 
					array( 'label' => __( 'No Navigation', 'employees' ), 'value' => 'no-navigation' ),
					array( 'label' => __( 'Letter', 'employees' ), 'value' => 'letter' ),
					array( 'label' => __( 'Departments', 'employees' ), 'value' => 'departments' ),
				),
			)
		);
		$this->settings[] = array( 'default-loop-nav', 'select' );







		add_settings_field(
			'test-textarea',
			__( 'Textarea', 'employees' ),
			array( $this->fields, 'field_textarea' ),
			EMPLOYEES_SETTINGS,
			EMPLOYEES_SETTINGS . '_messages',
			array(
				'attributes' 		=> array(
					'id' 			=> 'test-textarea'
				),
				'properties' 		=> array(
					'description' 	=> __( 'This is the default navigation above the employee list.', 'employees' ),
				)
			)
		);
		$this->settings[] = array( 'test-textarea', 'textarea' );

	} // register_fields()

	/**
	 * Registers settings sections with WordPress
	 */
	public function register_sections() {

		// add_settings_section( $id, $title, $callback, $menu_slug );

		add_settings_section(
			EMPLOYEES_SETTINGS . '_messages',
			esc_html__( 'Messages', 'employees' ),
			array( $this, 'sections' ),
			EMPLOYEES_SETTINGS
		);

		/*add_settings_section(
			EMPLOYEES_SETTINGS . '_display',
			esc_html__( 'Display', 'employees' ),
			array( $this, 'sections' ),
			EMPLOYEES_SETTINGS
		);*/

	} // register_sections()

	/**
	 * Registers plugin settings
	 *
	 * @since 		1.0.0
	 * @return 		void
	 */
	public function register_settings() {

		// register_setting( $option_group, $option_name, $sanitize_callback );

		register_setting(
			EMPLOYEES_SETTINGS,
			EMPLOYEES_SETTINGS,
			array( $this, 'validate_options' )
		);

	} // register_settings()

	/**
	 * Includes the settings section partial file based on the section ID.
	 *
	 * @since 		1.5
	 * @param 		array 		$params 		Array of parameters for the section.
	 * @return 		mixed 						The settings section.
	 */
	public function sections( $params ) {

		switch( $params['id'] ) :

			case EMPLOYEES_SETTINGS . '_messages':		$params['description'] = __( '', 'employees' ); break;
			case EMPLOYEES_SETTINGS . '_display':		$params['description'] = __( '', 'employees' ); break;

		endswitch;

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/settings-section.php' );

	} // sections()

	/**
	 * Validates saved options
	 *
	 * @since 		1.0.0
	 * @param 		array 		$input 			array of submitted plugin options
	 * @return 		array 						array of validated plugin options
	 */
	public function validate_options( $input ) {

		//wp_die( print_r( $input ) );

		$valid = array();

		//wp_die( print_r( $this->settings ) );

		foreach ( $this->settings as $setting ) {

			$valid[$option[0]] = $this->sanitizer->clean( $input[$setting[0]], $setting[1] );

			if ( $valid[$setting[0]] != $input[$setting[0]] && 'checkbox' !== $setting[1] ) {

				add_settings_error( $setting[0], $setting[0] . '_error', esc_html__( $setting[0] . ' error.', 'tout-social-buttons' ), 'error' );

			}

		}

		//wp_die( print_r( $valid ) );

		return $valid;

	} // validate_options()

} // class