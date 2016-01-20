<{include file="header.tpl"}>
<div id="main_content">

	<div class="channel clearfix">
		<{foreach from=$banners key=key item=banner}>
		<div class="comm-box">
			<div class="img"><a href="/pic/?album=<{$banner.id}>" class="lazy">
				<img data-src="/image/<{$token}>/<{$banner.pic_size}>/<{$banner.cover}>.jpg" />
			</a></div>
			<div class="word"><a href="/pic/?album=<{$banner.id}>"><{$banner.title}></a></div>
		</div>
		<{/foreach}>
	</div>
	<div class="channel clearfix">
		<div class="comm-top"><a href="/cate/?id=1">美女明星</a><a href="/cate/?id=1" class="more">更多>> </a></div>
		<{foreach from=$girls key=key item=girl}>
		<div class="comm-box">
			<div class="img"><a href="/pic/?album=<{$girl.id}>" class="lazy">
				<img data-src="/image/<{$token}>/<{$girl.pic_size}>/<{$girl.cover}>.jpg" />
			</a></div>
			<div class="word"><a href="/pic/?album=<{$girl.id}>"><{$girl.title}></a></div>
		</div>
		<{/foreach}>
	</div>
	
	<div class="channel clearfix">
		<div class="comm-top"><a href="/cate/?id=2">帅哥酷男</a><a href="/cate/?id=2" class="more">更多>> </a></div>
		<{foreach from=$mens key=key item=men}>
		<div class="comm-box">
			<div class="img"><a href="/pic/?album=<{$men.id}>" class="lazy">
				<img data-src="/image/<{$token}>/<{$men.pic_size}>/<{$men.cover}>.jpg" />
			</a></div>
			<div class="word"><a href="/pic/?album=<{$men.id}>"><{$men.title}></a></div>
		</div>
		<{/foreach}>
	</div>
	
	<div class="channel clearfix">
		<div class="comm-top"><a href="/cate/?id=3">动漫卡通</a><a href="/cate/?id=3" class="more">更多>> </a></div>
		<{foreach from=$cartoons key=key item=cartoon}>
		<div class="comm-box">
			<div class="img"><a href="/pic/?album=<{$cartoon.id}>" class="lazy">
				<img data-src="/image/<{$token}>/<{$cartoon.pic_size}>/<{$cartoon.cover}>.jpg" />
			</a></div>
			<div class="word"><a href="/pic/?album=<{$cartoon.id}>"><{$cartoon.title}></a></div>
		</div>
		<{/foreach}>
	</div>
	
	<div class="home-foot-ad"></div>

</div>
<{include file="footer.tpl"}>
