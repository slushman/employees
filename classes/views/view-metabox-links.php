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

wp_nonce_field( $this->plugin_name, 'nonce_employees_links' );

$links = array( 'facebook', 'flickr', 'github', 'google', 'instagram', 'linkedin', 'pinterest', 'tumblr', 'twitter', 'website', 'wordpress' );
$links = apply_filters( $this->plugin_name . '-links-list', $links );

foreach ( $links as $link ) {

	$atts 					= array();
	$atts['class'] 			= 'widefat';
	$atts['description'] 	= '';
	$atts['id'] 			= 'url-' . $link;
	$atts['name'] 			= 'url-' . $link;
	$atts['placeholder'] 	= '';
	$atts['type'] 			= 'url';
	$atts['value'] 			= '';

	switch ( $link ) {

		case 'google'		: $atts['label'] = ucwords( $link ) . '+'; break;
		case 'tumblr'		: $atts['label'] = $link; break;
		case 'wordpress'	: $atts['label'] = 'WordPress'; break;
		default 			: $atts['label'] = ucwords( $link ); break;

	}

	if ( ! empty( $this->meta[$atts['id']][0] ) ) {

		$atts['value'] = $this->meta[$atts['id']][0];

	}

	apply_filters( $this->plugin_name . '-field-url-' . $link, $atts );

	?><p><?php

	include( plugin_dir_path( __FILE__ ) . 'view-field-text.php' );

	?></p><?php

} // foreach
