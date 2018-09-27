<?php
/**
 * The view for the employee description used in the loop
 */

?><div class="employee-list-description"><?php

	echo apply_filters( 'the_content', $item->post_content );

?></div>