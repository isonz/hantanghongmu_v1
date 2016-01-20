var pagesize = 30;
$(document).ready(function(){
	window.onresize=resizeWindow;
	resizeWindow();
	removeToRecycle();
	toTop();
	picToHome();
}); 

var RECYCLEOBJ = null;
function removeToRecycle()
{
	$("#content .pics span p.reduction").click(function(){
		RECYCLEOBJ = $(this);
		var file = RECYCLEOBJ.attr('data');
		file=file.split(':');
		if('undefined'==typeof(file[2])){
			var url=/manage/;
		}else{
			var url=file[2];
		}
		$.getJSON(url,{a:'recycle',t:'ajax',o:file[0], id:file[1]}, function(json){
			if(0==json.status){
				RECYCLEOBJ.parent().remove();
			}
		});
	});
	$("#content .pics span p.recycle").click(function(){
		RECYCLEOBJ = $(this);
		var file = RECYCLEOBJ.attr('data');
		file=file.split(':');
		if('undefined'==typeof(file[2])){
			var url=/manage/;
		}else{
			var url=file[2];
		}
		$.getJSON(url,{a:'reduction',t:'ajax', o:file[0], id:file[1]}, function(json){
			if(0==json.status){
				RECYCLEOBJ.parent().remove();
			}
		});
	});
}
function toTop()
{
	$("#content .pics span i.untop").click(function(){
		RECYCLEOBJ = $(this);
		var album_id = RECYCLEOBJ.attr('data');
		$.getJSON('/manage/',{a:'totop',t:'ajax', id:album_id}, function(json){
			if(0==json.status){
				RECYCLEOBJ.removeClass('untop');
				RECYCLEOBJ.addClass('totop');
				RECYCLEOBJ.attr('title','置顶');
				toTop();
			}
		});
	});
	$("#content .pics span i.totop").click(function(){
		RECYCLEOBJ = $(this);
		var album_id = RECYCLEOBJ.attr('data');
		$.getJSON('/manage/',{a:'untop',t:'ajax', id:album_id}, function(json){
			if(0==json.status){
				RECYCLEOBJ.removeClass('totop');
				RECYCLEOBJ.addClass('untop');
				RECYCLEOBJ.attr('title','不置顶');
				toTop();
			}
		});
	});
}
function picToHome()
{
	$("#content .pics span b.tohome").click(function(){
		var pic_id =  $(this).attr('data');
		RECYCLEOBJ = pic_id;
		picid=pic_id.split(':');
		$.getJSON('/pic/',{a:'tohome',t:'ajax',cdn:1,o:picid[1], id:picid[0]}, function(json){
			if(0==json.status){
				$("#content .pics span b").each(function(i){
					$(this).addClass("tohome");
					if(RECYCLEOBJ==$(this).attr('data')) $(this).removeClass("tohome");
				});
			}
		});
	});
}

function getCategory()
{
	if(''!=CATE) return false;
	$.getJSON('',{ajax:1,type:'getCategory'},function(json){
		var data='';
		if(0==json.status){
			var jd=json.data;
			for(var i=0; i<jd.length; i++){
				data += '<a href="?c='+jd[i]+'">'+jd[i]+'</a>';
			}
		}else{
			data = "No data.";
		}
		$("#indexcontent").html(data);
	});
}

function getPagesCount()
{
	if(''==CATE) return false;
	$.getJSON('',{c:CATE,ajax:1,type:'getPagesCount',size:pagesize},function(json){
		var data='';
		if(0==json.status){
			var jd=json.data;
			var page = jd.page;
			for(var i=1; i<=page; i++){
				data += '<li><a href="javascript:getPagePic('+i+')">'+i+'</a></li>';
			}
			data += '<li><a href="##">All '+jd.count+'</a></li>';
		}else{
			data = '<li><a href="javascript:getPagePic(1)">1</a></li>';
		}
		$("#paged ul").html(data);
	});
}

function getPagePic(page)
{
	if(''==CATE) return false;
	$.getJSON('',{c:CATE,ajax:1,type:'getPagePic',page:page,size:pagesize,first:1},function(json){
		var data='';
		if(0==json.status){
			var jd=json.data;
			for(var i=0; i<jd.length; i++){
				data += '<div class="imgbox"><a href="/pic/?c='+CATE+'&p='+jd[i]+'" target="_blank"><img src="/image/?c='+CATE+'&p='+jd[i]+'&first=1" /></a><p>'+jd[i]+'</p></div>';
			}
		}else{
			data = 'No data.';
		}
		$("#content").html(data);
	});
}

//--------------
var II=1, MODULES, CDNSITE, DATA, SITEID, CDNCOLLECTID;
function CDNRun(modules, cdnsite, data, siteid, collect_id)
{
	MODULES = modules;
	CDNSITE = cdnsite;
	DATA = data;
	SITEID = siteid;
	var num = randomNum(1,10);
	var rand = jsRand(num);
	$("#runbtn").attr("disabled","disabled");
	$.ajax({
        type: 'GET',
        dataType: 'jsonp',
        jsonpCallback: 'jsonp'+rand,
        data: {data:DATA, modules:MODULES, action:'cdncollect', siteid:SITEID, collect_id:collect_id},
        url: CDNSITE,
        error: function (XMLHttpRequest, textStatus, errorThrown) {$("#msgbox").prepend('请求失败！。<br />');$("#runbtn").removeAttr("disabled");},
        success: function (json) {
        	if(0==json.status){
				var data = json.data;
				CDNCOLLECTID = data.id;
				$("#msgbox").prepend('请求第 '+II+' 次成功...<br />');
				$.post('/run/?t=save', data, function(dt){
					if('1'==dt){
						$("#msgbox").prepend('本地更新第 '+II+' 次成功...<br />');
						II++;
						CDNRun(MODULES, CDNSITE, DATA, SITEID, CDNCOLLECTID);
					}
				});
			}else{
				$("#msgbox").prepend('运行结束。<br />');
				$("#runbtn").removeAttr("disabled");
			}
        }
    });
}

//---------
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

//---------------
function chksearch(){
	if($("#search_keyword").val().length < 1) return false;
	$("#search_form").attr('action',$("#search_form").attr('action')+"&keyword="+$("#search_keyword").val());
	return true;
}






