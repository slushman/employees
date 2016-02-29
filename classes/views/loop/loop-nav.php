<?php
/**
 * The view for the nav used in the loop
 */

?><div class="employees-loop-nav">
	<ul><?php

	foreach ( $items as $item ) {

		?><li><a href="#<?php echo sanitize_title( $item ); ?>"><?php echo $item; ?></a></li><?php

	} // foreach

	?></ul>
</div>