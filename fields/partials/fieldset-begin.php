<?php

/**
* The HTML for a fieldset beginning.
*/

?><fieldset <?php

	if ( ! empty( $properties['class-fieldset'] ) ) { 
		
		echo ' class="' . esc_attr( $properties['class-fieldset'] ) . '"'; 
	
	}

?>>
