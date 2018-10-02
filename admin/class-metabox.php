<?php

/**
 * Contains all the methods and properties for a generic metabox.
 *
 * @link 			https://www.slushman.com
 * @since 			1.5
 * @package 		Employees\Admin
 * @author 			slushman <chris@slushman.com>
 */

namespace Employees\Admin;

class Metabox {

	/**
	 * The capability required for saving these metaboxes.
	 *
	 * @since 		1.0.0
	 * @access 		protected
	 * @var 		string 			$capability 			The capability.
	 */
	protected $capability = 'edit_post';

	/**
	 * The post type for this set of metaboxes.
	 *
	 * @since 		1.0.0
	 * @access 		protected
	 * @var 		string 			$post_type 			This post type.
	 */
	protected $post_type = '';

	/**
	 * Array of fields used in these metaboxes.
	 *
	 * @since 		1.0.0
	 *
	 * @var 		array 		$fields 		The fields used in this metabox.
	 */
	protected $metabox_fields = array();

	/**
	 * The post meta data
	 *
	 * @since 		1.0.0
	 * @access 		protected
	 * @var 		array 			$meta    			The post meta data.
	 */
	protected $meta = array();

	/**
	 * The nonce name for this metabox.
	 *
	 * @since 		1.0.0
	 * @access 		protected
	 * @var 		string 			$nonce    			The nonce name for this metabox.
	 */
	protected $nonce = '';

	/**
	 * Constructor. Defined in child class.
	 *
	 * Should set things like:
	 * 		$this->post_type: limits metabox(es) to particular post type screens
	 * 		$this->fields: for saving metabox data. An array of the field IDs.
	 * 		$this->nonce: for saving metabox data. The name of the nonce ID.
	 *
	 * @since 		1.0.0
	 */
	public function __construct() {

		// Define in the child class.

	} // __construct()

	/**
	 * Registers metaboxes with WordPress
	 *
	 * Use the standard add_meta_box function to define a box.
	 * 		In the callback_args, use "file" to define the file in
	 * 			template-parts/metaboxes containing the metabox view.
	 *
	 * add_meta_box (
	 * 		string 					$id						the metabox ID
	 * 		string 					$title					the metabox title
	 * 		callable 				$callback				the function for displaying the metabox
	 * 		string|array|WP_Screen 	$screen = null			where the metabox should appear (post type, link, comment, etc)
	 * 		string 					$context = 'advanced'	where on that screen it should appear. options: normal, size, advanced
	 * 		string 					$priority = 'default'	the importance within the context. options: default, high, low
	 * 		array 					$callback_args = null	arguments sent to the callback.
	 * )
	 *
	 * @hooked 		add_meta_boxes
	 * @since 		1.0.0
	 * @access 		public
	 * @param 		string 			$post_type 		The post type name.
	 * @param 		object 			$post 			The post object.
	 */
	public function add_metaboxes( $post_type, $post ) {

		// Define in child class.

	} // add_metaboxes()

	/**
	 * Returns TRUE if the post type is correct.
	 *
	 * @exits 		If not the correct post type.
	 * @exits 		If $check is empty / no post type to check was passed.
	 * @param 		string 		$check 		The post type to check for.
	 * @return 		bool 					TRUE if the post type is correct, otherwise FALSE.
	 */
	private function check_post_type( $check ) {
		
		//wp_die( __FUNCTION__ . ' $check: ' . $check );
		//wp_die( __FUNCTION__ . ' $this->post_type: ' . $this->post_type );

		if ( empty( $this->post_type ) ) { return FALSE; }
		if ( empty( $check) ) { return FALSE; }

		if ( is_array( $this->post_type ) ) {

			return in_array( $this->post_type, $check );

		}

		return $this->post_type == $check;

	} // check_post_type()

	/**
	 * Calls a metabox file specified in the add_meta_box args.
	 *
	 * @exits 		Not in the admin.
	 * @exits 		Not on the correct post type.
	 * @since 		1.0.0
	 * @access 		public
	 * @param 		obj 		$post 			The post object.
	 * @param 		array 		$params 		The parameters passed to the metabox.
	 */
	public function metabox( $post, $params ) {

		if ( ! is_admin() ) { return; }
		if ( ! $this->check_post_type( $post->post_type ) ) { return; }

		wp_nonce_field( EMPLOYEES_SLUG, $this->nonce );

		if ( isset( $params['args']['file'] ) ) {

			include( plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/metabox-' . $params['args']['file'] . '.php' );

		} else {

			$this->output_metabox( $post, $params );

		}

	} // metabox()

	/**
	 * Renders the metabox fields.
	 *
	 * @since 		1.0.0
	 * @param 		obj 		$post 			The post object.
	 * @param 		array 		$params 		The parameters passed to the metabox.
	 */
	protected function output_metabox( $post, $params ) {

		foreach ( $this->metabox_fields as $field ) :

			?><p><?php

				call_user_func( array( $this->fields, $field[3] ), $field[4] );

			?></p><?php

		endforeach;

	} // output_metabox()

	/**
	 * Checks conditions before validating metabox submissions.
	 *
	 * Returns FALSE under these conditions:
	 * 		Doing autosave.
	 * 		User doesn't have the capabilities.
	 * 		Not on the correct post type.
	 * 		Nonce doesn't validate.
	 *
	 * @param 		object 		$posted 		The submitted data.
	 * @param 		int 		$post_id 		The post ID.
	 * @param 		object 		$post 			The post object.
	 * @return 		int 						0 if any conditions are met, otherwise 1.
	 */
	private function pre_validation_checks( $posted, $post_id, $post ) {

		//wp_die( print_r( $posted ) );
		//wp_die( print_r( $post_id ) );
		//wp_die( print_r( $post ) );

		if ( FALSE !== wp_is_post_autosave( $post_id ) ) { return FALSE; }

		//wp_die( 'wp_is_post_autosave' );

		if ( FALSE !== wp_is_post_revision( $post_id ) ) { return FALSE; }

		//wp_die( 'wp_is_post_revision' );

		if ( ! current_user_can( $this->capability, $post_id ) ) { return FALSE; }

		//wp_die( 'current_user_can' );

		if ( ! $this->check_post_type( $post->post_type ) ) { return FALSE; }

		//wp_die( 'check_post_type' );

		if ( isset( $posted[$this->nonce] ) && ! wp_verify_nonce( $posted[$this->nonce], EMPLOYEES_SLUG ) ) { return FALSE; }

		//wp_die( 'check_nonce' );

		return TRUE;

	} // pre_validation_checks()

	/**
	 * Adds all metaboxes in the "top" context to just under the title field.
	 * 
	 * @exits 		If not on the correct post type.
	 * @hooked 		edit_form_after_title
	 * @param		object 		$post_obj 		The post object.
	 */
	public function promote_metaboxes( $post_obj ) {

		if ( ! $this->check_post_type( $post_obj->post_type ) ) { return FALSE; }

		global $wp_meta_boxes;

		do_meta_boxes( get_current_screen(), 'top', $post_obj );

		unset( $wp_meta_boxes[$this->post_type]['top'] );

	} // promote_metaboxes()

	/**
	 * Registers all meta fields for the REST API.
	 * Appends 'employee_' to the beginning of each metadata field name
	 * to prevent conflicts with other post types and fields.
	 * 
	 * @uses 		register_meta
	 */
	public function register_meta_fields() {

		foreach ( $this->metabox_fields as $field ) {

			register_meta( 'post', $field[0], array(
				'show_in_rest' => true,
				'single' => true,
				'type' => 'string'
			) );

		}

	} // register_meta_fields()

	/**
	 * Sanitizes the metadata
	 *
	 * If $posted is an array:
	 * 		Loop through each posted field and sanitize the value.
	 * If not an array:
	 * 		Sanitize the value.
	 * Return the results.
	 *
	 * @link 		http://www.stillat.com/blog/2013/10/29/passing-data-to-php-anonymous-functions/
	 *
	 * @exits 		If $meta is empty.
	 * @exits 		If $posted is empty.
	 * @param 		array 		$field 			The field info.
	 * @param 		mixed 		$posted 		Data posted by the form field.
	 * @return 		mixed 						The sanitized data.
	 */
	protected function sanitize_meta( $field, $posted ) {

		if ( empty( $field ) ) { return FALSE; }
		if ( empty( $posted ) ) { return FALSE; }
		if ( is_array( $posted ) ) { wp_die( new \WP_Error( 'forgot_type', __( 'Specify the data type to sanitize for ' . $field, 'employees' ) ) ); }

		//wp_die( print_r( $posted ) );

		$sanitizer = new \Employees\Includes\Sanitize();
		$new_value = $sanitizer->clean( $posted, $field[1] );

		return $new_value;

	} // ()

	/**
	 * Returns the sanitized values from each repeated item
	 *
	 * Counts how many repeated items were submitted.
	 * Loops through each field in the repeated item and sanitizes the submitted data.
	 * Returns an array containing the sanitized data.
	 *
	 * @exits 		If $fields is empty or not an array.
	 * @exits 		If $posted is empty.
	 * @param 		array 		$fields 		The repeater fields.
	 * @param 		array 		$posted 		The posted data.
	 * @return 		array 						The sanitized repeater data.
	 */
	protected function sanitize_repeater( $fields, $posted ) {

		$new_value = array();

		if ( empty( $posted ) ) { return; }

		foreach ( $posted as $key => $field_data ) {

			if ( '%s' === $key ) { continue; }

			foreach ( $fields as $field ) {

				$new_value[$key][$field[0]] = $this->sanitize_meta( $field, $field_data[$field[0]] );

			}

		}

		return $new_value;

	} // sanitize_repeater()

	/**
	 * Sets the $fields class variable.
	 *
	 * @since 		1.0.0
	 * @param 		array 		$fields			The fields used in the metabox.
	 * @return 		boolean 	FALSE 			If $fields is empty.
	 */
	protected function set_fields( $fields ) {

		if ( empty( $fields ) ) { return FALSE; }

		$this->fields = $fields;

	} // set_fields()

	/**
	 * Sets the $metabox_fields class variable.
	 *
	 * @since 		1.0.0
	 * @param 		array 		$fields			The fields used in the metabox.
	 * @return 		boolean 	FALSE 			If $fields is empty.
	 */
	protected function set_metabox_fields( $fields ) {

		if ( empty( $fields ) ) { return FALSE; }

		$this->metabox_fields = $fields;

	} // set_metabox_fields()

	/**
	 * Sets the class variable $options
	 *
	 * @exits 		Post is empty.
	 * @exits 		Not on the correct post type.
	 * @hooked 		add_meta_boxes
	 * @param 		string 			$post_type 		The post type name.
	 * @param 		object 			$post 			The post object.
	 */
	public function set_meta( $post_type, $post ) {

		if ( ! is_object( $post ) ) { return; }
		if ( ! $this->check_post_type( $post->post_type ) ) { return FALSE; }

		$this->meta = get_post_custom( $post->ID );

	} // set_meta()

	/**
	 * Sets the $nonce class variable.
	 *
	 * @since 		1.0.0
	 * @param 		string 		$nonce_name 		The nonce name.
	 * @return 		boolean 	FALSE 				If $nonce_name is empty.
	 */
	protected function set_nonce( $nonce_name ) {

		if ( empty( $nonce_name ) ) { return FALSE; }

		$this->nonce = $nonce_name;

	} // set_nonce()

	/**
	 * Sets the $post_type class variable.
	 *
	 * @since 		1.0.0
	 * @param 		string 		$post_type		The post type name.
	 * @return 		boolean 	FALSE 			If $post_type is empty.
	 */
	protected function set_post_type( $post_type ) {

		if ( empty( $post_type ) ) { return FALSE; }

		$this->post_type = $post_type;

	} // set_post_type()

	/**
	 * Saves metabox data.
	 *
	 * $meta contents:
	 * 		$meta[0] = field ID
	 * 		$meta[1] = sanitization type
	 * 		$meta[2] = default value
	 * 		$meta[3] = Field type
	 * 		$meta[4] = field args
	 * 
	 * Checks if this is an actual save or something else. Returns the postID if FALSE.
	 * Loops through all the fields:
	 * 		Checks if the meta key is in $_POST.
	 * 		Sends Repeater values to sanitize_repeater()
	 * 		Sends others to sanitize_meta()
	 * 		Updates meta with sanitized meta value.
	 *
	 * @hooked 		save_post 		10
	 * @since 		1.0.0
	 * @access 		public
	 * @param 		int 			$post_id 		The post ID
	 * @param 		object 			$post 			The post object
	 */
	public function validate_meta( $post_id, $post ) {

		$validate = $this->pre_validation_checks( $_POST, $post_id, $post );

		if ( ! $validate ) { return $post_id; }

		foreach ( $this->metabox_fields as $meta ) {

			if ( ! array_key_exists( $meta[0], $_POST ) ) { continue; }

			if ( 'repeater' === $meta[1] ) {

				$clean_value = $this->sanitize_repeater( $meta[4]['fields'], $_POST[$meta[0]] );

			} else {

				$clean_value = $this->sanitize_meta( $meta, $_POST[$meta[0]] );

			}

			$saved = update_post_meta( $post_id, $meta[0], $clean_value );

			unset( $clean_value );
			unset( $saved );

		} // foreach

	} // validate_meta()

} // class