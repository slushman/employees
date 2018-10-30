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
use Employees\Includes as Inc;

class Blocks {

	/**
	 * Instance of Inc\Query.
	 *
	 * @since 		1.5
	 * @access 		private
	 * @var 		Inc\Query
	 */
	private $query = '';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 		1.5
	 * @param 		Inc\Query 		$query 		Instance of the Inc\Query class.
	 */
	public function __construct( Inc\Query $query ) {

		$this->query = $query;

	} // __construct()

	/**
	 * Registers all the WordPress hooks and filters related to this class.
	 *
	 * @hooked 		init
	 * @since 		1.5
	 */
	public function hooks() {

		add_action( 'wp_loaded', 					array( $this, 'register_dynamic_blocks' ) );
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

		$blocks = $this->get_blocks();

		foreach ( $blocks as $block ) {

			wp_enqueue_style(
				$block . '-block-all-css',
				plugin_dir_url( __FILE__ ) . $block . '/dist/blocks.style.build.css',
				array( 'wp-blocks' ), 
				EMPLOYEES_VERSION
			);

		}

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

		$blocks = $this->get_blocks();

		foreach ( $blocks as $block ) {

			wp_enqueue_script(
				$block . '-block-js',
				plugin_dir_url( __FILE__ ) . $block . '/dist/blocks.build.js', 
				plugin_dir_url( __FILE__ ) . 'dist/blocks.build.js',
				array( 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-api', 'wp-data', 'wp-date', 'wp-utils' ),
				EMPLOYEES_VERSION
			);
			wp_enqueue_style( 
				$block . '-block-editor-css',
				plugin_dir_url( __FILE__ ) . $block . '/dist/blocks.editor.build.css',
				array( 'wp-blocks' ),
				EMPLOYEES_VERSION
			);

		}

	} // enqueue_block_editor_assets()

	/**
	 *  Returns an array of block names for this plugin.
	 * 
	 * @since 		1.5
	 * @return 		array 			Array of block names.
	 */
	public function get_blocks() {

		$blocks = array();
		$blocks[] = 'employee-job-title';
		$blocks[] = 'employee-contact-info';
		// $blocks[] = 'employees-list';

		return $blocks;

	} // get_blocks()

	/**
	 * Registers blocks for dynamic content.
	 * 
	 * @exits 		If the register_block_type function doesn't exist.
	 * @hooked 		wp_loaded
	 * @since 		1.5
	 * @uses 		register_block_type
	 */
	public function register_dynamic_blocks() {

		if ( ! function_exists( 'register_block_type' ) ) { return; }

		register_block_type( 'employees/employees-list-block', array(
			'attributes' => array(
				'test' => array(
					'type' => 'string',
				),
			),
			'render_callback' => array( $this, 'employees_list_block_render' )
		) );

	} // register_dynamic_blocks()

	/**
	 * Server rendering for the employees-list block.
	 * 
	 * @param 		array 		$attributes		The block attributes.
	 * @return 		mixed 						The HTML markup for the block.
	 */
	public function employees_list_block_render( $attributes ) {

		do_action( 'add_debug_info', $attributes, 'attributes' );

		$markup = '';

		$employees = $this->query();

		$recent_posts = wp_get_recent_posts( [
			'numberposts' => 3,
			'post_status' => 'publish',
		] );

		if ( 0 === count( $recent_posts ) ) {
			return '<p>No one actually works here...</p>';
		}

		$markup .= '<ul>';

		foreach( $recent_posts as $post ) {

			$post_id = $post['ID'];
			$markup .= sprintf(
				'<li><a href="%1$s">%2$s</a></li>',
				esc_url( get_permalink( $post_id ) ),
				esc_html( get_the_title( $post_id ) )
			);

		}

		$markup .= '<ul>';

		return $markup;

	} // employees_list_block_render()

} // class