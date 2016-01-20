<?php
$pics = array();

//-----banner
$pic_size = "1000:600";	//与以实际比例中小者为准
$pic_size = Func::encodeStr($pic_size);
$rand = Func::getRandomCode(5);
$banners = Albums::getIsTop(10);
foreach ($banners as $k => $banner){
	$album_id = isset($banner['id']) ? (int)$banner['id'] : 0;
	$pic_id = isset($banner['cover']) ? (int)$banner['cover'] : 0;
	if(!$pic_id) $pic_id = Pics::getAlbumCover($album_id);
	if(defined('_CDNSITE')) $pic_id = "$pic_id:$rand";
	
	$banners[$k]['cover'] = $pic_id;
	$banners[$k]['pic_size'] = $pic_size;
	$pics[] = $pic_id;
}
Templates::Assign('banners', $banners);

//----- girls 1
$girls = Albums::getCate(1, 10);
$girls = Category::getPics($pics, "1000:600", $girls);
Templates::Assign('girls', $girls);
//------ men 2
$mens = Albums::getCate(2, 10);
$mens = Category::getPics($pics, "1000:600", $mens);
Templates::Assign('mens', $mens);
//------ Cartoon 3
$cartoons = Albums::getCate(3, 10);
$cartoons = Category::getPics($pics, "1000:600", $cartoons);
Templates::Assign('cartoons', $cartoons);
//------ weimei 4


//------ other 5

if(!defined('_CDNSITE')){
	$token = Cache::setImageToken($pics);
}else{
	$token = X2CDN::setImageToken($pics);
}
Templates::Assign('token', $token);
Templates::Display('home.tpl');



