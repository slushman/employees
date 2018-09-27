<?php

/**
* The HTML for a field label beginning.
* Used for the checkbox field.
*/

?><label <?php

	if ( ! empty( $properties['class-label'] ) ) { echo ' class="' . esc_attr( $properties['class-label'] ) . '"'; }

?> for="<?php echo esc_attr( $attributes['id'] ); ?>">
<span class="label <?php

	if ( ! empty( $properties['class-label-span'] ) ) { echo esc_attr( $properties['class-label-span'] ); }

?>">
