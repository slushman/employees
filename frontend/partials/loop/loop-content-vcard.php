<?php
/**
 * The view for the employee job title used in the loop
 */

if ( ! empty( $meta['urlVcard'][0] ) ) {

	?><p class="employee-list-url-vcard">
		<a href="<?php echo esc_html( $meta['urlVcard'][0] ); ?>"><?php

			esc_html_e( apply_filters( $this->plugin_name . '-loop-label-vcard', 'vCard' ), 'employees' );

		?></a>
	</p><?php

}