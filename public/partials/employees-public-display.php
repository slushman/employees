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

foreach ( $items->posts as $item ) {

	//pretty( $item );

	include( $this->get_single_template_path() );

} // foreach

?></div>