<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>
<div class="row video_row">

	<div class="col-md-9 col-xs-12 col-sm-9 col-lg-9">

		<?php dynamic_sidebar(3);  ?>
	
	</div>

	<div class="col-md-3 col-xs-12 col-sm-3 col-lg-3">
		<?php dynamic_sidebar(4);  ?>
	</div>

</div>


<div class="row video_row">
	<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
		<?php dynamic_sidebar(6);  ?>
	</div>


</div>


<?php  get_footer(); ?>