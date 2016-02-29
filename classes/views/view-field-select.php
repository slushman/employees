<?php

/**
 * Provides the markup for a select field
 *
 * @link       http://slushman.com
 * @since      1.0.0
 *
 * @package    Employees
 * @subpackage Employees/classes/views
 */

if ( ! empty( $atts['label'] ) ) {

	?><label for="<?php echo esc_attr( $atts['id'] ); ?>"><?php esc_html_e( $atts['label'], 'employees' ); ?>: </label><?php

}

?><select
	aria-label="<?php esc_attr( _e( $atts['aria'], 'employees' ) ); ?>"
	class="<?php echo esc_attr( $atts['class'] ); ?>"
	id="<?php echo esc_attr( $atts['id'] ); ?>"
	name="<?php echo esc_attr( $atts['name'] ); ?>"><?php

if ( ! empty( $atts['blank'] ) ) {

	?><option value><?php esc_html_e( $atts['blank'], 'employees' ); ?></option><?php

}

if ( ! empty( $atts['selections'] ) ) {

	foreach ( $atts['selections'] as $selection ) {

		if ( is_array( $selection ) ) {

			$label = $selection['label'];
			$value = $selection['value'];

		} else {

			$label = $selection;
			$value = sanitize_title( $selection );

		}

		?><option
			value="<?php echo esc_attr( $value ); ?>" <?php
			selected( $atts['value'], $value ); ?>><?php

			esc_html_e( $label, 'employees' );

		?></option><?php

	} // foreach

}

?></select>
<span class="description"><?php esc_html_e( $atts['description'], 'employees' ); ?></span>
