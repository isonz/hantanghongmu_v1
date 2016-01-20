var OBJ;
$(document).ready(function(){
	$("#main_content .pics.comm-box .img").click(function(){
		if("none"==$(this).children("img").css("max-width")){
			$(this).children("img").css("max-width","100%");$(this).parent().css("overflow","hidden");$("#main").css("overflow","hidden");
		}else{
			$(this).children("img").css("max-width","none");$(this).parent().css("overflow","visible");$("#main").css("overflow","visible");
		}
	});
	
	like();
});

$(function(){
	var _index7=0;
	$("#main_content .channel .banners a").mouseover(function(){
		_index7=$(this).index();
		$(this).stop().stop().animate({width:349},500).siblings("a").stop().animate({width:93},500);
	});
	$("#main_content .channel .banners a").mouseout(function(){
		if(0==_index7) return false;
		$(this).eq(_index7).stop().animate({width:93},500);
	});
});

function lazyIntegrateImgLiquid(obj,src)
{
	var noquid = obj.getAttribute('class');
	if(noquid.indexOf("noquid") > -1 ){
		obj.setAttribute("src",src);
		return false;
	}
	var id = jsRand(10);
	obj.setAttribute("id",id);
	obj = $("#"+id);
	obj.hide();
	obj.parent().css({backgroundImage:"url("+src+")",backgroundSize:"cover",backgroundPosition:"50% 50%",backgroundRepeat:"no-repeat"});
	qiehuangImg(obj.parent(), obj.attr("data"));
}
function qiehuangImg(obj, src2)
{
	if(null==src2) return false;
	var eobj = obj.clone(true).insertAfter(obj);
	obj.parent().attr("data","0");
	eobj.children("img").remove();
	obj.children("img").remove();
	eobj.hide();
	var Opts = [[{'width':0},{'width':obj.width()+'px'}],[{'height':0,'top':(obj.height()/2)+'px'},{'height':obj.height()+'px','top':0}]];
	fanzhuangImg(obj.parent(), src2, 100, Opts[parseInt(Math.random()*2)]);	//随机抽取
}

function fanzhuangImg(target, src2, time, opts)
{
	target.hover(function(){
		var status = $(this).attr("data");
		var eobj = $(this).children().last();
		if("0"==status){
			eobj.css("background-image","url("+src2+")");
			trun($(this).children().first(), "next", time, opts);
		}else{
			trun(eobj, "prev", time, opts);
		}
	},function(){
		var status = $(this).attr("data");
		if("0"==status){$(this).attr("data","1");}else{$(this).attr("data","0");}
	});
}
function trun(target, point, time, opts)
{
	target.animate(opts[0],time,function(){
		//target.unbind('mouseenter mouseleave');
		if("next"==point){
			$(this).hide().next().show();
			$(this).next().animate(opts[1],time);
		}else{
			$(this).hide().prev().show();
			$(this).prev().animate(opts[1],time);
		}
	});
}

function picPage(token, picsize, titles, likes, views)
{
	$("#main_content .picdiv").html('');
	var pics =  eval($.cookie("pics"));
	titles = eval(titles);
	for(var i=0; i<pics.length; i++){
		$("#main_content .picdiv").append('<div class="pics comm-box lazy"><div class="img"><img data-src="/image/'+token+'/'+picsize+'/'+pics[i]+'.jpg" class="noquid" /></div><div class="word">'+titles[i]+'</div><div class="exts"><font class="viewnum ext">'+views[i]+'</font><a href="##" data="'+pics[i]+'" class="like ext">'+likes[i]+'</a></div></div>');	
	}
	
}

function chkSearch()
{
	if(''==$("#headq").val()) return false;
	return true;
}

function like()
{
	$("#main_content .pics.comm-box .exts a").click(function(){
		OBJ = $(this);
		picid = OBJ.attr('data');
		picid=picid.split(':');
		picid = picid[0];
		$.post('/pic/',{t:'ajax', a:'picLike', picid:picid},function(str){
			if('1'==str){
				OBJ.html(parseInt(OBJ.html())+1);
				OBJ.removeClass('like');
				OBJ.addClass('liked');
			}
		});
	});
}
