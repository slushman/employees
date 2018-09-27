<?php

/**
* The HTML for a field description in a span tag.
*/

?><span class="description <?php

	if ( ! empty( $properties['class-desc'] ) ) { echo esc_attr( $properties['class-desc'] ); }

?>"><?php

	echo wp_kses( $properties['description'], array( 'code' => array() ) );

?></span>
