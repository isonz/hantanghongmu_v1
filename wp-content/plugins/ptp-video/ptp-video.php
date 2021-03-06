<?php
/*
Plugin Name: PTP 视频
Plugin URI: http://www.ptp.cn/
Description: PTP视频展示，视频源于优酷.
Version: 1.0.0
Author: Ison Zhang
Author URI: http://www.ptp.cn/
License: New BSD License
*/

require_once 'func.php';
require_once 'crud.php';

//add_action( 'wp_print_styles', 'PtpVideo::loadCss' );
//add_action( 'wp_print_scripts', 'PtpVideo::loadJs' );

add_action("init", 'PtpVideo::init');
add_action('admin_menu', 'PtpVideo::menu');
add_action("template_redirect", 'PtpVideo::templateRedirect');
add_action('query_vars', 'PtpVideo::addQueryVars');
add_action('admin_print_scripts', 'PtpVideo::adminScripts');
add_action('admin_print_styles', 'PtpVideo::adminStyles');

class PtpVideo
{
	//$_urls 用于前台显示
	static $_urls = array(
				'default' => 'ptp-video',				//前台参数名
				'video-form' => "video_op.php",
				'category-form' => "category_op.php",
			);
	static $_category_url = 'ptp-video-category';
	
	static function init()
	{
		return PtpVideoDB::setup();
	}
	
	// -------------------------------------------- loadCss, loadJs 在前台显示
	static function loadCss()
	{
		$css = array('box.css');
		$path = PtpVideoFunc::themePath("ptp-video");
		foreach ($css as $cs){
			echo '<link href="'.$path.'css/'.$cs.'" rel="stylesheet" type="text/css" />';
		}
	}
	
	static function loadJs()
	{
		$jss = array('lightBox.js',	'2ji2.js');
		$path = PtpVideoFunc::themePath("ptp-video");
		foreach ($jss as $js){
			echo '<script src="'.$path.'js/'.$js.'" language="javascript" type="text/javascript"></script>';
		}
		wp_enqueue_script('ptp_video_defaultjs', $path.'js/default.js', array( 'jquery' ));
	}
	
	//------------------------------------------- 后台显示
	function adminScripts()
	{
		if (isset($_GET['file']) && $_GET['file'] == 'video_op.php'){
			wp_enqueue_script('jquery');
			wp_enqueue_script('media-upload');
			wp_enqueue_script('thickbox');
			wp_register_script('my-upload', PtpVideoFunc::pluginJs("video.js"), array('jquery','media-upload','thickbox'));
			wp_enqueue_script('my-upload');
		}
	}
	
	function adminStyles()
	{
		if (isset($_GET['file']) && $_GET['file'] == 'video_op.php'){
			wp_enqueue_style('thickbox');
		}
	}
	
	//------------------------------------------- menu
	static function menu()
	{
		add_menu_page('视频管理', '视频管理', 'manage_options', __FILE__, 'PtpVideo::mainMenu');
		add_submenu_page(__FILE__, '视频分类', '视频分类', 'manage_options', self::$_category_url, 'PtpVideo::categoryMenu');
	}
	
	static function mainMenu()
	{
		//URL： /wp-admin/admin.php?page=ptp-video/ptp-video.php&action=video_op.php
		$file = isset($_REQUEST['file']) ? $_REQUEST['file'] : "video.php";
		$file = PtpVideoFunc::template($file);
		if(!$file) exit('Not found the template file!');
		require_once $file;
	}
	
	static function categoryMenu()
	{
		//URL:/wp-admin/admin.php?page=ptp-video-category&action=category_op.php
		$file = isset($_REQUEST['file']) ? $_REQUEST['file'] : "category.php";
		$file = PtpVideoFunc::template($file);
		if(!$file) exit('Not found the template file!');
		require_once $file;
	}
	
	//------------------------------------------ Template
	static function templateRedirect()	
	{
		PtpVideoFunc::templateRedirect(self::$_urls);
	}
	
	static function addQueryVars($public_query_vars)
	{
		$public_query_vars[] = self::$_urls['default'];
		return $public_query_vars;
	}
	
}

?>