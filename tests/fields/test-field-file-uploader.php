<?php
/**
 * Class testing the Fields\File_Uploader class.
 * 
 * @package 		Employees
 */

class TestFieldFileUploader extends WP_UnitTestCase {

	/**
	 * Configures WordPress for each test.
	 */
	public function setUp() {

		parent::setUp();

		$this->field = new \Employees\Fields\File_Uploader();

	} // setUp()

	/**
	 * Removes the testing configuration.
	 */
	public function tearDown() {

		parent::tearDown();

	} // tearDown()

	/**
	 * Asserts TRUE that $this->field is an instance of the Field class.
	 *
	 * @since 			1.0.0
	 */
	public function test_isFieldObject() {

		$this->assertInstanceOf( 'Employees\Fields\File_Uploader', $this->field );

	} // test_isFieldObject()

	/**
	 * Asserts get_default_properties:
	 * returns an array
	 * and has the keys 'class-label', 'class-label-span', and 'wrap'
	 * with these values 'checkbox-label', 'checkbox-label-text', 'div' respectively.
	 * 
	 * @covers 			Employees\Fields\File_Uploader::get_default_properties()
	 * @since 			1.0.0
	 */
	public function test_getDefaultProperties() {

		$expected 					= array();
		$expected['class-wrap'] 	= 'field-file-upload';
		$expected['label-remove'] 	= __( 'Remove file', 'employees' );
		$expected['label-upload'] 	= __( 'Choose/Upload file', 'employees' );
		$expected['wrap'] 			= 'div';
		$result 					= $this->field->get_default_properties();

		$this->assertInternalType( 'array', $result );
		$this->assertEquals( $expected, $result );

		foreach ( $expected as $key => $value ) {

			$this->assertArrayHasKey( $key, $result );
			$this->assertEquals( $value, $result[$key] );

		}

	} // test_getDefaultProperties()

	/**
	 * Asserts get_default_properties, with no context:
	 * returns an array
	 * and has the keys 'class', 'name', 'type', and 'value'
	 * with these values 'widefat', 'employees_settings[test]', 'checkbox', and 1 respectively.
	 * 
	 * @covers 			Employees\Fields\File_Uploader::get_default_attributes()
	 * @since 			1.0.0
	 */
	public function test_getDefaultAttributesNoContext() {

		$attributes 			= array();
		$attributes['id'] 		= 'test';
		$context 				= '';
		$settings 				= array();
		$expected 				= array();
		$expected['class'] 		= 'widefat';
		$expected['data'] 		= array();
		$expected['data']['id'] = 'url-file';
		$expected['name'] 		= 'employees_settings[test]';
		$expected['type'] 		= 'url';
		$expected['value'] 		= '';
		$result 				= $this->field->get_default_attributes( $attributes, $context, $settings );

		$this->assertInternalType( 'array', $result );
		$this->assertEquals( $expected, $result );

		foreach ( $expected as $key => $value ) {

			$this->assertArrayHasKey( $key, $result );
			$this->assertEquals( $value, $result[$key] );

		}

	} // test_getDefaultAttributesNoContext()

	/**
	 * Asserts get_default_properties, with the settings context:
	 * returns an array
	 * and has the keys 'class', 'name', 'type', and 'value'
	 * with these values 'widefat', 'employees_settings[test]', 'checkbox', and 1 respectively.
	 * 
	 * @covers 			Employees\Fields\File_Uploader::get_default_attributes()
	 * @since 			1.0.0
	 */
	public function test_getDefaultAttributesSettingsContext() {

		$attributes 			= array();
		$attributes['id'] 		= 'test';
		$context 				= 'settings';
		$settings 				= array();
		$expected 				= array();
		$expected['class'] 		= 'widefat';
		$expected['data'] 		= array();
		$expected['data']['id'] = 'url-file';
		$expected['name'] 		= 'employees_settings[test]';
		$expected['type'] 		= 'url';
		$expected['value'] 		= '';
		$result 				= $this->field->get_default_attributes( $attributes, $context, $settings );

		$this->assertInternalType( 'array', $result );
		$this->assertEquals( $expected, $result );

		foreach ( $expected as $key => $value ) {

			$this->assertArrayHasKey( $key, $result );
			$this->assertEquals( $value, $result[$key] );

		}

	} // test_getDefaultAttributesSettingsContext()

	/**
	 * Asserts get_default_attributes, when given the 'metabox' context:
	 * returns an array,
	 * has the keys 'class', 'type', 'name', and 'value',
	 * and they equal 'widefat', 'text', 'test', and '' respectively.
	 * 
	 * @covers 			Employees\Fields\File_Uploader::get_default_attributes()
	 * @since 			1.0.0
	 */
	public function test_getDefaultAttributesMetaboxContext() {

		$attributes 			= array();
		$attributes['id'] 		= 'test';
		$context 				= 'metabox';
		$settings 				= array();
		$expected 				= array();
		$expected['class'] 		= 'widefat';
		$expected['data'] 		= array();
		$expected['data']['id'] = 'url-file';
		$expected['name'] 		= 'test';
		$expected['type'] 		= 'url';
		$expected['value'] 		= '';
		$result 				= $this->field->get_default_attributes( $attributes, $context, $settings );

		$this->assertInternalType( 'array', $result );
		$this->assertEquals( $expected, $result );

		foreach ( $expected as $key => $value ) {

			$this->assertArrayHasKey( $key, $result );
			$this->assertEquals( $value, $result[$key] );

		}

	} // test_getDefaultAttributesMetaboxContext()

	/**
	 * Asserts get_default_attributes, when given the 'metabox' context:
	 * returns an array,
	 * has the keys 'class', 'type', 'name', and 'value',
	 * and they equal 'widefat', 'text', 'test', and 'yep' respectively.
	 * 
	 * @covers 			Employees\Fields\File_Uploader::get_default_attributes()
	 * @since 			1.0.0
	 */
	public function test_getDefaultAttributesGivenValue() {

		$attributes 			= array();
		$attributes['id'] 		= 'test';
		$attributes['value'] 	= 0;
		$context 				= 'metabox';
		$settings 				= array();
		$expected 				= array();
		$expected['class'] 		= 'widefat';
		$expected['data'] 		= array();
		$expected['data']['id'] = 'url-file';
		$expected['name'] 		= 'test';
		$expected['type'] 		= 'url';
		$expected['value'] 		= '';
		$result 				= $this->field->get_default_attributes( $attributes, $context, $settings );

		$this->assertInternalType( 'array', $result );
		$this->assertEquals( $expected, $result );

		foreach ( $expected as $key => $value ) {

			$this->assertArrayHasKey( $key, $result );
			$this->assertEquals( $value, $result[$key] );

		}

	} // test_getDefaultAttributesGivenValue()

	/**
	 * Asserts when set_class_by_value receives no context and empty attributes:
	 * It returns an empty string.
	 * 
	 * @covers 			Employees\Fields\File_Uploader::get_default_attributes()
	 * @since 		1.5
	 */
	public function test_setClassByValueAllEmpty() {

		$context 		= '';
		$attributes 	= array();
		$expected 		= '';
		$result 		= $this->field->set_class_by_value( $context, $attributes );

		$this->assertInternalType( 'string', $result );
		$this->assertEquals( $expected, $result );

	} // test_setClassByValueAllEmpty()

	/**
	 * Asserts when set_class_by_value receives the 'remove' context and an empty value attribute:
	 * It returns 'hide'.
	 * 
	 * @covers 			Employees\Fields\File_Uploader::get_default_attributes()
	 * @since 		1.5
	 */
	public function test_setClassByValueRemoveContextEmptyValue() {

		$context 				= 'remove';
		$attributes 			= array();
		$attributes['value'] 	= '';
		$expected 				= 'hide';
		$result 				= $this->field->set_class_by_value( $context, $attributes );

		$this->assertInternalType( 'string', $result );
		$this->assertEquals( $expected, $result );

	} // test_setClassByValueRemoveContextEmptyValue()

	/**
	 * Asserts when set_class_by_value receives the 'remove' context and a not empty value attribute:
	 * It returns an empty string.
	 * 
	 * @covers 			Employees\Fields\File_Uploader::get_default_attributes()
	 * @since 		1.5
	 */
	public function test_setClassByValueRemoveContextNotEmptyValue() {

		$context 				= 'remove';
		$attributes 			= array();
		$attributes['value'] 	= 'not empty';
		$expected 				= '';
		$result 				= $this->field->set_class_by_value( $context, $attributes );

		$this->assertInternalType( 'string', $result );
		$this->assertEquals( $expected, $result );

	} // test_setClassByValueRemoveContextNotEmptyValue()

	/**
	 * Asserts when set_class_by_value receives the 'upload' context and an empty value attribute:
	 * It returns an empty string.
	 * 
	 * @covers 			Employees\Fields\File_Uploader::get_default_attributes()
	 * @since 		1.5
	 */
	public function test_setClassByValueUploadContextEmptyValue() {

		$context 				= 'upload';
		$attributes 			= array();
		$attributes['value'] 	= '';
		$expected 				= '';
		$result 				= $this->field->set_class_by_value( $context, $attributes );

		$this->assertInternalType( 'string', $result );
		$this->assertEquals( $expected, $result );

	} // test_setClassByValueUploadContextEmptyValue()

	/**
	 * Asserts when set_class_by_value receives the 'upload' context and a not empty value attribute:
	 * It returns 'hide'.
	 * 
	 * @covers 			Employees\Fields\File_Uploader::get_default_attributes()
	 * @since 		1.5
	 */
	public function test_setClassByValueUploadContextNotEmptyValue() {

		$context 				= 'upload';
		$attributes 			= array();
		$attributes['value'] 	= 'not empty';
		$expected 				= 'hide';
		$result 				= $this->field->set_class_by_value( $context, $attributes );

		$this->assertInternalType( 'string', $result );
		$this->assertEquals( $expected, $result );

	} // test_setClassByValueUploadContextNotEmptyValue()

} // class