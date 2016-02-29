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

wp_nonce_field( $this->plugin_name, 'nonce_employees_job_title' );

$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'job-title';
$atts['label'] 			= 'Job Title';
$atts['name'] 			= 'job-title';
$atts['placeholder'] 	= 'Enter job title';
$atts['type'] 			= 'text';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-title-job', $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'view-field-text.php' );

?></p>