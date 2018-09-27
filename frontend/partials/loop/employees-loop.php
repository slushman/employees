<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://slushman.com
 * @since      1.0.0
 *
 * @package    Employees
 * @subpackage Employees/classes/loop-views
 */

/**
 * employees-before-loop hook
 *
 * @hooked 		loop_nav 				10
 * @hooked 		loop_wrap_start 		15
 */
do_action( 'employees-before-loop', $args );

foreach ( $items as $item ) {

	$meta = get_post_custom( $item->ID );

	/**
	 * employees-before-loop-content hook
	 *
	 * @param 		object  	$item 		The post object
	 *
	 * @hooked 		loop_content_wrap_begin 		10
	 * @hooked 		loop_content_link_begin 		15
	 */
	do_action( 'employees-before-loop-content', $item, $meta );

		/**
		 * employees-loop-content hook
		 *
		 * @param 		object  	$item 		The post object
		 *
		 * @hooked		loop_content_image 			10
		 * @hooked 		loop_content_name 			15
		 * @hooked 		loop_content_job_title 		20
		 */
		do_action( 'employees-loop-content', $item, $meta );

	/**
	 * employees-after-loop-content hook
	 *
	 * @param 		object  	$item 		The post object
	 *
	 * @hooked 		loop_content_link_end 		10
	 * @hooked 		loop_content_wrap_end 		90
	 */
	do_action( 'employees-after-loop-content', $item, $meta );

} // foreach

/**
 * employees-after-loop hook
 *
 * @hooked 		loop_wrap_end 			10
 */
do_action( 'employees-after-loop', $args );
