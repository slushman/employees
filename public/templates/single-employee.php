<?php
/**
 * The template for displaying all single employee posts.
 *
 * With Microdata and hCard support.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Employees
 */

if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

/**
 * Get a custom header-employee.php file, if it exists.
 * Otherwise, get default header.
 */
get_header( 'employee' );

if ( have_posts() ) :

	/**
	 * employees-before-employee-loop hook
	 *
	 * @hooked 		employee_single_content_wrap_start 		10
	 */
	do_action( 'employees-single-before-loop' );

	while ( have_posts() ) : the_post();

		include employees_get_template( 'single-content' );

	endwhile;

	/**
	 * employees-after-employee-loop hook
	 *
	 * @hooked 		employee_single_content_wrap_end 		90
	 */
	do_action( 'employees-single-after-loop' );

endif;

get_footer( 'employee' );
