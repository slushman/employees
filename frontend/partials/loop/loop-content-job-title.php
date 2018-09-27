<?php
/**
 * The view for the employee job title used in the loop
 */

if ( empty( $meta['jobTitle'][0] ) ) { return; }

?><p class="employee-list-title" itemprop="jobTitle"><?php echo esc_html( $meta['jobTitle'][0] ); ?></p>