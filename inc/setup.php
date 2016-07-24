<?php

	if ( ! function_exists( 'preschool_setup' ) ) :
	/**
	* Sets up theme defaults and registers support for various WordPress features.
	*
	* Note that this function is hooked into the after_setup_theme hook, which
	* runs before the init hook. The init hook is too late for some features, such
	* as indicating support for post thumbnails.
	*/
		function preschool_setup() {

			/**
			* Let WordPress manage the document title.
			* By adding theme support, we declare that this theme does not use a
			* hard-coded <title> tag in the document head, and expect WordPress to
			* provide it for us.
			*/
			add_theme_support( 'title-tag' );

			// This theme uses wp_nav_menu() in one location.
			register_nav_menus(array(
					'primary'      => __('Primary', 'preschool'),
			));

			/**
			* Enable support for Post Thumbnails on posts and pages.
			*
			* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
			*/
			add_theme_support('post-thumbnails');
			add_image_size( 'preschool-featured', 1200, 500, true );

			/**
			* Switch default core markup for search form, comment form, and comments
			* to output valid HTML5.
			*/
			add_theme_support( 'html5', array(
				'comment-list',
				'search-form',
				'comment-form',
				'gallery',
				'caption',
			) );

			/**
			* WordPress head optimizations
			* Removes the “generator” meta tag from the document header
			*/
			remove_action('wp_head', 'wp_generator');

			/**
			* Removes the “wlwmanifest” link. wlwmanifest.xml is the
			* resource file needed to enable support for Windows Live Writer
			*/
			remove_action('wp_head', 'wlwmanifest_link');

			/**
			* “wp_shortlink_wp_head” adds a “shortlink” into your document
			* head that will look like http://example.com/?p=ID
			*/
			remove_action('wp_head', 'wp_shortlink_wp_head');

			/**
			* Removes WordPress emoji styles and JS
			*/
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
		}
	endif;

	if ( ! function_exists( 'preschool_header_menu' ) ) :
		/**
		* Header menu (should you choose to use one)
		*/
		function preschool_header_menu() {
			// display the WordPress Custom Menu if available
			wp_nav_menu(array(
				'menu'              => 'primary',
				'theme_location'    => 'primary',
				'depth'             => 2,
				'container'         => false,
				'menu_class'        => 'nav navbar-nav',
				'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
				'walker'            => new wp_bootstrap_navwalker()
				));
		} /* end header menu */
	endif;

	/* Globals variables */
	global $options_categories;
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	/**
	* Helper function to return the theme option value.
	* If no value has been saved, it returns $default.
	* Needed because options are saved as serialized strings.
	*
	* Not in a class to support backwards compatibility in themes.
	*/
	if ( ! function_exists( 'of_get_option' ) ) :

		function of_get_option( $name, $default = false ) {

			$option_name = '';
			// Get option settings from database
			$options = get_option( 'preschool' );

			// Return specific option
			if ( isset( $options[$name] ) ) {
				return $options[$name];
			}

			return $default;
		}
	endif;

?>
