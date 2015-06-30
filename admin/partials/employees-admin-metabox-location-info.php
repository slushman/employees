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

$meta 	= get_post_custom( $object->ID );
$metas 	= array();
$fields = array( 'address', 'address2', 'city', 'state', 'zipcode', 'building', 'office' );

foreach ( $fields as $field ) {

	$metas[$field] = '';

	if ( ! empty( $meta[$field][0] ) ) {

		$metas[$field] = $meta[$field][0];

	}

} // foreach

wp_nonce_field( $this->plugin_name, 'nonce_employees_contact_info' );

?><p>
	<label for="address"><?php esc_html_e( 'Street Address', 'employees' ); ?>: </label>
	<input class="widefat" id="address" name="address" type="text" value="<?php echo esc_attr( $metas['address'] ); ?>" />
</p>
<p>
	<label for="address2"><?php esc_html_e( 'Street Address 2', 'employees' ); ?>: </label>
	<input class="widefat" id="address2" name="address2" type="text" value="<?php echo esc_attr( $metas['address2'] ); ?>" />
</p>
<p>
	<label for="city"><?php esc_html_e( 'City', 'employees' ); ?>: </label>
	<input class="widefat" id="city" name="city" type="text" value="<?php echo esc_attr( $metas['city'] ); ?>" />
</p>
<p>
	<label for="state"><?php esc_html_e( 'State', 'employees' ); ?>: </label>
	<select class="widefat" id="state" name="state">
		<option><?php esc_html_e( 'Select a state', 'employees' ); ?></option><?php

	$states = array(
	    'AL' => esc_html__( 'Alabama', 'employees' ),
	    'AK' => esc_html__( 'Alaska', 'employees' ),
	    'AZ' => esc_html__( 'Arizona', 'employees' ),
	    'AR' => esc_html__( 'Arkansas', 'employees' ),
	    'CA' => esc_html__( 'California', 'employees' ),
	    'CO' => esc_html__( 'Colorado', 'employees' ),
	    'CT' => esc_html__( 'Connecticut', 'employees' ),
	    'DE' => esc_html__( 'Delaware', 'employees' ),
	    'DC' => esc_html__( 'District of Columbia', 'employees' ),
	    'FL' => esc_html__( 'Florida', 'employees' ),
	    'GA' => esc_html__( 'Georgia', 'employees' ),
	    'HI' => esc_html__( 'Hawaii', 'employees' ),
	    'ID' => esc_html__( 'Idaho', 'employees' ),
	    'IL' => esc_html__( 'Illinois', 'employees' ),
	    'IN' => esc_html__( 'Indiana', 'employees' ),
	    'IA' => esc_html__( 'Iowa', 'employees' ),
	    'KS' => esc_html__( 'Kansas', 'employees' ),
	    'KY' => esc_html__( 'Kentucky', 'employees' ),
	    'LA' => esc_html__( 'Louisiana', 'employees' ),
	    'ME' => esc_html__( 'Maine', 'employees' ),
	    'MD' => esc_html__( 'Maryland', 'employees' ),
	    'MA' => esc_html__( 'Massachusetts', 'employees' ),
	    'MI' => esc_html__( 'Michigan', 'employees' ),
	    'MN' => esc_html__( 'Minnesota', 'employees' ),
	    'MS' => esc_html__( 'Mississippi', 'employees' ),
	    'MO' => esc_html__( 'Missouri', 'employees' ),
	    'MT' => esc_html__( 'Montana', 'employees' ),
	    'NE' => esc_html__( 'Nebraska', 'employees' ),
	    'NV' => esc_html__( 'Nevada', 'employees' ),
	    'NH' => esc_html__( 'New Hampshire', 'employees' ),
	    'NJ' => esc_html__( 'New Jersey', 'employees' ),
	    'NM' => esc_html__( 'New Mexico', 'employees' ),
	    'NY' => esc_html__( 'New York', 'employees' ),
	    'NC' => esc_html__( 'North Carolina', 'employees' ),
	    'ND' => esc_html__( 'North Dakota', 'employees' ),
	    'OH' => esc_html__( 'Ohio', 'employees' ),
	    'OK' => esc_html__( 'Oklahoma', 'employees' ),
	    'OR' => esc_html__( 'Oregon', 'employees' ),
	    'PA' => esc_html__( 'Pennsylvania', 'employees' ),
	    'RI' => esc_html__( 'Rhode Island', 'employees' ),
	    'SC' => esc_html__( 'South Carolina', 'employees' ),
	    'SD' => esc_html__( 'South Dakota', 'employees' ),
	    'TN' => esc_html__( 'Tennessee', 'employees' ),
	    'TX' => esc_html__( 'Texas', 'employees' ),
	    'UT' => esc_html__( 'Utah', 'employees' ),
	    'VT' => esc_html__( 'Vermont', 'employees' ),
	    'VA' => esc_html__( 'Virginia', 'employees' ),
	    'WA' => esc_html__( 'Washington', 'employees' ),
	    'WV' => esc_html__( 'West Virginia', 'employees' ),
	    'WI' => esc_html__( 'Wisconsin', 'employees' ),
	    'WY' => esc_html__( 'Wyoming', 'employees' ),
   	    'AS' => esc_html__( 'American Samoa', 'employees' ),
	    'AA' => esc_html__( 'Armed Forces America (except Canada)', 'employees' ),
	    'AE' => esc_html__( 'Armed Forces Africa/Canada/Europe/Middle East', 'employees' ),
	    'AP' => esc_html__( 'Armed Forces Pacific', 'employees' ),
	    'FM' => esc_html__( 'Federated States of Micronesia', 'employees' ),
	    'GU' => esc_html__( 'Guam', 'employees' ),
	    'MH' => esc_html__( 'Marshall Islands', 'employees' ),
	    'MP' => esc_html__( 'Northern Mariana Islands', 'employees' ),
	    'PR' => esc_html__( 'Puerto Rico', 'employees' ),
	    'PW' => esc_html__( 'Palau', 'employees' ),
	    'VI' => esc_html__( 'Virgin Islands', 'employees' ),
	);

	foreach ( $states as $abb => $state ) {

		echo '<option value="' . esc_attr( $abb ) . '" ' . selected( $metas['state'], $abb ) . '>' . $state . '</option>';

	}

	?></select>
</p>
<p>
	<label for="zipcode"><?php esc_html_e( 'Zip Code', 'employees' ); ?>: </label>
	<input class="widefat" id="zipcode" name="zipcode" type="text" value="<?php echo esc_attr( $metas['zipcode'] ); ?>" />
</p>
<p>
	<label for="building"><?php esc_html_e( 'Building', 'employees' ); ?>: </label>
	<input class="widefat" id="building" name="building" type="text" value="<?php echo esc_attr( $metas['building'] ); ?>" />
</p>
<p>
	<label for="office"><?php esc_html_e( 'Office Number', 'employees' ); ?>: </label>
	<input class="widefat" id="office" name="office" type="text" value="<?php echo esc_attr( $metas['office'] ); ?>" />
</p>