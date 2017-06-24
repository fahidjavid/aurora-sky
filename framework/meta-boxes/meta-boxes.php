<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 *
 * @link http://metabox.io/docs/registering-meta-boxes/
 */
add_filter( 'rwmb_meta_boxes', 'aurora_sky_register_meta_boxes' );
/**
 * Register meta boxes
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function aurora_sky_register_meta_boxes( $meta_boxes ) {
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'aurora_sky_';
	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'standard',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => esc_html__( 'Standard Fields', 'aurora-sky' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'post' ),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',
		// Auto save: true, false (default). Optional.
		'autosave'   => true,
		// List of meta fields
		'fields'     => array(
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Text', 'aurora-sky' ),
				// Label description, display below field name (optional).
				'label_description' => esc_html__( 'Some description', 'aurora-sky' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}text",
				// Field description (optional)
				'desc'  => esc_html__( 'Text description', 'aurora-sky' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => esc_html__( 'Default text value', 'aurora-sky' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => true,
			),
			// CHECKBOX
			array(
				'name' => esc_html__( 'Checkbox', 'aurora-sky' ),
				'id'   => "{$prefix}checkbox",
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 1,
			),
			// RADIO BUTTONS
			array(
				'name'    => esc_html__( 'Radio', 'aurora-sky' ),
				'id'      => "{$prefix}radio",
				'type'    => 'radio',
				// Array of 'value' => 'Label' pairs for radio options.
				// Note: the 'value' is stored in meta field, not the 'Label'
				'options' => array(
					'value1' => esc_html__( 'Label1', 'aurora-sky' ),
					'value2' => esc_html__( 'Label2', 'aurora-sky' ),
				),
			),
			// SELECT BOX
			array(
				'name'        => esc_html__( 'Select', 'aurora-sky' ),
				'id'          => "{$prefix}select",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'value1' => esc_html__( 'Label1', 'aurora-sky' ),
					'value2' => esc_html__( 'Label2', 'aurora-sky' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => 'value2',
				'placeholder' => esc_html__( 'Select an Item', 'aurora-sky' ),
			),
			// HIDDEN
			array(
				'id'   => "{$prefix}hidden",
				'type' => 'hidden',
				// Hidden field must have predefined value
				'std'  => esc_html__( 'Hidden value', 'aurora-sky' ),
			),
			// PASSWORD
			array(
				'name' => esc_html__( 'Password', 'aurora-sky' ),
				'id'   => "{$prefix}password",
				'type' => 'password',
			),
			// TEXTAREA
			array(
				'name' => esc_html__( 'Textarea', 'aurora-sky' ),
				'desc' => esc_html__( 'Textarea description', 'aurora-sky' ),
				'id'   => "{$prefix}textarea",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
			),
		),
		'validation' => array(
			'rules'    => array(
				"{$prefix}password" => array(
					'required'  => true,
					'minlength' => 7,
				),
			),
			// optional override of default jquery.validate messages
			'messages' => array(
				"{$prefix}password" => array(
					'required'  => esc_html__( 'Password is required', 'aurora-sky' ),
					'minlength' => esc_html__( 'Password must be at least 7 characters', 'aurora-sky' ),
				),
			),
		),
	);
	// 2nd meta box
	$meta_boxes[] = array(
		'title' => esc_html__( 'Advanced Fields', 'aurora-sky' ),
		'fields' => array(
			// HEADING
			array(
				'type' => 'heading',
				'name' => esc_html__( 'Heading', 'aurora-sky' ),
				'desc' => esc_html__( 'Optional description for this heading', 'aurora-sky' ),
			),
			// SLIDER
			array(
				'name'       => esc_html__( 'Slider', 'aurora-sky' ),
				'id'         => "{$prefix}slider",
				'type'       => 'slider',
				// Text labels displayed before and after value
				'prefix'     => esc_html__( '$', 'aurora-sky' ),
				'suffix'     => esc_html__( ' USD', 'aurora-sky' ),
				// jQuery UI slider options. See here http://api.jqueryui.com/slider/
				'js_options' => array(
					'min'  => 10,
					'max'  => 255,
					'step' => 5,
				),
				// Default value
				'std'        => 155,
			),
			// NUMBER
			array(
				'name' => esc_html__( 'Number', 'aurora-sky' ),
				'id'   => "{$prefix}number",
				'type' => 'number',
				'min'  => 0,
				'step' => 5,
			),
			// DATE
			array(
				'name'       => esc_html__( 'Date picker', 'aurora-sky' ),
				'id'         => "{$prefix}date",
				'type'       => 'date',
				// jQuery date picker options. See here http://api.jqueryui.com/datepicker
				'js_options' => array(
					'appendText'      => esc_html__( '(yyyy-mm-dd)', 'aurora-sky' ),
					'dateFormat'      => esc_html__( 'yy-mm-dd', 'aurora-sky' ),
					'changeMonth'     => true,
					'changeYear'      => true,
					'showButtonPanel' => true,
				),
			),
			// DATETIME
			array(
				'name'       => esc_html__( 'Datetime picker', 'aurora-sky' ),
				'id'         => $prefix . 'datetime',
				'type'       => 'datetime',
				// jQuery datetime picker options.
				// For date options, see here http://api.jqueryui.com/datepicker
				// For time options, see here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'stepMinute'     => 15,
					'showTimepicker' => true,
				),
			),
			// TIME
			array(
				'name'       => esc_html__( 'Time picker', 'aurora-sky' ),
				'id'         => $prefix . 'time',
				'type'       => 'time',
				// jQuery datetime picker options.
				// For date options, see here http://api.jqueryui.com/datepicker
				// For time options, see here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'stepMinute' => 5,
					'showSecond' => true,
					'stepSecond' => 10,
				),
			),
			// COLOR
			array(
				'name' => esc_html__( 'Color picker', 'aurora-sky' ),
				'id'   => "{$prefix}color",
				'type' => 'color',
			),
			// CHECKBOX LIST
			array(
				'name'    => esc_html__( 'Checkbox list', 'aurora-sky' ),
				'id'      => "{$prefix}checkbox_list",
				'type'    => 'checkbox_list',
				// Options of checkboxes, in format 'value' => 'Label'
				'options' => array(
					'value1' => esc_html__( 'Label1', 'aurora-sky' ),
					'value2' => esc_html__( 'Label2', 'aurora-sky' ),
				),
			),
			// AUTOCOMPLETE
			array(
				'name'    => esc_html__( 'Autocomplete', 'aurora-sky' ),
				'id'      => "{$prefix}autocomplete",
				'type'    => 'autocomplete',
				// Options of autocomplete, in format 'value' => 'Label'
				'options' => array(
					'value1' => esc_html__( 'Label1', 'aurora-sky' ),
					'value2' => esc_html__( 'Label2', 'aurora-sky' ),
				),
				// Input size
				'size'    => 30,
				// Clone?
				'clone'   => false,
			),
			// EMAIL
			array(
				'name' => esc_html__( 'Email', 'aurora-sky' ),
				'id'   => "{$prefix}email",
				'desc' => esc_html__( 'Email description', 'aurora-sky' ),
				'type' => 'email',
				'std'  => 'name@email.com',
			),
			// RANGE
			array(
				'name' => esc_html__( 'Range', 'aurora-sky' ),
				'id'   => "{$prefix}range",
				'desc' => esc_html__( 'Range description', 'aurora-sky' ),
				'type' => 'range',
				'min'  => 0,
				'max'  => 100,
				'step' => 5,
				'std'  => 0,
			),
			// URL
			array(
				'name' => esc_html__( 'URL', 'aurora-sky' ),
				'id'   => "{$prefix}url",
				'desc' => esc_html__( 'URL description', 'aurora-sky' ),
				'type' => 'url',
				'std'  => 'http://google.com',
			),
			// OEMBED
			array(
				'name' => esc_html__( 'oEmbed', 'aurora-sky' ),
				'id'   => "{$prefix}oembed",
				'desc' => esc_html__( 'oEmbed description', 'aurora-sky' ),
				'type' => 'oembed',
			),
			// SELECT ADVANCED BOX
			array(
				'name'        => esc_html__( 'Select', 'aurora-sky' ),
				'id'          => "{$prefix}select_advanced",
				'type'        => 'select_advanced',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'value1' => esc_html__( 'Label1', 'aurora-sky' ),
					'value2' => esc_html__( 'Label2', 'aurora-sky' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				// 'std'         => 'value2', // Default value, optional
				'placeholder' => esc_html__( 'Select an Item', 'aurora-sky' ),
			),
			// TAXONOMY
			array(
				'name'       => esc_html__( 'Taxonomy', 'aurora-sky' ),
				'id'         => "{$prefix}taxonomy",
				'type'       => 'taxonomy',
				// Taxonomy name
				'taxonomy'   => 'category',
				// How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
				'field_type' => 'checkbox_list',
				// Additional arguments for get_terms() function. Optional
				'query_args' => array(),
			),
			// TAXONOMY ADVANCED
			array(
				'name'       => esc_html__( 'Taxonomy Advanced', 'aurora-sky' ),
				'id'         => "{$prefix}taxonomy_advanced",
				'type'       => 'taxonomy_advanced',
				// Can this be cloned?
				'clone'      => true,
				// Taxonomy name
				'taxonomy'   => 'category',
				// How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
				'field_type' => 'select_tree',
				// Additional arguments for get_terms() function. Optional
				'query_args' => array(),
			),
			// POST
			array(
				'name'        => esc_html__( 'Posts (Pages)', 'aurora-sky' ),
				'id'          => "{$prefix}pages",
				'type'        => 'post',
				// Post type
				'post_type'   => 'page',
				// Field type, either 'select' or 'select_advanced' (default)
				'field_type'  => 'select_advanced',
				'placeholder' => esc_html__( 'Select an Item', 'aurora-sky' ),
				// Query arguments (optional). No settings means get all published posts
				'query_args'  => array(
					'post_status'    => 'publish',
					'posts_per_page' => - 1,
				),
			),
			// WYSIWYG/RICH TEXT EDITOR
			array(
				'name'    => esc_html__( 'WYSIWYG / Rich Text Editor', 'aurora-sky' ),
				'id'      => "{$prefix}wysiwyg",
				'type'    => 'wysiwyg',
				// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
				'raw'     => false,
				'std'     => esc_html__( 'WYSIWYG default value', 'aurora-sky' ),
				// Editor settings, see wp_editor() function: look4wp.com/wp_editor
				'options' => array(
					'textarea_rows' => 4,
					'teeny'         => true,
					'media_buttons' => false,
				),
			),
			// DIVIDER
			array(
				'type' => 'divider',
			),
			// FILE UPLOAD
			array(
				'name' => esc_html__( 'File Upload', 'aurora-sky' ),
				'id'   => "{$prefix}file",
				'type' => 'file',
			),
			// FILE ADVANCED (WP 3.5+)
			array(
				'name'             => esc_html__( 'File Advanced Upload', 'aurora-sky' ),
				'id'               => "{$prefix}file_advanced",
				'type'             => 'file_advanced',
				'max_file_uploads' => 4,
				'mime_type'        => 'application,audio,video', // Leave blank for all file types
			),
			// IMAGE ADVANCED - RECOMMENDED
			array(
				'name'             => esc_html__( 'Image Advanced Upload (Recommended)', 'aurora-sky' ),
				'id'               => "{$prefix}imgadv",
				'type'             => 'image_advanced',
				// Delete image from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same image for multiple posts
				'force_delete'     => false,
				// Maximum image uploads
				'max_file_uploads' => 2,
				// Display the "Uploaded 1/2 files" status
				'max_status'       => true,
			),
			// IMAGE UPLOAD
			array(
				'id'               => 'image_upload',
				'name'             => esc_html__( 'Image Upload', 'aurora-sky' ),
				'type'             => 'image_upload',
				// Delete image from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same image for multiple posts
				'force_delete'     => false,
				// Maximum image uploads
				'max_file_uploads' => 2,
				// Display the "Uploaded 1/2 files" status
				'max_status'       => true,
			),
			// PLUPLOAD IMAGE UPLOAD (ALIAS OF IMAGE UPLOAD)
			array(
				'name'             => esc_html__( 'Plupload Image (Alias of Image Upload)', 'aurora-sky' ),
				'id'               => "{$prefix}plupload",
				'type'             => 'plupload_image',
				// Delete image from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same image for multiple posts
				'force_delete'     => false,
				// Maximum image uploads
				'max_file_uploads' => 2,
				// Display the "Uploaded 1/2 files" status
				'max_status'       => true,
			),
			// THICKBOX IMAGE UPLOAD (WP 3.3+)
			array(
				'name'         => esc_html__( 'Thickbox Image Upload', 'aurora-sky' ),
				'id'           => "{$prefix}thickbox",
				'type'         => 'thickbox_image',
				// Delete image from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same image for multiple posts
				'force_delete' => false,
			),
			// IMAGE
			array(
				'name'             => esc_html__( 'Image Upload', 'aurora-sky' ),
				'id'               => "{$prefix}image",
				'type'             => 'image',
				// Delete image from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same image for multiple posts
				'force_delete'     => false,
				// Maximum image uploads
				'max_file_uploads' => 2,
			),
			// VIDEO
			array(
				'name'             => __( 'Video', 'aurora-sky' ),
				'id'               => 'video',
				'type'             => 'video',
				// Maximum video uploads. 0 = unlimited.
				'max_file_uploads' => 3,
				// Delete image from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same image for multiple posts
				'force_delete'     => false,
				// Display the "Uploaded 1/3 files" status
				'max_status'       => true,
			),
			// BUTTON
			array(
				'id'   => "{$prefix}button",
				'type' => 'button',
				'name' => ' ', // Empty name will "align" the button to all field inputs
			),
			// TEXT-LIST
			array(
				'name'    => esc_html__( 'Text List', 'rwmb' ),
				'id'      => "{$prefix}text_list",
				'type'    => 'text_list',
				// Options of inputs, in format 'Placeholder' => 'Label'
				'options' => array(
					'Placehold1' => esc_html__( 'Label1', 'rwmb' ),
					'Placehold2' => esc_html__( 'Label2', 'rwmb' ),
					'Placehold3' => esc_html__( 'Label3', 'rwmb' ),
				),
			),
		),
	);
	return $meta_boxes;
}