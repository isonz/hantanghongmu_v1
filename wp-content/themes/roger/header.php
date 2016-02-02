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
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-mobile.detect.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/default.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/iebug.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
</head>

<body>   
<!--header area-->
<header>
	<div class="header_bg"></div>
    <div class="headerdiv clearfix">        
        <div class="logo_area">
        	<a href="/" class="logo"></a>
            <a href="http://about.ptp.cn/" class="top_menu" target="_blank">帕斯婷企业</a>
            <a href="http://skin.ptp.cn/" class="top_menu" target="_blank">医学美容</a>
            <a href="http://mall.ptp.cn/" class="top_menu" style="width:36%;" target="_blank">帕斯婷网上商城</a>
        </div>
    </div>
</header>
<!--header area end-->
<!--menu area-->
<nav>
	<div class="nav_menu">
    	<a href="http://www.ptp.cn/" class="home" title="首页">首页</a>
        <div class="menudiv clearfix">
        	<div class="catemenu">菜单列表</div>
        	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
        </div>
        
        <!--<div class="search_p clearfix">
        	<div class="search_bg"><input name="" type="text"></div>
            <input name="" type="submit" class="search_sub" value=" ">
        </div>-->
    </div>
</nav>
<!--menu area end-->
<div class="center_alldiv">
<div class="center_divpotion"></div>






