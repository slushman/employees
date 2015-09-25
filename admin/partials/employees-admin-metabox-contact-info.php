<?php

/**
 * Displays a metabox
 *
 * @link       http://slushman.com
 * @since      1.0.0
 *
 * @package    Employeesx
 * @subpackage Employees/admin/partials
 */

wp_nonce_field( $this->plugin_name, 'nonce_employees_contact_info' );

$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'phone-office';
$atts['label'] 			= 'Office Phone';
$atts['name'] 			= 'phone-office';
$atts['placeholder'] 	= '';
$atts['type'] 			= 'text';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'employees-admin-field-text.php' );

?></p><?php

$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'phone-cell';
$atts['label'] 			= 'Cell Phone';
$atts['name'] 			= 'phone-cell';
$atts['placeholder'] 	= '';
$atts['type'] 			= 'text';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-phone-cell', $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'employees-admin-field-text.php' );

?></p><?php

$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'fax-number';
$atts['label'] 			= 'Fax Phone';
$atts['name'] 			= 'fax-number';
$atts['placeholder'] 	= '';
$atts['type'] 			= 'text';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-fax-number', $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'employees-admin-field-text.php' );

?></p><?php

$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'email-address';
$atts['label'] 			= 'Email Address';
$atts['name'] 			= 'email-address';
$atts['placeholder'] 	= '';
$atts['type'] 			= 'email';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-email-address', $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'employees-admin-field-text.php' );

?></p><?php

$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'url-vcard';
$atts['label'] 			= 'vCard URL';
$atts['label-remove'] 	= 'Remove vCard';
$atts['label-upload'] 	= 'Choose/Upload vCard';
$atts['name'] 			= 'url-vcard';
$atts['placeholder'] 	= '';
$atts['type'] 			= 'url';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-url-vcard', $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'employees-admin-field-file-upload.php' );

?></p>