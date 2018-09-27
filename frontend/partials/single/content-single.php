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
 * employees_before_single hook
 */
do_action( 'employees_before_single', $meta );

?><article class="wrap-employee vcard" itemscope itemtype="http://schema.org/Person"><?php

	/**
	 * employees_before_single_content hook
	 */
	do_action( 'employees_before_single_content', $meta );

		/**
		 * employees_single_content hook
		 *
		 * @hooked 		single_employee_thumbnail 		10
		 * @hooked 		single_employee_name 			15
		 * @hooked 		single_employee_job_title 		20
		 * @hooked 		single_employee_description 	25
		 * @hooked 		single_employee_contact_info 	30
		 * @hooked 		single_employee_comms 			35
		 */
		do_action( 'employees_single_content', '', $meta );

	/**
	 * employees_after_single_content hook
	 */
	do_action( 'employees_after_single_content', $meta );

?></article><!-- .wrap-employee --><?php

/**
 * employees_after_single hook
 */
do_action( 'employees_after_single', $meta );
