<?php
/**
 * Class testing the Fields\Textarea class.
 * 
 * @package 		Employees
 */

class TestFieldTextarea extends WP_UnitTestCase {

	/**
	 * Configures WordPress for each test.
	 */
	public function setUp() {

		parent::setUp();

		$this->field = new \Employees\Fields\Textarea();

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

		$this->assertInstanceOf( 'Employees\Fields\Textarea', $this->field );

	} // test_isFieldObject()

	/**
	 * Asserts get_default_properties, with no context:
	 * returns an array
	 * has the keys 'class', 'cols', 'rows', 'name', and 'value',
	 * and they equal 'widefat', 50, 10, 'employees_settings[test]', and '' respectively.
	 * 
	 * @covers 			Employees\Fields\Textarea::get_default_attributes()
	 * @since 			1.0.0
	 */
	public function test_getDefaultAttributesNoContext() {

		$attributes 		= array();
		$attributes['id'] 	= 'test';
		$context 			= '';
		$settings 			= array();
		$expected 			= array();
		$expected['class'] 	= 'widefat';
		$expected['cols'] 	= 50;
		$expected['rows'] 	= 10;
		$expected['name'] 	= 'employees_settings[test]';
		$expected['value'] 	= '';
		$result 			= $this->field->get_default_attributes( $attributes, $context, $settings );

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
	 * has the keys 'class', 'cols', 'rows', 'name', and 'value',
	 * and they equal 'widefat', 50, 10, 'employees_settings[test]', and '' respectively.
	 * 
	 * @covers 			Employees\Fields\Textarea::get_default_attributes()
	 * @since 			1.0.0
	 */
	public function test_getDefaultAttributesSettingsContext() {

		$attributes 		= array();
		$attributes['id'] 	= 'test';
		$context 			= 'settings';
		$settings 			= array();
		$expected 			= array();
		$expected['class'] 	= 'widefat';
		$expected['cols'] 	= 50;
		$expected['rows'] 	= 10;
		$expected['name'] 	= 'employees_settings[test]';
		$expected['value'] 	= '';
		$result 			= $this->field->get_default_attributes( $attributes, $context, $settings );

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
	 * has the keys 'class', 'cols', 'rows', 'name', and 'value',
	 * and they equal 'widefat', 50, 10, 'test', and '' respectively.
	 * 
	 * @covers 			Employees\Fields\Textarea::get_default_attributes()
	 * @since 			1.0.0
	 */
	public function test_getDefaultAttributesMetaboxContext() {

		$attributes 		= array();
		$attributes['id'] 	= 'test';
		$context 			= 'metabox';
		$settings 			= array();
		$expected 			= array();
		$expected['class'] 	= 'widefat';
		$expected['cols'] 	= 50;
		$expected['rows'] 	= 10;
		$expected['name'] 	= 'test';
		$expected['value'] 	= '';
		$result 			= $this->field->get_default_attributes( $attributes, $context, $settings );

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
	 * has the keys 'class', 'cols', 'rows', 'name', and 'value',
	 * and they equal 'widefat', 50, 10, 'test', and '' respectively.
	 * 
	 * @covers 			Employees\Fields\Textarea::get_default_attributes()
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
		$expected['cols'] 		= 50;
		$expected['rows'] 		= 10;
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