$(document).ready(function(){
	//
});

document.oncontextmenu=function(){return false;}
document.onmousedown=function(){if(event.button==2)return false;}
document.onkeydown = function(){if(window.event && window.event.keyCode == 123){event.keyCode=0;event.returnValue=false;}}

function scrollTop(){return $("html, body").animate({scrollTop: 0},"slow"),!1}
function scrollBottom(){return $("html, body").animate({scrollTop: $(document).height()},"slow"),!1}

var INTTIME=null;
function stopScroll(n){if ($(window).scrollTop()+n >= $(document).height() - $(window).height()){clearInterval(INTTIME);INTTIME=null;}}

//js生成随机数    n表示生成几位的随机数
function jsRand(n) {
	var jschars = ['0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
    var res = "";
    for(var i = 0; i < n ; i ++) {
        var id = Math.ceil(Math.random()*61);
        res += jschars[id];
    }
    return res;
}
//分页
function pageListli(url, page, pagesize)
{
	$("#paged ul").html('');
	var pagedlis =  eval($.cookie("pagedlis"));
	for(var i=0; i<pagedlis.length; i++){
		if('<<'==pagedlis[i]){
			$("#paged ul").append('<li><a href="'+url+'page='+(page-1)+'&pagesize='+pagesize+'">'+pagedlis[i]+'</a></li>');
		}else if('>>'==pagedlis[i]){
			$("#paged ul").append('<li><a href="'+url+'page='+(page+1)+'&pagesize='+pagesize+'">'+pagedlis[i]+'</a></li>');
		}else if(page == pagedlis[i]){
			$("#paged ul").append('<li><a href="'+url+'page='+ pagedlis[i] +'&pagesize='+pagesize+'" class="active">'+pagedlis[i]+'</a></li>');
		}else{
			$("#paged ul").append('<li><a href="'+url+'page='+ pagedlis[i] +'&pagesize='+pagesize+'">'+pagedlis[i]+'</a></li>');
		}
	}
	
}
//播放
function pagePlay()
{
	if(null==INTTIME){
		pPlay();
		INTTIME = setInterval("pPlay()",3000);
	}else{
		clearInterval(INTTIME);
		INTTIME=null;
	}
}
var WTOP;
function pPlay()
{
	$("#main .comm-box .img").each(function(i){
		  var top = $(this).offset().top;
		  var wtop = $(window).scrollTop();
		  if(top-wtop<50 || wtop-top<50) wtop=wtop+100;
		  if(top >= wtop){
			  WTOP = top;
			  return false;
		  }
	});
	stopScroll(1000);
	$("html, body").animate({scrollTop: WTOP},"slow",function(){
		stopScroll(1000);
	});	
}



