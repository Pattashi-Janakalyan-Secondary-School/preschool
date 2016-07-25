<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package preschool
 */

get_header(); ?>

	<div class="container content">

		<?php
			$query = new WP_Query( array( 'tag__not_in' => '6' ) );
			if ( $query->have_posts() ) :
				while ( $query->have_posts() ) : $query->the_post();

					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;

				// wp_bs_pagination();

			else :
				get_template_part( 'template-parts/content', 'none' );

			endif;
		?>

	</div><!-- container -->

<?php get_footer(); ?>
