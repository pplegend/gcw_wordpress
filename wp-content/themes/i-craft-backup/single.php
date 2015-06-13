<?php
/**
 * The template for displaying all single posts
 *
 * @package i-craft
 * @since i-craft 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<?php $post_type = get_post_type(get_the_ID()); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="meta-img">
                <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
                    <div class="entry-thumbnail">
						<?php                        
                        $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                        echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute( 'echo=0' ) . '" alt="" class="tx-colorbox">';
                        the_post_thumbnail('icraft-single-thumb');
                        echo '</a>';
                        ?>

                    </div>
                <?php endif; ?>
                </div>
                
                <div class="post-mainpart">    
                
                    <div class="entry-content video-content">
					   <div class="container">
					     <div class="row">
							<?php echo get_the_content(); ?>
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