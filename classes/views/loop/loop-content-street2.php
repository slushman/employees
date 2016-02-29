<?php
/**
 * The view for the employee street address 2 used in the loop
 */

if ( ! empty( $meta['address2'][0] ) ) {

	?><p class="extended-address" itemprop="streetAddress"><?php

		echo esc_html( $meta['address2'][0], 'employees' );

	?></p><?php

}