<?php
/**
 * The template for displaying single post content.
 *
 * With Microdata and hCard support.
 *
 * @package Employees
 */

if ( empty( $meta['jobTitle'][0] ) ) { return; }

?><h2 class="job-title category" itemprop="jobTitle"><?php

	esc_html_e( $meta['jobTitle'][0] );

?></h2>