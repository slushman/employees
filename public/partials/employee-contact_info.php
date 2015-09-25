<?php
/**
 * Template part for displaying the employee contact info
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Employees
 */

$meta = get_post_custom( $post->ID );

?><address class="contact-info adr" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><?php

if ( ! empty( $meta['address'][0] ) ) {

	?><p class="street-address" itemprop="streetAddress"><?php esc_html_e( $meta['address'][0], 'employees' ); ?></p><?php

}

if ( ! empty( $meta['address2'][0] ) ) {

	?><p class="extended-address" itemprop="streetAddress"><?php esc_html_e( $meta['address2'][0], 'employees' ); ?></p><?php

}

if ( ! empty( $meta['city'][0] ) || ! empty( $meta['state'][0] ) || ! empty( $meta['zipcode'][0] ) ) {

	?><p><?php

}

if ( ! empty( $meta['city'][0] ) ) {

	?><span class="city locality" itemprop="addressLocality"><?php esc_html_e( $meta['city'][0], 'employees' ); ?></span><?php

}

if ( ! empty( $meta['city'][0] ) && ! empty( $meta['state'][0] ) ) {

	?>, <?php

}

if ( ! empty( $meta['state'][0] ) ) {

	?><span class="state region" itemprop="addressRegion"><?php esc_html_e( $meta['state'][0], 'employees' ); ?></span><?php

}

if ( ! empty( $meta['state'][0] ) && ! empty( $meta['zipcode'][0] ) ) {

	?>&nbsp;<?php

}

if ( ! empty( $meta['zipcode'][0] ) ) {

	?><span class="zipcode postal-code" itemprop="postalCode"><?php esc_html_e( $meta['zipcode'][0], 'employees' ); ?></span><?php

}

if ( ! empty( $meta['city'][0] ) || ! empty( $meta['state'][0] ) || ! empty( $meta['zipcode'][0] ) ) {

	?></p><?php

}

if ( ! empty( $meta['building'][0] ) || ! empty( $meta['office'][0] ) ) {

	?><p><?php

}

if ( ! empty( $meta['office'][0] ) ) {

	?><span class="office" itemprop="additionalProperty"><?php esc_html_e( $meta['office'][0], 'employees' ); ?></span><?php

}

if ( ! empty( $meta['building'][0] ) && ! empty( $meta['office'][0] ) ) {

	?>, <?php

}

if ( ! empty( $meta['building'][0] ) ) {

	?><span class="building" itemprop="additionalProperty"><?php esc_html_e( $meta['building'][0], 'employees' ); ?></span><?php

}

if ( ! empty( $meta['building'][0] ) || ! empty( $meta['office'][0] ) ) {

	?></p><?php

}

?></address>
