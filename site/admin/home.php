<?php
$path = isset($_GET['p']) ? $_GET['p'] : '';
if($path) $path = $path.'/';
$root = ImagePlay::getCategory(_PIC.$path);
//foreach ($root as $r)$tmp[] = mb_convert_encoding($r, _ENCODING, "GBK");

if(!$root && $path){
	header("Location: /pic/?p=$path");
	exit;
}

Templates::Assign('path', $path);
Templates::Assign('root', $root);
Templates::Display('home.tpl');
