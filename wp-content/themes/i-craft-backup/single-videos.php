<?php
/**
 * The template for displaying all single posts
 *
 * @package i-craft
 * @since i-craft 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area test2">
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
            <?php 
                $music_values = get_post_meta(get_the_ID(), '音乐下载链接');  

                $video_values = get_post_meta(get_the_ID(), '视频下载链接'); 
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <div class="post-mainpart">    
                
                    <div class="entry-content video-content">
					   <div class="container">
					     <div class="row">
						   <div class="col-md-8 col-xs-12 col-sm-9 video-frame">
							<div class="col-md-12 col-xs-12 col-sm-12"> 
                                <?php echo get_the_content(); ?> 
                            </div>
                            <div class="col-md-6 col-xs-6 col-sm-6 download-link">  
                                <a href="<?php echo $video_values[0]? $video_values[0]: "#";?>" target="blank"> 视频下载</a>  
             
                            </div>

                            <div class="col-md-6 col-xs-6 col-sm-6 download-link">  
                               
                                <a href="<?php echo $music_values[0] ? $music_values[0]:"#" ;?>" target="blank"> 音乐下载</a>
                            </div>
                            <div class="col-md-6 col-xs-6 col-sm-6 download-link">  
                               
                                 <?php echo do_shortcode("[hit_count]"); ?>
                            </div>
                            <div class="col-md-6 col-xs-6 col-sm-6" > 
                                <?php echo open_social_share_html();?>
                            </div>
						   </div>
                      
                           
                           <div class="col-md-4 col-xs-12 col-sm-3 video-frame">
                            <?php echo get_the_content(); ?>
                           </div>

                           
						 </div>

                        
					   </div>
						
                        <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'i-craft' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
                    </div><!-- .entry-content -->

                </div>				  
				
            </article><!-- #post -->    
    

				<?php icraft_post_nav(); ?>
				<?php comments_template(); ?>

			<?php endwhile; ?>

		</div><!-- #content -->
		<?php get_sidebar(); ?>
	</div><!-- #primary -->


<?php get_footer(); ?>