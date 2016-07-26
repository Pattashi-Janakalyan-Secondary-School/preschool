<?php
/**
 * Template part for displaying all the posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package canvas
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
  <div class="col-md-12">

    <?php
      if ( has_post_thumbnail()) : the_post_thumbnail('large', array( 'class' => 'img-responsive' ));
      endif;
    ?>

    <?php
      if ( is_single() ) {
        the_title( '<h3 class="post-title">', '</h3>' );
      } else {
        the_title( '<h3 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
      }
    ?>

    <h6 class="post-meta">
      <span><i class="fa fa-calendar"></i> <?php the_date(); ?></span>
      <span><i class="fa fa-folder-open-o"></i> <?php the_category(', '); ?></span>
    </h6>

    <hr>

    <?php
      the_excerpt( sprintf(
        /* translators: %s: Name of current post. */
        wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'preschool' ), array( 'span' => array( 'class' => array() ) ) ),
        the_title( '<span class="screen-reader-text">"', '"</span>', false )
        ) );

      wp_link_pages( array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'preschool' ),
        'after'  => '</div>',
        ) );
    ?>
  </div>
</article>
