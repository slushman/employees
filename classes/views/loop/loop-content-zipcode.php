<?php
/**
 * The view for the employee zip code used in the loop
 */

if ( ! empty( $meta['zipcode'][0] ) ) {

	?><span class="zipcode postal-code" itemprop="postalCode"><?php

		echo esc_html( $meta['zipcode'][0], 'employees' );

	?></span><?php

}