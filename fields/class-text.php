<?php

/**
 * Defines all the code for a text form field.
 *
 * @link 		https://www.slushman.com
 * @since 		1.0.0
 * @package 	Employees\Fields
 */

namespace Employees\Fields;

class Text extends Field {

	/**
	 * Class constructor.
	 */
	public function __construct() {} // __construct()

	/**
	 * Includes the text field HTML file.
	 *
	 * @since 		1.0.0
	 * @param 		array 		$attributes 		The field attributes.
	 * @param 		array 		$properties 		The field properties.
	 * @param 		array 		$settings 			The settings.
	 * @param 		array 		$options 			Optional. Options for field groups.
	 */
	public function render_field( $attributes, $properties, $settings, $options = array() ) {

		$this->render_label( $properties, $attributes );

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/partials/text.php' );
		
		$this->render_description( $properties );
		$this->render_alert( $properties );
		
	} // render_field()

} // class
