<?php
/**
 * Class testing the Fields\Editor class.
 * 
 * @package 		Employees
 */

class TestFieldEditor extends WP_UnitTestCase {

	/**
	 * Configures WordPress for each test.
	 */
	public function setUp() {

		parent::setUp();

		$this->field = new \Employees\Fields\Editor();

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

		$this->assertInstanceOf( 'Employees\Fields\Editor', $this->field );

	} // test_isFieldObject()

	/**
	 * Asserts get_default_properties returns an array and has a key 'wrap'.
	 * 
	 * @covers 			Employees\Fields\Field::get_default_properties()
	 * @since 			1.0.0
	 */
	public function test_getDefaultProperties() {

		$expected 				= array();
		$expected['settings'] 	= '';
		$expected['wrap'] 		= 'div';
		$result 				= $this->field->get_default_properties();

		$this->assertInternalType( 'array', $result );
		$this->assertEquals( $expected, $result );

		foreach ( $expected as $key => $value ) {

			$this->assertArrayHasKey( $key, $result );
			$this->assertEquals( $value, $result[$key] );

		}

	} // test_getDefaultProperties()

} // class