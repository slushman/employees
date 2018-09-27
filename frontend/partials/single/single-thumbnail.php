<?php
/**
 * The view for the employee image used in the single-employee template
 */

if ( ! has_post_thumbnail() ) { return; }

$thumb_atts['class'] 	= 'alignleft img-employee photo';
$thumb_atts['itemtype'] = 'image';

/**
 * employees_single_post_featured_image_attributes hook.
 */
apply_filters( 'employees_single_post_featured_image_attributes', $thumb_atts );

the_post_thumbnail( 'medium', $thumb_atts );