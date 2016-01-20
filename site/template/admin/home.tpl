<{include file="head.tpl"}>
<{if $user|default:0}>
<div id="header">
	<ul id="nav" class="clearfix">
		<li><a href="/">首页</a></li>
		<li><a href="/manage">Manage</a></li>
		<li class="last"><a href="/sign?out"><{$user}> 登出</a></li>
		<li class="last"><a href="/pushCDN/">Push To CDN</a></li>
		<{if "ison"==$user}><li class="middle"><a href="/run">运行</a></li><{/if}>
	</ul>
	<div class="green-line"></div>
</div>
<{/if}>

<div id="content">
	<div class="home clearfix">
		<{foreach from=$root item=r}>
		<a href="/?p=<{$path}><{$r|escape:"url"}>" class="rootbox"><{$r}></a>
		<{/foreach}>
	</div>
</div>

<{include file="footer.tpl"}>
