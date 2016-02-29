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

wp_nonce_field( $this->plugin_name, 'nonce_employees_location_info' );

$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'address';
$atts['label'] 			= 'Street Address';
$atts['name'] 			= 'address';
$atts['placeholder'] 	= '';
$atts['type'] 			= 'text';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-address', $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'view-field-text.php' );

?></p><?php

$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'address2';
$atts['label'] 			= 'Street Address 2';
$atts['name'] 			= 'address2';
$atts['placeholder'] 	= '';
$atts['type'] 			= 'text';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-address2', $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'view-field-text.php' );

?></p><?php

$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'city';
$atts['label'] 			= 'City';
$atts['name'] 			= 'city';
$atts['placeholder'] 	= '';
$atts['type'] 			= 'text';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-city', $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'view-field-text.php' );

$atts 					= array();
$atts['aria'] 			= esc_html__( 'Select a State', 'employees' );
$atts['blank'] 			= esc_html__( 'Select a State', 'employees' );
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'state';
$atts['label'] 			= 'State';
$atts['name'] 			= 'state';
$atts['selections'][] 	= array( 'value' => 'AL', 'label' => esc_html__( 'Alabama', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'AK', 'label' => esc_html__( 'Alaska', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'AZ', 'label' => esc_html__( 'Arizona', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'AR', 'label' => esc_html__( 'Arkansas', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'CA', 'label' => esc_html__( 'California', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'CO', 'label' => esc_html__( 'Colorado', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'CT', 'label' => esc_html__( 'Connecticut', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'DE', 'label' => esc_html__( 'Delaware', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'DC', 'label' => esc_html__( 'District of Columbia', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'FL', 'label' => esc_html__( 'Florida', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'GA', 'label' => esc_html__( 'Georgia', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'HI', 'label' => esc_html__( 'Hawaii', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'ID', 'label' => esc_html__( 'Idaho', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'IL', 'label' => esc_html__( 'Illinois', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'IN', 'label' => esc_html__( 'Indiana', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'IA', 'label' => esc_html__( 'Iowa', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'KS', 'label' => esc_html__( 'Kansas', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'KY', 'label' => esc_html__( 'Kentucky', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'LA', 'label' => esc_html__( 'Louisiana', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'ME', 'label' => esc_html__( 'Maine', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'MD', 'label' => esc_html__( 'Maryland', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'MA', 'label' => esc_html__( 'Massachusetts', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'MI', 'label' => esc_html__( 'Michigan', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'MN', 'label' => esc_html__( 'Minnesota', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'MS', 'label' => esc_html__( 'Mississippi', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'MO', 'label' => esc_html__( 'Missouri', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'MT', 'label' => esc_html__( 'Montana', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'NE', 'label' => esc_html__( 'Nebraska', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'NV', 'label' => esc_html__( 'Nevada', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'NH', 'label' => esc_html__( 'New Hampshire', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'NJ', 'label' => esc_html__( 'New Jersey', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'NM', 'label' => esc_html__( 'New Mexico', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'NY', 'label' => esc_html__( 'New York', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'NC', 'label' => esc_html__( 'North Carolina', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'ND', 'label' => esc_html__( 'North Dakota', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'OH', 'label' => esc_html__( 'Ohio', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'OK', 'label' => esc_html__( 'Oklahoma', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'OR', 'label' => esc_html__( 'Oregon', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'PA', 'label' => esc_html__( 'Pennsylvania', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'RI', 'label' => esc_html__( 'Rhode Island', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'SC', 'label' => esc_html__( 'South Carolina', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'SD', 'label' => esc_html__( 'South Dakota', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'TN', 'label' => esc_html__( 'Tennessee', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'TX', 'label' => esc_html__( 'Texas', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'UT', 'label' => esc_html__( 'Utah', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'VT', 'label' => esc_html__( 'Vermont', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'VA', 'label' => esc_html__( 'Virginia', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'WA', 'label' => esc_html__( 'Washington', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'WV', 'label' => esc_html__( 'West Virginia', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'WI', 'label' => esc_html__( 'Wisconsin', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'WY', 'label' => esc_html__( 'Wyoming', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'AS', 'label' => esc_html__( 'American Samoa', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'AA', 'label' => esc_html__( 'Armed Forces America (except Canada)', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'AE', 'label' => esc_html__( 'Armed Forces Africa/Canada/Europe/Middle East', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'AP', 'label' => esc_html__( 'Armed Forces Pacific', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'FM', 'label' => esc_html__( 'Federated States of Micronesia', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'GU', 'label' => esc_html__( 'Guam', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'MH', 'label' => esc_html__( 'Marshall Islands', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'MP', 'label' => esc_html__( 'Northern Mariana Islands', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'PR', 'label' => esc_html__( 'Puerto Rico', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'PW', 'label' => esc_html__( 'Palau', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'VI', 'label' => esc_html__( 'Virgin Islands', 'employees' ) );
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-state', $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'view-field-select.php' );

?></p><?php

$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'zipcode';
$atts['label'] 			= 'Zip Code';
$atts['name'] 			= 'zipcode';
$atts['placeholder'] 	= '';
$atts['type'] 			= 'text';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-zipcode', $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'view-field-text.php' );

?></p><?php

$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'building';
$atts['label'] 			= 'Building';
$atts['name'] 			= 'building';
$atts['placeholder'] 	= '';
$atts['type'] 			= 'text';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-building', $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'view-field-text.php' );

?></p><?php

$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'office';
$atts['label'] 			= 'Office Number';
$atts['name'] 			= 'office';
$atts['placeholder'] 	= '';
$atts['type'] 			= 'text';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-office', $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'view-field-text.php' );

?></p>
