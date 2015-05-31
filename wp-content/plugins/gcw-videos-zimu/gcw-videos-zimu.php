<?php
/**
Plugin Name:  order video by alphabet
Plugin URI: http://imaboy.cn
Description:  order video by alphabet
Author: zhang yongzhen
Version: 1
Author URI: http://imaboy.cn
*/
include("zmpl.php");

class VideoListWidget extends WP_Widget
{
    function VideoListWidget()
    {
        $widget_ops = array('classname' => 'VideoList', 'description' => 'order videos' );
        $this->WP_Widget('VideoListWidget', 'order videos', $widget_ops);
    }

    function form($instance)
    {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
        $title = $instance['title'];
     
        echo '<p><label for="'. $this->get_field_id('title').'">标题: <input class="widefat" id="'. $this->get_field_id('title') .'" name="'. $this->get_field_name('title') .'" type="text" value="'. attribute_escape($title) .'" /></label></p>';
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

       // echo $before_widget;
        $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);

        if (!empty($title))
            echo $before_title . $title . $after_title;
        // WIDGET CODE GOES HERE
			$py = new PinYin();
		
			
		//get all the videos
		$type = 'videos';
		$args=array(
			'post_type' => $type,
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'caller_get_posts'=> 1
			);
			$my_query = null;
			$my_query = new WP_Query($args);
			//创建A-Z个数组 $array_A = array()
			
			foreach(range('A','Z') as $letter){
				${"array_".$letter} = array();
				${"Category_array_".$letter} = array();
				
			}
			
	
			if( $my_query->have_posts() ) {
				while ($my_query->have_posts()) : $my_query->the_post(); 
					$first_letter = mb_substr(get_the_title(), 0,1,'UTF-8');
					
					$pinyin = ucfirst($py->getFirstPY($first_letter));
					
					$video_details = array();
					$video_details['title'] = get_the_title();
					$video_details['link'] = get_the_permalink();
					
					${"array_".$pinyin}[]=$video_details;
				endwhile;
			}	
				
		// get all the categories
		$terms = get_terms('videoscategory');
		foreach ( $terms as $term ) {
			$term_link = get_term_link( $term, 'videoscategory');
			if( is_wp_error( $term_link ) )
				continue;
			$term_name = $term->name;
			$first_letter = mb_substr($term_name, 0,1,'UTF-8');
			$term_array = array();
			$term_array['name'] = $term_name;
			$term_array['link'] = $term_link;
			
			if($first_letter=="茉"){
				$Category_array_M[] = $term_array;
			}
			$pinyin = ucfirst($py->getFirstPY($first_letter));
			${"Category_array_".$pinyin}[] = $term_array;
		}

		wp_reset_query();
		$html =' <div class="row">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" ><a href="#gcw_videos" aria-controls="gcw_videos" role="tab" data-toggle="tab">广场舞视频</a></li>
					<li role="presentation" class="active"><a href="#gcw_teams" aria-controls="gcw_teams" role="tab" data-toggle="tab">广场舞队伍</a></li>
				</ul>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane" id="gcw_videos">
						<span class="zimu">	
				';	
		foreach(range('A','Z') as $letter){
			$html .= '<a href="#'.$letter.'">'.$letter.'</a>';
		}
	
	  $html .= '</span>
				<ul id="zimu_content">
		';
		$j=0;
		foreach(range('A','Z') as $letter){
			$j++;
			$mole = $j%2;
			$html .= '<li id="'.$letter .'" class="zimu-list list-'.$mole.'">
				<span class="title_letter"> '.$letter .'</span>
				<p class="song-name limittext" >';
					foreach( ${"array_".$letter} as $video_array) {
						$html .= '<a href="'.$video_array['link'].'" >'.$video_array['title'].'</a>';
						
					}
				$html .= '</p></li>';
		}
		
	
	$html .= '</ul></div>
    <div role="tabpanel" class="tab-pane active" id="gcw_teams">
	  <span class="zimu">';	
		
		foreach(range('A','Z') as $letter){
			$html .= '<a href="#'.$letter.'d">'.$letter.'</a>';
		}
		
	 $html .= '</span><ul id="zimu_content">';
		
	$j=0;
		foreach(range('A','Z') as $letter){
			$j++;
			$mole = $j%2;
			$html .= '<li id="'.$letter .'d" class="zimu-list list-'.$mole.'">
				<span class="title_letter"> '.$letter .'</span>
				<p class="song-name limittext" >';
					foreach( ${"Category_array_".$letter} as $term_array) {
						
						$html .= '<a href="'.$term_array['link'].'" >'.$term_array['name'].'</a>';
						
					}
				$html .= '</p></li>';
		}
		
	$html .= '</ul>	</div></div></div>';


		wp_reset_query();

        echo $html;
        echo $after_widget;
    }

}
function video_zimu_register_widgets() {
	register_widget( 'VideoListWidget' );
}
add_action( 'widgets_init', 'video_zimu_register_widgets');