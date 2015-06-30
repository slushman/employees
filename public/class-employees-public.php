<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://slushman.com
 * @since      1.0.0
 *
 * @package    Employees
 * @subpackage Employees/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Employees
 * @subpackage Employees/public
 * @author     Slushman <chris@slushman.com>
 */
class Employees_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/employees-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/employees-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Returns a post object of employee posts
	 *
	 * @param 	array 		$params 			An array of optional parameters
	 * @param 	string 		$cache 				String to create a new cache of posts
	 *
	 * @return 	object 		A post object
	 */
	private function get_employees( $params, $cache = '' ) {

		$return 	= '';
		$cache_name = 'employee_posts';

		if ( ! empty( $cache ) ) {

			$cache_name = 'employee_' . $cache . '_posts';

		}

		$return = wp_cache_get( $cache_name, 'employees_posts' );

		if ( false === $return ) {

			$args['no_found_rows']			= true;
			$args['order'] 					= 'ASC';
			$args['post_type'] 				= 'employees';
			$args['post_status'] 			= 'publish';
			$args['posts_per_page'] 		= 50;
			$args['update_post_meta_cache'] = false;
			$args['update_post_term_cache'] = false;

			if ( ! empty( $params ) ) {

				foreach ( $params as $key => $value ) {

					$args[$key] = $value;

				}

			}

			$query = new WP_Query( $args );

			if ( ! is_wp_error( $query ) && $query->have_posts() ) {

				wp_cache_set( $cache_name, $query, 'employees_posts', 5 * MINUTE_IN_SECONDS );

				$return = $query;

			} else {

				$return = '<p>Actually, noone really works here...</p>';

			}

		}

		return $return;

	} // get_employees()

	/**
	 * Returns the path to the single employee view file
	 *
	 * Looks for a "templates" folder in these directories, in this order:
	 * 		Current theme
	 * 		Parent theme
	 * 		Current theme templates folder
	 * 		Parent theme templates folder
	 * 		This plugin
	 *
	 * To use a custom template in a theme, put the single employee view
	 * in a file named "employees-single.php" in a folder called "templates" in the root
	 * of your theme.
	 *
	 * @param 	string 		$template 			The name of a template to return
	 * @return 	string 							The path to the view
	 */
	private function get_single_template_path() {

		$path 	= '';
		$file 	= '/employees-public-display-single.php';

		if ( file_exists( get_stylesheet_directory() . $file ) ) {

			$path = get_stylesheet_directory() . $file;

		} elseif ( file_exists( get_template_directory() . $file ) ) {

			$path = get_template_directory() . $file;

		} elseif ( file_exists( get_stylesheet_directory() . '/templates' . $file ) ) {

			$path = get_stylesheet_directory() . '/templates' . $file;

		} elseif ( file_exists( get_template_directory() . '/templates' . $file ) ) {

			$path = get_template_directory() . '/templates' . $file;

		} else {

			$path = plugin_dir_path( __FILE__ ) . 'partials' . $file;

		} // End of file checks

		return $path;

	} // get_single_template_path()

	/**
	 * Returns the URL of the featured image
	 *
	 * @param 	int 		$postID 		The post ID
	 * @param 	string 		$size 			The image size to return
	 *
	 * @return 	string | bool 				The URL of the featured image, otherwise FALSE
	 */
	private function get_thumbnail_url( $postID, $size = 'thumbnail' ) {

		if ( empty( $postID ) ) { return FALSE; }

		$thumb_id = get_post_thumbnail_id( $postID );

		if ( empty( $thumb_id ) ) { return FALSE; }

		$thumb_array = wp_get_attachment_image_src( $thumb_id, $size, true );

		if ( empty( $thumb_array ) ) { return FALSE; }

		return $thumb_array[0];

	} // get_thumbnail_url()

	/**
	 * Returns the proper WP_Query arrays based on the shortcode attributes
	 *
	 * @since 	1.0.0
	 * @param 	array 		$atts 			The shortcode attributes
	 * @return 	array 						WP_Query query arrays
	 */
	private function parse_attributes( $atts ) {

		if ( empty( $atts ) ) { return $atts; }

		$return = '';

		if ( ! empty( $atts['department'] ) ) {

			$return['tax_query'][]['field'] 	= 'slug';
			$return['tax_query'][]['taxonomy'] 	= 'department';
			$return['tax_query'][]['terms'] 	= $atts['department'];

		}

		return $return;

	} //

	/**
	 * Registers all shortcodes at once
	 *
	 * @return [type] [description]
	 */
	public function register_shortcodes() {

		add_shortcode( 'employeelist', array( $this, 'shortcode' ) );

	} // register_shortcodes()

	/**
	 * Processes shortcode
	 *
	 * @param   array	$atts		The attributes from the shortcode
	 * @return	mixed	$output		Output of the buffer
	 */
	public function shortcode( $atts = array() ) {

		ob_start();

		$items = $this->get_employees( $atts );

		//pretty( $items );

		if ( is_array( $items ) || is_object( $items ) ) {

			include( plugin_dir_path( __FILE__ ) . 'partials/employees-public-display.php' );

		} else {

			echo $items;

		}

		$output = ob_get_contents();

		ob_end_clean();

		return $output;

	} // shortcode()

}
