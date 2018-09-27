<?php

/**
 * The block-specific functionality of the plugin.
 *
 * @link 			https://www.slushman.com
 * @since 			1.0.2
 * @package 		Employees\Blocks
 * @author 			Slushman <chris@slushman.com>
 */

namespace Employees\Blocks;

class Blocks {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 		1.5
	 */
	public function __construct() {} // __construct()

	/**
	 * Registers all the WordPress hooks and filters related to this class.
	 *
	 * @hooked 		init
	 * @since 		1.5
	 */
	public function hooks() {

		// add_action( 'wp_loaded', 					array( $this, 'register_dynamic_blocks' ) );
		add_action( 'enqueue_block_assets', 		array( $this, 'enqueue_block_assets' ) );
		add_action( 'enqueue_block_editor_assets', 	array( $this, 'enqueue_block_editor_assets' ) );

		add_filter( 'block_categories', 			array( $this, 'add_block_category' ), 10, 2 );

	} // hooks()

	/**
	 * Adds a custom category to the Blocks Categories list.
	 * 
	 * @hooked 		block_categories
	 * @since 		1.5
	 * @param 		array 			$categories 		The current block categories.
	 * @param 		WP_Post 		$post 				Post object.
	 * @return 		array 								The modified block categories.
	 */
	public function add_block_category( $categories, $post ) {

		return array_merge(
			$categories,
			array(
				array(
					'slug' => 'employees',
					'title' => __( 'Employees', 'employees' ),
				),
			)
		);

	} // add_block_category()

	/**
	 * Register the JavaScript for the frontend of the site.
	 *
	 * @hooked 		enqueue_block_assets
	 * @since 		1.5
	 */
	public function enqueue_block_assets() {

		// Name Block
		// wp_enqueue_script(
		// 	'employees-name-block-scripts-all',
		// 	plugins_url( '/blocks/employee-name/dist/blocks.build.js', dirname( __FILE__ ) ), 
		// 	plugin_dir_url( __FILE__ ) . 'dist/blocks.build.js',
		// 	array( 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-api' ),
		// 	EMPLOYEES_VERSION
		// );
		// wp_enqueue_style(
		// 	'employees-name-block-css-all',
		// 	plugins_url( '/blocks/employee-name/dist/blocks.style.build.css', dirname( __FILE__ ) ), 
		// 	array( 'wp-blocks' ), 
		// 	EMPLOYEES_VERSION
		// );

		// Job Title Block
		wp_enqueue_script(
			'employee-job-title-block-scripts-all', 
			plugins_url( '/blocks/employee-job-title/dist/blocks.build.js', dirname( __FILE__ ) ), 
			array( 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-api' ), 
			EMPLOYEES_VERSION 
		);
		wp_enqueue_style(
			'employee-job-title-block-css-all', 
			plugins_url( '/blocks/employee-job-title/dist/blocks.style.build.css', dirname( __FILE__ ) ), 
			array( 'wp-blocks' ), 
			EMPLOYEES_VERSION 
		);

	} // enqueue_block_assets()

	/**
	 * Enqueue the block's assets for the editor.
	 *
	 * 'wp-blocks': 	includes block type registration and related functions.
	 * 'wp-element': 	includes the WordPress Element abstraction for describing the structure of your blocks.
	 * 'wp-i18n': 		to internationalize the block's text.
	 *
	 * @hooked 		enqueue_block_editor_assets
	 * @since 		1.5
	 */
	public function enqueue_block_editor_assets() {

		// Name Block
		//wp_enqueue_script( 'employees-name-block-scripts-editor', plugin_dir_url( __FILE__ ) . 'dist/blocks.editor.build.js', array( 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-api' ), EMPLOYEES_VERSION );
		wp_enqueue_style( 'employees-name-block-css-editor', plugin_dir_url( __FILE__ ) . 'dist/blocks.editor.build.css', array( 'wp-blocks' ), EMPLOYEES_VERSION );
		wp_localize_script( 'employees-name-block-scripts-all', 'empName', [ 'rest_url' => esc_url( rest_url() ) ] );

		// Job Title Block
		//wp_enqueue_script( 'employees-job-title-block-scripts-editor', plugin_dir_url( __FILE__ ) . 'dist/blocks.editor.build.js', array( 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-api' ), EMPLOYEES_VERSION );
		wp_enqueue_style( 'employees-job-title-block-css-editor', plugin_dir_url( __FILE__ ) . 'dist/blocks.editor.build.css', array( 'wp-blocks' ), EMPLOYEES_VERSION );
		wp_localize_script( 'employees-job-title-block-scripts-all', 'empJobTitle', [ 'rest_url' => esc_url( rest_url() ) ] );

	} // enqueue_block_editor_assets()

	/**
	 * Registers blocks for dynamic content.
	 * 
	 * @hooked 		wp_loaded
	 * @since 		1.5
	 * @uses 		register_block_type
	 */
	public function register_dynamic_blocks() {

		register_block_type( 'employees/block-employee-name', array( 'editor_script' => 'employees-name-block-scripts-all' ) );

	} // register_dynamic_blocks()

} // class