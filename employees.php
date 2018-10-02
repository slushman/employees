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
 * Plugin URI:        http://www.slushman.com/employees
 * Description:       Creates a directory of employees
 * Version:           1.5
 * Author:            Slushman
 * Author URI:        http://www.slushman.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       employees
 * Domain Path:       /languages
 */

use Employees\Includes as Inc;
use Employees\Admin as Admin;
use Employees\Frontend as Front;
use Employees\Fields as Fields;
use Employees\Blocks as Blocks;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) { die; }

// Used for referring to the plugin file or basename
if ( ! defined( 'EMPLOYEES_FILE' ) ) {
	define( 'EMPLOYEES_FILE', plugin_basename( __FILE__ ) );
}

/**
 * Define plugin constants.
 */
define( 'EMPLOYEES_VERSION', '1.5' );
define( 'EMPLOYEES_SLUG', 'employees' );
define( 'EMPLOYEES_SETTINGS', 'employees_settings' );

/**
 * Include the autoloader.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-autoloader.php';

/**
 * Activation and Deactivation Hooks.
 */
register_activation_hook( __FILE__, array( 'Employees\Includes\Activator', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Employees\Includes\Deactivator', 'deactivate' ) );

/**
 * Initializes each class and adds the hooks action in each to init.
 */
function employees_init() {

	$classes[] = new Inc\i18n();
	$classes[] = new Admin\CPT_Employee();
	$classes[] = new Admin\CPT_Employee_Columns();
	$classes[] = new Admin\Taxonomy_Department();
	$classes[] = new Admin\Metabox_Links( new Fields\Fields_Admin( 'metabox' ) );
	$classes[] = new Admin\Metabox_Name( new Fields\Fields_Admin( 'metabox' ) );
	$classes[] = new Admin\Metabox_Contact( new Fields\Fields_Admin( 'metabox' ) );
	$classes[] = new Admin\Metabox_Job_Title( new Fields\Fields_Admin( 'metabox' ) );
	$classes[] = new Admin\Metabox_Location( new Fields\Fields_Admin( 'metabox' ) );
	$classes[] = new Admin\Metabox_Order( new Fields\Fields_Admin( 'metabox' ) );
	$classes[] = new Admin\Admin( new Fields\Fields_Admin( 'settings' ), new Inc\Sanitize() );
	$classes[] = new Blocks\Blocks( new Inc\Query );

	foreach ( $classes as $class ) {

		add_action( 'init', array( $class, 'hooks' ) );

	}

} // employees_init()

add_action( 'plugins_loaded', 'employees_init' );
