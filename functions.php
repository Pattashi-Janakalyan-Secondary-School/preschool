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

		/** Filters */
		add_filter( 'excerpt_more', 'custom_excerpt_more' );
		add_filter( "the_excerpt", 'add_class_to_excerpt' );
		add_filter( 'get_the_excerpt', 'new_excerpt_more' );

		// Register custom image sizes for use in Add Media modal
		add_filter( 'image_size_names_choose', 'preschool_custom_sizes' );

		// Remove image size attributes from post thumbnails
		add_filter( 'post_thumbnail_html', 'new_image_size_attributes' );

		// Remove image size attributes from images added to a WordPress post
		add_filter( 'image_send_to_editor', 'new_image_size_attributes' );

		/**
		* Customizer additions.
		*/
		require ( get_template_directory() . '/inc/customizer.php' );

		// Includes
		include ( get_template_directory() . '/inc/setup.php' );
		include ( get_template_directory() . '/inc/enqueue.php' );
		include ( get_template_directory() . '/inc/navwalker.php' );
		include ( get_template_directory() . '/inc/tweaks.php' );

		?>
