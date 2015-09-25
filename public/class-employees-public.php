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
	 * The post meta data
	 *
	 * @since 		1.0.0
	 * @access 		private
	 * @var 		string 			$meta    			The post meta data.
	 */
	private $meta;

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

		$this->set_meta();

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
	 * Returns an array of the featured image details
	 *
	 * @param 	int 	$postID 		The post ID
	 * @return 	array 					Array of info about the featured image
	 */
	public function get_featured_image_info( $postID ) {

		if ( empty( $postID ) ) { return FALSE; }

		$imageID = get_post_thumbnail_id( $postID );

		if ( empty( $imageID ) ) { return FALSE; }

		return wp_prepare_attachment_for_js( $imageID );

	} // get_featured_image_info()

	/**
	 * Returns the requested SVG
	 *
	 * @param 	string 		$svg 		The name of the icon to return
	 * @param 	string 		$link 		URL to link from the SVG
	 *
	 * @return 	mixed 					The SVG code
	 */
	public static function get_svg( $svg ) {

		$output = '';

		switch ( $svg ) {

			case 'email' 			: $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="email"><path d="M19 14.5v-9q0-.62-.44-1.06T17.5 4H3.49q-.62 0-1.06.44T1.99 5.5v9q0 .62.44 1.06t1.06.44H17.5q.62 0 1.06-.44T19 14.5zm-1.31-9.11q.15.15.175.325t-.04.295-.165.22L13.6 9.95l3.9 4.06q.26.3.06.51-.09.11-.28.12t-.28-.07l-4.37-3.73-2.14 1.95-2.13-1.95-4.37 3.73q-.09.08-.28.07t-.28-.12q-.2-.21.06-.51l3.9-4.06-4.06-3.72q-.1-.1-.165-.22t-.04-.295.175-.325q.4-.4.95.07l6.24 5.04 6.25-5.04q.55-.47.95-.07z"/></svg>'; break;
			case 'facebook' 		: $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="facebook"><path d="M8.46 18h2.93v-7.3h2.45l.37-2.84h-2.82V6.04q0-.69.295-1.035T12.8 4.66h1.51V2.11Q13.36 2 12.12 2q-1.67 0-2.665.985T8.46 5.76v2.1H6v2.84h2.46V18z"/></svg>'; break;
			case 'fax' 				: $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="fax"><path d="M5 6.1v12c0 1-.8 1.8-1.8 1.8H1.9c-1 0-1.8-.8-1.8-1.8v-12c0-1 .8-1.8 1.8-1.8h1.4c.9 0 1.7.8 1.7 1.8zm14.9 2.5v8.5c0 1.6-1.3 2.8-2.8 2.8H7.5c-1 0-1.8-.8-1.8-1.8v-17C5.7.5 6.2 0 6.8 0h7.4c.6 0 1.4.3 1.8.8l1.7 1.7c.4.4.8 1.2.8 1.8v1.8c.8.5 1.4 1.4 1.4 2.5zm-2.8-4.3h-1.8c-.6 0-1.1-.5-1.1-1.1V1.5h-7v5.7h9.9V4.3zM10.4 10c0-.2-.2-.4-.4-.4H8.6c-.2 0-.4.2-.4.4v1.4c0 .2.2.4.4.4H10c.2 0 .4-.2.4-.4V10zm0 2.8c0-.2-.2-.4-.4-.4H8.6c-.2 0-.4.2-.4.4v1.4c0 .2.2.4.4.4H10c.2 0 .4-.2.4-.4v-1.4zm0 2.9c0-.2-.2-.4-.4-.4H8.6c-.2 0-.4.2-.4.4v1.4c0 .2.2.4.4.4H10c.2 0 .4-.2.4-.4v-1.4zm2.8-5.7c0-.2-.2-.4-.4-.4h-1.4c-.2 0-.4.2-.4.4v1.4c0 .2.2.4.4.4h1.4c.2 0 .4-.2.4-.4V10zm0 2.8c0-.2-.2-.4-.4-.4h-1.4c-.2 0-.4.2-.4.4v1.4c0 .2.2.4.4.4h1.4c.2 0 .4-.2.4-.4v-1.4zm0 2.9c0-.2-.2-.4-.4-.4h-1.4c-.2 0-.4.2-.4.4v1.4c0 .2.2.4.4.4h1.4c.2 0 .4-.2.4-.4v-1.4zM16 10c0-.2-.2-.4-.4-.4h-1.4c-.2 0-.4.2-.4.4v1.4c0 .2.2.4.4.4h1.4c.2 0 .4-.2.4-.4V10zm0 2.8c0-.2-.2-.4-.4-.4h-1.4c-.2 0-.4.2-.4.4v1.4c0 .2.2.4.4.4h1.4c.2 0 .4-.2.4-.4v-1.4zm0 2.9c0-.2-.2-.4-.4-.4h-1.4c-.2 0-.4.2-.4.4v1.4c0 .2.2.4.4.4h1.4c.2 0 .4-.2.4-.4v-1.4z"/></svg>'; break;
			case 'flickr' 			: $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="flickr"><path d="M19.8 3.9v12.2c0 2-1.6 3.7-3.7 3.7H3.9c-2 0-3.7-1.6-3.7-3.7V3.9C.2 1.9 1.8.2 3.9.2h12.2c2.1 0 3.7 1.6 3.7 3.7zM6.4 7.3c-1.5 0-2.7 1.2-2.7 2.7s1.2 2.7 2.7 2.7c1.5 0 2.7-1.2 2.7-2.7S7.9 7.3 6.4 7.3zm7.2 0c-1.5 0-2.7 1.2-2.7 2.7s1.2 2.7 2.7 2.7c1.5 0 2.7-1.2 2.7-2.7s-1.2-2.7-2.7-2.7z"/></svg>'; break;
			case 'github' 			: $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="github"><path d="M19.8 16.1c0 2-1.6 3.7-3.7 3.7h-2.9c-.4 0-.8 0-.8-.6v-3.1c0-.9-.3-1.5-.7-1.8 2.2-.2 4.5-1.1 4.5-4.8 0-1.1-.4-2-1-2.6.1-.3.4-1.3-.1-2.6-.8-.3-2.7 1-2.7 1-.7-.3-1.6-.4-2.4-.4s-1.7.1-2.5.4c0 0-1.9-1.3-2.7-1-.5 1.3-.2 2.3 0 2.6-.6.7-1 1.6-1 2.6 0 3.8 2.3 4.6 4.5 4.8-.3.3-.5.7-.6 1.3-.6.3-2 .7-2.8-.8-.5-.9-1.5-1-1.5-1-1 0-.1.6-.1.6.6.3 1.1 1.4 1.1 1.4.4 1.8 3.2 1.2 3.2 1.2v2.2c0 .6-.4.6-.8.6H3.9c-2 0-3.7-1.6-3.7-3.7V3.9C.2 1.9 1.8.2 3.9.2h12.3c2 0 3.7 1.6 3.7 3.7v12.2h-.1z"/></svg>'; break;
			case 'googleplus' 		: $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="googleplus"><path d="M9.25 11.64q.88.62 1.23 1.28t.35 1.65q0 .62-.3 1.195t-.845 1.04-1.4.74-1.895.275q-1.26 0-2.31-.315t-1.685-.93-.635-1.405q0-1.28 1.3-2.265t3.14-.985q.14 0 .4-.005t.38-.005q-.61-.61-.61-1.26 0-.43.23-.86-.08.01-.22-.005t-.2-.015q-1.51 0-2.475-.97T2.74 6.43q0-.87.555-1.665t1.47-1.28T6.67 3h4.52l-1.01 1H8.74q.83.87 1.03 1.16.43.63.43 1.44 0 1.35-1.28 2.34-.53.42-.695.67t-.165.62q0 .28.395.705t.795.705zM6.83 9.37q.88.03 1.39-.76t.36-1.94q-.15-1.14-.87-1.95t-1.6-.84q-.88-.02-1.39.75t-.36 1.91q.15 1.15.875 1.98t1.595.85zM17 10v1h-2v2h-1v-2h-2v-1h2V8h1v2h2zM6.38 17.1q1.72 0 2.5-.635t.78-1.705q0-.22-.05-.47-.04-.16-.105-.295t-.18-.275-.205-.235-.28-.24-.295-.215-.365-.25-.38-.26q-.56-.18-1.12-.18-1.31-.02-2.3.685t-.99 1.665q0 1 .855 1.705t2.135.705z"/></svg>'; break;
			case 'home' 			:
			case 'website' 			: $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="home"><path d="M17.6 7.8l1.9 1.9-1.3 1.3L10 2.9l-8.2 8.2L.5 9.7 10 .2l5.1 5.1V2.7h2.5v5.1zM10 4.7l7.6 7.6v7.6H2.4v-7.6L10 4.7zm2.5 13.8v-6.3h-5v6.3h5z"/></svg>'; break;
			case 'instagram' 		: $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="instagram"><path d="M19.9 17.3c0 1.4-1.1 2.5-2.5 2.5H2.7c-1.4 0-2.5-1.1-2.5-2.5V2.7C.2 1.3 1.3.2 2.7.2h14.7c1.4 0 2.5 1.1 2.5 2.5v14.6zm-2.3-8.8h-1.7c.2.5.3 1.1.3 1.7 0 3.3-2.7 5.9-6.1 5.9-3.4 0-6.1-2.7-6.1-5.9-.1-.6 0-1.2.1-1.7H2.3v8.3c0 .4.3.8.8.8h13.7c.4 0 .8-.3.8-.8V8.5zM10 6.1c-2.2 0-4 1.7-4 3.8 0 2.1 1.8 3.8 4 3.8s4-1.7 4-3.8c0-2.1-1.8-3.8-4-3.8zm7.6-2.9c0-.5-.4-.9-.9-.9h-2.2c-.5 0-.9.4-.9.9v2.1c0 .5.4.9.9.9h2.2c.5 0 .9-.4.9-.9V3.2z"/></svg>'; break;
			case 'linkedin' 		: $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="linkedin"><path d="M2.5 5C1 5 .1 4 .1 2.8.1 1.6 1.1.6 2.5.6c1.5 0 2.4 1 2.4 2.2C4.9 4 4 5 2.5 5zm2.1 14.4H.4V6.7h4.2v12.7zm15.3 0h-4.2v-6.8c0-1.7-.6-2.9-2.1-2.9-1.2 0-1.9.8-2.2 1.5-.1.3-.1.7-.1 1v7.1H6.9c.1-11.4 0-12.6 0-12.6h4.2v1.9c.6-.9 1.6-2.1 3.8-2.1 2.8 0 4.9 1.8 4.9 5.7v7.2z"/></svg>'; break;
			case 'phone' 			: $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="phone"><path d="M12.06 6l-.21-.2q-.26-.27-.32-.47t.035-.38.365-.45l2.72-2.75q.11-.11.275-.285t.235-.245.19-.175.185-.12.17-.035.195.03.21.13.27.22l.21.2zm.53.45l4.4-4.4q.21.28.415.595t.47.78.45.95.31 1 .1 1.04-.215.975q-.33.76-.59 1.175t-.695.93-.715.895q-2.26 2.57-6 6.07-.41.29-.9.725t-.915.705-1.185.57q-.43.17-.95.18t-1.035-.125T4.53 18.2t-.97-.445-.8-.455-.62-.4l4.4-4.4 1.18 1.62q.16.23.485.165t.66-.285.655-.54l.925-.93 1.18-1.185 1.045-1.065.85-.89q.32-.32.535-.65t.29-.655-.165-.495zM1.57 16.5l-.21-.21q-.15-.16-.235-.28t-.095-.245-.01-.195.11-.21.17-.205.27-.265.31-.3l2.74-2.72q.41-.39.635-.425t.635.315l.2.21z"/></svg>'; break;
			case 'pinterest' 		: $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="pinterest"><path d="M10.5.1c3.7 0 7.1 2.6 7.1 6.5 0 3.7-1.9 7.8-6.1 7.8-1 0-2.2-.5-2.7-1.4-.9 3.6-.8 4.1-2.8 6.8l-.2.1-.1-.1c-.1-.7-.2-1.5-.2-2.2 0-2.4 1.1-5.9 1.7-8.3-.3-.6-.4-1.3-.4-2 0-1.2.8-2.7 2.2-2.7 1 0 1.5.8 1.5 1.7 0 1.5-1 3-1 4.5 0 1 .8 1.7 1.8 1.7 2.7 0 3.6-3.9 3.6-6 0-2.8-2-4.3-4.7-4.3C7 2.1 4.6 4.3 4.6 7.5c0 1.5.9 2.3.9 2.7 0 .3-.2 1.4-.6 1.4h-.2C3 11 2.4 8.8 2.4 7.2c0-4.4 4-7.1 8.1-7.1z"/></svg>'; break;
			case 'rss' 				: $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="rss"><path d="M14.92 18H18q0-2.14-.575-4.18t-1.61-3.765-2.51-3.18-3.23-2.475-3.83-1.585T2 2.25v3.02q2.1 0 4.07.645t3.56 1.82 2.785 2.74 1.85 3.51T14.92 18zm-5.44 0h3.08q0-2.11-.84-4.035t-2.255-3.32-3.37-2.22T2 7.6v3.02q1.5 0 2.86.56t2.43 1.6q1.06 1.04 1.625 2.39T9.48 18zm-5.35-.02q.88 0 1.505-.61t.625-1.48q0-.86-.625-1.475T4.13 13.8t-1.505.615T2 15.89q0 .87.62 1.48t1.51.61z"/></svg>'; break;
			case 'tumblr' 			: $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="tumblr"><path d="M15.7 18.7c-.4.5-2 1.1-3.4 1.2-4.3.1-5.9-3.1-5.9-5.3V8.1h-2V5.6c3-1.1 3.7-3.8 3.9-5.3 0-.1.1-.1.1-.1h2.9v5h4v3h-4v6.1c0 .8.3 2 1.9 1.9.5 0 1.2-.2 1.6-.3l.9 2.8z"/></svg>'; break;
			case 'twitter' 			: $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="twitter"><path d="M18.94 4.46q-.75 1.12-1.83 1.9.01.15.01.47 0 1.47-.43 2.945T15.38 12.6t-2.1 2.39-2.93 1.66-3.66.62q-3.04 0-5.63-1.65.48.05.88.05 2.55 0 4.55-1.57-1.19-.02-2.125-.73T3.07 11.55q.39.07.69.07.47 0 .96-.13-1.27-.26-2.105-1.27T1.78 7.89v-.04q.8.43 1.66.46-.75-.51-1.19-1.315T1.81 5.25q0-1 .5-1.84Q3.69 5.1 5.655 6.115T9.87 7.24q-.1-.45-.1-.84 0-1.51 1.075-2.585T13.44 2.74q1.6 0 2.68 1.16 1.26-.26 2.33-.89-.43 1.32-1.62 2.02 1.07-.11 2.11-.57z"/></svg>'; break;
			case 'vimeosquare' 		: $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="vimeo-square"><path d="M19.9 16.2c0 2.1-1.7 3.7-3.7 3.7H3.8c-2.1 0-3.7-1.7-3.7-3.7V3.8C.1 1.8 1.8.1 3.8.1h12.4c2.1 0 3.7 1.7 3.7 3.7v12.4zM14.7 3.8c-2-.1-3.3 1.1-4 3.4.3-.2.7-.3 1-.3.7 0 1 .4 1 1.2 0 .5-.4 1.2-1 2.2-.6 1-1.1 1.4-1.4 1.4-.4 0-.7-.7-1.1-2.2 0-.4-.2-1.5-.5-3.2-.2-1.6-.9-2.4-2-2.3-.5 0-1.2.5-2.2 1.3-.6.6-1.3 1.2-2 1.8l.6.9c.6-.4 1-.7 1.1-.7.5 0 1 .8 1.4 2.3l1.2 4.2c.6 1.5 1.3 2.3 2.1 2.3 1.3 0 3-1.3 4.9-3.8 1.9-2.4 2.9-4.3 2.9-5.7.1-1.8-.6-2.7-2-2.8z"/></svg>'; break;
			case 'vine' 			: $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="vine"><path d="M18.7 12.3c-.8.2-1.7.3-2.4.3-1.7 3.5-4.6 6.5-5.6 7-.7.4-1.3.4-2 0-1.2-.8-5.8-4.6-7.4-16.5h3.4c.8 7.2 2.9 10.9 5.2 13.6 1.3-1.3 2.5-2.9 3.4-4.8-2.3-1.2-3.6-3.7-3.6-6.6 0-3 1.7-5.2 4.6-5.2 2.8 0 4.4 1.8 4.4 4.8 0 1.1-.2 2.4-.7 3.4 0 0-2.1.4-2.9-.9.2-.5.4-1.4.4-2.2 0-1.4-.5-2.1-1.3-2.1s-1.4.8-1.4 2.3c0 3 1.9 4.8 4.4 4.8.4 0 .9 0 1.4-.2v2.3z"/></svg>'; break;
			case 'wordpress' 		: $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="wordpress"><path d="M20 10q0-1.63-.505-3.155t-1.43-2.755-2.155-2.155-2.755-1.43T10 0 6.845.505 4.09 1.935 1.935 4.09.505 6.845 0 10t.505 3.155 1.43 2.755 2.155 2.155 2.755 1.43T10 20t3.155-.505 2.755-1.43 2.155-2.155 1.43-2.755T20 10zM10 1.01q1.83 0 3.495.71t2.87 1.915 1.915 2.87.71 3.495-.71 3.495-1.915 2.87-2.87 1.915-3.495.71-3.495-.71-2.87-1.915-1.915-2.87T1.01 10t.71-3.495 1.915-2.87 2.87-1.915T10 1.01zM8.01 14.82L4.96 6.61l1.05-.08q.2-.02.27-.275t-.025-.49-.305-.225q-1.29.1-2.13.1-.33 0-.52-.01Q4.4 3.97 6.17 3T10 2.03q1.54 0 2.935.55t2.475 1.54q-.52-.07-.985.305T13.96 5.54q0 .29.115.615t.225.525.37.61l.08.13q.5.87.5 2.21 0 .6-.315 1.72t-.635 1.94l-.32.82-2.71-7.5q.21-.01.4-.05t.27-.08l.08-.03q.2-.02.275-.295t-.025-.535-.3-.25q-1.3.11-2.14.11-.35 0-.875-.03L8.08 5.4l-.36-.03q-.2-.01-.3.255t-.025.54.275.285l.84.08 1.12 3.04zm6.02 2.15L16.64 10q.03-.07.07-.195t.15-.535.155-.82.08-1.05-.065-1.21q.94 1.7.94 3.81 0 2.19-1.065 4.05t-2.875 2.92zM2.68 6.77L6.5 17.25q-2.02-.99-3.245-2.945T2.03 10q0-1.79.65-3.23zm7.45 4.53l2.29 6.25q-1.17.42-2.42.42-1.03 0-2.06-.3z"/></svg>'; break;
			case 'youtube' 			: $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="youtube"><path d="M17.9 18c-.2.9-.9 1.5-1.8 1.6-2 .2-4.1.2-6.1.2s-4.1 0-6.1-.2c-.9-.1-1.6-.7-1.8-1.6-.3-1.2-.3-2.6-.3-3.9 0-1.3 0-2.6.3-3.9.2-.7.9-1.4 1.8-1.5 2-.2 4.1-.2 6.1-.2s4.1 0 6.1.2c.8.1 1.6.7 1.8 1.6.3 1.2.3 2.6.3 3.9 0 1.3-.1 2.6-.3 3.8zM6.5 11.4v-1H3.1v1h1.2v6.3h1.1v-6.3h1.1zM8.3.1L7 4.5v3H5.9v-3c-.1-.5-.4-1.3-.7-2.3-.3-.7-.5-1.4-.7-2.1h1.2L6.4 3 7.1.1h1.2zm1.2 17.6v-5.4h-1v4.2c-.2.3-.4.5-.6.5-.1 0-.2-.1-.2-.2v-4.4h-1v4.3c0 .4 0 .6.1.8.1.3.3.4.6.4.4 0 .7-.2 1.1-.7v.6h1zm1.7-12c0 .6-.1 1-.3 1.3-.3.4-.7.6-1.2.6-.4 0-.8-.2-1.1-.6-.2-.3-.3-.7-.3-1.3V3.8c0-.6.1-1 .3-1.3.3-.4.7-.6 1.2-.6s.9.2 1.2.6c.2.3.3.7.3 1.3v1.9zm-1-2.1c0-.5-.1-.8-.5-.8-.3 0-.5.3-.5.8v2.3c0 .5.2.8.5.8s.5-.3.5-.8V3.6zm3 10.3c0-.5 0-.9-.1-1.1-.1-.4-.4-.6-.8-.6s-.7.2-1 .6v-2.4h-1v7.3h1v-.5c.3.4.7.6 1 .6.4 0 .7-.2.8-.6.1-.2.1-.6.1-1.1v-2.2zm-1 2.3c0 .5-.1.7-.4.7-.2 0-.3-.1-.5-.2v-3.3c.2-.2.3-.2.5-.2.3 0 .4.3.4.7v2.3zm2.7-8.7h-1v-.6c-.4.5-.8.7-1.1.7-.3 0-.6-.1-.6-.4-.1-.2-.1-.4-.1-.8V2h1v4.4c0 .2.1.2.2.2.2 0 .4-.2.6-.5V2h1v5.5zm2 8.3h-1v.7c-.1.3-.2.4-.4.4-.3 0-.5-.3-.5-.8v-1h2V14c0-.6-.1-1-.3-1.3-.3-.4-.7-.6-1.2-.6s-.9.2-1.2.6c-.2.3-.3.8-.3 1.3v1.9c0 .6.1 1 .3 1.3.3.4.7.6 1.2.6s.9-.2 1.2-.6c.1-.2.2-.4.2-.6v-.8zm-.9-1.4h-1v-.5c0-.5.2-.7.5-.7s.5.3.5.7v.5z"/></svg>'; break;

		} // switch

		return $output;

	} // get_svg()

	/**
	 * Returns the path to the employees list view file
	 *
	 * Looks for the file in these directories, in this order:
	 * 		Current theme
	 * 		Parent theme
	 * 		Current theme templates folder
	 * 		Parent theme templates folder
	 * 		This plugin
	 *
	 * To use a custom list template in a theme,
	 * create the view in a file named "now-hiring-jobs-list.php"
	 * in one of the locations listed above.
	 *
	 * To use a custom single job opening template in a theme,
	 * create the view in a file named "now-hiring-jobs-single.php"
	 * in one of the locations listed above.
	 *
	 * @param 	string 		$name 			The name of a view file
	 * @return 	string 						The path to the view
	 */
	private function get_view( $name ) {

		$view = '';

		$checks[] = "{$name}.php";
		$checks[] = "{$name}.php";
		$checks[] = "/templates/{$name}.php";
		$checks[] = "/templates/{$name}.php";

		apply_filters( $this->plugin_name . '-view-paths', $checks );

		$view = locate_template( $checks, TRUE );

		if ( empty( $view ) ) {

			$view = plugin_dir_path( __FILE__ ) . 'partials' . '/' . $name . '.php';

		}

		return $view;

	} // get_view()

	/**
	 * Processes shortcode employeelist
	 *
	 * @param 	array 	$atts 		Shortcode attributes
	 * @return	mixed	$output		Output of the buffer
	 */
	public function list_employees( $atts = array() ) {

		ob_start();

		$defaults['view-list'] 		= $this->plugin_name . '-list';
		$defaults['order'] 			= 'ASC';
		$defaults['quantity'] 		= 100;
		$defaults['view-single'] 	= $this->plugin_name . '-single';
		$args						= shortcode_atts( $defaults, $atts, 'employeelist' );
		$shared 					= new Employees_Shared( $this->plugin_name, $this->version );
		$items 						= $shared->get_employees( $args );

		if ( is_array( $items ) || is_object( $items ) ) {

			$include = $this->get_view( $args['view-list'] );

			include $include;

		} else {

			echo $items;

		}

		$output = ob_get_contents();

		ob_end_clean();

		return $output;

	} // list_employees()

	/**
	 * Registers all shortcodes at once
	 *
	 * @return [type] [description]
	 */
	public function register_shortcodes() {

		add_shortcode( 'employeelist', array( $this, 'list_employees' ) );

	} // register_shortcodes()

	/**
	 * Sets the class variable $options
	 */
	public function set_meta() {

		global $post;

		if ( empty( $post ) ) { return; }
		if ( 'employee' !== $post->post_type ) { return; }

		$this->meta = get_post_custom( $post->ID );

	} // set_meta()

	/**
	 * Adds a default single view template for an employee
	 *
	 * @param 	string 		$template 		The name of the template
	 * @return 	mixed 						The single template
	 */
	public function single_cpt_template( $template ) {

		global $post;

		$return = $template;

	    if ( 'employee' == $post->post_type ) {

			$return = $this->get_view( 'single-employee' );

		}

		return $return;

	} // single_cpt_template()

	/**
	 * Sets the class variable $options
	 */
	private function set_options() {

		$this->options = get_option( $this->plugin_name . '-options' );

	} // set_options()

} // class
