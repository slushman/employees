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

wp_nonce_field( $this->plugin_name, 'nonce_employees_links' );

$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'url-facebook';
$atts['label'] 			= 'Facebook';
$atts['name'] 			= 'url-facebook';
$atts['placeholder'] 	= '';
$atts['type'] 			= 'url';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-url-facebook', $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'employees-admin-field-text.php' );

?></p><?php



$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'url-flickr';
$atts['label'] 			= 'Flickr';
$atts['name'] 			= 'url-flickr';
$atts['placeholder'] 	= '';
$atts['type'] 			= 'url';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-url-flickr', $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'employees-admin-field-text.php' );

?></p><?php



$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'url-github';
$atts['label'] 			= 'Github';
$atts['name'] 			= 'url-github';
$atts['placeholder'] 	= '';
$atts['type'] 			= 'url';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-url-github', $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'employees-admin-field-text.php' );

?></p><?php



$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'url-google';
$atts['label'] 			= 'Google+';
$atts['name'] 			= 'url-google';
$atts['placeholder'] 	= '';
$atts['type'] 			= 'url';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-url-google', $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'employees-admin-field-text.php' );

?></p><?php



$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'url-instagram';
$atts['label'] 			= 'Instagram';
$atts['name'] 			= 'url-instagram';
$atts['placeholder'] 	= '';
$atts['type'] 			= 'url';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-url-instagram', $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'employees-admin-field-text.php' );

?></p><?php



$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'url-linkedin';
$atts['label'] 			= 'LinkedIn URL';
$atts['name'] 			= 'url-linkedin';
$atts['placeholder'] 	= '';
$atts['type'] 			= 'url';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-url-linkedin', $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'employees-admin-field-text.php' );

?></p><?php



$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'url-pinterest';
$atts['label'] 			= 'Pinterest';
$atts['name'] 			= 'url-pinterest';
$atts['placeholder'] 	= '';
$atts['type'] 			= 'url';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-url-pinterest', $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'employees-admin-field-text.php' );

?></p><?php



$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'url-tumblr';
$atts['label'] 			= 'tumblr';
$atts['name'] 			= 'url-tumblr';
$atts['placeholder'] 	= '';
$atts['type'] 			= 'url';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-url-tumblr', $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'employees-admin-field-text.php' );

?></p><?php



$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'url-twitter';
$atts['label'] 			= 'Twitter';
$atts['name'] 			= 'url-twitter';
$atts['placeholder'] 	= '';
$atts['type'] 			= 'url';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-url-twitter', $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'employees-admin-field-text.php' );

?></p><?php



$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'url-website';
$atts['label'] 			= 'Website';
$atts['name'] 			= 'url-website';
$atts['placeholder'] 	= '';
$atts['type'] 			= 'url';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-url-website', $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'employees-admin-field-text.php' );

?></p><?php



$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'url-wordpress';
$atts['label'] 			= 'WordPress';
$atts['name'] 			= 'url-wordpress';
$atts['placeholder'] 	= '';
$atts['type'] 			= 'url';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-url-wordpress', $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'employees-admin-field-text.php' );

?></p>
