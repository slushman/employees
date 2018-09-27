<?php
/**
 * The view for the employee office used in the loop
 */

if ( ! empty( $meta['office'][0] ) ) {

	?><span class="office" itemprop="additionalProperty"><?php

		echo esc_html( $meta['office'][0], 'employees' );

	?></span><?php

}