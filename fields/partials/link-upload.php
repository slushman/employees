<?php

/**
 * The HTML for an upload link.
 */

?><a href="#" class="<?php echo esc_attr( $this->set_class_by_value( 'upload', $attributes ) ); ?>" id="upload-file"><?php

	echo wp_kses( $properties['label-upload'], array( 'code' => array() ) );

?></a>
