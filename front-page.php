<?php
/**
 * The front-page template file.
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package preschool
 */
get_header(); ?>

<!-- carousel begin -->
<div class="container pad-out main-slider">
	<div id="carousel-main" class="carousel slide" data-ride="carousel" data-interval="3000">

		<?php
			if ( is_front_page() && of_get_option( 'preschool_slider_checkbox' ) == 1 ) {
				$count    = of_get_option( 'preschool_slide_number' );
				$slidecat = of_get_option( 'preschool_slide_categories' );

				$query = new WP_Query( array( 'cat' =>$slidecat,'posts_per_page' =>1 ) );

				if ($query->have_posts()) :
					while ($query->have_posts()) : $query->the_post();
		?>

		<!-- Indicators -->
		<ol class="carousel-indicators">
			<?php for ($i=0; $i < $count ; $i++) { ?>
				<li data-target="#carousel-main" data-slide-to="<?php echo $i; ?>"></li>
			<?php } ?>
		</ol>
		<!-- /Indicators -->

		<!-- First Active Imaage -->
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<?php
					if ( (function_exists( 'has_post_thumbnail' )) && ( has_post_thumbnail() ) ) {
						echo the_post_thumbnail( 'preschool-featured', array( 'class' => 'img-responsive' ) );
					}
				?>

				<div class="container">
					<div class="carousel-caption">
						<h3 class="carousel-title"><?php if ( get_the_title() != '' ) the_title(); ?></h3>
					</div>
				</div>
			</div>

			<?php endwhile; endif; wp_reset_query(); ?>
			<!-- /First Active Imaage -->
			<?php
				$count    = of_get_option( 'canvas_slide_number' );
				$slidecat = of_get_option( 'canvas_slide_categories' );

				$query = new WP_Query( array( 'cat' =>$slidecat,'posts_per_page' =>$count, 'offset' =>1 ) );

				if ($query->have_posts()) :
					while ($query->have_posts()) : $query->the_post();
			?>

			<div class="item">
				<?php
				if ( (function_exists( 'has_post_thumbnail' )) && ( has_post_thumbnail() ) ) {
					echo the_post_thumbnail( 'preschool-featured', array( 'class' => 'img-responsive' ) );
				}
				?>

					<div class="container">
						<div class="carousel-caption">
							<h3 class="carousel-title"><?php if ( get_the_title() != '' ) the_title(); ?></h3>
						</div>
					</div>
				</div>
			<?php endwhile; endif; wp_reset_query(); }?>

		</div>
		<!-- /carousel-inner -->

		<!-- carousel-control -->
		<a class="left carousel-control" href="#carousel-main" data-slide="prev"><span class="fa fa-chevron-left"></span></a>
		<a class="right carousel-control" href="#carousel-main" data-slide="next"><span class="fa fa-chevron-right"></span></a>
		<!-- /.carousel-control -->
	</div>
</div>
<!-- /carousel end -->

<!-- recent posts -->
<section class="container content">

	<?php $query = new WP_Query( array( 'tag__not_in' => '6','posts_per_page' => 3 ) );
	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
		<article class="row news-post">
			<div class="col-md-3 col-lg-3">
				<?php the_post_thumbnail( 'medium', array('class' => 'img-responsive')); ?>
			</div>
			<div class="col-md-9 col-lg-9">
				<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<h6 class="post-meta">
					<span><i class="fa fa-calendar"></i> <?php the_date(); ?></span>
					<span><i class="fa fa-tags"></i> <?php the_category(', '); ?></span>
				</h6>
				<hr>
				<p><?php echo get_the_excerpt(); ?></p>
			</div>
		</article>
	<?php endwhile; else : ?>
		<p><?php _e( 'Sorry, no recent post found.', 'preschool' ); ?></p>
	<?php endif; ?>
</section>
<!-- /recent posts -->

<?php get_footer(); ?>
