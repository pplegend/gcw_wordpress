<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>
<?php

$args = array( 'hide_empty=0' );

$terms = get_terms( 'videoscategory', $args );
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
    $count = count( $terms );
    $i = 0;
    $term_list = '<ul class="my_term-archive">';
    foreach ( $terms as $term ) {
        $i++;
    	$term_list .= '<li><a href="' . get_term_link( $term ) . '" title="' . sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) . '">' . $term->name . '</a></li>';
    	if ( $count == $i ) {
            $term_list .= '</ul>';
        }
    }
    echo $term_list;
}
?>
<div class="row video_row">

	<div class="col-md-9 col-xs-12 col-sm-9 col-lg-9">
       <?php dynamic_sidebar("recommend-video");  ?>
	
	</div>

	<div class="col-md-3 col-xs-12 col-sm-3 col-lg-3">
		<?php dynamic_sidebar("most-viewed-video");  ?>
	</div>

</div>
<div class="row video_row">

	<div class="col-md-9 col-xs-12 col-sm-9 col-lg-9">
       <?php dynamic_sidebar("teach-video");  ?>
	
	</div>

	<div class="col-md-3 col-xs-12 col-sm-3 col-lg-3">
		<?php dynamic_sidebar("most-viewed-video");  ?>
	</div>

</div>
<div class="row video_row">

	<div class="col-md-9 col-xs-12 col-sm-9 col-lg-9">
       <?php dynamic_sidebar("hot-video");  ?>
	
	</div>

	<div class="col-md-3 col-xs-12 col-sm-3 col-lg-3">
		<?php dynamic_sidebar("most-viewed-video");  ?>
	</div>

</div>
<div class="row video_row">

	<div class="col-md-9 col-xs-12 col-sm-9 col-lg-9">
       <?php dynamic_sidebar("newest-video");  ?>
	
	</div>

	<div class="col-md-3 col-xs-12 col-sm-3 col-lg-3">
		<?php dynamic_sidebar("most-viewed-video");  ?>
	</div>

</div>

<div class="row video_row">
	<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
		<?php dynamic_sidebar("video-list");  ?>
	</div>


</div>


<?php  get_footer(); ?>
