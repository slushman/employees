<?php

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the output of the shortcode employeenav.
 *
 * @link 			https://www.slushman.com
 * @since 			1.0.0
 * @package 		Employees\Frontend
 * @author 			slushman <chris@slushman.com>
 */

namespace Employees\Frontend;

class Shortcode_Employeenav {

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

		add_shortcode( 'employeenav', array( $this, 'shortcode' ) );

	} // hooks()

	/**
	 * Processes shortcode employeelist
	 *
	 * @param 	array 	$atts 		Shortcode attributes
	 * @return	mixed	$output		Output of the buffer
	 */
	public function shortcode( $atts = array() ) {

		ob_start();

		$defaults['nav-template'] 	= 'loop-nav';
		$defaults['type'] 			= 'letter';
		$args 						= shortcode_atts( $defaults, $atts, 'employeesnav' );
		$include 					= employees_get_template( $args['nav-template'] );

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

		//if ( empty( $items ) ) { return; }

		echo '<pre>'; print_r( $include ); echo '</pre>';

		include $include;

		$output = ob_get_contents();

		ob_end_clean();

		return $output;

	} // shortcode()

} // class