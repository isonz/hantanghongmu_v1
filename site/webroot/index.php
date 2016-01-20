<?php
require_once('../config.php');

$PHPSESSID = isset($_COOKIE['PHPSESSID']) ? $_COOKIE['PHPSESSID'] : null;
if($PHPSESSID) session_id($PHPSESSID);
session_start();
$sessionid = session_id();
setcookie('PHPSESSID', $sessionid, time()+31536000, '/');
$_SESSION['getPicToken']  = 'getPicToken';

/*
//----------------- user
session_start();
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
Templates::Assign('user', $user);
if(!$user){
	require_once 'sign.php';
	exit;
}
*/

//---------------- 控制器
$uri = isset($_SERVER["REQUEST_URI"]) ? $_SERVER["REQUEST_URI"] : null;
if($uri){
	$uri = explode("/", $uri);
	$action = isset($uri[1]) ? $uri[1] : null;
	$action = explode("?", $action); 
	$action = isset($action[0]) ? $action[0] : null;
}
if($action){
	$action = $action.".php";
	$flag = 0;
	foreach (glob("*.php") as $webroot){
		if($action === $webroot){
			require_once $action;
			$flag = 1;
			exit;
		}
	}
	if(!$flag){
		header("Location: /html/404.html");
		exit;
	}
}
include_once 'home.php';


