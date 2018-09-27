<?php

/**
 * Defines all the code for a checkbox form field.
 *
 * @link 		https://www.slushman.com
 * @since 		1.0.0
 * @package 	Employees\Fields
 */

namespace Employees\Fields;

class Checkbox extends Field {

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

		$default_attributes['class'] 	= 'widefat';
		$default_attributes['type'] 	= 'checkbox';
		$default_attributes['name'] 	= $this->get_name_attribute( $attributes, $context );
		$default_attributes['value'] 	= 1;

		return $default_attributes;

	} // get_default_attributes()

	/**
	 * Returns an array of the default properties.
	 * 
	 * @return 		array 			The default field properties.
	 */
	public function get_default_properties() {

		$default_properties['class-label'] 		= 'checkbox-label';
		$default_properties['class-label-span'] = 'checkbox-label-text';
		$default_properties['wrap'] 			= 'div';

		return $default_properties;

	} // get_default_properties()

	/**
	 * Includes the checkbox field HTML file.
	 *
	 * @since 		1.0.0
	 * @param 		array 		$attributes 		The field attributes.
	 * @param 		array 		$properties 		The field properties.
	 * @param 		array 		$settings 			The settings.
	 * @param 		array 		$options 			Optional. Options for field groups.
	 */
	public function render_field( $attributes, $properties, $settings, $options = array() ) {

		$this->render_label_begin();

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/partials/checkbox.php' );

		$this->render_description_span();
		$this->render_alert( $properties );
		$this->render_label_end();

	} // render_field()

} // class
