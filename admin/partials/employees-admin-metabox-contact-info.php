<?php

/**
 * Displays a metabox
 *
 * @link       http://slushman.com
 * @since      1.0.0
 *
 * @package    Employees
 * @subpackage Employees/admin/partials
 */

$meta = get_post_custom( $object->ID );
$metas 	= array();
$fields = array( 'phone-office', 'phone-cell', 'fax-number', 'email-address', 'url-linkedin', 'url-vcard' );

foreach ( $fields as $field ) {

	$metas[$field] = '';

	if ( ! empty( $meta[$field][0] ) ) {

		$metas[$field] = $meta[$field][0];

	}

} // foreach

wp_nonce_field( $this->plugin_name, 'nonce_employees_contact_info' );

?><p>
	<label for="phone-office"><?php esc_html_e( 'Office Phone', 'employees' ); ?>: </label>
	<input class="widefat" id="phone-office" name="phone-office" type="text" value="<?php echo esc_attr( $metas['phone-office'] ); ?>" />
</p>
<p>
	<label for="phone-cell"><?php esc_html_e( 'Cell Phone', 'employees' ); ?>: </label>
	<input class="widefat" id="phone-cell" name="phone-cell" type="text" value="<?php echo esc_attr( $metas['phone-cell'] ); ?>" />
</p>
<p>
	<label for="fax-number"><?php esc_html_e( 'Fax Number', 'employees' ); ?>: </label>
	<input class="widefat" id="fax-number" name="fax-number" type="text" value="<?php echo esc_attr( $metas['fax-number'] ); ?>" />
</p>
<p>
	<label for="email-address"><?php esc_html_e( 'Email Address', 'employees' ); ?>: </label>
	<input class="widefat" id="email-address" name="email-address" type="email" value="<?php echo esc_attr( $metas['email-address'] ); ?>" />
</p>
<p>
	<label for="url-linkedin"><?php esc_html_e( 'LinkedIn URL', 'employees' ); ?>: </label>
	<input class="widefat" id="url-linkedin" name="url-linkedin" type="url" value="<?php echo esc_attr( $metas['url-linkedin'] ); ?>" />
</p>
<p id="vcard-container">
	<label for="url-vcard"><?php esc_html_e( 'vCard URL', 'employees' ); ?>: </label>
	<input class="widefat" id="url-vcard" name="url-vcard" type="url" value="<?php echo esc_attr( $metas['url-vcard'] ); ?>" />
	<a href="#" class="" id="upload-vcard"><?php esc_html_e( 'Choose/Upload vCard', 'employees' ); ?></a>
	<a href="#" class="hide" id="remove-vcard"><?php esc_html_e( 'Remove vCard', 'employees' ); ?></a>
</p>