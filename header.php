<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Adaptable
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Sintony' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Sintony:700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-31905127-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- end Google Analytics-->

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'adaptable' ); ?></a>

	<header id="masthead" class="site-header" role="banner" >
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>

		<?php if(get_header_image()) { ?>
		<div id="header-img">
			<img src="<?php header_image(); ?>" alt="header image" />
		</div>
		<?php } ?>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php
				$menuicon = "<svg class=\"menu-icon\" viewBox=\"0 0 8 8\">
  						<use xlink:href=\"" . get_template_directory_uri() . "/open-iconic.svg#menu\" class=\"icon-menu\" alt=\"Menu\"></use>
					</svg>";
			?>
			<button class="menu-toggle"><?php _e( $menuicon, 'adaptable' ); ?></button>
			
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">

			<?php
  if($post->post_parent) {
  $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
  $titlenamer = get_the_title($post->post_parent);
  $permalink = get_permalink($post->post_parent);
  }

  else {
  $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
  $titlenamer = get_the_title($post->ID);
  $permalink = get_permalink($post->ID);
  }
  if ($children) { ?>

  <div class="subpages small widget-area">

 <h1 class="widget-title subpages-header"> <a href="<?php echo $permalink; ?>"><?php echo $titlenamer; ?></a> </h1>
  <ul>
  <?php echo $children; ?>
  </ul>
</div>

  <?php } ?>
