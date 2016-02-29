<?php
/**
 * The template for displaying single post content.
 *
 * With Microdata and hCard support.
 *
 * @package Employees
 */

if ( ! empty( $meta['job-title'][0] ) ) {

	?><h2 class="<?php echo esc_attr( 'job-title' ); ?> category" itemprop="jobTitle"><?php

		esc_html_e( $meta['job-title'][0] );

	?></h2><?php

}