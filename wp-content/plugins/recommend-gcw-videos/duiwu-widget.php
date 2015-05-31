<?php
/**
Plugin Name:  广场舞队伍
Plugin URI: http://imaboy.cn/
Description: GuangChuangwu team list
Author: 张拥振
Version: 1
Author URI: http://imaboy.cn
*/


class DuiwuListWidget extends WP_Widget
{
    function DuiwuListWidget()
    {
        $widget_ops = array('classname' => 'DuiwuListWidget', 'description' => '广场舞队伍列表' );
        $this->WP_Widget('DuiwuListWidget', 'duiwu list', $widget_ops);
    }

    function form($instance)
    {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
        $title = $instance['title'];
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>">标题: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
    <?php
    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        return $instance;
    }

    function widget($args, $instance)
    {
        extract($args, EXTR_SKIP);

        echo $before_widget;
        $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);

        if (!empty($title))
            echo $before_title . $title . $after_title;
        // WIDGET CODE GOES HERE
          $args = array( 'hide_empty=0' );

         $terms = get_terms( 'videoscategory', $args );
         if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
           $count = count( $terms );
           $i = 0;
           $term_list = '<ul class="my_term-archive">';
           foreach ( $terms as $term ) {
            $i++;
            $term_list .= '<li><a href="' . get_term_link( $term ) . '" title="' .  sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) . '">' . $term->name . '</a></li>';
            if ( $count == $i ) {
              $term_list .= '</ul>';
            }
         }
      echo $term_list;
     }
      echo $after_widget;

  }
}  
function duiwu_list_register_widgets() {
	register_widget( 'DuiwuListWidget' );
}
add_action( 'widgets_init', 'duiwu_list_register_widgets');
