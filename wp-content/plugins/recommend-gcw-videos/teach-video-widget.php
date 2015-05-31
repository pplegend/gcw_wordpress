<?php
/**
Plugin Name:  广场舞视频教学
Plugin URI: http://imaboy.cn/
Description: Random Post Widget grabs a random post and the associated thumbnail to display on your sidebar
Author: 张拥振
Version: 1
Author URI: http://imaboy.cn
*/


class TeachPostWidget extends WP_Widget
{
    function TeachPostWidget()
    {
        $widget_ops = array('classname' => 'TeachPostWidget', 'description' => '广场舞视频教学' );
        $this->WP_Widget('TeachPostWidget', 'teach video', $widget_ops);
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
		 $args = array(
			'post_type' => 'videos',
			'videotype'=>'教学视频',
			'posts_per_page' =>6
			);
		$fast_videos = new WP_Query($args);
		
		?>

		 <div class="video_type_block row" >
		<?php
		while ($fast_videos->have_posts()) : $fast_videos->the_post();
		  ?>
		<div class="single-video col-md-4 col-xs-12 col-sm-6 col-lg-4">
		  <a href="<?php the_permalink(); ?>">
		   <?php
			if ( has_post_thumbnail() ) { 
				the_post_thumbnail( 'video-thumb' ); 
			}?>
		  </a>
		  <div class="video_desc">
			<p><a href="<?php the_permalink(); ?>" ><? the_title(); ?> </a></p>
		  </div>
		</div>
	    <?php endwhile; ?>
		</div>
	
		<?php
		wp_reset_query();

        echo $after_widget;
    }

}
function teach_video_register_widgets() {
	register_widget( 'TeachPostWidget' );
}
add_action( 'widgets_init', 'teach_video_register_widgets');