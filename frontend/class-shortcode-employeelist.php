<?php

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the output of the shortcode employeelist.
 *
 * @link 			https://www.slushman.com
 * @since 			1.0.0
 * @package 		Employees\Frontend
 * @author 			slushman <chris@slushman.com>
 */

namespace Employees\Frontend;

class Shortcode_Employeelist {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 		1.0.0
	 */
	public function __construct() {} // __construct()

	/**
	 * Registers all the WordPress hooks and filters related to this class.
	 *
	 * @hooked 		init
	 * @since 		1.0.0
	 */
	public function hooks() {

		add_shortcode( 'employeelist', array( $this, 'shortcode' ) );

		/**
		 * Action instead of template tag.
		 *
		 * do_action( 'employeelist' );
		 *
		 * or
		 *
		 * echo apply_filters( 'employeelist' );
		 *
		 * @link 	http://nacin.com/2010/05/18/rethinking-template-tags-in-plugins/
		 */
		add_action( 'employeelist', array( $this, 'shortcode' ) );

	} // hooks()

	/**
	 * Processes shortcode employeelist
	 *
	 * @param 	array 	$atts 		Shortcode attributes
	 * @return	mixed	$output		Output of the buffer
	 */
	public function shortcode( $atts = array() ) {

		ob_start();

		$defaults['department'] 	= '';
		$defaults['links'] 			= 'yes';
		$defaults['loop-template'] 	= EMPLOYEES_SLUG . '-loop';
		$defaults['order'] 			= 'ASC';
		$defaults['quantity'] 		= 100;
		$defaults['show'] 			= array( 'image', 'name', 'job_title' );
		$args						= shortcode_atts( $defaults, $atts, 'employeelist' );
		$args 						= apply_filters( 'employees_list_shortcode_args', $args );
		$shared 					= new Employees_Shared( EMPLOYEES_SLUG, EMPLOYEES_VERSION );
		$items 						= $shared->query( $args );

		if ( is_array( $items ) || is_object( $items ) ) {

			include employees_get_template( $args['loop-template'], 'loop' );

		} else {

			echo $items;

		}

		$output = ob_get_contents();

		ob_end_clean();

		return $output;

	} // shortcode()

} // class