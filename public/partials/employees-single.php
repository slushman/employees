<?php

/**
 * The view of a single employee in the listing of employees - NOT the single employee page
 *
 * @link 		http://slushman.com/
 * @since 		1.0.0
 *
 * @package 	Employees
 * @subpackage 	Employees/public/partials
 */

$meta = get_post_custom( $item->ID );

?><dl class="hentry employee" itemscope itemtype="http://schema.org/Person">
	<a class="employee-list-link" href="<?php echo get_permalink( $item->ID ); ?>"><?php

	$image = $this->get_featured_image_info( $item->ID );

	if ( ! empty( $image ) ) {

		$source = apply_filters( 'employees-list-image', $image['sizes']['medium']['url'] );

		?><dd class="employee-list-thumb" style="background-image:url(<?php echo esc_url( $source ); ?>)"><?php

	}

	?><dt class="employee-list-name" itemprop="name"><?php echo $item->post_title; ?></dt><?php

	if ( ! empty( $meta['job-title'][0] ) ) {

		?><dd class="employee-list-title" itemprop="jobTitle"><?php echo $meta['job-title'][0]; ?></dd><?php

	}

	?></a>
</dl>