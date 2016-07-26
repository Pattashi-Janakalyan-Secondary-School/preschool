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
    <div class="row">
      <!-- articles row -->
      <div class="col-md-9">

        <?php
          $query = new WP_Query( array( 'tag__not_in' => '6' ) );
          if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post();

              get_template_part( 'template-parts/content', get_post_format() );

            endwhile;

        ?>

        <!-- pagination -->
        <div class="row">
          <div class="col-md-12">
            <nav>
              <ul class="pagination">
                <li>
                  <a href="#" aria-label="Previous">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  </a>
                </li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div> <!-- /pagination -->
      </div> <!-- /articles row -->

      <?php
        else :
          get_template_part( 'template-parts/content', 'none' );

        endif;
      ?>

      <?php get_sidebar(); ?>
    </div>
  </div> <!-- /container -->

<?php get_footer(); ?>
