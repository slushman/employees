<?php

/**
 * Defines all the code for a file uploader form field.
 *
 * @link 		https://www.slushman.com
 * @since 		1.5
 * @package 	Employees/Fields
 */

namespace Employees\Fields;

class File_Uploader extends Field {

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

		$default_attributes['class'] 		= 'widefat';
		$default_attributes['data']['id'] 	= 'url-file';
		$default_attributes['name'] 		= $this->get_name_attribute( $attributes, $context );
		$default_attributes['type'] 		= 'url';
		$default_attributes['value'] 		= $this->get_value( $attributes, $context, $settings );

		return $default_attributes;

	} // get_default_attributes()

	/**
	 * Returns an array of the default properties.
	 * 
	 * @return 		array 			The default field properties.
	 */
	public function get_default_properties() {

		$default_properties['class-wrap'] 	= 'field-file-upload';
		$default_properties['label-remove'] = __( 'Remove file', 'employees' );
		$default_properties['label-upload'] = __( 'Choose/Upload file', 'employees' );
		$default_properties['wrap'] 		= 'div';

		return $default_properties;

	} // get_default_properties()

	/**
	 * Includes the text field HTML file.
	 *
	 * @since 		1.0.0
	 * @param 		array 		$attributes 		The field attributes.
	 * @param 		string 		$properties 		The field properties.
	 * @param 		array 		$settings 			The settings array.
	 * @param 		array 		$options 			Optional. Options for field groups.
	 */
	public function render_field( $attributes, $properties, $settings, $options = array() ) {

		$this->render_field_wrap_begin( $properties );
		$this->render_label( $properties, $attributes );

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/partials/text.php' );
		include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/partials/link-upload.php' );
		include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/partials/link-remove.php' );

		$this->render_field_wrap_end( $properties );
		$this->render_description( $properties );

	} // render_field()

	/**
	 * Sets a class based on the field value.
	 *
	 * Hide is returned for these two conditions:
	 * 		If value is empty and the context is remove.
	 *   	If value is not empty and context is upload.
	 *
	 * @since 		1.0.0
	 * @param 		string 		$context 			The context decides if a class is returned or not.
	 *                              					remove: returns the hide class if the value is empty.
	 *                              					upload: return the hide class if the value is not empty.
	 * @param 		array 		$attributes 		The field attributes.
	 * @return 		string 							"Hide" or blank.
	 */
	public function set_class_by_value( $context, $attributes ) {

		$return = '';

		if ( ( empty( $attributes['value'] ) && 'remove' === $context ) || ! empty( $attributes['value'] ) && 'upload' === $context ) {

			$return = 'hide';

		}

		return $return;

	} // set_class_by_value()

} // class
