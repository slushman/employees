<?php
/**
 * The view for the employee state used in the loop
 */

if ( ! empty( $meta['state'][0] ) ) {

	?><span class="state region" itemprop="addressRegion"><?php

		echo esc_html( $meta['state'][0], 'employees' );

	?></span><?php

}