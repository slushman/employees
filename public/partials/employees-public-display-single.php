<?php

/**
 * The view of a single employee in the listing of employees - NOT the single employee page
 *
 * @link 		http://slushman.com/
 * @since 		1.0.0
 *
 * @package 	Staff_Directory
 * @subpackage 	Staff_Directory/public/partials
 */

$meta = get_post_meta( $item->ID );

//pretty( $meta );

?><div <?php post_class(); ?>>
	<a href="<?php echo get_permalink( $item->ID ); ?>" class="link-employee">
		<p class="name-employee"><?php echo $item->post_title; ?></p><?php

		if ( ! empty( $meta['title-job'][0] ) ) {

			?><p class="title-job"><?php echo $meta['title-job'][0]; ?></p><?php

		}

	?></a>
</div>