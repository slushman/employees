<?php
/**
 * The view for the employee building used in the loop
 */

if ( ! empty( $meta['building'][0] ) ) {

	?><span class="building" itemprop="additionalProperty"><?php

		esc_html_e( $meta['building'][0], 'employees' );

	?></span><?php

}