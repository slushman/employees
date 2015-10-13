<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://slushman.com
 * @since      1.0.0
 *
 * @package    Employees
 * @subpackage Employees/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the methods for creating the templates.
 *
 * @package    Employees
 * @subpackage Employees/public
 *
 */
class Employees_Template_Functions {

	/**
	 * Private static reference to this class
	 * Useful for removing actions declared here.
	 *
	 * @var 	object 		$_this
 	 */
	private static $_this;

	/**
	 * The post meta data
	 *
	 * @since 		1.0.0
	 * @access 		private
	 * @var 		string 			$meta    			The post meta data.
	 */
	private $meta;

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

		self::$_this = $this;

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	} // __construct()

	/**
	 * Includes the employee image template
	 *
	 * @hooked 		employees-loop-content 		10
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_image( $item, $meta ) {

		include employees_get_template( 'loop-content-image' );

	} // loop_content_image()

	/**
	 * Includes the employee-job-title template
	 *
	 * @hooked 		employees-loop-content 		20
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_job_title( $item, $meta ) {

		include employees_get_template( 'loop-content-job-title' );

	} // loop_content_job_title()

	/**
	 * Includes the link end template file
	 *
	 * @hooked 		employees-after-loop-content 		10
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_link_end( $item, $meta ) {

		include employees_get_template( 'loop-content-link-end' );

	} // loop_content_link_end()

	/**
	 * Includes the link start template file
	 *
	 * @hooked 		employees-before-loop-content 		15
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_link_start( $item, $meta ) {

		include employees_get_template( 'loop-content-link-start' );

	} // loop_content_link_start()

	/**
	 * Includes the employee name template file
	 *
	 * @hooked 		employees-loop-content 		15
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_name( $item, $meta ) {

		include employees_get_template( 'loop-content-name' );

	} // loop_content_name()

	/**
	 * Includes the content wrap end template file
	 *
	 * @hooked 		employees-after-loop-content 		90
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_wrap_end( $item, $meta ) {

		include employees_get_template( 'loop-content-wrap-end' );

	} // loop_content_wrap_end()

	/**
	 * Includes the content wrap start template file
	 *
	 * @hooked 		employees-before-loop-content 		10
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_wrap_start( $item, $meta ) {

		include employees_get_template( 'loop-content-wrap-start' );

	} // loop_content_wrap_start()

	/**
	 * Includes the list wrap end template file
	 *
	 * @hooked 		employees-after-loop 		10
	 */
	public function loop_wrap_end() {

		include employees_get_template( 'loop-wrap-end' );

	} // list_wrap_end()

	/**
	 * Includes the list wrap start template file
	 *
	 * @hooked 		employees-before-loop 		10
	 */
	public function loop_wrap_start() {

		include employees_get_template( 'loop-wrap-start' );

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
	 * Includes the single employee communication methods metadata
	 *
	 * @param 		array 		$meta 		The post metadata
	 */
	public function single_employee_comms( $meta ) {

		include employees_get_template( 'single-employee-comms' );

	} // single_employee_comms()

	/**
	 * Includes the single employee contact info metadata
	 *
	 * @param 		array 		$meta 		The post metadata
	 */
	public function single_employee_contact_info( $meta ) {

		include employees_get_template( 'single-employee-contact-info' );

	} // single_employee_contact_info()

	/**
	 * Includes the single employee content
	 *
	 * @return [type] [description]
	 */
	public function single_employee_content() {

		include employees_get_template( 'single-employee-content' );

	} // single_employee_content()

	/**
	 * Includes the single employee job title
	 *
	 * @return [type] [description]
	 */
	public function single_employee_job_title() {

		include employees_get_template( 'single-employee-job-title' );

	} // single_employee_job_title()

	/**
	 * Includes the single employee name
	 *
	 * @return [type] [description]
	 */
	public function single_employee_name() {

		include employees_get_template( 'single-employee-name' );

	} // single_employee_name()

	/**
	 * Include the single employee thumbnail
	 *
	 * @hooked 		employees-before-single-employee-content 		10
	 */
	public function single_employee_thumbnail() {

		include employees_get_template( 'single-employee-thumbnail' );

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
