<?php
/**
 * Class testing the CPT_Employee class.
 *
 * Tests:
 * 	Asserts the taxonomy 'topic' exists
 * 	Asserts the returned value from get_taxonomy_department_options:
 * 		is an array
 * 		contains the array key 'label'
 * 		contains the array key 'show_admin_column'
 * 		contains the array key 'public'
 * 		contains the array key 'show_in_rest'
 *
 * @package 		Employees
 */

class TestTaxDept extends WP_UnitTestCase {

	/**
	 * Configures WordPress for each test.
	 */
	public function setUp() {

		parent::setUp();

        $this->taxdept = new \Employees\Admin\Taxonomy_Department();

	} // setUp()

	/**
	 * Removes the testing configuration.
	 */
	public function tearDown() {

		parent::tearDown();

	} // tearDown()

	/**
     * Asserts TRUE that the 'department' taxonomy exists.
     *
     * @covers 			Answers\Admin\Taxonomy_Department::new_taxonomy_department()
     * @expects 		bool 		TRUE
     * @since 			1.0.0
     */
	public function test_newTaxonomyDepartment() {

		$this->assertTrue( taxonomy_exists( 'department' ) );

	} // test_newTaxonomyDepartment()

	/**
     * Tests the get_taxonomy_department_options() method.
     *
     * @covers 		Employees\Admin\Taxonomy_Department::get_taxonomy_department_options()
     * @since 		1.0.0
     */
    public function test_getTaxonomyDepartmentOptions() {

		$options = $this->taxdept->get_taxonomy_department_options();

		// Make sure $options is an array
		$this->assertTrue( is_array( $options ) );

		// Check for the expected array keys
        $this->assertArrayHasKey( 'label', $options );
		$this->assertArrayHasKey( 'show_admin_column', $options );
		$this->assertArrayHasKey( 'public', $options );
		$this->assertArrayHasKey( 'show_in_rest', $options );

		// Check for the expected values
		$this->assertEquals( 'Departments', $options['label'] );
		$this->assertTrue( $options['show_admin_column'] );
		$this->assertTrue( $options['public'] );
		$this->assertTrue( $options['show_in_rest'] );

    } // test_getTaxonomyDepartmentOptions()

} // class