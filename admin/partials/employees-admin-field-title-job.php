<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://slushman.com
 * @since      1.0.0
 *
 * @package    Employees
 * @subpackage Employees/admin/partials
 */

wp_nonce_field( $this->plugin_name, 'nonce_employees_title_job' );

?><div>
	<label class="screen-reader-text" id="jobtitle-prompt-text" for="title-job"><?php esc_html_e( apply_filters( 'employees-title-job', 'Enter job title here' ), 'employees' ); ?>: </label>
	<input class="text widefat" id="title-job" name="title-job" placeholder="<?php echo apply_filters( 'employees-title-job', 'Enter job title here' ); ?>" type="text" value="<?php echo esc_attr( $subtitle ); ?>" />
</div>