<?php
/**
* Custom functions that act independently of the theme templates
*
* Eventually, some of the functionality here could be replaced by core features
*
* @package preschool
*/

/**
 * Modify width and height attributes from image tags
 *
 * @param string $html
 *
 * @return string
 */
function new_image_size_attributes( $html ) {
    return preg_replace( array('/width="\d+"/i', '/height="\d+"/i'), array(sprintf('width="%s"', '100%'), sprintf('height="%s"', 'auto')), $html );
}

// modify [...] from excerpt
function custom_excerpt_more( $more ) {
    return '...';
}

// add a special class to the excerpt's p element
function add_class_to_excerpt( $excerpt ) {
    return str_replace('<p', '<p class="excerpt"', $excerpt);
}

// Add link text to excerpt
function new_excerpt_more( $excerpt ) {
    return $excerpt . '<a class="read-post" href="'. get_permalink( get_the_ID() ) . '">' . __('Read Full', 'preschool') . '</a>';
}

// Remove Open Sans that WP adds from frontend
if (!function_exists('remove_wp_open_sans')) :
    function remove_wp_open_sans() {
        wp_deregister_style( 'open-sans' );
        wp_register_style( 'open-sans', false );
    }
    add_action('wp_enqueue_scripts', 'remove_wp_open_sans');
    // Uncomment below to remove from admin
    // add_action('admin_enqueue_scripts', 'remove_wp_open_sans');
endif;

?>
