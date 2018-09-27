<?php
/**
 * Class testing the Fields\Select class.
 * 
 * @package 		Employees
 */

class TestFieldSelect extends WP_UnitTestCase {

	/**
	 * Configures WordPress for each test.
	 */
	public function setUp() {

		parent::setUp();

		$this->field = new \Employees\Fields\Select();

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

		$this->assertInstanceOf( 'Employees\Fields\Select', $this->field );

	} // test_isFieldObject()

	/**
	 * Asserts get_default_properties:
	 * returns an array
	 * and has the keys 'blank', 'error', and 'wrap'
	 * with these values ' - Select - ', 'There was an error with the optiosn for this field.', 'div' respectively.
	 * 
	 * @covers 			Employees\Fields\Select::get_default_properties()
	 * @since 			1.0.0
	 */
	public function test_getDefaultProperties() {

		$expected 				= array();
		$expected['blank'] 		= __( '- Select -', 'employees' );
		$expected['error'] 		= __( 'There was an error with the options for this field.', 'employees' );
		$expected['wrap'] 		= 'div';
		$result 				= $this->field->get_default_properties();

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
	 * @covers 			Employees\Fields\Select::get_default_attributes()
	 * @since 			1.0.0
	 */
	public function test_getDefaultAttributesNoContext() {

		$attributes 			= array();
		$attributes['id'] 		= 'test';
		$context 				= '';
		$settings 				= array();
		$expected 				= array();
		$expected['aria-label'] = __( 'Select an option.', 'employees' );
		$expected['class'] 		= 'widefat';
		$expected['name'] 		= 'employees_settings[test]';
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
	 * @covers 			Employees\Fields\Select::get_default_attributes()
	 * @since 			1.0.0
	 */
	public function test_getDefaultAttributesSettingsContext() {

		$attributes 			= array();
		$attributes['id'] 		= 'test';
		$context 				= 'settings';
		$settings 				= array();
		$expected 				= array();
		$expected['aria-label'] = __( 'Select an option.', 'employees' );
		$expected['class'] 		= 'widefat';
		$expected['name'] 		= 'employees_settings[test]';
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
	 * @covers 			Employees\Fields\Select::get_default_attributes()
	 * @since 			1.0.0
	 */
	public function test_getDefaultAttributesMetaboxContext() {

		$attributes 			= array();
		$attributes['id'] 		= 'test';
		$context 				= 'metabox';
		$settings 				= array();
		$expected 				= array();
		$expected['aria-label'] = __( 'Select an option.', 'employees' );
		$expected['class'] 		= 'widefat';
		$expected['name'] 		= 'test';
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
	 * @covers 			Employees\Fields\Select::get_default_attributes()
	 * @since 			1.0.0
	 */
	public function test_getDefaultAttributesGivenValue() {

		$attributes 			= array();
		$attributes['id'] 		= 'test';
		$attributes['value'] 	= 0;
		$context 				= 'metabox';
		$settings 				= array();
		$expected 				= array();
		$expected['aria-label'] = __( 'Select an option.', 'employees' );
		$expected['class'] 		= 'widefat';
		$expected['name'] 		= 'test';
		$expected['value'] 		= '';
		$result 				= $this->field->get_default_attributes( $attributes, $context, $settings );

		$this->assertInternalType( 'array', $result );
		$this->assertEquals( $expected, $result );

		foreach ( $expected as $key => $value ) {

			$this->assertArrayHasKey( $key, $result );
			$this->assertEquals( $value, $result[$key] );

		}

	} // test_getDefaultAttributesGivenValue()

} // class