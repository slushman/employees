<?php
/**
 * The template for displaying all single employee posts.
 *
 * With Microdata and hCard support.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Employees
 */

global $post;

$meta = get_post_custom( $post->ID );
$fields = Employees_Admin_Metaboxes::get_metabox_fields();

get_header();

do_action( 'employees_before_single_employee' );

?><div class="container-employee vcard" itemscope itemtype="http://schema.org/Person"><?php

	if ( have_posts() ) :

		while ( have_posts() ) : the_post();

			if ( has_post_thumbnail() ) {

				$thumb_atts['class'] 	= 'alignleft img-employee photo';
				$thumb_atts['itemtype'] = 'image';

				apply_filters( 'employees-single-post-featured-image-attributes', $thumb_atts );

				the_post_thumbnail( 'medium', $thumb_atts );

			}

			the_title( '<h1 class="name-employee fn" itemprop="name">', '</h1>' );

			if ( ! empty( $meta['job-title'][0] ) ) {

				?><h2 class="<?php echo esc_attr( 'job-title' ); ?> category" itemprop="jobTitle"><?php echo esc_html( $meta['job-title'][0] ); ?></h2><?php

			}

			?><div class="content-job" itemtype="description"><?php

				the_content();

				?><h2><?php esc_html_e( apply_filters( 'employees-single-post-label-contact-info', 'Contact Information' ), 'employees' ); ?></h2><?php

				include( plugin_dir_path( __FILE__ ) . 'employee-contact_info.php' );

				include( plugin_dir_path( __FILE__ ) . 'employee-comms.php' );

			?></div><!-- .content-job --><?php

		endwhile;

	endif;

?></div><?php

do_action( 'employees_after_single_employee' );

get_footer();