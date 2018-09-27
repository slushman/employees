<?php
/**
 * The view for the employee job title used in the loop
 */

if ( ! empty( $meta['faxNumber'][0] ) ) {

	?><p class="employee-list-fax-number" itemprop="faxNumber"><?php echo esc_html( $meta['faxNumber'][0] ); ?></p><?php

}