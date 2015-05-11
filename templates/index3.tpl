{if isset($smarty.session.user) && $smarty.get.option neq 'logout'}
<table cellspacing="0"><tr><td align="center">
<div class="well well-small">
<b>Welcome {$smarty.session.user.name}</b><br /><br /><img src="{$gvar.l_global}images/admin.png" /><br /><br />
<button class="btn" onClick="location.href='{$gvar.l_index}?option=logout'">{$gvar.n_logout}</button>
</div>
</td></tr></table>
{else}   
<table cellspacing="0" cellpadding="0"><tr><td class="font-white" align="center">
<form class="well well-small form-search" action="{$gvar.l_index}?option=login" method="post" name="login">
<b><a name="login">{$gvar.n_login}</a></b><br /><br />
<input name="user" type="text" class="input-medium" placeholder="User"><br /><br />
<input name="password" type="password" class="input-medium" placeholder="Password"><br /><br />
<button type="submit" class="btn">Go</button>
</form>
</td></tr></table>
{/if}