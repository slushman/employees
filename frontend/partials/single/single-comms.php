<?php
/**
 * Template part for displaying the employee communication methods
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Employees
 */

if ( empty( $meta['email-address'][0] )
	&& empty( $meta['phoneOffice'][0] )
	&& empty( $meta['phoneCell'][0] )
	&& empty( $meta['urlVcard'][0] )
	&& empty( $meta['faxNumber'][0] )
	) {

	return;

}

?><ul class="employee-comms"><?php

if ( ! empty( $meta['email-address'][0] ) ) {

	$email = sanitize_email( $meta['email-address'][0], 'employees' );

	?><li>
		<span class="dashicons dashicons-email-alt"></span> <?php

			esc_html_e( 'Email Address', 'employees' );

		?>: <a aria-label="Email Address" class="email" href="mailto:<?php echo $email; ?>" itemprop="email"><?php

			echo $email;

		?></a>
	</li><?php

}

if ( ! empty( $meta['phoneOffice'][0] ) ) {

	$office 	= esc_html__( $meta['phoneOffice'][0], 'employees' );
	$formatted 	= esc_html__( preg_replace( '/[^0-9]/', '', $meta['phoneOffice'][0] ), 'employees' );

	?><li class="tel">
		<span class="dashicons dashicons-phone"></span> <span class="type"><?php esc_html_e( 'Office', 'employees' ); ?></span> <?php

			esc_html_e( 'Phone Number', 'employees' );

		?>: <a aria-label="Office Phone Number" href="tel:<?php echo $formatted; ?>" itemprop="telephone"><?php

			echo $office;

		?></a>
	</li><?php

}

if ( ! empty( $meta['phoneCell'][0] ) ) {

	$cell 		= esc_html__( $meta['phoneCell'][0], 'employees' );
	$formatted 	= esc_html__( preg_replace( '/[^0-9]/', '', $meta['phoneCell'][0] ), 'employees' );

	?><li class="tel">
		<span class="dashicons dashicons-smartphone"></span> <span class="type"><?php esc_html_e( 'Cell', 'employees' ); ?></span> <?php

			esc_html_e( 'Phone Number', 'employees' );

		?>: <a aria-label="Cell Phone Number" href="tel:<?php echo $formatted; ?>" itemprop="telephone"><?php

			echo $cell;

		?></a>
	</li><?php

}

if ( ! empty( $meta['faxNumber'][0] ) ) {

	$fax = esc_html__( $meta['faxNumber'][0], 'employees' );

	?><li class="tel">
		<span class="dashicons dashicons-smartphone"></span> <span class="type"><?php esc_html_e( 'Fax Number', 'employees' ); ?></span> <?php

			esc_html_e( 'Fax Number', 'employees' );

		?>: <span aria-label="Fax Number"><?php

			echo $fax;

		?></span>
	</li><?php

}

if ( ! empty( $meta['urlVcard'][0] ) ) {

	$vcard = esc_url( $meta['urlVcard'][0] );

	?><li>
		<span class="dashicons dashicons-index-card"></span> <a aria-label="Download vCard" class="" href="<?php echo $vcard; ?>"><?php

			esc_html_e( 'Download vCard', 'employees' );

		?></a>
	</li><?php

}

?></ul>