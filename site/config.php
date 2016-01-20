<?php
error_reporting(E_ALL);
ini_set("display_startup_errors","1");
ini_set("display_errors","On");
set_time_limit(0);

ini_set('date.timezone','Asia/Shanghai');

//======================================= Basic
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}
if(!defined('_SITE')){
    define('_SITE', dirname(__FILE__) . DS);
}
if(!defined('_LIBS')){
    define('_LIBS', _SITE . 'libs' . DS);
}
if(!defined('_MODS')){
	define('_MODS', _SITE . 'mods' . DS);
}
if(!defined('_MODULES')){
	define('_MODULES', _SITE . 'modules' . DS);
}
if(!defined('_DATA')){
	define('_DATA', _SITE . 'data' . DS);
}
if(!defined('_LOGS')){
    define('_LOGS', _DATA . 'logs' . DS);
}
foreach (glob(_LIBS."/*.php") as $libs){
	require_once $libs;
}
foreach (glob(_MODS."/*.php") as $mods){
	require_once $mods;
}
foreach (glob(_MODULES."/*.php") as $modules){
	require_once $modules;
}
//======================================== Config
$GLOBALS['CONFIG_DATABASE'] = array(
	'host'      => '127.0.0.1',
    'user'      => 'root',
    'pwd'       => 'admin888',
    'dbname'    => 'mei8',
	'port'      => 3306,
	'tb_prefix' => 'm8_'
);

//======================================= Smarty
if(!defined('_SMARTY')){
	define('_SMARTY', _LIBS . 'Smarty' . DS);
}
foreach (glob(_SMARTY."/*.php") as $lib_smarty){
	require_once $lib_smarty;
}
//====================================== Template
$detect = new MobileDetect();
if('127.0.0.101'==$_SERVER['HTTP_HOST']){
	define('_DEVICE', 'admin' . DS);
}else if($detect->isMobile() || $detect->isTablet()){
	define('_DEVICE', 'mo' . DS);
}else{
	define('_DEVICE', 'pc' . DS);
}
if(!defined('_SMARTY_TEMPLATE')){
	define('_SMARTY_TEMPLATE', _SITE .'template' . DS . _DEVICE);
}
if(!defined('_SMARTY_COMPILED')){
	define('_SMARTY_COMPILED', _DATA . 'compileds' . DS . _DEVICE);
}
if(!defined('_SMARTY_CACHE')){
	define('_SMARTY_CACHE', _DATA . 'caches' . DS . _DEVICE);
}
//====================================== Extend
if(!defined('_PIC')){define('_PIC', _SITE . 'pic' . DS);}
if(!defined('_PICFLOD')){define('_PICFLOD', _PIC . '99xiutu.com/');}

if(!defined('_HTMLDOM')){
	define('_HTMLDOM', _LIBS . 'Htmldom' . DS);
}
foreach (glob(_HTMLDOM."/*.php") as $htmldom){
	require_once $htmldom;
}

if(!defined('_ENCODING')){
	define('_ENCODING', 'UTF-8');
}
$GLOBALS['SETTING'] = array(
	'collect_sleep_time'	=> 300,      //second
	'session_save_entity'		=> 'file'	 //file,memcache
);
$GLOBALS['EXCLUDE_URL'] = array('pushCDN', 'qrcode');

define('_CDNSITE', 'http://127.0.0.99/api/');
define('_CDNSITEID', 1);
