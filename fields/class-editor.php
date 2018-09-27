<?php

/**
 * Defines all the code for an editor form field.
 *
 * @link 		https://www.slushman.com
 * @since 		1.0.0
 * @package 	Employees\Fields
 */

namespace Employees\Fields;

class Editor extends Field {

	/**
	 * Class constructor.
	 */
	public function __construct() {} // __construct()

	/**
	 * Returns an array of the default properties.
	 * 
	 * @return 		array 			The default field properties.
	 */
	public function get_default_properties() {

		$default_properties['settings'] = '';
		$default_properties['wrap'] 	= 'div';

		return $default_properties;

	} // get_default_properties()

	/**
	 * Displays the WP Editor field.
	 *
	 * @since 		1.0.1
	 * @param 		array 		$attributes 		The field attributes.
	 * @param 		array 		$properties 		The field properties.
	 * @param 		array 		$settings 			The settings.
	 * @param 		array 		$options 			Optional. Options for field groups.
	 */
	public function render_field( $attributes, $context, $settings, $options = array() ) {

		$this->render_label( $properties, $attributes );

		wp_editor( $attributes['value'], $attributes['id'], $properties['settings'] );

		$this->render_description( $properties );

	} // render_field()

} // class
