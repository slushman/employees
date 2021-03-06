<?php

/**
 * Defines all the code for a textarea form field.
 *
 * @link 		https://www.slushman.com
 * @since 		1.0.0
 * @package 	Employees/Fields
 */

namespace Employees\Fields;

class Textarea extends Field {

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
		$default_attributes['cols'] 	= 50;
		$default_attributes['rows'] 	= 10;
		$default_attributes['name'] 	= $this->get_name_attribute( $attributes, $context );
		$default_attributes['value'] 	= $this->get_value( $attributes, $context, $settings );

		return $default_attributes;

	} // get_default_attributes()

	/**
	 * Includes the textarea field HTML file.
	 *
	 * @since 		1.0.0
	 * @param 		array 		$attributes 		The field attributes.
	 * @param 		array 		$properties 		The field properties.
	 * @param 		array 		$settings 			The settings.
	 * @param 		array 		$options 			Optional. Options for field groups.
	 */
	public function render_field( $attributes, $properties, $settings, $options = array() ) {

		$this->render_label( $properties, $attributes );

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/partials/textarea.php' );
		
		$this->render_description( $properties );

	} // render_field()

} // class
