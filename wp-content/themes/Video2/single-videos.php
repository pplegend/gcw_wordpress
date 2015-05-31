<?php get_header(); ?>
<?php
$views_count = get_post_meta($post->ID,'views_count',true);
update_post_meta($post->ID,'views_count',$views_count+1);
?>




<div class="col-md-12 col-xs-10 col-sm-10 col-lg-9 col-sm-offset-1 col-lg-offset-2">
    <div class="row">
     <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8 col-sm-offset-1 col-lg-offset-2 col-md-offset-1">
        <h1 class="single_head"><?php the_title(); ?></h1>
        <?php if(have_posts()) : ?>
         <?php while(have_posts()) : the_post() ?>
          <div id="post-<?php the_ID(); ?>" class="posts post_spacer" <?php post_class(); ?>>

          <?php if(get_post_meta($post->ID,'video',true)){?>
            <div class="video_main">
                <?php echo get_post_meta($post->ID,'video',true);?>
                <?php echo dvk_social_sharing(); ?>
                <?php if(get_post_meta($post->ID,'views_count',true)){?>
                    <span class="post-views" >
                     Total Views : <?php echo get_post_meta($post->ID,'views_count',true);?>
                   </span>
                <?php }?>
            </div>
        <?php }?>
         <?php endwhile; ?>
        <?php endif; ?>
     </div>
    </div>
    <div class="row single_post">
        <div class="col-md-7 col-xs-7 col-sm-7 col-lg-7">
            <?php the_content(); ?>
            <div id="comments" class="clearfix"> <?php comments_template(); ?></div>
        </div>
        <div class="col-md-5 col-xs-5 col-sm-5 col-lg-5">
            <?php
            //for use in the loop, list 5 post titles related to first tag on current post

           //$tags= get_the_terms( $post->ID, 'videostags' );
                $args=array(
                   'post_type' => 'videos',
                    'videostags' => 'ihealth',
                    'post__not_in' => array($post->ID),
                    'showposts'=>5,
                    'ignore_sticky_posts'=>1
                );

                $my_query = new WP_Query($args);

                if( $my_query->have_posts() ) {
                    echo '<h4>Related Posts</h4>';
                    while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        <?php
                        $post_images = bdw_get_images($post->ID,'thumb'); // value can be "medium" "thumb" "large"
                        if($post_images) {
                            ?>

                            <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                                <p><a href="<?php the_permalink(); ?>"> <img src=<?php echo $post_images[0]; ?> /></a></p>
                                <div style="height:50px;"><h5><?php the_title(); ?></h5></div>
                            </div>
                        <?php }?>
                    <?php
                    endwhile;
                } else {

                }?>


        </div>
    </div>
</div>

 <?php get_footer(); ?>