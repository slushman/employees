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

		Employees_Admin::new_cpt_employees();
		Employees_Admin::new_taxonomy_department();

		flush_rewrite_rules();

	}

}
