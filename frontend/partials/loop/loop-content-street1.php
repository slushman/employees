<?php
/**
 * The view for the employee street address 1 used in the loop
 */

if ( ! empty( $meta['address'][0] ) ) {

	?><p class="street-address" itemprop="streetAddress"><?php

		echo esc_html( $meta['address'][0], 'employees' );

	?></p><?php

}