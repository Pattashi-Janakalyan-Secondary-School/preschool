<?php
/**
 * preschool Theme Customizer
 *
 * @package preschool
 */
/**
 * Options for preschool Theme Customizer.
 */
function preschool_customizer( $wp_customize ) {

	/* Main option Settings Panel */
	$wp_customize->add_panel('preschool_main_options', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __('Preschool Options', 'preschool'),
		'description' => __('Panel to update preschool theme options', 'preschool'), // Include html tags such as <p>.
		'priority' => 10 // Mixed with top-level-section hierarchy.
	));

	/* preschool Main Options */
	$wp_customize->add_section('preschool_slider_options', array(
			'title' => __('Slider options', 'preschool'),
			'priority' => 31,
			'panel' => 'preschool_main_options'
	));
			$wp_customize->add_setting( 'preschool[preschool_slider_checkbox]', array(
							'default' => 0,
							'type' => 'option',
							'sanitize_callback' => 'preschool_sanitize_checkbox',
			) );
			$wp_customize->add_control( 'preschool[preschool_slider_checkbox]', array(
							'label' => esc_html__( 'Check if you want to enable slider', 'preschool' ),
							'section' => 'preschool_slider_options',
							'priority'  => 5,
							'type'      => 'checkbox',
			) );

			// Pull all the categories into an array
			global $options_categories;
			$wp_customize->add_setting('preschool[preschool_slide_categories]', array(
					'default' => '',
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'preschool_sanitize_slidecat'
			));
			$wp_customize->add_control('preschool[preschool_slide_categories]', array(
					'label' => __('Slider Category', 'preschool'),
					'section' => 'preschool_slider_options',
					'type'    => 'select',
					'description' => __('Select a category for the featured post slider', 'preschool'),
					'choices'    => $options_categories
			));

			$wp_customize->add_setting('preschool[preschool_slide_number]', array(
					'default' => 3,
					'type' => 'option',
					'sanitize_callback' => 'preschool_sanitize_number'
			));
			$wp_customize->add_control('preschool[preschool_slide_number]', array(
					'label' => __('Number of slide items', 'preschool'),
					'section' => 'preschool_slider_options',
					'description' => __('Enter the number of slide items', 'preschool'),
					'type' => 'text'
			));
}
add_action( 'customize_register', 'preschool_customizer' );

/**
 * Sanitzie checkbox for WordPress customizer
 */
function preschool_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}
/**
 * Adds sanitization callback function: colors
 * @package preschool
 */
function preschool_sanitize_hexcolor($color) {
		if ($unhashed = sanitize_hex_color_no_hash($color))
				return '#' . $unhashed;
		return $color;
}

/**
 * Adds sanitization callback function: Nohtml
 * @package preschool
 */
function preschool_sanitize_nohtml($input) {
	return wp_filter_nohtml_kses($input);
}

/**
 * Adds sanitization callback function: Number
 * @package preschool
 */
function preschool_sanitize_number($input) {
	if ( isset( $input ) && is_numeric( $input ) ) {
		return $input;
	}
}

/**
 * Adds sanitization callback function: Strip Slashes
 * @package preschool
 */
function preschool_sanitize_strip_slashes($input) {
	return wp_kses_stripslashes($input);
}

/**
 * Adds sanitization callback function: Sanitize Text area
 * @package preschool
 */
function preschool_sanitize_textarea($input) {
	return sanitize_text_field($input);
}

/**
 * Adds sanitization callback function: Slider Category
 * @package preschool
 */
function preschool_sanitize_slidecat( $input ) {
	global $options_categories;
	if ( array_key_exists( $input, $options_categories ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Adds sanitization callback function: Sidebar Layout
 * @package preschool
 */
function preschool_sanitize_layout( $input ) {
	global $site_layout;
	if ( array_key_exists( $input, $site_layout ) ) {
		return $input;
	} else {
		return '';
	}
}
