<?php
/**
 * The view for the employee job title used in the loop
 */

if ( ! empty( $meta['phone-cell'][0] ) ) {

	?><p class="employee-list-phone-cell" itemprop="telephone">
		<a href="tel:<?php echo esc_html( $meta['phone-cell'][0] ); ?>"><?php

			echo apply_filters( $this->plugin_name . '-loop-text-phone-cell', sanitize_email( $meta['phone-cell'][0] ) );

		?></a>
	</p><?php

}