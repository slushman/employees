<?php

/**
 * Creates fields usable by all other classes in the admin.
 *
 * @link       https://www.slushman.com
 * @since      1.0.0
 * @package    Employees\Fields
 * @author     Slushman <chris@slushman.com>
 */

namespace Employees\Fields;

class Fields_Admin {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 		1.0.0
	 * @param 		string 		$context 		The field context.
	 */
	public function __construct( $context ) {

		$this->context = $context;

	} // __ construct()

	/**
	 * Creates a checkbox form field.
	 *
	 * @param 		array 		$args 		The field arguments.
	 * @return 		string 					The HTML field.
	 */
	public function field_checkbox( $args ) {

		$checkbox 		= new Checkbox( $args );
		$settings 		= $checkbox->get_settings( $this->context );
		$attributes 	= $checkbox->get_attributes( $args['attributes'], $this->context, $settings );
		$properties 	= $checkbox->get_properties( $args['properties'] );

		$checkbox->render_field( $attributes, $properties, $settings );

	} // field_checkbox()

	/**
	 * Creates a file uploader form field.
	 *
	 * @param 		array 		$args 		The field arguments.
	 * @return 		string 					The HTML field.
	 */
	public function field_file_uploader( $args ) {

		$fileUploader 	= new File_Uploader();
		$settings 		= $fileUploader->get_settings( $this->context );
		$attributes 	= $fileUploader->get_attributes( $args['attributes'], $this->context, $settings );
		$properties 	= $fileUploader->get_properties( $args['properties'] );

		$fileUploader->render_field( $attributes, $properties, $settings );

	} // field_file_uploader()

	/**
	 * Creates a hidden form field.
	 *
	 * @since 		1.0.0
	 * @param 		array 		$args 		The field arguments.
	 * @return 		string 					The HTML field.
	 */
	public function field_hidden( $args ) {

		$hidden 		= new Hidden( $args );
		$settings 		= $hidden->get_settings( $this->context );
		$attributes 	= $hidden->get_attributes( $args['attributes'], $this->context, $settings );
		$properties 	= $hidden->get_properties( $args['properties'] );

		$hidden->render_field( $attributes, $properties, $settings );

	} // field_hidden()

	/**
	 * Creates a select form field.
	 *
	 * @since 		1.0.0
	 * @param 		array 		$args 		The field arguments.
	 * @return 		string 					The HTML field.
	 */
	public function field_select( $args ) {

		$select 		= new Select( $args );
		$settings 		= $select->get_settings( $this->context );
		$attributes 	= $select->get_attributes( $args['attributes'], $this->context, $settings );
		$properties 	= $select->get_properties( $args['properties'] );

		$select->render_field( $attributes, $properties, $settings, $args['options'] );

	} // field_select()

	/**
	 * Creates a text form field.
	 *
	 * @since 		1.0.0
	 * @param 		array 		$args 		The field arguments.
	 * @return 		string 					The HTML field.
	 */
	public function field_text( $args ) {

		$text 		= new Text( $args );
		$settings 	= $text->get_settings( $this->context );
		$attributes = $text->get_attributes( $args['attributes'], $this->context, $settings );
		$properties = $text->get_properties( $args['properties'] );

		$text->render_field( $attributes, $properties, $settings );

	} // field_text()

	/**
	 * Creates a textarea form field.
	 *
	 * @since 		1.0.0
	 * @param 		array 		$args 		The field arguments.
	 * @return 		string 					The HTML field.
	 */
	public function field_textarea( $args ) {

		$textarea 	= new Textarea( $args );
		$settings 	= $textarea->get_settings( $this->context );
		$attributes = $textarea->get_attributes( $args['attributes'], $this->context, $settings );
		$properties = $textarea->get_properties( $args['properties'] );

		$textarea->render_field( $attributes, $properties, $settings );

	} // field_textarea()

} // class
