<?php

/**
 * The plugin bootstrap file
 *
 * Requires WordPress 3.5 or higher
 *
 * @link              http://slushman.com
 * @since             1.0.0
 * @package           Employees
 *
 * @wordpress-plugin
 * Plugin Name:       Employees
 * Plugin URI:        http://slushman.com/employees
 * Description:       Creates a directory of employees
 * Version:           1.0.0
 * Author:            Slushman
 * Author URI:        http://slushman.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       employees
 * Domain Path:       /assets/languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Used for referring to the plugin file or basename
if ( ! defined( 'EMPLOYEES_FILE' ) ) {
	define( 'EMPLOYEES_FILE', plugin_basename( __FILE__ ) );
}

/**
 * The code that runs during plugin activation.
 * This action is documented in classes/class-activator.php
 */
function activate_employees() {
	require_once plugin_dir_path( __FILE__ ) . 'classes/class-activator.php';
	Employees_Activator::activate();
}


/**
 * The code that runs during plugin deactivation.
 * This action is documented in classes/class-deactivator.php
 */
function deactivate_employees() {
	require_once plugin_dir_path( __FILE__ ) . 'classes/class-deactivator.php';
	Employees_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_employees' );
register_deactivation_hook( __FILE__, 'deactivate_employees' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'classes/class-employees.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_employees() {

	$plugin = new Employees();
	$plugin->run();

}
run_employees();
