<?php

/**
* The HTML for a select field.
*/

?><select <?php

    foreach ( $attributes as $key => $value ) :

        if ( 'value' === $key ) :

            continue;

        elseif ( 'data' === $key ) :

            foreach ( $attributes['data'] as $key => $value ) :

                echo 'data-' . $key . '="' . esc_attr( $value ) . '" ';

            endforeach;

        elseif ( 'aria-label' === $key ) :

            echo 'aria-label="' . wp_kses( $value, array( 'code' => array() ) ) . '" ';

        else :

            echo $key . '="' . esc_attr( $value ) . '" ';

        endif;

    endforeach;

    ?>><?php

if ( ! empty( $properties['blank'] ) ) {

    ?><option value=""><?php echo wp_kses( $properties['blank'], array( 'code' => array() ) ); ?></option><?php

}

if ( ! empty( $options ) ) :

    foreach ( $options as $option ) :

        $label = ( is_array( $option ) ? $option['label'] : $option );
        $value = ( is_array( $option ) ? $option['value'] : sanitize_title( $option ) );

        ?><option
            value="<?php echo esc_attr( $value ); ?>" <?php

            selected( $attributes['value'], $value ); ?>><?php

            echo wp_kses( $label, array( 'code' => array() ) );

        ?></option><?php

    endforeach;

endif;

?></select>
