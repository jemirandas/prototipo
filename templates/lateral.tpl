{if isset($smarty.session.usuario) && $smarty.get.option neq 'logout'}
<table cellspacing="0"><tr><td align="center">
<div class="">

{if isset($smarty.session.usuario.type) && $smarty.session.usuario.type eq 'empleado'}

<b><font color="#FFFFFF"> Bienvenido, {$smarty.session.usuario.nombre}</b><br /><br /></font>
<img src="{$gvar.l_global}images/empleado.png" /><br /><br />
{/if}
{if isset($smarty.session.usuario.type) && $smarty.session.usuario.type eq 'administrador'}
<b><font color="#FFFFFF"> Bienvenido, {$smarty.session.usuario.nombre}</b><br /><br /></font>
<img src="{$gvar.l_global}images/admin.png" /><br /><br />
{/if}
<button class="btn" onClick="location.href='{$gvar.l_index}?option=logout'">{$gvar.n_logout}</button>
<br /><br />
</div>
</td></tr></table>

{else}   

<table cellspacing="0" cellpadding="0"><tr><td class="font-white" align="center">
<form class="" action="{$gvar.l_index}?option=login" method="post" name="login">
<b><font color="white">{$gvar.n_login}</font></b><br /><br />
<input required name="nombre_de_usuario" type="text" class="input-medium" placeholder="nombre de usuario"><br /><br />
<input required name="password" type="password" class="input-medium" placeholder="Password"><br /><br />

<input type="radio" name="tipo_de_usuario" value="administrador" >Administrador<br/>
<input type="radio" name="tipo_de_usuario" value="empleado" checked>Empleado<br /><br />
<button type="submit" class="btn">Iniciar Sesión</button>

</td></tr></table>



</form>
{/if}

