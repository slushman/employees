<?php

/**
 * All the code required to produce a basic form field.
 *
 * @link 		https://www.slushman.com
 * @since 		1.0.0
 * @package 	Employees\Fields
 * 
 * When registering a field for a metabox, this is the $fields array for each field:
 * 	array( 'field_ID', 'sanitization_type', 'default_value', 'field_type', 'field_args_array' )
 * 
 * Default attributes:
 * class 				Strings used for styling. Default is 'widefat'.
 * id 					ID. Required.
 * name 				Name for the field.
 * type 				The field type. Default is 'text'.
 * value 				The field value. Default is '';
 * 
 * Default properties:
 * wrap 					HTML Element to use a wrapper. Default is 'div'.
 * 
 * Optional properties:
 * alert 					Higher priority field description.
 * class-desc 				CSS class for the description.
 * class-label 				CSS class for the label wrapper.
 * class-label-span 		CSS class for the span around the label text.
 * class-wrap 				CSS class for the wrapping element.
 * description 				Explanation for the field.
 * error 					Error text.
 * label 					Field label.
 */

namespace Employees\Fields;

class Field {

	/**
	 * Class contructor.
	 */
	public function __construct() {} // __construct()

	/**
	 * Filters the attributes array.
	 * 
	 * Passes:
	 * If $key equals 'value' since values can be empty or 0.
	 * Any key starting with 'data-' since they can also be empty or 0.
	 * Any value that's not empty.
	 * 
	 * @since 		1.5
	 * @param 		mixed 		$value 		The array value.
	 * @param 		string 		$key 		The array key.
	 * @return 		bool 					TRUE if it matches, otherwise FALSE.
	 */
	public function filter_attributes( $value, $key ) {

		return 'value' === $key || FALSE !== stripos( $key, 'data-' ) || ! empty( $value );

	} // filter_attributes()

	/**
	 * Returns field attributes array.
	 *
	 * @since 		1.0.0
	 * @param 		array 		$attributes 		The field attributes.
	 * 													'id' or 'name' is required.
	 * @param 		string 		$context 			The field context.
	 * @param 		array 		$settings 			The settings array.
	 * @return 		array 							The field attributes.
	 */
	public function get_attributes( $attributes, $context, $settings ) {

		if ( ! isset( $attributes ) 
			|| empty( $attributes ) 
			|| ! is_array( $attributes ) 
		) { return FALSE; }

		$defaults 	= $this->get_default_attributes( $attributes, $context, $settings  );
		$attributes = wp_parse_args( $attributes, $defaults );

		return array_filter( $attributes, [ $this, 'filter_attributes' ], ARRAY_FILTER_USE_BOTH );

	} // get_attributes()

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
		$default_attributes['type'] 	= 'text';
		$default_attributes['name'] 	= empty( $attributes['name'] ) ? $this->get_name_attribute( $attributes, $context ) : $attributes['name'];
		$default_attributes['value'] 	= empty( $attributes['value'] ) ? $this->get_value( $attributes, $context, $settings ) : $attributes['value'];

		return $default_attributes;

	} // get_default_attributes()

	/**
	 * Returns an array of the default properties.
	 * 
	 * @return 		array 			The default field properties.
	 */
	public function get_default_properties() {

		$default_properties['wrap'] = 'div';

		return $default_properties;

	} // get_default_properties()

	/**
	 * Return the name attribute based on the field context.
	 *
	 * @exits 		If in settings context, ID attribute is empty, but name attribute is not.
	 * @since 		1.0.0
	 * @param 		array 		$attributess		The field attributes.
	 * @param 		string 		$context 			The field context.
	 * @return 		mixed 							The field name value.
	 */
	public function get_name_attribute( $attributes, $context ) {

		if ( ! isset( $attributes['id'] ) ) { return ''; }

		$return = '';

		if ( 'metabox' === $context ) {

			$return = $attributes['id'];

		} else {

			$return = EMPLOYEES_SETTINGS . '[' . $attributes['id'] . ']';

		}

		return $return;

	} // get_name_attribute()

	/**
	 * Returns the field properties array.
	 *
	 * @since 		1.0.0
	 * @param 		array 		$properties 		The field properties.
	 * @return 		array 							The field properties.
	 */
	public function get_properties( $properties = array() ) {

		$defaults 	= $this->get_default_properties();
		$properties = wp_parse_args( $properties, $defaults );
		
		return array_filter( $properties );

	} // get_properties()

	/**
	 * Returns the proper settings based on the context.
	 * 
	 * @param 		string 		$context 		The field context.
	 * @return 		array 						The contextual settings.
	 */
	public function get_settings( $context ) {

		$return = array();

		if ( 'settings' === $context ) {

			$settings = get_option( EMPLOYEES_SETTINGS );

			if ( FALSE !== $settings ) {

				$return = $settings;

			}

		} elseif ( 'metabox' === $context ) {

			$return = get_post_custom();

		}

		return $return;

	} // get_settings()

	/**
	 * Sets the value attributes based on the field context.
	 *
	 * @since 		1.0.0
	 * @param 		array 		$attributes 		The field attributes.
	 * @param 		string 		$context 			The field context.
	 * @param 		array 		$settings 			The settings.
	 * @return 		mixed 							The field's value.
	 */
	public function get_value( $attributes, $context, $settings ) {

		$return = '';

		if ( isset( $attributes['type'] ) && 'checkbox' === $attributes['type'] ) {

			$return = 1;

		} elseif ( 'settings' === $context ) { // plugin settings

			if ( array_key_exists( $attributes['id'], $settings ) ) {

				$return = $settings[$attributes['id']];

			}

		} elseif ( 'metabox' === $context ) { // metaboxes

			if ( array_key_exists( $attributes['id'], $settings ) ) {

				$return = $settings[$attributes['id']][0];

			}

		} /*elseif ( 'widget' === $context ) { // widgets settings

			//

		}*/

		return $return;

	} // get_value()

	/**
	 * Includes the field alert partial file.
	 *
	 * @exits 		If the alert property is empty.
	 * @since 		1.0.0
	 * @param 		array 		$properties 		The properties array.
	 */
	public function render_alert( $properties ) {

		if ( empty( $properties['alert'] ) ) { return; }

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/partials/alert.php' );

	} // render_alert()

	/**
	 * Includes the field HTML file.
	 * Defined in the child class.
	 *
	 * @since 		1.0.0
	 * @param 		array 		$attributes 		The field attributes.
	 * @param 		array 		$properties 		The field properties.
	 * @param 		array 		$settings 			The plugin settings.
	 * @param 		array 		$options 			Optional. Array of options for field groups.
	 */
	public function render_field( $attributes, $properties, $settings, $options = array() ) {

		// include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/partials/fieldtype.php' );

	} // render_field()

	/**
	 * Includes the field description partial file.
	 *
	 * @exits 		If the description property is empty.
	 * @since 		1.0.0
	 * @param 		array 		$properties 		The properties array.
	 */
	public function render_description( $properties ) {

		if ( empty( $properties['description'] ) ) { return; }

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/partials/description.php' );

	} // render_description()

	/**
	 * Includes the field description legend partial file.
	 *
	 * @exits 		If the description property is empty.
	 * @since 		1.0.0
	 * @param 		array 		$properties 		The properties array.
	 */
	public function render_description_legend( $properties ) {

		if ( empty( $properties['description'] ) ) { return; }

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/partials/description-legend.php' );

	} // render_description_legend()

	/**
	 * Includes the field description span partial file.
	 *
	 * @exits 		If the description property is empty.
	 * @since 		1.0.0
	 * @param 		array 		$properties 		The properties array.
	 */
	public function render_description_span( $properties ) {

		if ( empty( $properties['description'] ) ) { return; }

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/partials/description-span.php' );

	} // render_description_span()

	/**
	 * Includes the field wrap begin HTML file.
	 *
	 * @since 		1.5
	 * @param 		array 		$properties 		The properties array.
	 */
	public function render_field_wrap_begin( $properties ) {

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/partials/field-wrap-begin.php' );

	} // render_field_wrap_begin()

	/**
	 * Includes the field wrap end HTML file.
	 *
	 * @since 		1.5
	 * @param 		array 		$properties 		The properties array.
	 */
	public function render_field_wrap_end( $properties ) {

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/partials/field-wrap-end.php' );

	} // render_field_wrap_end()

	/**
	 * Includes the fieldset begin partial file.
	 *
	 * @since 		1.0.0
	 * @param 		array 		$properties 		The properties array.
	 */
	public function render_fieldset_begin( $properties ) {

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/partials/fieldset-begin.php' );

	} // render_fieldset_begin()

	/**
	 * Includes the fieldset end partial file.
	 *
	 * @since 		1.0.0
	 * @param 		array 		$properties 		The properties array.
	 */
	public function render_fieldset_end( $properties ) {

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/partials/fieldset-end.php' );

	} // render_fieldset_end()

	/**
	 * Includes the field label beginning partial file,
	 * then the label output, the the label end partial file.
	 *
	 * @exits 		If the label property is empty.
	 * @since 		1.0.0
	 * @param 		array 		$properties 		The field properties.
	 * @param 		array 		$attributes 		The field attributes.
	 */
	public function render_label( $properties, $attributes ) {

		if ( empty( $properties['label'] ) ) { return; }

		$this->render_label_begin( $properties, $attributes );

		echo wp_kses( $properties['label'], array( 'code' => array() ) ) . ': ';

		$this->render_label_end();

	} // render_label()

	/**
	 * Includes the field label begin partial file.
	 *
	 * @since 		1.0.0
	 * @param 		array 		$properties 		The properties array.
	 */
	public function render_label_begin( $properties, $attributes ) {

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/partials/label-begin.php' );

	} // render_label_begin()

	/**
	 * Includes the field label end partial file.
	 *
	 * @since 		1.0.0
	 */
	public function render_label_end() {

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/partials/label-end.php' );

	} // render_label_end()

} // class
