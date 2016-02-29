<?php

/**
 * Displays a metabox
 *
 * @link       http://slushman.com
 * @since      1.0.0
 *
 * @package    Employees
 * @subpackage Employees/classes/views
 */

wp_nonce_field( $this->plugin_name, 'nonce_employees_display_order' );

//showme( $this->meta );

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

include( plugin_dir_path( __FILE__ ) . 'view-field-text.php' );

?></p><?php



// Begin alternative display order with radio list
/*
$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description']	= 'Select the display order position';
$atts['id'] 			= 'display-order';
$atts['name'] 			= 'display-order';
$atts['value'] 			= '';
$atts['wrap-tag'] 		= 'p';

// get current order
$order = $this->get_display_order();

// count employee posts
$count = wp_count_posts( 'employee' );

//






/*
// This works with metadata
$shared 					= new Employees_Shared( $this->plugin_name, $this->version );
$emp_args['order'] 			= 'ASC';
$emp_args['post_status'] 	= 'all';
$emp_args['quantity'] 		= 500;
$employees 					= $shared->query( $emp_args );

if ( ! empty( $employees->posts ) ) {

	$count = count( $employees->posts );

}

//echo '<pre>'; print_r( $employees ); echo '</pre>';

for ( $i = 0; $i < $count ; $i++ ) {

	$value = $i + 1;

	$atts['selections'][$i] = array( 'value' => $value, 'label' => esc_html__( $value . ': ', 'employees' ) );

}

if ( ! empty( $atts['selections'] ) ) {

	foreach ( $employees->posts as $employee ) {

		$order = get_post_meta( $employee->ID, 'display-order', TRUE );

		if ( empty( $order ) ) { continue; }

		$key = (int)$order - 1;

		$atts['selections'][$key] 	= array( 'value' => $order, 'label' => esc_html__( $order . ': ' . $employee->post_title, 'employees' ) );

	}

}

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

include( plugin_dir_path( __FILE__ ) . 'employees-admin-field-radios.php' );
*/