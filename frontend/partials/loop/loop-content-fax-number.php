<?php
/**
 * The view for the employee job title used in the loop
 */

if ( ! empty( $meta['fax-number'][0] ) ) {

	?><p class="employee-list-fax-number" itemprop="faxNumber"><?php echo esc_html( $meta['fax-number'][0] ); ?></p><?php

}