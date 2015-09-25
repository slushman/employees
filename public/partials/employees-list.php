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
 * @subpackage Employees/public/partials
 */

?><div class="employee-list-wrap"><?php

do_action( 'employees-list-before' );

foreach ( $items as $item ) {

	do_action( 'employees-list-before-single' );

	include $this->get_view( $args['view-single'] );

	do_action( 'employees-list-after-single' );

} // foreach

do_action( 'employees-list-after' );

?></div>