<?php

/**
 * Defines all the code for a select form field.
 *
 * @link 		https://www.slushman.com
 * @since 		1.0.0
 * @package 	Employees\Fields
 */

namespace Employees\Fields;

class Select extends Field {

	/**
	 * Class constructor.
	 */
	public function __construct() {} // __construct()

	/**
	 * Returns an array of the default attributes.
	 * 
	 * @since 		1.5
	 * @param 		array 		$attributes 		The field attributes.
	 * @param 		string 		$context 			The field context.
	 * @param 		array 		$settings 			The settings array.
	 * @return 		array 							The default field attributes.
	 */
	public function get_default_attributes( $attributes, $context, $settings ) {

		$default_attributes['aria-label'] = __( 'Select an option.', 'employees' );
		$default_attributes['class'] 	= 'widefat';
		$default_attributes['name'] 	= $this->get_name_attribute( $attributes, $context );
		$default_attributes['value'] 	= $this->get_value( $attributes, $context, $settings );

		return $default_attributes;

	} // get_default_attributes()

	/**
	 * Returns an array of the default properties.
	 * 
	 * @return 		array 			The default field properties.
	 */
	public function get_default_properties() {

		$default_properties['blank'] 	= __( '- Select -', 'employees' );
		$default_properties['error'] 	= __( 'There was an error with the options for this field.', 'employees' );
		$default_properties['wrap'] 	= 'div';

		return $default_properties;

	} // get_default_properties()

	/**
	 * Includes the select field HTML file.
	 * 
	 * Options can be structured two ways:
	 * 		array( ''one,' two', 'three' );
	 * 		array( array( 'label => 'one', 'value' => 'ONE' ) );
	 *
	 * The first way creates both the labels and values with the individual array items.
	 * The second way creates separate labels and values from the subarray items.
	 *
	 * @since 		1.0.0
	 * @param 		array 		$attributes 		The field attributes.
	 * @param 		array 		$properties 		The field properties.
	 * @param 		array 		$settings 			The settings.
	 * @param 		array 		$options 			Optional. Options for field groups.
	 */
	public function render_field( $attributes, $properties, $settings, $options = array() ) {

		$this->render_label( $properties, $attributes );

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/partials/select.php' );

		$this->render_description( $properties );
		$this->render_alert( $properties );

	} // render_field()

} // class
