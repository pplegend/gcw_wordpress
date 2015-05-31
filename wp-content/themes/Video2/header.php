<!DOCTYPE html>
<html>
<head>
<title>
<?php if ( is_home() ) { ?><?php bloginfo('description'); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if ( is_search() ) { ?>Search Results&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if ( is_author() ) { ?>Author Archives&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if ( is_single() ) { ?><?php wp_title(''); ?><?php } ?>
<?php if ( is_page() ) { ?><?php wp_title(''); ?><?php } ?>
<?php if ( is_archive() ) { ?>
<?php 
if(is_category())
{
	single_cat_title();
}else
{
	global $wp_query, $post;
	$current_term = $wp_query->get_queried_object();	
	echo $current_term->name;	
}
?>
&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if ( is_month() ) { ?><?php the_time('F'); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Tag Archive&nbsp;|&nbsp;<?php single_tag_title("", true); } } ?>
</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php if (is_home()) { ?>
<?php if ( get_option('ptthemes_meta_description') <> "" ) { ?>
<meta name="description" content="<?php echo stripslashes(get_option('ptthemes_meta_description')); ?>" />
<?php } ?>
<?php if ( get_option('ptthemes_meta_keywords') <> "" ) { ?>
<meta name="keywords" content="<?php echo stripslashes(get_option('ptthemes_meta_keywords')); ?>" />
<?php } ?>
<?php if ( get_option('ptthemes_meta_author') <> "" ) { ?>
<meta name="author" content="<?php echo stripslashes(get_option('ptthemes_meta_author')); ?>" />
<?php } ?>
<?php } ?>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
 <!--[if lt IE 9]>
   <script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
   <script src="http://apps.bdimg.com/libs/respond.js/1.4.2/respond.min.js"></script>
 <![endif]-->
 <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
 <meta http-equiv="X-UA-Compatible" content="IE=9" />
<?php if ( get_option('ptthemes_favicon') <> "" ) { ?>
<link rel="shortcut icon" type="image/png" href="<?php echo get_option('ptthemes_favicon'); ?>" />
<?php } ?>
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('ptthemes_feedburner_url') <> "" ) { echo get_option('ptthemes_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( get_option('ptthemes_scripts_header') <> "" ) { echo stripslashes(get_option('ptthemes_scripts_header')); } ?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/library/css/print.css" media="print" />

<link href="<?php echo get_template_directory_uri(); ?>/library/css/jquery.mmenu.css" rel="stylesheet" type="text/css" />
<link href="<?php echo get_template_directory_uri(); ?>/library/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
?>
<?php wp_head(); ?>

 <?php if ( get_option('ptthemes_customcss') ) { ?>
<link href="<?php echo get_template_directory_uri(); ?>/custom.css" rel="stylesheet" type="text/css">
<?php } ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/jquery.mmenu.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/myjs.js"></script>
<script type="text/javascript">
   jQuery(document).ready(function() {
      jQuery("#my-menu").mmenu();
   });
</script>
</head>
<body <?php body_class(); ?>>

 <div class="mobile_style">
	<header class="top_nav" >
		<a href="#my-menu" class="navbar-toggle"><img src="<?php echo get_template_directory_uri(); ?>/index.png" /></a>
     <div class="logo-wrapper">
         <a class="logo" href="<?php echo get_option('home'); ?>/">
			<img src="<?php echo get_template_directory_uri().'/skins/'.str_replace('.css','',get_option('ptthemes_alt_stylesheet')).'/logo.png'; ?>" alt="<?php bloginfo('name'); ?>" />
		</a>
     </div>
	 <div id="right-menu">
		right menu
	 </div>
	</header>
	<nav id="my-menu" >
		<?php wp_nav_menu( array('menu' => '顶部导航','container' => false )); ?>
	</nav>
 </div>
 <div class="normal_style">
	<div class="normail_style_menu">
		<?php wp_nav_menu( array('menu' => '顶部导航','container' => false )); ?>
	</div>
 </div>
	
<div class="container">