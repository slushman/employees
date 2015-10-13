<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://slushman.com
 * @since      1.0.0
 *
 * @package    Employees
 * @subpackage Employees/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Employees
 * @subpackage Employees/includes
 * @author     Slushman <chris@slushman.com>
 */
class Employees {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Employees_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * Sanitizer for cleaning user input
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      Employees_Sanitize    $sanitizer    Sanitizes data
	 */
	private $sanitizer;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_name = 'employees';
		$this->version = '1.0.0';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->define_template_hooks();
		$this->define_metabox_hooks();
		$this->define_cpt_and_tax_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Employees_Loader. Orchestrates the hooks of the plugin.
	 * - Employees_i18n. Defines internationalization functionality.
	 * - Employees_Admin. Defines all hooks for the admin area.
	 * - Employees_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-employees-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-employees-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-employees-admin.php';

		/**
		 * The class responsible for defining all actions relating to metaboxes.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-employees-admin-metaboxes.php';

		/**
		 * The class responsible for defining all actions relating to the employee custom post type.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-employees-admin-cpt-employee.php';

		/**
		 * The class responsible for defining all actions relating to the department taxonomy.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-employees-admin-tax-department.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-employees-public.php';

		/**
		 * The class responsible for defining all actions creating the templates.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-employees-template-functions.php';

		/**
		 * The class responsible for all global functions.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/employees-global-functions.php';

		/**
		 * The class responsible for sanitizing user input
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-employees-sanitize.php';

		/**
		 * The class with methods shared by admin and public
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-employees-shared.php';

		$this->loader = new Employees_Loader();
		$this->sanitizer = new Employees_Sanitize();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Employees_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Employees_i18n();
		$plugin_i18n->set_domain( $this->get_plugin_name() );

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Employees_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_filter( 'upload_mimes', $plugin_admin, 'custom_upload_mimes' );
		$this->loader->add_filter( 'post_mime_types', $plugin_admin, 'add_mime_types' );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'register_fields' );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'register_sections' );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'register_settings' );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'add_menu' );
		$this->loader->add_action( 'plugin_action_links_' . EMPLOYEES_FILE, $plugin_admin, 'link_settings' );
		$this->loader->add_action( 'plugin_row_meta', $plugin_admin, 'link_row_meta', 10, 2 );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Employees_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		//$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_filter( 'single_template', $plugin_public, 'single_cpt_template' );
		$this->loader->add_action( 'init', $plugin_public, 'register_shortcodes' );
		$this->loader->add_action( 'employees-before-loop-content', $plugin_public, 'register_shortcodes' );



		/**
		 * Action instead of template tag.
		 *
		 * do_action( 'employeelist' );
		 *
		 * @link 	http://nacin.com/2010/05/18/rethinking-template-tags-in-plugins/
		 */
		$this->loader->add_action( 'employeelist', $plugin_public, 'list_employees' );

	}

	/**
	 * Register all of the hooks related to the templates.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_template_hooks() {

		$plugin_templates = new Employees_Template_Functions( $this->get_plugin_name(), $this->get_version() );

		// Loop
		$this->loader->add_action( 'employees-before-loop', 		$plugin_templates, 'loop_wrap_start', 10 );
		$this->loader->add_action( 'employees-before-loop-content', $plugin_templates, 'loop_content_wrap_start', 10, 2 );
		$this->loader->add_action( 'employees-before-loop-content', $plugin_templates, 'loop_content_link_start', 15, 3 );
		$this->loader->add_action( 'employees-loop-content', 		$plugin_templates, 'loop_content_image', 10, 2 );
		$this->loader->add_action( 'employees-loop-content', 		$plugin_templates, 'loop_content_name', 15, 2 );
		$this->loader->add_action( 'employees-loop-content', 		$plugin_templates, 'loop_content_job_title', 20, 2 );
		$this->loader->add_action( 'employees-after-loop-content', 	$plugin_templates, 'loop_content_link_end', 10, 2 );
		$this->loader->add_action( 'employees-after-loop-content', 	$plugin_templates, 'loop_content_wrap_end', 90, 2 );
		$this->loader->add_action( 'employees-after-loop', 			$plugin_templates, 'loop_wrap_end', 10 );


		// Single
		$this->loader->add_action( 'employees-single-content', $plugin_templates, 'single_employee_thumbnail', 10 );
		$this->loader->add_action( 'employees-single-content', $plugin_templates, 'single_employee_name', 15 );
		$this->loader->add_action( 'employees-single-content', $plugin_templates, 'single_employee_job_title', 20 );
		$this->loader->add_action( 'employees-single-content', $plugin_templates, 'single_employee_content', 25 );
		$this->loader->add_action( 'employees-single-content', $plugin_templates, 'single_employee_contact_info', 30 );
		$this->loader->add_action( 'employees-single-content', $plugin_templates, 'single_employee_comms', 35 );

	} // define_template_hooks()

	/**
	 * Register all of the hooks related to metaboxes
	 *
	 * @since 		1.0.0
	 * @access 		private
	 */
	private function define_metabox_hooks() {

		$plugin_metaboxes = new Employees_Admin_Metaboxes( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'add_meta_boxes_employee', $plugin_metaboxes, 'add_metaboxes' );
		$this->loader->add_action( 'save_post_employee', $plugin_metaboxes, 'validate_meta', 10, 2 );
		$this->loader->add_action( 'edit_form_after_title', $plugin_metaboxes, 'metabox_job_title', 10, 2 );
		$this->loader->add_action( 'add_meta_boxes_employee', $plugin_metaboxes, 'set_meta' );

	} // define_metabox_hooks()

	/**
	 * Register all of the hooks related to metaboxes
	 *
	 * @since 		1.0.0
	 * @access 		private
	 */
	private function define_cpt_and_tax_hooks() {

		$plugin_cpt_employee = new Employees_CPT_Employee( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'init', $plugin_cpt_employee, 'new_cpt_employee' );
		$this->loader->add_action( 'enter_title_here', $plugin_cpt_employee, 'change_title_text', 10, 2 );



		$plugin_tax_department =new Employees_Tax_Department( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'init', $plugin_tax_department, 'new_taxonomy_department' );

	} // define_cpt_and_tax_hooks()

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Employees_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

} // class
