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

$meta = get_post_custom( $post->ID );

/**
 * employees-before-single-employee hook
 */
do_action( 'employees-before-single', $meta );

?><article class="wrap-employee vcard" itemscope itemtype="http://schema.org/Person"><?php

	/**
	 * employees-before-single-employee hook
	 */
	do_action( 'employees-before-single-content', $meta );

		/**
		 * employees-single-employee-content hook
		 *
		 * @hooked 		single_employee_thumbnail 		10
		 * @hooked 		single_employee_name 			15
		 * @hooked 		single_employee_job_title 		20
		 * @hooked 		single_employee_description 	25
		 * @hooked 		single_employee_contact_info 	30
		 * @hooked 		single_employee_comms 			35
		 */
		do_action( 'employees-single-content', '', $meta );

	/**
	 * employees-before-single-employee hook
	 */
	do_action( 'employees-after-single-content', $meta );

?></article><!-- .wrap-employee --><?php

/**
 * employees-after-single-employee hook
 */
do_action( 'employees-after-single', $meta );
