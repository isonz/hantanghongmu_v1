<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<!--[if lte IE 6]>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/ie6.js" ></script>
<script type="text/javascript">
DD_belatedPNG.fix('*');
</script>
<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="alternate" type="application/rss+xml" title="生活方式 &raquo; Feed" href="/feed/" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<link rel='stylesheet' id='twentytwelve-style-css'  href='<?php echo get_template_directory_uri(); ?>/style.css?ver=3.8.1' type='text/css' media='all' />
<?php if (defined("IS_MOBILE")):?>
<link rel='stylesheet' id='twentytwelve-style-css'  href='<?php echo get_template_directory_uri(); ?>/css/h5.css' type='text/css' />
<?php else: ?>
<link rel='stylesheet' id='twentytwelve-style-css'  href='<?php echo get_template_directory_uri(); ?>/css/default.css' type='text/css' />
<?php endif ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-mobile.detect.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/default.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/iebug.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
</head>

<body>   
<!--header area-->
<div id="header">
	<div class="pagewidth">
	  <div class="pmain">
	  	<div class="ttop clearfix">
	  		<a class="language clearfix" href="##"><div class="word">中文</div><div class="icon"></div></a>
	  		<a class="newsletter" href="##">订阅电子通讯</a>
	  	</div>
	  	<div class="logomenu clearfix">
		    <a class="logo" href="/" title="首页" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/images/logo2.png" width="80" alt="首页" /></a>
		    <div id="main-menu" class="navigation">
		        <ul id="main-menu-links" class="links clearfix">
		        	<li class="menu first"><a href="/" class="active"></a></li>
					<li class="menu"><a href="/about/" title="">关于瀚唐</a></li>
					<li class="menu"><a href="/product/" title="">产品服务</a></li>
					<li class="menu last"><a href="/contact-us/" title="">联系我们</a></li>
				</ul>	      
			</div><!-- /#main-menu -->
		</div>
		<div id="headerline"></div>
	  </div>
	</div>
	<img src="<?php echo get_template_directory_uri(); ?>/images/icon_s.jpg" style="display: none;" />
	<div id="banners">
		<img src="<?php echo get_template_directory_uri(); ?>/images/banner/b1.jpg" class="first" />
		<img src="<?php echo get_template_directory_uri(); ?>/images/banner/b2.jpg" />
		<img src="<?php echo get_template_directory_uri(); ?>/images/banner/b3.jpg" />
		<img src="<?php echo get_template_directory_uri(); ?>/images/banner/b4.jpg" />
		<img src="<?php echo get_template_directory_uri(); ?>/images/banner/b5.jpg" />
		<img src="<?php echo get_template_directory_uri(); ?>/images/banner/b6.jpg" />
	</div>
</div>
<!--header area end-->
<div id="content" class="clearfix">






