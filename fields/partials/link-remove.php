<?php

/**
 * The HTML for a remove link.
 */

?><a href="#" class="<?php echo esc_attr( $this->set_class_by_value( 'remove', $attributes ) ); ?>" id="remove-file"><?php

	echo wp_kses( $properties['label-remove'], array( 'code' => array() ) );

?></a>
