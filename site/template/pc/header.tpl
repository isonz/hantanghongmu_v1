<{include file="head.tpl"}>
<div id="top_nav">
	<span><a href="/search?q=美女" target="_blank" title="一大波美女来袭">一大波美女来袭，戳这里</a></span>
	<ul> 
		<li><a href="/search?q=二次元美女" title="二次元美女" target="_blank">二次元美女</a><i></i></li> 
		<li><a href="/search?q=动漫美女" title="动漫美女" target="_blank">动漫美女</a></li> 
	</ul>
</div> <!-- end #top_nav-->
<div id="top_logo">
	<div class="top-logo">
		<a href="/" title="99秀图网 性感美女 美女套图"><img src="/images/comm/logo.png" height="50" alt="99秀图网 性感美女 美女套图"></a>
	</div>
	<div class="top-search">
		<form id="qheader_search" action="/search" method="get" <{if !$keyword|default:''}> target="_blank"<{/if}>onsubmit="return chkSearch();">
			<input name="q" id="headq" type="text" autocomplete="off" _xbox_init="t" _xbox_input=""<{if $keyword|default:''}> value=<{$keyword}><{/if}> />
			<button type="submit" class="headerbg"></button>
			<ul class="suggest clearfix">
				<li><a href="/search?q=性感">性感美女</a></li>
				<li><a href="/search?q=翘臀">翘臀美女</a></li>
			</ul>
			<div id="qheader_keywords" style="display:none;">
				<a target="_blank" href="/search/?q_" class=""></a>
			</div>
		</form>
	</div>
	<div class="top-ucenter clearfix">
		<div class="upload">
			<a href="/upload" target="_blank">
				<i class="ico-upload headerbg"></i>
				<span>上传</span>
			</a>
		</div>
		<div class="notice">
			<a href="/notice" target="_blank">
				<i class="ico-notifications headerbg"></i>
				<span>通知</span>
				<b class="caret headerbg">1</b>
			</a>
		</div>
		<div class="userlogin">
			<a href="/signin" target="_blank">
				<i class="ico-login headerbg"></i>
				<span>登录</span>
			</a> |
			<a href="/signup" target="_blank">注册</a>
		</div>
	</div>
</div><!-- end #top_logo-->
<div id="main">
	<div id="main_nav" class="clearfix">
		<ul class="main clearfix">
			<li class="current"><a href="/">首页</a></li>
			<li><a href="/cate/?id=1">美女套图</a></li>
			<li><a href="/cate/?id=2">帅哥套图 </a></li>
			<li><a href="/cate/?id=3">动漫套图</a></li>
			<li><a href="/cate/?id=4">唯美意境</a></li>
			<li><a href="/cate/?id=5">其他美图</a></li>
		</ul>
		<ul class="navright clearfix">
			<li><a href="/search?q=美">99精选</a></li>
			<li><a href="/search?q=胸">猜你喜欢</a></li>
			<li><a href="/search?q=臀">我的收藏</a></li>
			<li><a href="/search?q=乳">我的订阅</a></li>
			<li><a href="/">浏览记录</a></li>
		</ul>
	</div><!-- end #main_nav-->
