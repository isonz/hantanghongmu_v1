function goTop(){ 
var _btn = document.getElementById("goTop"); 
if (document.documentElement && document.documentElement.scrollTop) { 
var _con = document.documentElement; 
} else if (document.body) { 
var _con = document.body; 
} 
window.onscroll = set; 
_btn.onclick = function (){ 
_btn.style.display = "none"; 
window.onscroll = null; 
this.timer = setInterval(function() { 
_con.scrollTop -= Math.ceil(_con.scrollTop * 0.3); 
if (_con.scrollTop == 0) clearInterval(_btn.timer, window.onscroll = set); 
},10); 
}; 
function set() { 
_btn.style.display = _con.scrollTop ? 'block': "none"; 
} 
}; 
document.write("<div id=\"goTop\" class=\"top_sub\"></div>"); 
window.onscroll = goTop; 

(function() {
    var a = ['section', 'article', 'nav', 'header', 'footer' /* 其他HTML5元素 */];
    for (var i = 0, j = a.length; i < j; i++) {
        document.createElement(a[i]);
    }	
})();
$(document).ready(function(){
	/*新增脚本*/
	var bvalue = $.browser.mobile;
	if(bvalue==true){
			//loadStyleFile("/wp-content/themes/roger/phonestyle.css");
			loadScriptFile();loadScriptFile1();
			$(".catemenu").siblings("div").hide();
			$("#cat_dd_6,#cat_dd_3,#cat_dd_7,.project_left,.project_right").remove();
			if($("#cat_dd_8").css("display")=="block"){
				$(".infotitle").addClass("infot_md");
			}
			$("#cat_8>a").click(function(){
				
				$(".infotitle").addClass("infot_md");	
				$("#cat_dd_8").show();
			});
			$("#cat_6>a").click(function(){
				$("#cat_dd_8").hide();
				$(".infotitle").removeClass("infot_md");									  
			});
			$("#cat_3>a").click(function(){
				//alert(123);
				$("#lcat_dd_8").hide();
				$(".infotitle").removeClass("infot_md");									  
			});
			$("#cat_7>a").click(function(){
				$("#cat_dd_8").hide();
				$(".infotitle").removeClass("infot_md");									  
			});
			var mvideo = $(".videobg>a").attr("data");
			$(".videobg>a").attr("data","");
			$(".videobg>a").attr("href","/video_phone/?id="+mvideo);
			
			
			$("#dituContent").css({width:'100%',height:'180px'})
			$(".catemenu").click(function(){
				$(this).siblings("div").slideToggle(400);							  
			});
			
			$("#phone_v li").each(function(vd){
				$(this).addClass("videoli"+vd);
				for(var i=0; i<=vd; i++){
					$(".videoli"+i).children().children("a").attr("href", "/video_phone/?id="+$(".videoli"+i).children().children("a").attr("data"));
				}
			})
	}
	function loadScriptFile(){
		var head = document.getElementsByTagName('head')[0];
		var script= document.createElement("script");
		script.type = "text/javascript";
		script.src="/wp-content/themes/roger/js/idangerous.swiper.js";
		head.appendChild(script);
	}
	function loadScriptFile1(){
		var head = document.getElementsByTagName('head')[0];
		var script= document.createElement("script");
		script.type = "text/javascript";
		script.src="/wp-content/themes/roger/js/swiper-demos.js";
		head.appendChild(script);
	}
	function loadStyleFile(url){
		var s = document.createElement("link");
		s.href = url;
		s.type = "text/css";
		s.rel = "stylesheet";
		document.getElementsByTagName("head")[0].appendChild(s);
		$("#twentytwelve-style-css").remove();
	}
	
	
	
	/*新增脚本 end*/
	var positionLeft = 0;
    $("a.project_right").click(function(){
		var n=$(".honmli li").width()+1;
		var content_list = $(".honmli");
		var len = content_list.find("li").length;
		var zw = len*n;
		var wdiv = $(".project").width();
		var psdt = zw - wdiv;
		var position_w = psdt/n;
		if(len>3){
			 if( positionLeft == position_w){
				 return false;
				 
			  }else{
				content_list.animate({ left : '-='+n }, "slow");
				positionLeft++
			 }
		}  
   });  
    //往前 按钮  
    $("a.project_left").click(function(){
		var n=$(".honmli li").width()+1;
		var content_list = $(".honmli");
		var len = content_list.find("li").length;
		var zw = len*n;
		var wdiv = $(".project").width();
		var psdt = zw - wdiv;
		var position_w = psdt/n;
         if(len>3){
             if(positionLeft == 0){
                return false;
				
            }else{  
                content_list.animate({ left : '+='+n }, "slow");  
                positionLeft-- ;
				//alert(positionLeft);
            }  
        }  
    }); 
	var m = $(".honmli li").length;
	if(m<=3){
		$(".project_left").hide();
		$(".project_right").hide();
	}else{
		$(".project_left").show();
		$(".project_right").show();
	}
	
	/*$(".videobg>a").click(function(){
		$(".nullupload").fadeIn(300);
		$(".uploaddiv").fadeIn(500);					  
	});*/
	$(".video_bg>a,.video_font>a").click(function(){
		
		var url = $(this).attr("data");
		if(url==""){player="";}else{
		player = new YKU.Player('centerVideo',{
			styleid: '7',
			  client_id: 'a90a3904221d309a',
			  vid: url, //填写视频ID
			  width: 960,
			  height: 580,
			  autoplay: true,
			  show_related: false
			});
		
		/*var product_html = '<embed src="'+url+'" flashvars ="isAutoPlay=true" quality="high" width="960" height="580" align="middle" allowScriptAccess="always" allowFullScreen="true" mode="transparent" type="application/x-shockwave-flash"></embed>';
		$("#centerVideo").html(product_html);*/
		$(".nullupload").fadeIn(300);
		$(".uploaddiv").fadeIn(500);
		}
	});
	$(".close,.nullupload").click(function(){
		$(".uploaddiv").fadeOut(300);
		$(".nullupload").fadeOut(200);
		$("#centerVideo").html('');
	});
	$("#leftMenu>dt").click(function(){
		$(this).addClass("hover").siblings("dt").removeClass("hover");
		$(this).next("dd").show();
		$(this).next("dd").siblings("dd").hide();
		$(this).next("dd").children("a").first().addClass("hover").siblings().removeClass("hover");
		$(this).next("dd").siblings("dd").children("a").removeClass("hover");
		$(this).children("a").addClass("hover");
		$(this).siblings("dt").children("a").removeClass("hover");
	})
	$(".tsdd>a").click(function(){
		$(this).addClass("hover").siblings().removeClass("hover");							
	})
	$("#project>dt").click(function(){
		if($(this).next("dd").css("display")=="block"){
			$(this).next("dd").slideUp();
			$(this).children("em").show();
			$(this).removeClass("hover");
			return false;
		}
		
		$(this).next("dd").slideDown().siblings("dd").slideUp();	
		$(this).addClass("hover").siblings("dt").removeClass("hover").children("em").show();
		$(this).children("em").hide();
	})
	$(".menu>dt").click(function(){
		var meuni = $(this).attr("id");
		$(this).addClass("hover").siblings().removeClass("hover");
		$("#m"+meuni).show().siblings("dd").hide();
	});
	
	
	$(".bottom_a1").click(function(){
		$(".footerdiv").animate({bottom:"-161px"},500);
		$(this).hide();
		$(".bottom_a").show();
	});
	
	$(".bottom_a").click(function(){
		$(".footerdiv").animate({bottom:"0"},600);
		$(this).hide();
		$(".bottom_a1").show();
	});
	
});

function showRs(){
	$(".notice_contactdiv").show();
	$(".notice_contact").show();
	setTimeout('showC()', 1000)
}
function showC(){
	$(".notice_contactdiv").fadeOut();
	$(".notice_contact").fadeOut();
}