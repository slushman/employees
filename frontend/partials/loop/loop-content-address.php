<?php
/**
 * The view for the employee address used in the loop
 */

?><address class="address adr" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><?php

include employees_get_template( 'loop-content-street1', 'loop' );

include employees_get_template( 'loop-content-street2', 'loop' );

if ( ! empty( $meta['city'][0] ) || ! empty( $meta['state'][0] ) || ! empty( $meta['zipCode'][0] ) ) {

	?><p><?php

}

include employees_get_template( 'loop-content-city', 'loop' );

if ( ! empty( $meta['city'][0] ) && ! empty( $meta['state'][0] ) ) {

	?>, <?php

}

include employees_get_template( 'loop-content-state', 'loop' );

if ( ! empty( $meta['state'][0] ) && ! empty( $meta['zipCode'][0] ) ) {

	?>&nbsp;<?php

}

include employees_get_template( 'loop-content-zipcode', 'loop' );

if ( ! empty( $meta['city'][0] ) || ! empty( $meta['state'][0] ) || ! empty( $meta['zipCode'][0] ) ) {

	?></p><?php

}

if ( ! empty( $meta['building'][0] ) || ! empty( $meta['officeNumber'][0] ) ) {

	?><p><?php

}

include employees_get_template( 'loop-content-office', 'loop' );

if ( ! empty( $meta['building'][0] ) && ! empty( $meta['officeNumber'][0] ) ) {

	?>, <?php

}

include employees_get_template( 'loop-content-building', 'loop' );

if ( ! empty( $meta['building'][0] ) || ! empty( $meta['officeNumber'][0] ) ) {

	?></p><?php

}

?></address>