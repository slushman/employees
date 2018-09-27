<?php
/**
 * Template part for displaying the employee contact info
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Employees
 */

if ( empty( $meta['address'][0] )
	&& empty( $meta['address2'][0] )
	&& empty( $meta['city'][0] )
	&& empty( $meta['state'][0] )
	&& empty( $meta['zipCode'][0] )
	&& empty( $meta['building'][0] )
	&& empty( $meta['officeNumber'][0] )
	) {

	return;

}

?><h2><?php echo esc_html( apply_filters( 'employees_single_post_label_contact_info', __( 'Contact Information' , 'employees' ) ) ); ?></h2>
<address class="contact-info adr" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><?php

if ( ! empty( $meta['address'][0] ) ) {

	?><p class="street-address" itemprop="streetAddress"><?php

		echo esc_html( $meta['address'][0], 'employees' );

	?></p><?php

}

if ( ! empty( $meta['address2'][0] ) ) {

	?><p class="extended-address" itemprop="streetAddress"><?php

		echo esc_html( $meta['address2'][0], 'employees' );

	?></p><?php

}

if ( ! empty( $meta['city'][0] ) || ! empty( $meta['state'][0] ) || ! empty( $meta['zipCode'][0] ) ) {

	?><p><?php

}

if ( ! empty( $meta['city'][0] ) ) {

	?><span class="city locality" itemprop="addressLocality"><?php

		echo esc_html( $meta['city'][0], 'employees' );

	?></span><?php

}

if ( ! empty( $meta['city'][0] ) && ! empty( $meta['state'][0] ) ) {

	?>, <?php

}

if ( ! empty( $meta['state'][0] ) ) {

	?><span class="state region" itemprop="addressRegion"><?php

		echo esc_html( $meta['state'][0], 'employees' );

	?></span><?php

}

if ( ! empty( $meta['state'][0] ) && ! empty( $meta['zipCode'][0] ) ) {

	?>&nbsp;<?php

}

if ( ! empty( $meta['zipCode'][0] ) ) {

	?><span class="zipcode postal-code" itemprop="postalCode"><?php

		echo esc_html( $meta['zipCode'][0], 'employees' );

	?></span><?php

}

if ( ! empty( $meta['city'][0] ) || ! empty( $meta['state'][0] ) || ! empty( $meta['zipCode'][0] ) ) {

	?></p><?php

}

if ( ! empty( $meta['building'][0] ) || ! empty( $meta['officeNumber'][0] ) ) {

	?><p><?php

}

if ( ! empty( $meta['officeNumber'][0] ) ) {

	?><span class="office" itemprop="additionalProperty"><?php

		echo esc_html( $meta['officeNumber'][0], 'employees' );

	?></span><?php

}

if ( ! empty( $meta['building'][0] ) && ! empty( $meta['officeNumber'][0] ) ) {

	?>, <?php

}

if ( ! empty( $meta['building'][0] ) ) {

	?><span class="building" itemprop="additionalProperty"><?php

		esc_html_e( $meta['building'][0], 'employees' );

	?></span><?php

}

if ( ! empty( $meta['building'][0] ) || ! empty( $meta['officeNumber'][0] ) ) {

	?></p><?php

}

?></address>
