<?php
/**
 * The view for the employee zip code used in the loop
 */

if ( ! empty( $meta['zipCode'][0] ) ) {

	?><span class="zipcode postal-code" itemprop="postalCode"><?php

		echo esc_html( $meta['zipCode'][0], 'employees' );

	?></span><?php

}