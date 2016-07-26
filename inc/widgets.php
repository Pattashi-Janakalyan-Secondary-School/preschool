<?php
/*
Plugin Name: Bootstrap Panel Styled Posts
Plugin URI: http://mydomain.com
Description: Recents and popular posts using bootstrap panel and media object
Author: Jobayer Arman
Version: 1.0
Author URI: http://jobayerarman.github.io
*/

// Block direct requests
if ( !defined('ABSPATH') )
  die('-1');


add_action( 'widgets_init', function(){
     register_widget( 'preschool_posts' );
});

/**
 * Adds My_Widget widget.
 */
class preschool_posts extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'preschool_posts', // Base ID
      __('Preschool Widget', 'preschool'), // Name
      array( 'description' => __( 'Story Posts with Thumbnail ', 'preschool' ), ) // Args
    );
  }

  /**
   * Front-end display of widget.
   *
   * @see WP_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance ) {
    extract($args);

    $postscount = ( ! empty( $instance['posts'] ) ) ? $instance['posts'] : 5;
    global $postcount;

    echo '<aside class="panel panel-primary sidebar">';

    if ( array_key_exists('before_title', $args) ) {
      echo $args['before_title'];
    } else {
      echo '<div class="panel-heading">';
    }

      echo '<h3 class="panel-title">' . apply_filters( 'widget_title', $instance['title'] ) . '</h3>';

    if ( array_key_exists('after_title', $args) ) {
      echo $args['after_title'];
    } else {
      echo '</div>';
    }

    $myposts = get_posts(array(
      'posts_per_page' => $postscount,
      'orderby'        => 'date',
      'tag__not_in'    => '6',
      'order'          => 'DESC'
      ) );

    echo '<div class="list-group">';

    //SHOW the posts
    foreach($myposts as $post) {
      setup_postdata($post);

      echo '<a href="' . get_the_permalink() . '" class="list-group-item">';
        echo '<div class="media">';
          echo '<div class="media-left">';
            echo the_post_thumbnail( 'thumbnail', array( 'class' => 'media-object' ) );
          echo '</div>';
          echo '<div class="media-body">';
            echo '<h6>' . get_the_title() . '<br><small>' . get_the_date() . '</small></h6>';
          echo '</div>';
        echo '</div>';
      echo '</a>';
    }
      echo '</div>';
    echo '</aside>';
  }

  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form( $instance ) {

      if ( isset( $instance[ 'title' ] ) ) {
        $title = $instance[ 'title' ];
      }
      else {
        $title = __( 'New title', 'preschool' );
      }

      if ( isset( $instance[ 'story_id' ] ) ) {
        $story_id = $instance[ 'story_id' ];
      }
      else {
        $story_id = 0;
      }

      if ( isset( $instance[ 'posts' ] ) ) {
        $posts = $instance[ 'posts' ];
      }
      else {
        $posts = 5;
      }
    ?>

    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'story_id' ); ?>"><?php _e( 'Type:' ); ?></label>

      <select id="<?php echo $this->get_field_id( 'story_id' ); ?>" name="<?php echo $this->get_field_name( 'story_id' ); ?>">
        <option value="0">Most Recent</option>
        <option value="1">Popular Posts</option>
      </select>
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'posts' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
      <input id="<?php echo $this->get_field_id( 'posts' ); ?>" name="<?php echo $this->get_field_name( 'posts' ); ?>" type="posts" value="<?php echo esc_attr( $posts ); ?>">
    </p>
    <?php
  }

  /**
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance Values just sent to be saved.
   * @param array $old_instance Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

    $instance['story_id'] = ( ! empty( $new_instance['story_id'] ) ) ? strip_tags( $new_instance['story_id'] ) : '';

    $instance['posts'] = ( ! empty( $new_instance['posts'] ) ) ? strip_tags( $new_instance['posts'] ) : '';

    return $instance;
  }

} // class preschool-recent
