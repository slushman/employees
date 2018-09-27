<?php
/**
 * The view for the employee city used in the loop
 */

if ( ! empty( $meta['city'][0] ) ) {

	?><span class="city locality" itemprop="addressLocality"><?php

		echo esc_html( $meta['city'][0], 'employees' );

	?></span><?php

}