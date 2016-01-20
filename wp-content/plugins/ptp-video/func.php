<?php
class PtpVideoFunc
{
	static function template($tmp)
	{
		return self::realpath()."/template/$tmp";
	}
	
	static function pluginCss($css)
	{
		return self::pluginPath()."template/css/$css";
	}
	
	static function pluginJs($js)
	{
		return self::pluginPath()."template/js/$js";
	}
	
	static function pluginImg($img)
	{
		return self::pluginPath()."template/img/$img";
	}
	
	static function pluginPath()
	{
		if (function_exists('plugins_url')) return trailingslashit(plugins_url(basename(dirname(__FILE__))));
		$path = dirname(__FILE__);
		$path = str_replace("\\","/",$path);
		$path = trailingslashit(get_bloginfo('wpurl')) . trailingslashit(substr($path,strpos($path,"wp-content/")));
		return $path;
	}
	
	static function realPath()
	{
		$path = dirname(__FILE__);
		$path = str_replace("\\","/",$path);
		return $path;
	}
	
	static function themePath($theme_name)
	{
		return get_bloginfo('template_directory')."/$theme_name/";
	}
	
	static function themeRealPath($theme_name)
	{
		return TEMPLATEPATH ."/$theme_name/";
	}
	
	
	static function templateRedirect(array $urls)
	{
		if(empty($urls)) return false;
		
		global $wp;
		global $wp_query, $wp_rewrite;
	
		$reditect_page =  $wp_query->query_vars[$urls['default']];		//前台参数名
		
		//注意 ptp-video-form/被翻译成index.php?ptpVideo=ptp-video-form了。
		unset($urls['default']);
		foreach ($urls as $k => $url){
			if ($reditect_page == $k){
				var_dump(self::template($url));exit;
				include(self::template($url));
				die();
			}
		}
	}

	
}

?>