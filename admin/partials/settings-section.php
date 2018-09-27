<?php

/**
 * Provide a view for a section
 *
 * Enter text below to appear below the section title on the Settings page
 *
 * @link       http://slushman.com
 * @since      1.0.0
 *
 * @package    Employees\Admin
 */

?><p><?php

	if ( ! empty( $params['description'] ) ) {

		echo esc_html( $params['description'] );

	}

?></p>