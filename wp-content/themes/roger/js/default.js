$(document).ready(function(){
	$("#banners img.first").load(function(){
		var bfwidth = $(this).width();
		var wwidth = $(window).width();
		if(bfwidth > wwidth) $(this).css('margin-left', -(bfwidth-wwidth)/2+'px');
	});
	show_img();
	$("#bgMask").click(function(){
		$("#bgMask").fadeOut('slow');
		$("#bgTransparent").fadeOut('slow');
	});
	
});
function scrollTop(){return $("html, body").animate({scrollTop: 0},"slow"),!1}
function scrollBottom(){return $("html, body").animate({scrollTop: $(document).height()},"slow"),!1}

function show_img()
{
	var _bodies = $("#banners img");
	if(_bodies.length < 1) return false;
	
	$("#banners").append('<dl id="slide_b" class="clearfix"><dt class="hover"></dt></dl>');
	for(var i=1; i<_bodies.length; i++) $("#slide_b").append('<dt class=""></dt>');
	_bodies.eq(0).show();
	var defaultOpts = { interval: 8000, fadeInTime: 300, fadeOutTime: 0 };
	var _slide_b = $("dl#slide_b");
	_slide_b.css("margin-left",-(_slide_b.width()/2)+"px");
	
	var _titles = $("dl#slide_b dt");
	var _count = _titles.length;
	var _current = 0;
	var _intervalID = null;
	var stop = function () { window.clearInterval(_intervalID);};
	var slide = function (opts) {
		if (opts) {
			_current = opts.current || 0;
		} else {
			_current = (_current >= (_count - 1)) ? 0 : (++_current);
		};
		_bodies.filter(":visible").fadeOut(defaultOpts.fadeOutTime, function () {
			_bodies.eq(_current).fadeIn(defaultOpts.fadeInTime,function(){
				$("#banners").css('background','url("'+_bodies.eq(_current).attr("src")+'") center center no-repeat');
			}).css("display","block");
			_bodies.removeClass("cur").eq(_current).addClass("cur");
			var wwidth = $(window).width();
			var bwidth = _bodies.width();
			if(bwidth > wwidth) _bodies.css('margin-left', -(bwidth-wwidth)/2+'px');
		});
		_titles.removeClass("hover").eq(_current).addClass("hover");
	};
	var go = function () {
		stop();
		_intervalID = window.setInterval(function () { slide(); }, defaultOpts.interval);
	};
	var itemMouseOver = function (target, items) {
		stop();
		var i = $.inArray(target, items);
		slide({ current: i });
	};
	_titles.hover(function () { if ($(this).attr('class') != 'cur') { itemMouseOver(this, _titles); } else { stop(); } }, go);
	_bodies.hover(stop, go);

	go();
}





