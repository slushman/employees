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

$options 	= get_option( $this->plugin_name . '-options' );
$option 	= 'Actually, noone really works here...';

if ( ! empty( $options['none-found-message'] ) ) {

	$option = $options['none-found-message'];

}

?><input class="text widefat" id="<?php echo $this->plugin_name; ?>-options'[none-found-message]" name="<?php echo $this->plugin_name; ?>-options'[none-found-message]" type="text" value="<?php echo esc_attr( $option ); ?>" />
<span class="description"><?php esc_html_e( 'This message displays on the page if no employees are found.', 'employees' ); ?></span>