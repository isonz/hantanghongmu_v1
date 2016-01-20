<{include file="head.tpl"}>
<{if $user|default:0}>
<div id="header">
	<ul id="nav" class="clearfix">
		<li><a href="/">首页</a></li>
		<{if $predateurl}><li><a href="<{$predateurl}>"><{$predatetitle}></a></li><{/if}>
		<li class="last"><a href="##">日期</a></li>
		<{if $nexdateurl}><li class="last"><a href="<{$nexdateurl}>"><{$nexdateurletitle}></a></li><{/if}>
		<{if $date}><li class="middle"><a href=""><{$date}></a></li><{/if}>
	</ul>
	<div class="green-line"></div>
</div>
<{/if}>