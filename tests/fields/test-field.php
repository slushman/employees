<?php
/**
 * Class testing the Fields\Field class.
 * 
 * @TODO 	Add tests for get_settings where data exists for plugin settings and post meta data.
 *
 * @package 		Employees
 */

class TestField extends WP_UnitTestCase {

	/**
	 * Configures WordPress for each test.
	 */
	public function setUp() {

		parent::setUp();

		$this->field = new \Employees\Fields\Field();

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

		$this->assertInstanceOf( 'Employees\Fields\Field', $this->field );

	} // test_isFieldObject()

	/**
	 * Asserts that get_properties returns an array that has a key 'wrap'.
	 * 
	 * @covers 			Employees\Fields\Field::get_properties()
	 * @since 			1.0.0
	 */
	public function test_getPropertiesReturnsArray() {

		$expected 			= array();
		$expected['wrap'] 	= 'div';
		$result 			= $this->field->get_properties( array() );

		$this->assertInternalType( 'array', $result );
		$this->assertEquals( $expected, $result );

		foreach ( $expected as $key => $value ) {

			$this->assertArrayHasKey( $key, $result );
			$this->assertEquals( $value, $result[$key] );

		}

	} // test_getPropertiesReturnsArray()

	/**
	 * Asserts that when passing an array containing the key 'class-label',
	 * get_properties returns an array and has the keys 'wrap' and 'class-label'.
	 * 
	 * @covers 			Employees\Fields\Field::get_properties()
	 * @since 			1.0.0
	 */
	public function test_getPropertiesReturnsArrayWithProps() {

		$properties 				= array();
		$properties['class-label'] 	= 'test';
		$expected 					= array();
		$expected['class-label'] 	= 'test';
		$expected['wrap'] 			= 'div';
		$result 					= $this->field->get_properties( $properties );

		$this->assertInternalType( 'array', $result );
		$this->assertEquals( $expected, $result );

		foreach ( $expected as $key => $value ) {

			$this->assertArrayHasKey( $key, $result );
			$this->assertEquals( $value, $result[$key] );

		}

	} // test_getPropertiesReturnsArrayWithProps()

	/**
	 * Asserts get_default_properties returns an array and has a key 'wrap'.
	 * 
	 * @covers 			Employees\Fields\Field::get_default_properties()
	 * @since 			1.0.0
	 */
	public function test_getDefaultProperties() {

		$expected 				= array();
		$expected['wrap'] 		= 'div';
		$result = $this->field->get_default_properties();

		$this->assertInternalType( 'array', $result );
		$this->assertEquals( $expected, $result );

		foreach ( $expected as $key => $value ) {

			$this->assertArrayHasKey( $key, $result );
			$this->assertEquals( $value, $result[$key] );

		}

	} // test_getDefaultProperties()

	/**
	 * Asserts get_default_attributes, when given no context:
	 * returns an array,
	 * has the keys 'class', 'type', 'name', and 'value',
	 * and they equal 'widefat', 'text', 'employees_settings[test]', and '' respectively.
	 * 
	 * @covers 			Employees\Fields\Field::get_default_attributes()
	 * @since 			1.0.0
	 */
	public function test_getDefaultAttributesNoContext() {

		$attributes 		= array();
		$attributes['id'] 	= 'test';
		$context 			= '';
		$settings 			= array();
		$expected 			= array();
		$expected['class'] 	= 'widefat';
		$expected['name'] 	= 'employees_settings[test]';
		$expected['type'] 	= 'text';
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
	 * Asserts get_default_attributes, when given the 'settings' context:
	 * returns an array,
	 * has the keys 'class', 'type', 'name', and 'value',
	 * and they equal 'widefat', 'text', 'employees_settings[test]', and '' respectively.
	 * 
	 * @covers 			Employees\Fields\Field::get_default_attributes()
	 * @since 			1.0.0
	 */
	public function test_getDefaultAttributesSettingsContext() {

		$attributes 		= array();
		$attributes['id'] 	= 'test';
		$context 			= 'settings';
		$settings 			= array();
		$expected 			= array();
		$expected['class'] 	= 'widefat';
		$expected['name'] 	= 'employees_settings[test]';
		$expected['type'] 	= 'text';
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
	 * has the keys 'class', 'type', 'name', and 'value',
	 * and they equal 'widefat', 'text', 'test', and '' respectively.
	 * 
	 * @covers 			Employees\Fields\Field::get_default_attributes()
	 * @since 			1.0.0
	 */
	public function test_getDefaultAttributesMetaboxContext() {

		$attributes 		= array();
		$attributes['id'] 	= 'test';
		$context 			= 'metabox';
		$settings 			= array();
		$expected 			= array();
		$expected['class'] 	= 'widefat';
		$expected['name'] 	= 'test';
		$expected['type'] 	= 'text';
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
	 * has the keys 'class', 'type', 'name', and 'value',
	 * and they equal 'widefat', 'text', 'test', and 'yep' respectively.
	 * 
	 * @covers 			Employees\Fields\Field::get_default_attributes()
	 * @since 			1.0.0
	 */
	public function test_getDefaultAttributesGivenValue() {

		$attributes 			= array();
		$attributes['id'] 		= 'test';
		$attributes['value'] 	= 'yep';
		$context 				= 'metabox';
		$settings 				= array();
		$expected 				= array();
		$expected['class'] 		= 'widefat';
		$expected['name'] 		= 'test';
		$expected['type'] 		= 'text';
		$expected['value'] 		= 'yep';
		$result 				= $this->field->get_default_attributes( $attributes, $context, $settings );

		$this->assertInternalType( 'array', $result );
		$this->assertEquals( $expected, $result );

		foreach ( $expected as $key => $value ) {

			$this->assertArrayHasKey( $key, $result );
			$this->assertEquals( $value, $result[$key] );

		}

	} // test_getDefaultAttributesGivenValue()

	/**
	 * Asserts get_name_attribute, when given no id attribute:
	 * returns a string 
	 * that equals ''.
	 * 
	 * @covers 			Employees\Fields\Field::get_name_attribute()
	 * @since 			1.0.0
	 */
	public function test_getNameAttributeNoID() {

		$attributes 		= array();
		$context 			= '';
		$result 			= $this->field->get_name_attribute( $attributes, $context );

		$this->assertInternalType( 'string', $result );
		$this->assertEquals( '', $result );

	} // test_getNameAttributeNoID()

	/**
	 * Asserts get_name_attribute, when given no context, returns a string 
	 * that equals 'employee_settings[test]'.
	 * 
	 * @covers 			Employees\Fields\Field::get_name_attribute()
	 * @since 			1.0.0
	 */
	public function test_getNameAttributeNoContext() {

		$attributes 		= array();
		$attributes['id'] 	= 'test';
		$context 			= '';
		$result 			= $this->field->get_name_attribute( $attributes, $context );

		$this->assertInternalType( 'string', $result );
		$this->assertEquals( 'employees_settings[test]', $result );

	} // test_getNameAttributeNoContext()

	/**
	 * Asserts get_name_attribute, when given the 'settings' context, returns a string 
	 * that equals 'employee_settings[test]'.
	 * 
	 * @covers 			Employees\Fields\Field::get_name_attribute()
	 * @since 			1.0.0
	 */
	public function test_getNameAttributeSettingsContext() {

		$attributes 		= array();
		$attributes['id'] 	= 'test';
		$context 			= 'settings';
		$result 			= $this->field->get_name_attribute( $attributes, $context );

		$this->assertInternalType( 'string', $result );
		$this->assertEquals( 'employees_settings[test]', $result );

	} // test_getNameAttributeSettingsContext()

	/**
	 * Asserts get_name_attribute, when given the 'metabox' context, returns a string 
	 * that equals 'test'.
	 * 
	 * @covers 			Employees\Fields\Field::get_name_attribute()
	 * @since 			1.0.0
	 */
	public function test_getNameAttributeMetaboxContext() {

		$attributes 		= array();
		$attributes['id'] 	= 'test';
		$context 			= 'metabox';
		$result 			= $this->field->get_name_attribute( $attributes, $context );

		$this->assertInternalType( 'string', $result );
		$this->assertEquals( 'test', $result );

	} // test_getNameAttributeMetaboxContext()

	/**
	 * Asserts get_value, when given the type attribute 'checkbox':
	 * returns a int
	 * that equals 1.
	 * 
	 * @covers 			Employees\Fields\Field::get_value()
	 * @since 			1.0.0
	 */
	public function test_getValueTypeCheckbox() {

		$attributes 		= array();
		$attributes['type'] = 'checkbox';
		$context 			= '';
		$settings 			= array();
		$result 			= $this->field->get_value( $attributes, $context, $settings );

		$this->assertInternalType( 'int', $result );
		$this->assertEquals( 1, $result );

	} // test_getValueTypeCheckbox()

	/**
	 * Asserts get_value, in 'settings' context, but no value given:
	 * returns a string
	 * that equals ''.
	 * 
	 * @covers 			Employees\Fields\Field::get_value()
	 * @since 			1.0.0
	 */
	public function test_getValueSettingsContextNoSettingValue() {

		$attributes 		= array();
		$attributes['id'] 	= 'test';
		$context 			= 'settings';
		$settings 			= array();
		$result 			= $this->field->get_value( $attributes, $context, $settings );

		$this->assertInternalType( 'string', $result );
		$this->assertEquals( '', $result );

	} // test_getValueSettingsContextNoSettingValue()

	/**
	 * Asserts get_value, in 'settings' context, when given the value 'yep':
	 * returns a string
	 * that equals 'yep'.
	 * 
	 * @covers 			Employees\Fields\Field::get_value()
	 * @since 			1.0.0
	 */
	public function test_getValueSettingsContextWithSettingValue() {

		$attributes 		= array();
		$attributes['id'] 	= 'test';
		$context 			= 'settings';
		$settings 			= array();
		$settings['test'] 	= 'yep';
		$result 			= $this->field->get_value( $attributes, $context, $settings );

		$this->assertInternalType( 'string', $result );
		$this->assertEquals( 'yep', $result );

	} // test_getValueSettingsContextWithSettingValue()

	/**
	 * Asserts get_value, in 'metabox' context, but no value given:
	 * returns a string
	 * that equals ''.
	 * 
	 * @covers 			Employees\Fields\Field::get_value()
	 * @since 			1.0.0
	 */
	public function test_getValueMetaboxContextNoSettingValue() {

		$attributes 		= array();
		$attributes['id'] 	= 'test';
		$context 			= 'metabox';
		$settings 			= array();
		$result 			= $this->field->get_value( $attributes, $context, $settings );

		$this->assertInternalType( 'string', $result );
		$this->assertEquals( '', $result );

	} // test_getValueMetaboxContextNoSettingValue()

	/**
	 * Asserts get_value, in 'metabox' context, when given the value 'yep':
	 * returns a string
	 * that equals 'yep'.
	 * 
	 * @covers 			Employees\Fields\Field::get_value()
	 * @since 			1.0.0
	 */
	public function test_getValueMetaboxContextWithSettingValue() {

		$attributes 			= array();
		$attributes['id'] 		= 'test';
		$context 				= 'metabox';
		$settings 				= array();
		$settings['test'][0] 	= 'yep';
		$result 				= $this->field->get_value( $attributes, $context, $settings );

		$this->assertInternalType( 'string', $result );
		$this->assertEquals( 'yep', $result );

	} // test_getValueMetaboxContextWithSettingValue()

	/**
	 * Asserts get_settings, when given no context:
	 * returns an empty array.
	 * 
	 * @covers 			Employees\Fields\Field::get_settings()
	 * @since 			1.0.0
	 */
	public function test_getSettingsNoContext() {

		$result = $this->field->get_settings( '' );

		$this->assertInternalType( 'array', $result );
		$this->assertEquals( array(), $result );

	} // test_getSettingsNoContext()

	/**
	 * Asserts get_settings, given the 'settings' context, with no settings data:
	 * returns an empty array.
	 * 
	 * @covers 			Employees\Fields\Field::get_settings()
	 * @since 			1.0.0
	 */
	public function test_getSettingsSettingsContext() {

		$result = $this->field->get_settings( 'settings' );

		$this->assertInternalType( 'array', $result );
		$this->assertEquals( array(), $result );

	} // test_getSettingsSettingsContext()

	/**
	 * Asserts get_settings, given the 'metabox' context, with no meta data:
	 * returns FALSE.
	 * 
	 * @covers 			Employees\Fields\Field::get_settings()
	 * @since 			1.0.0
	 */
	public function test_getSettingsMetaboxContext() {

		$result = $this->field->get_settings( 'metabox' );

		$this->assertInternalType( 'bool', $result );
		$this->assertEquals( FALSE, $result );

	} // test_getSettingsMetaboxContext()

	/**
	 * Asserts get_attributes, given no attributes:
	 * returns FALSE.
	 * 
	 * @covers 			Employees\Fields\Field::get_attributes()
	 * @since 			1.0.0
	 */
	public function test_getAttributesEmptyAtts() {

		$attributes 		= array();
		$context 			= '';
		$settings 			= array();
		$expected 			= array();
		$expected['class'] = 'widefat';
		$expected['type'] 	= 'text';
		$expected['name'] 	= '';
		$expected['value'] 	= '';
		$result 			= $this->field->get_attributes( $attributes, $context, $settings );

		$this->assertInternalType( 'bool', $result );
		$this->assertEquals( FALSE, $result );

	} // test_getAttributesEmptyAtts()

	/**
	 * Asserts get_attributes, given an ID attribute:
	 * returns an array
	 * that has the keys 'class', 'type', 'id', 'name', 'value'
	 * and their values are 'widefat', 'text', 'test', 'test', '' respectively
	 * 
	 * @covers 			Employees\Fields\Field::get_attributes()
	 * @since 			1.0.0
	 */
	public function test_getAttributesIDAtt() {

		$attributes 		= array();
		$attributes['id'] 	= 'test';
		$context 			= '';
		$settings 			= array();
		$expected 			= array();
		$expected['class'] 	= 'widefat';
		$expected['id'] 	= 'test';
		$expected['name'] 	= 'employees_settings[test]';
		$expected['type'] 	= 'text';
		$expected['value'] 	= '';

		$result = $this->field->get_attributes( $attributes, $context, $settings );

		$this->assertInternalType( 'array', $result );
		$this->assertEquals( $expected, $result );

		foreach ( $expected as $key => $value ) {

			$this->assertArrayHasKey( $key, $result );
			$this->assertEquals( $value, $result[$key] );

		}

	} // test_getAttributesIDAtt()

	/**
	 * Asserts filter_attributes returns FALSE if value and key are empty.
	 * 
	 * @covers 			Employees\Fields\Field::filter_attributes()
	 * @since 			1.0.0
	 */
	public function test_filterAttributesAllEmpty() {

		// Everything empty, expect FALSE
		$value 	= '';
		$key 	= '';
		$result = $this->field->filter_attributes( $value, $key );

		$this->assertFalse( $result );

	} // test_filterAttributesAllEmpty()

	/**
	 * Asserts filter_attributes truens TRUE if value is not empty.
	 * 
	 * @covers 			Employees\Fields\Field::filter_attributes()
	 * @since 			1.0.0
	 */
	public function test_filterAttributesVallueNotEmpty() {

		$value 	= 'test';
		$key 	= '';
		$result = $this->field->filter_attributes( $value, $key );

		$this->assertTrue( $result );

	} // test_filterAttributesVallueNotEmpty()

	/**
	 * Asserts filter_attributes returns TRUE if key is 'value'.
	 * 
	 * @covers 			Employees\Fields\Field::filter_attributes()
	 * @since 			1.0.0
	 */
	public function test_filterAttributesKeyIsValue() {

		$value 	= '';
		$key 	= 'value';
		$result = $this->field->filter_attributes( $value, $key );

		$this->assertTrue( $result );

	} // test_filterAttributesKeyIsValue()

	/**
	 * Asserts filter_attributes returns TRUE if key is 'data-test'.
	 * 
	 * @covers 			Employees\Fields\Field::filter_attributes()
	 * @since 			1.0.0
	 */
	public function test_filterAttributesDataKey() {

		$value 	= '';
		$key 	= 'data-test';
		$result = $this->field->filter_attributes( $value, $key );

		$this->assertTrue( $result );

	} // test_filterAttributesDataKey()

	/**
	 * Asserts filter_attributes returns FALSE if key is 'name', but value is empty.
	 * 
	 * @covers 			Employees\Fields\Field::filter_attributes()
	 * @since 			1.0.0
	 */
	public function test_filterAttributesValidKeyAndEmptyValue() {

		$value 	= '';
		$key 	= 'name';
		$result = $this->field->filter_attributes( $value, $key );

		$this->assertFalse( $result );

	} // test_filterAttributesValidKeyAndEmptyValue()

	/**
	 * Asserts filter_attributes returns TRUE if key is 'name' and value is not empty.
	 * 
	 * @covers 			Employees\Fields\Field::filter_attributes()
	 * @since 			1.0.0
	 */
	public function test_filterAttributesValidKeyAndNotEmptyValue() {

		$value 	= 'test';
		$key 	= 'name';
		$result = $this->field->filter_attributes( $value, $key );

		$this->assertTrue( $result );

	} // test_filterAttributesValidKeyAndNotEmptyValue()

} // class
