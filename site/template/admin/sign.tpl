<{include file="header.tpl"}>
<div id="signin">
<div class="logo"></div>
<{if $user|default:0}>
	<{$user}>
    <a href="/sign?out">Sign Out</a>
<{else}>
	<form name="form1" method="post" action="/sign?in">
		<ul class="simpleul">
			<li><div class="font">用户名</div><div><input type="text" name="user" /></div></li>
			<li><div class="font">密码</div><div><input type="password" name="passwd" /></div></li>
			<li><input type="submit" name="submit" value="登录" class="btn-primary" /></li>
		</ul>
	</form>
<{/if}>
</div>

<{include file="footer.tpl"}>
