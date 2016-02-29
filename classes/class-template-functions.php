<?php

if ( ! function_exists( 'employees_templates' ) ) {

	/**
	 * Public API for adding and removing temmplates.
	 *
	 * @return 		object 			Instance of the templates class
	 */
	function employees_templates() {

		return Employees_Templates::this();

	} // employees_templates()

}

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://slushman.com
 * @since      1.0.0
 *
 * @package    Employees
 * @subpackage Employees/classes
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the methods for creating the templates.
 *
 * @package    Employees
 * @subpackage Employees/classes
 *
 */
class Employees_Templates {

	/**
	 * Private static reference to this class
	 * Useful for removing actions declared here.
	 *
	 * @var 	object 		$_this
 	 */
	private static $_this;

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
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version 			The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		self::$_this 		= $this;
		$this->plugin_name 	= $plugin_name;
		$this->version 		= $version;

		$this->set_options();

	} // __construct()


	/*
	// This is intended to auto-load the appropriate template file. Not sure how to get the $which value since these are called from add_actions.
	public function loop_content( $which, $item, $meta = array() ) {

		if ( ! $this->validate_content( $which ) ) { return; }

		include employees_get_template( 'loop-content-' . $which, 'loop' );

	} // loop_content()

	private function validate_content( $which ) {

		$valid = array( 'address', 'box_begin', 'box_end', 'building', 'city', 'container_begin', 'container_end', 'description', 'email_address', 'fax_number', 'headshot', 'image', 'job_title', 'link_begin', 'link_end', 'name', 'office', 'phone_cell', 'phone_office', 'state', 'street1', 'street2', 'social_links', 'wrap_begin', 'wrap_end', 'vcard', 'zipcode' );

		return in_array( $which, $valid );

	} // validate_content()*/




	/**
	 * Includes the employee's address - the street addresses, city, state, zip - template file.
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_address( $item, $meta = array() ) {

		include employees_get_template( 'loop-content-address', 'loop' );

	} // loop_content_address()

	/**
	 * Includes the beginning of a div container
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_box_begin( $item, $meta = array() ) {

		return $this->loop_content_container_begin( $item, $meta );

	} // loop_content_box_begin()

	/**
	 * Includes the end of a div container
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_box_end( $item, $meta = array() ) {

		return $this->loop_content_container_end( $item, $meta );

	} // loop_content_box_end()

	/**
	 * Includes the employee building template file.
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_building( $item, $meta = array() ) {

		include employees_get_template( 'loop-content-building', 'loop' );

	} // loop_content_building()

	/**
	 * Includes the employee city template file
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_city( $item, $meta = array() ) {

		include employees_get_template( 'loop-content-city', 'loop' );

	} // loop_content_city()

	/**
	 * Includes the beginning of a div container
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_container_begin( $item, $meta = array() ) {

		include employees_get_template( 'loop-content-container-begin', 'loop' );

	} // loop_content_container_begin()

	/**
	 * Includes the end of a div container
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_container_end( $item, $meta = array() ) {

		include employees_get_template( 'loop-content-container-end', 'loop' );

	} // loop_content_container_end()

	/**
	 * Includes the employee description field
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_description( $item, $meta = array() ) {

		include employees_get_template( 'loop-content-description', 'loop' );

	} // loop_content_description()

	/**
	 * Includes the employee email address template file
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_email_address( $item, $meta = array() ) {

		include employees_get_template( 'loop-content-email-address', 'loop' );

	} // loop_content_email_address()

	/**
	 * Includes the employee fax number template file
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_fax_number( $item, $meta = array() ) {

		include employees_get_template( 'loop-content-fax-number', 'loop' );

	} // loop_content_fax-number()

	/**
	 * Includes the employee image template
	 *
	 * @hooked 		employees-loop-content 		10
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_headshot( $item, $meta = array() ) {

		return $this->loop_content_image( $item, $meta );

	} // loop_content_headshot()

	/**
	 * Includes the employee image template
	 *
	 * @hooked 		employees-loop-content 		10
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_image( $item, $meta = array() ) {

		include employees_get_template( 'loop-content-image', 'loop' );

	} // loop_content_image()

	/**
	 * Includes the employee-job-title template
	 *
	 * @hooked 		employees-loop-content 		20
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_job_title( $item, $meta = array() ) {

		include employees_get_template( 'loop-content-job-title', 'loop' );

	} // loop_content_job_title()

	/**
	 * Includes the link begin template file
	 *
	 * @hooked 		employees-before-loop-content 		15
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_link_begin( $item, $meta = array() ) {

		include employees_get_template( 'loop-content-link-begin', 'loop' );

	} // loop_content_link_begin()

	/**
	 * Includes the link end template file
	 *
	 * @hooked 		employees-after-loop-content 		10
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_link_end( $item, $meta = array() ) {

		include employees_get_template( 'loop-content-link-end', 'loop' );

	} // loop_content_link_end()

	/**
	 * Includes the employee name template file
	 *
	 * @hooked 		employees-loop-content 		15
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_name( $item, $meta = array() ) {

		include employees_get_template( 'loop-content-name', 'loop' );

	} // loop_content_name()

	/**
	 * Includes the employee office template file
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_office( $item, $meta = array() ) {

		include employees_get_template( 'loop-content-office', 'loop' );

	} // loop_content_office()

	/**
	 * Includes the employee cell phone template file
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_phone_cell( $item, $meta = array() ) {

		include employees_get_template( 'loop-content-phone-cell', 'loop' );

	} // loop_content_phone_cell()

	/**
	 * Includes the employee office phone template file
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_phone_office( $item, $meta = array() ) {

		include employees_get_template( 'loop-content-phone-office', 'loop' );

	} // loop_content_phone_office()

	/**
	 * Includes the employee state template file
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_state( $item, $meta = array() ) {

		include employees_get_template( 'loop-content-state', 'loop' );

	} // loop_content_state()

	/**
	 * Includes the employee street address 1 template file
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_street1( $item, $meta = array() ) {

		include employees_get_template( 'loop-content-street1', 'loop' );

	} // loop_content_street1()

	/**
	 * Includes the employee street address 2 template file
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_street2( $item, $meta = array() ) {

		include employees_get_template( 'loop-content-street2', 'loop' );

	} // loop_content_street2()

	/**
	 * Includes the links template file
	 *
	 * @hooked 		employees-after-loop-content 		10
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_social_links( $item, $meta = array() ) {

		$links = array( 'facebook', 'flickr', 'github', 'google', 'instagram', 'linkedin', 'pinterest', 'tumblr', 'twitter', 'website', 'wordpress' );
		$links = apply_filters( $this->plugin_name . '-links-list', $links );

		include employees_get_template( 'loop-content-social-links', 'loop' );

	} // loop_content_social_links()

	/**
	 * Includes the content wrap begin template file
	 *
	 * @hooked 		employees-before-loop-content 		10
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_wrap_begin( $item, $meta = array() ) {

		include employees_get_template( 'loop-content-wrap-begin', 'loop' );

	} // loop_content_wrap_begin()

	/**
	 * Includes the content wrap end template file
	 *
	 * @hooked 		employees-after-loop-content 		90
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_wrap_end( $item, $meta = array() ) {

		include employees_get_template( 'loop-content-wrap-end', 'loop' );

	} // loop_content_wrap_end()

	/**
	 * Includes the content vCard template file
	 *
	 * @hooked 		employees-before-loop-content 		10
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_vcard( $item, $meta = array() ) {

		include employees_get_template( 'loop-content-vcard', 'loop' );

	} // loop_content_vcard()

	/**
	 * Includes the employee zip code template file
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_zipcode( $item, $meta = array() ) {

		include employees_get_template( 'loop-content-zipcode', 'loop' );

	} // loop_content_zipcode()

	/**
	 * Includes the loop nav template file
	 *
	 * @hooked 		employees-before-loop 		10
	 *
	 * @param 		array 		$args 		The shortcode attributes
	 */
	public function loop_nav( $args ) {

		if ( empty( $args['type'] ) ) {

			$nav = $this->options['default-loop-nav'];

		} else {

			$nav = $args['type'];

		}

		switch ( $nav ) {

			case 'no-navigation': 	$items = ''; break;
			case 'letters': 		$items = range( 'A', 'Z' ); break;
			case 'departments':

				$terms = get_terms( 'department', array() );

				foreach ( $terms as $term ) {

					$items[] = $term->name;

				}

				break; // get all departments

		}

		if ( empty( $items ) ) { return; }

		include employees_get_template( 'loop-nav', 'loop' );

	} // loop_nav()

	/**
	 * Includes the list wrap end template file
	 *
	 * @hooked 		employees-after-loop 		10
	 *
	 * @param 		array 		$args 		The shortcode attributes
	 */
	public function loop_wrap_end( $args ) {

		include employees_get_template( 'loop-wrap-end', 'loop' );

	} // list_wrap_end()

	/**
	 * Includes the list wrap start template file and sets the value of $class.
	 *
	 * If the department shortcode attribute is used, it sets $class as the
	 * department or departments. Otherwise, $class is blank.
	 *
	 * @hooked 		employees-before-loop 		15
	 *
	 * @param 		array 		$args 		The shortcode attributes
	 */
	public function loop_wrap_start( $args ) {

		if ( empty( $args['department'] ) ) {

			$class = '';

		} elseif ( is_array( $args['department'] ) ) {

			$class = str_replace( ',', ' ', $args['department'] );

		} else {

			$class = $args['department'];

		}

		include employees_get_template( 'loop-wrap-start', 'loop' );

	} // list_wrap_start()

	/**
	 * Returns an array of the featured image details
	 *
	 * @param 	int 	$postID 		The post ID
	 * @return 	array 					Array of info about the featured image
	 */
	public function get_featured_images( $postID ) {

		if ( empty( $postID ) ) { return FALSE; }

		$imageID = get_post_thumbnail_id( $postID );

		if ( empty( $imageID ) ) { return FALSE; }

		return wp_prepare_attachment_for_js( $imageID );

	} // get_featured_images()

	/**
	 * Sets the class variable $options
	 */
	private function set_options() {

		$this->options = get_option( $this->plugin_name . '-options' );

	} // set_options()

	/**
	 * Includes the single employee communication methods metadata
	 *
	 * @param 		array 		$meta 		The post metadata
	 */
	public function single_employee_comms( $meta ) {

		include employees_get_template( 'single-comms', 'single' );

	} // single_employee_comms()

	/**
	 * Includes the single employee contact info metadata
	 *
	 * @param 		array 		$meta 		The post metadata
	 */
	public function single_employee_contact_info( $meta ) {

		include employees_get_template( 'single-contact-info', 'single' );

	} // single_employee_contact_info()

	/**
	 * Includes the single employee content
	 *
	 * @return [type] [description]
	 */
	public function single_employee_description() {

		include employees_get_template( 'single-description', 'single' );

	} // single_employee_description()

	/**
	 * Includes the single employee job title
	 *
	 * @return [type] [description]
	 */
	public function single_employee_job_title() {

		include employees_get_template( 'single-job-title', 'single' );

	} // single_employee_job_title()

	/**
	 * Includes the single employee name
	 *
	 * @return [type] [description]
	 */
	public function single_employee_name() {

		include employees_get_template( 'single-name', 'single' );

	} // single_employee_name()

	/**
	 * Include the single employee thumbnail
	 *
	 * @hooked 		employees-before-single-employee-content 		10
	 */
	public function single_employee_thumbnail() {

		include employees_get_template( 'single-thumbnail', 'single' );

	} // single_employee_thumbnail()

	/**
	 * Returns a reference to this class. Used for removing
	 * actions and/or filters declared here.
	 *
	 * @see  	http://hardcorewp.com/2012/enabling-action-and-filter-hook-removal-from-class-based-wordpress-plugins/
	 * @return 	object 		This class
	 */
	static function this() {

		return self::$_this;

	} // this()

} // class
