<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 *@link https://codex.wordpress.org/Widgets_API
 *
 * @package preschool
 */
?>
    <!-- sidebar widgets -->
    <div class="col-md-3">
      <div class="row">
        <div class="col-md-12">
            <?php dynamic_sidebar( 'sidebar-widget-1' ); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <?php dynamic_sidebar( 'sidebar-widget-2' ); ?>
        </div>
      </div>
    </div>
    <!-- /sidebar widgets -->
