$(document).ready(function(){
	window.onresize=resizeWindow;
	resizeWindow();
	fixMenu();
}); 
function showNav()
{
	$("#main_nav .main").slideToggle("slow");
	$("#main_nav").css({opacity:"1", filter:"alpha(opacity=100)"});
}
//获取窗口长宽
function resizeWindow()
{
	var winW = $(window).width();
	if(winW < 500) {
		$("#main_content .channel .comm-box").css({width:"96%","margin":"30px auto","float":"none"});
		$("#main_content .channel .comm-box .img a").css({paddingBottom:"142%", width:"100%", height:"auto"});
	}else{
		$("#main_content .channel .comm-box").css({width:"500px","margin":"30px 5px","float":"left"});
		$("#main_content .channel .comm-box .img a").css({paddingBottom:0, width:"500px",height:"710px"});
	}
}
//悬浮菜单栏
function fixMenu()
{
	$(document).scroll(function(){
		var top = $(document).scrollTop();
		if(top < 50){
			$("#main_nav").css({position:"inherit",opacity:"1", filter:"alpha(opacity=100)"});
		}else{
			$("#main_nav").css({position:"fixed",zIndex:"10000","top":"0","left":"0",opacity:"0.3", filter:"alpha(opacity=30)"});
		}
	});
}
