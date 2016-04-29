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

wp_nonce_field( $this->plugin_name, 'nonce_employees_name' );

?><div class="metabox-name"><?php

$atts 					= array();
$atts['aria'] 			= esc_html__( 'Select prefix', 'employees' );
$atts['blank'] 			= esc_html__( 'Prefix', 'employees' );
$atts['class'] 			= 'honorific honorific-prefix title-text';
$atts['description'] 	= '';
$atts['id'] 			= 'honorific-prefix';
$atts['label'] 			= '';
$atts['name'] 			= 'honorific-prefix';
$atts['selections'][] 	= array( 'value' => 'Airman', 'label' => esc_html__( 'Airman', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Brother', 'label' => esc_html__( 'Brother', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Capt', 'label' => esc_html__( 'Captain', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Chef', 'label' => esc_html__( 'Chef', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Cmdr', 'label' => esc_html__( 'Cmdr', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Col', 'label' => esc_html__( 'Colonel', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Cpl', 'label' => esc_html__( 'Corporal', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Dame', 'label' => esc_html__( 'Dame', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Dr', 'label' => esc_html__( 'Doctor', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Elder', 'label' => esc_html__( 'Elder', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Father', 'label' => esc_html__( 'Father', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Gen', 'label' => esc_html__( 'General', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Imam', 'label' => esc_html__( 'Imam', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Lt', 'label' => esc_html__( 'Lt', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Maestro', 'label' => esc_html__( 'Maestro', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Maj', 'label' => esc_html__( 'Major', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Ms', 'label' => esc_html__( 'Ms', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Mrs', 'label' => esc_html__( 'Mrs', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Mr', 'label' => esc_html__( 'Mr', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Mx', 'label' => esc_html__( 'Mx', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Ofc', 'label' => esc_html__( 'Officer', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Pastor', 'label' => esc_html__( 'Pastor', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Prof', 'label' => esc_html__( 'Professor', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Pvt', 'label' => esc_html__( 'Private', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Rabbi', 'label' => esc_html__( 'Rabbi', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Rev', 'label' => esc_html__( 'Reverend', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Seaman', 'label' => esc_html__( 'Seaman', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Sen', 'label' => esc_html__( 'Senator', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Sgt', 'label' => esc_html__( 'Sargeant', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Sir', 'label' => esc_html__( 'Sir', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Sister', 'label' => esc_html__( 'Sister', 'employees' ) );
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts = apply_filters( $this->plugin_name . '-field-honorific-prefix', $atts );

include( plugin_dir_path( __FILE__ ) . 'view-field-select.php' );



$atts 					= array();
$atts['class'] 			= 'first-name title-text';
$atts['description'] 	= '';
$atts['id'] 			= 'first-name';
$atts['label'] 			= '';
$atts['name'] 			= 'first-name';
$atts['placeholder'] 	= 'Enter first name';
$atts['type'] 			= 'text';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts = apply_filters( $this->plugin_name . '-field-title-first-name', $atts );

include( plugin_dir_path( __FILE__ ) . 'view-field-text.php' );



$atts 					= array();
$atts['class'] 			= 'last-name title-text';
$atts['description'] 	= '';
$atts['id'] 			= 'last-name';
$atts['label'] 			= '';
$atts['name'] 			= 'last-name';
$atts['placeholder'] 	= 'Enter last name';
$atts['type'] 			= 'text';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts = apply_filters( $this->plugin_name . '-field-title-last-name', $atts );

include( plugin_dir_path( __FILE__ ) . 'view-field-text.php' );



$atts 					= array();
$atts['aria'] 			= esc_html__( 'Select suffix', 'employees' );
$atts['blank'] 			= esc_html__( 'Suffix', 'employees' );
$atts['class'] 			= 'honorific honorific-suffix title-text';
$atts['description'] 	= '';
$atts['id'] 			= 'honorific-suffix';
$atts['label'] 			= '';
$atts['name'] 			= 'honorific-suffix';
$atts['selections'][] 	= array( 'value' => 'I', 'label' => esc_html__( 'I', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'II', 'label' => esc_html__( 'II', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'III', 'label' => esc_html__( 'III', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'IV', 'label' => esc_html__( 'IV', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'V', 'label' => esc_html__( 'V', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'DO', 'label' => esc_html__( 'DO', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'DDS', 'label' => esc_html__( 'DDS', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'DMD', 'label' => esc_html__( 'DMD', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'DVM', 'label' => esc_html__( 'DVM', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'EdD', 'label' => esc_html__( 'EdD', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Esq', 'label' => esc_html__( 'Esq', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Jr', 'label' => esc_html__( 'Junior', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'MD', 'label' => esc_html__( 'MD', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'MSCSW', 'label' => esc_html__( 'MSCSW', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'OD', 'label' => esc_html__( 'OD', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'PhD', 'label' => esc_html__( 'PhD', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'PharmD', 'label' => esc_html__( 'PharmD', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Rep', 'label' => esc_html__( 'Rep', 'employees' ) );
$atts['selections'][] 	= array( 'value' => 'Sr', 'label' => esc_html__( 'Senior', 'employees' ) );
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts = apply_filters( $this->plugin_name . '-field-honorific-suffix', $atts );

include( plugin_dir_path( __FILE__ ) . 'view-field-select.php' );

?></div>
