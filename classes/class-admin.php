<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://slushman.com
 * @since      1.0.0
 *
 * @package    Employees
 * @subpackage Employees/classes
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Employees
 * @subpackage Employees/classes
 * @author     Slushman <chris@slushman.com>
 */
class Employees_Admin {

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

		$this->set_options();

	} // __construct()

	/**
	 * Adds vCard as a filter for the Media Library
	 *
	 * @param 	array 		$post_mime_types 		The current MIME types
	 * @return 	array 								The modified MIME types
	 */
	function add_mime_types( $post_mime_types ) {

		$post_mime_types['text/x-vcard'] = array( esc_html__( 'vCards', 'employees' ), esc_html__( 'Manage vCards', 'employees' ), _n_noop( 'vCard <span class="count">(%s)</span>', 'vCards <span class="count">(%s)</span>' ) );

		apply_filters( $this->plugin_name . '-post-mime-types', $post_mime_types );

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
			apply_filters( $this->plugin_name . '-settings-page-title', esc_html__( 'Employees Settings', 'employees' ) ),
			apply_filters( $this->plugin_name . '-settings-menu-title', esc_html__( 'Settings', 'employees' ) ),
			'manage_options',
			$this->plugin_name . '-settings',
			array( $this, 'page_options' )
		);

		add_submenu_page(
			'edit.php?post_type=employee',
			apply_filters( $this->plugin_name . '-settings-page-title', esc_html__( 'Employees Help', 'employees' ) ),
			apply_filters( $this->plugin_name . '-settings-menu-title', esc_html__( 'Help', 'employees' ) ),
			'manage_options',
			$this->plugin_name . '-help',
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

		apply_filters( $this->plugin_name . '-upload-mime-types', $existing_mimes );

		return $existing_mimes;

	} // custom_upload_mimes()

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( dirname( __FILE__ ) ) . 'assets/css/employees-admin.css', array(), $this->version, 'all' );

	} // enqueue_styles()

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		global $post;

		wp_enqueue_media();

		wp_enqueue_script( $this->plugin_name . '-file-uploader', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/js/employees-admin.min.js', array( 'jquery' ), $this->version, true );

		if ( ! empty( $post ) && 'employee' == $post->post_type ) {

			wp_enqueue_script( $this->plugin_name . '-readonly-title', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/js/employees-read-only-title.min.js', array( 'jquery' ), $this->version, true );
			wp_enqueue_script( $this->plugin_name . '-auto-populate-title', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/js/employees-auto-populate-title.min.js', array( 'jquery' ), $this->version, true );
			wp_enqueue_script( $this->plugin_name . '-tab-to-fields', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/js/employees-tab-to-fields.min.js', array( 'jquery' ), $this->version, true );
			wp_enqueue_script( $this->plugin_name . '-autosave-name', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/js/employees-autosave-name.min.js', array( 'jquery' ), $this->version, true );

			$ajax_data['ajax_url'] = admin_url( 'admin-ajax.php' );

			wp_localize_script( $this->plugin_name . '-autosave-name', 'employees_autosaver', $ajax_data );
			wp_localize_script( $this->plugin_name . '-auto-populate-title', 'special_honors', Employees_Admin_Metaboxes::get_special_honorifics() );

			wp_enqueue_script( 'heartbeat' );

		}

	} // enqueue_scripts()

	/**
	 * Creates a checkbox field
	 *
	 * @param 	array 		$args 			The arguments for the field
	 * @return 	string 						The HTML field
	 */
	public function field_checkbox( $args ) {

		$defaults['class'] 			= '';
		$defaults['description'] 	= '';
		$defaults['label'] 			= '';
		$defaults['name'] 			= $this->plugin_name . '-options[' . $args['id'] . ']';
		$defaults['value'] 			= 0;

		apply_filters( $this->plugin_name . '-field-checkbox-options-defaults', $defaults );

		$atts = wp_parse_args( $args, $defaults );

		if ( ! empty( $this->options[$atts['id']] ) ) {

			$atts['value'] = $this->options[$atts['id']];

		}

		include( plugin_dir_path( __FILE__ ) . 'views/view-field-checkbox.php' );

	} // field_checkbox()

	/**
	 * Creates a set of radios field
	 *
	 * @param 	array 		$args 			The arguments for the field
	 * @return 	string 						The HTML field
	 */
	public function field_radios( $args ) {

		$defaults['class'] 			= '';
		$defaults['description'] 	= '';
		$defaults['label'] 			= '';
		$defaults['name'] 			= $this->plugin_name . '-options[' . $args['id'] . ']';
		$defaults['value'] 			= 0;

		apply_filters( $this->plugin_name . '-field-radios-options-defaults', $defaults );

		$atts = wp_parse_args( $args, $defaults );

		if ( ! empty( $this->options[$atts['id']] ) ) {

			$atts['value'] = $this->options[$atts['id']];

		}

		include( plugin_dir_path( __FILE__ ) . 'views/view-field-radios.php' );

	} // field_radios()

	/**
	 * Creates a select field
	 *
	 * Note: label is blank since its created in the Settings API
	 *
	 * @param 	array 		$args 			The arguments for the field
	 * @return 	string 						The HTML field
	 */
	public function field_select( $args ) {

		$defaults['aria'] 			= '';
		$defaults['blank'] 			= '';
		$defaults['class'] 			= '';
		$defaults['context'] 		= '';
		$defaults['description'] 	= '';
		$defaults['label'] 			= '';
		$defaults['name'] 			= $this->plugin_name . '-options[' . $args['id'] . ']';
		$defaults['selections'] 	= array();
		$defaults['value'] 			= '';

		apply_filters( $this->plugin_name . '-field-select-options-defaults', $defaults );

		$atts = wp_parse_args( $args, $defaults );

		if ( ! empty( $this->options[$atts['id']] ) ) {

			$atts['value'] = $this->options[$atts['id']];

		}

		if ( empty( $atts['aria'] ) && ! empty( $atts['description'] ) ) {

			$atts['aria'] = $atts['description'];

		} elseif ( empty( $atts['aria'] ) && ! empty( $atts['label'] ) ) {

			$atts['aria'] = $atts['label'];

		}

		include( plugin_dir_path( __FILE__ ) . 'views/view-field-select.php' );

	} // field_select()

	/**
	 * Creates a text field
	 *
	 * @param 	array 		$args 			The arguments for the field
	 * @return 	string 						The HTML field
	 */
	public function field_text( $args ) {

		$defaults['class'] 			= 'text widefat';
		$defaults['description'] 	= '';
		$defaults['label'] 			= '';
		$defaults['name'] 			= $this->plugin_name . '-options[' . $args['id'] . ']';
		$defaults['placeholder'] 	= '';
		$defaults['type'] 			= 'text';
		$defaults['value'] 			= '';

		apply_filters( $this->plugin_name . '-field-text-options-defaults', $defaults );

		$atts = wp_parse_args( $args, $defaults );

		if ( ! empty( $this->options[$atts['id']] ) ) {

			$atts['value'] = $this->options[$atts['id']];

		}

		include( plugin_dir_path( __FILE__ ) . 'views/view-field-text.php' );

	} // field_text()

	/**
	 * Creates a textarea field
	 *
	 * @param 	array 		$args 			The arguments for the field
	 * @return 	string 						The HTML field
	 */
	public function field_textarea( $args ) {

		$defaults['class'] 			= 'large-text';
		$defaults['cols'] 			= 50;
		$defaults['context'] 		= '';
		$defaults['description'] 	= '';
		$defaults['label'] 			= '';
		$defaults['name'] 			= $this->plugin_name . '-options[' . $args['id'] . ']';
		$defaults['rows'] 			= 10;
		$defaults['value'] 			= '';

		apply_filters( $this->plugin_name . '-field-textarea-options-defaults', $defaults );

		$atts = wp_parse_args( $args, $defaults );

		if ( ! empty( $this->options[$atts['id']] ) ) {

			$atts['value'] = $this->options[$atts['id']];

		}

		include( plugin_dir_path( __FILE__ ) . 'views/view-field-textarea.php' );

	} // field_textarea()

	/**
	 * Returns an array of options names, fields types, and default values
	 *
	 * @return 		array 			An array of options
	 */
	public static function get_options_list() {

		$options = array();

		$options[] = array( 'message-none-found', 'text', '' );
		$options[] = array( 'custom-slug', 'text', 'employee' );
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

		include( plugin_dir_path( __FILE__ ) . 'views/view-page-help.php' );

	} // page_help()

	/**
	 * Includes the options page view
	 *
	 * @since 		1.0.0
	 * @return 		void
	 */
	public function page_options() {

		include( plugin_dir_path( __FILE__ ) . 'views/view-page-settings.php' );

	} // page_options()

	/**
	 * Registers settings fields with WordPress
	 */
	public function register_fields() {

		// add_settings_field( $id, $title, $callback, $menu_slug, $section, $args );

		add_settings_field(
			'message-none-found',
			apply_filters( $this->plugin_name . '-label-messages-none-found', esc_html__( 'None Found Message', 'employees' ) ),
			array( $this, 'field_text' ),
			$this->plugin_name,
			$this->plugin_name . '-messages',
			array(
				'description' 	=> 'This message displays on the page if no job postings are found.',
				'id' 			=> 'message-none-found',
				'value' 		=> 'No one actually works here...',
			)
		);

		add_settings_field(
			'custom-slug',
			apply_filters( $this->plugin_name . '-label-messages-custom-slug', esc_html__( 'Customize the slug', 'employees' ) ),
			array( $this, 'field_text' ),
			$this->plugin_name,
			$this->plugin_name . '-messages',
			array(
				'description' 	=> 'Change the slug used in the URL for employee pages.',
				'id' 			=> 'custom-slug',
				'value' 		=> 'employee',
			)
		);

		add_settings_field(
			'default-loop-nav',
			apply_filters( $this->plugin_name . '-label-default-loop-nav', esc_html__( 'Default List Navigation Type', 'employees' ) ),
			array( $this, 'field_select' ),
			$this->plugin_name,
			$this->plugin_name . '-display',
			array(
				'description' 	=> 'This is the default navigation above the employee list.',
				'id' 			=> 'default-loop-nav',
				'selections'	=> array( 'No Navigation', 'Letter', 'Departments' ),
				'value' 		=> 'no-navigation'
			)
		);

	} // register_fields()

	/**
	 * Registers settings sections with WordPress
	 */
	public function register_sections() {

		// add_settings_section( $id, $title, $callback, $menu_slug );

		add_settings_section(
			$this->plugin_name . '-messages',
			apply_filters( $this->plugin_name . '-section-messages-title', esc_html__( 'Messages', 'employees' ) ),
			array( $this, 'section_messages' ),
			$this->plugin_name
		);

		/*add_settings_section(
			$this->plugin_name . '-display',
			apply_filters( $this->plugin_name . '-section-display-title', esc_html__( 'Display', 'employees' ) ),
			array( $this, 'section_display' ),
			$this->plugin_name
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
			$this->plugin_name . '-options',
			$this->plugin_name . '-options',
			array( $this, 'validate_options' )
		);

	} // register_settings()

	/**
	 * Displays a settings section
	 *
	 * @since 		1.0.0
	 * @param 		array 		$params 		Array of parameters for the section
	 * @return 		mixed 						The settings section
	 */
	public function section_display( $params ) {

		include( plugin_dir_path( __FILE__ ) . 'views/view-section-display.php' );

	} // section_display()

	/**
	 * Displays a settings section
	 *
	 * @since 		1.0.0
	 * @param 		array 		$params 		Array of parameters for the section
	 * @return 		mixed 						The settings section
	 */
	public function section_messages( $params ) {

		include( plugin_dir_path( __FILE__ ) . 'views/view-section-messages.php' );

	} // section_messages()

	/**
	 * Sets the class variable $options
	 */
	private function set_options() {

		$this->options = get_option( $this->plugin_name . '-options' );

	} // set_options()

	/**
	 * Validates saved options
	 *
	 * @since 		1.0.0
	 * @param 		array 		$input 			array of submitted plugin options
	 * @return 		array 						array of validated plugin options
	 */
	public function validate_options( $input ) {

		$valid 		= array();
		$options 	= $this->get_options_list();

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