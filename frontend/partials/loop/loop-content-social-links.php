<?php
/**
 * The view for the employee job title used in the loop
 */

?><ul class="employee-links"><?php

foreach ( $links as $link ) :

	if ( ! empty( $meta['url-' . $link][0] ) ) :

		?><li class="employee-link-<?php echo esc_attr( $link ); ?>">
			<a href="<?php echo esc_url( $meta['url-' . $link][0] ); ?>" itemprop="url" rel="me">
				<span class="screen-reader-text"><?php echo esc_html( ucwords( $link ) ); ?></span><?php

					echo employees_get_svg( $link );

			?></a>
		</li><?php

	endif;

endforeach;

?></ul>