<?php

/**
* The HTML for a field description in a legend tag.
*/

?><legend class="description"><?php

	echo wp_kses( $properties['description'], array( 'code' => array() ) );

?></legend>
