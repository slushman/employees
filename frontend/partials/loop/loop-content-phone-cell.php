<?php
/**
 * The view for the employee job title used in the loop
 */

if ( ! empty( $meta['phoneCell'][0] ) ) {

	?><p class="employee-list-phone-cell" itemprop="telephone">
		<a href="tel:<?php echo esc_html( $meta['phoneCell'][0] ); ?>"><?php

			echo apply_filters( $this->plugin_name . '-loop-text-phone-cell', sanitize_email( $meta['phoneCell'][0] ) );

		?></a>
	</p><?php

}