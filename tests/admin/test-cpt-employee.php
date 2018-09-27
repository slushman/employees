<?php
/**
 * Class testing the CPT_Employee class.
 *
 * Tests:
 * 	Asserts $this->cpt_employee is an instance of the CPT_Employee class.
 * 	Asserts that an action was performed on 'init'
 * 	Asserts that 'init' has an action hooked to it.
 * 	Asserts the custom post type 'employee' exists
 * 	Asserts the returned value from get_cpt_employee_options:
 * 		is an array
 * 		the value of 'labels' is also an array
 * 		contains the array key 'labels'
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

class TestCPTEmployee extends WP_UnitTestCase {

	/**
	 * Configures WordPress for each test.
	 */
	public function setUp() {

		parent::setUp();

        $this->cptemployee = new \Employees\Admin\CPT_Employee();

	} // setUp()

	/**
	 * Removes the testing configuration.
	 */
	public function tearDown() {

		parent::tearDown();

	} // tearDown()

	/**
	 * Asserts TRUE that $this->cptemployee is an instance of the CPT_Employee class.
	 *
	 * @expects 		bool 		TRUE
	 * @since 			1.0.0
	 */
	public function test_isCPTEmployeeObject() {

		$this->assertInstanceOf( 'Employees\Admin\CPT_Employee', $this->cptemployee );

	} // test_isCPTEmployeeObject()

	/**
	 * Asserts that the wp_loaded action ran greater than 0 times.
	 *
	 * @covers 			Employees\Admin\CPT_Employee::hooks()
	 * @expects 		bool 		TRUE
	 * @since 			1.0.0
	 */
	public function test_hooks() {

		$this->assertGreaterThan( 0, did_action( 'wp_loaded' ) );
		$this->assertTrue( has_action( 'wp_loaded' ) );

	} // test_hooks()

	/**
     * Asserts TRUE that the 'employee' post type exists.
     *
     * @covers 			Employees\Admin\CPT_Employee::new_cpt_employee()
     * @expects 		bool 		TRUE
     * @since 			1.0.0
     */
	public function test_newCPTEmployee() {

		$cpt_employee = $this->cptemployee->new_cpt_employee();

		$this->assertTrue( post_type_exists( 'employee' ) );

	} // test_newCPTEmployee()

    /**
     * Tests the get_cpt_options() method.
     *
     * @covers 		Employees\Admin\CPT_Employee::get_cpt_employee_options()
     * @since 		1.0.0
     */
    public function test_getCPTEmployeeOptions() {

		$options = $this->cptemployee->get_cpt_employee_options();

		// Make sure $options is an array
		$this->assertTrue( is_array( $options ) );

		// Make sure $options['labels'] is an array
		$this->assertTrue( is_array( $options['labels'] ) );

		// Check for the expected array keys
		$this->assertArrayHasKey( 'labels', $options );
		$this->assertArrayHasKey( 'menu_icon', $options );
		$this->assertArrayHasKey( 'public', $options );
		$this->assertArrayHasKey( 'show_in_rest', $options );

		// Check for the expected values
		$this->assertEquals( 'dashicons-groups', $options['menu_icon'] );
		$this->assertTrue( $options['public'] );
		$this->assertTrue( $options['show_in_rest'] );

    } // test_getCPTEmployeeOptions()

} // class
