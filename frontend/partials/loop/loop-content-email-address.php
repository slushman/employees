<?php
/**
 * The view for the employee job title used in the loop
 */

if ( ! empty( $meta['email-address'][0] ) ) {

	?><p class="employee-list-email-address">
		<a href="mailto:<?php echo esc_html( $meta['email-address'][0] ); ?>" itemprop="email"><?php

			echo apply_filters( $this->plugin_name . '-loop-text-email', sanitize_email( $meta['email-address'][0] ) );

		?></a>
	</p><?php

}