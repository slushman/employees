<?php
/**
 * Class testing the CPT_Employee_Columns class.
 *
 * Tests:
 * 	Asserts $this->CPT_Employee_Columns is an instance of the CPT_Employee_Columns class.
 * 	Asserts that an action was performed on 'init'
 * 	Asserts that 'init' has an action hooked to it.
 * 	Asserts the custom post type 'employee' exists
 * 	Asserts the taxonomy 'topic' exists
 * 	Asserts the returned value from get_CPT_Employee_Columns_options:
 * 		is an array
 * 		contains the array key 'label'
 * 		contains the array key 'menu_icon'
 * 		contains the array key 'public'
 * 		contains the array key 'show_in_rest'
 * 	Asserts 'label' in the $options array equals 'Employees'.
 * 	Asserts 'menu_icon' in the $options array equals 'dashicons-editor-help'.
 * 	Asserts 'public' in th $options array is TRUE.
 * 	Asserts 'show_in_rest' in th $options array is TRUE.
 *
 * @package 		Employees
 */

class TestCPTEmployeeColumns extends WP_UnitTestCase {

	/**
	 * Configures WordPress for each test.
	 */
	public function setUp() {

		parent::setUp();

		$this->columns = new \Employees\Admin\CPT_Employee_Columns();
		$this->postID = 1;

	} // setUp()

	/**
	 * Removes the testing configuration.
	 */
	public function tearDown() {

		parent::tearDown();

	} // tearDown()

	/**
	 * Asserts TRUE that $this->columns is an instance of the CPT_Employee_Columns class.
	 *
	 * @expects 		bool 		TRUE
	 * @since 			1.0.0
	 */
	public function test_isCPTEmployeeColumnsObject() {

		$this->assertInstanceOf( 'Employees\Admin\CPT_Employee_Columns', $this->columns );

	} // test_isCPTEmployeeColumnsObject()

	/**
     * Asserts TRUE that the 'employee' post type exists.
     *
     * @covers 			Employees\Admin\CPT_Employee_Columns::new_CPT_Employee_Columns()
     * @expects 		bool 		TRUE
     * @since 			1.0.0
     */
	// public function test_newCPTEmployee() {

	// 	$CPT_Employee_Columns = $this->columns->new_CPT_Employee_Columns();

	// 	$this->assertTrue( post_type_exists( 'employee' ) );

	// } // test_newCPTEmployee()

    /**
     * Tests the get_cpt_options() method.
     *
     * @covers 		Employees\Admin\CPT_Employee_Columns::get_CPT_Employee_Columns_options()
     * @since 		1.0.0
     */
    // public function test_getCPTEmployeeOptions() {

	// 	$options = $this->columns->get_CPT_Employee_Columns_options();

	// 	// Make sure $options is an array
	// 	$this->assertTrue( is_array( $options ) );

	// 	// Make sure $options['labels'] is an array
	// 	$this->assertTrue( is_array( $options['labels'] ) );

	// 	// Check for the expected array keys
	// 	$this->assertArrayHasKey( 'labels', $options );
	// 	$this->assertArrayHasKey( 'menu_icon', $options );
	// 	$this->assertArrayHasKey( 'public', $options );
	// 	$this->assertArrayHasKey( 'show_in_rest', $options );

	// 	// Check for the expected values
	// 	$this->assertEquals( 'dashicons-groups', $options['menu_icon'] );
	// 	$this->assertTrue( $options['public'] );
	// 	$this->assertTrue( $options['show_in_rest'] );

    // } // test_getCPTEmployeeOptions()

} // class
