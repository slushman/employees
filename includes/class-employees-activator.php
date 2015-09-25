<?php

/**
 * Fired during plugin activation
 *
 * @link       http://slushman.com
 * @since      1.0.0
 *
 * @package    Employees
 * @subpackage Employees/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Employees
 * @subpackage Employees/includes
 * @author     Slushman <chris@slushman.com>
 */
class Employees_Activator {

	/**
	 * Registers CPTs, taxomomies, and plugin settings, then flushes rewrite rules
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-employees-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-employees-admin-cpt-employee.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-employees-admin-tax-department.php';

		Employees_CPT_Employee::new_cpt_employee();
		Employees_Tax_Department::new_taxonomy_department();

		flush_rewrite_rules();

		$opts 		= array();
		$options 	= Employees_Admin::get_options_list();

		foreach ( $options as $option ) {

			$opts[ $option[0] ] = $option[2];

		}

		update_option( 'employees-options', $opts );

	}

}
