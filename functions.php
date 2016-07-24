<?php

		/**
		* preschool functions and definitions.
		*
		* @link https://developer.wordpress.org/themes/basics/theme-functions/
		*
		* @package preschool
		*/

		// Sets up theme defaults and registers support for various WordPress features.
		add_action('after_setup_theme', 'preschool_setup');

		// Action & Filter Hooks
		// Load CSS
		add_action('wp_enqueue_scripts', 'preschool_load_styles');
		// Load Javascript
		add_action('wp_enqueue_scripts', 'preschool_load_scripts');

		/**
		* Customizer additions.
		*/
		require ( get_template_directory() . '/inc/customizer.php' );

		// Includes
		include ( get_template_directory() . '/inc/setup.php' );
		include ( get_template_directory() . '/inc/enqueue.php' );
    include ( get_template_directory() . '/inc/navwalker.php' );

?>
