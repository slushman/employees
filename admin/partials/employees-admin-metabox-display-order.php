<?php

/**
 * Displays a metabox
 *
 * @link       http://slushman.com
 * @since      1.0.0
 *
 * @package    Employees
 * @subpackage Employees/admin/partials
 */

wp_nonce_field( $this->plugin_name, 'nonce_employees_display_order' );

$atts 					= array();
$atts['class'] 			= '';
$atts['description'] 	= 'Choose when this person appears in the display order.';
$atts['id'] 			= 'display-order';
$atts['label'] 			= 'Display Order';
$atts['name'] 			= 'display-order';
$atts['placeholder'] 	= '';
$atts['type'] 			= 'number';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'employees-admin-field-text.php' );

?></p>