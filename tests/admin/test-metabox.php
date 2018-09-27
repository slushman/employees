<?php
/**
 * Class testing the Admin\Metabox class.
 *
 * Tests:
 * 	Asserts $this->metabox is an instance of the Admin\Metabox class.
 *
 * @package 		Employees
 */

class TestMetabox extends WP_UnitTestCase {

	/**
	 * Configures WordPress for each test.
	 */
	public function setUp() {

		parent::setUp();

		$context = 'settings';
		$args = array();

		$this->metabox = new \Employees\Admin\Metabox();

	} // setUp()

	/**
	 * Removes the testing configuration.
	 */
	public function tearDown() {

		parent::tearDown();

	} // tearDown()

	/**
	 * Asserts TRUE that $this->metabox is an instance of the Metabox class.
	 *
	 * @expects 		bool 		TRUE
	 * @since 			1.0.0
	 */
	public function test_isFieldObject() {

		$this->assertInstanceOf( 'Employees\Admin\Metabox', $this->metabox );

	} // test_isFieldObject()

} // class
