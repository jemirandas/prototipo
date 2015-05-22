<?php /* Smarty version Smarty-3.0.9, created on 2015-05-22 21:31:57
         compiled from "C:/wamp/www/prototipo/templates\lateral.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15907555f842df13678-24602490%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '140485a967e2c427416bb7dd602f8ccef95245da' => 
    array (
      0 => 'C:/wamp/www/prototipo/templates\\lateral.tpl',
      1 => 1432267609,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15907555f842df13678-24602490',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (isset($_SESSION['usuario'])&&$_GET['option']!='logout'){?>
<table cellspacing="0"><tr><td align="center">
<div class="">

<?php if (isset($_SESSION['usuario']['type'])&&$_SESSION['usuario']['type']=='empleado'){?>

<b><font color="#FFFFFF"> Bienvenido, <?php echo $_SESSION['usuario']['nombre'];?>
</b><br /><br /></font>
<img src="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
images/empleado.png" /><br /><br />
<?php }?>
<?php if (isset($_SESSION['usuario']['type'])&&$_SESSION['usuario']['type']=='administrador'){?>
<b><font color="#FFFFFF"> Bienvenido, <?php echo $_SESSION['usuario']['nombre'];?>
</b><br /><br /></font>
<img src="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
images/admin.png" /><br /><br />
<?php }?>
<button class="btn" onClick="location.href='<?php echo $_smarty_tpl->getVariable('gvar')->value['l_index'];?>
?option=logout'"><?php echo $_smarty_tpl->getVariable('gvar')->value['n_logout'];?>
</button>
<br /><br />
</div>
</td></tr></table>

<?php }else{ ?>   

<table cellspacing="0" cellpadding="0"><tr><td class="font-white" align="center">
<form class="" action="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_index'];?>
?option=login" method="post" name="login">
<b><font color="white"><?php echo $_smarty_tpl->getVariable('gvar')->value['n_login'];?>
</font></b><br /><br />
<input required name="nombre_de_usuario" type="text" class="input-medium" placeholder="nombre de usuario"><br /><br />
<input required name="password" type="password" class="input-medium" placeholder="Password"><br /><br />

<input type="radio" name="tipo_de_usuario" value="administrador" >Administrador<br/>
<input type="radio" name="tipo_de_usuario" value="empleado" checked>Empleado<br /><br />
<button type="submit" class="btn">Iniciar Sesión</button>

</td></tr></table>



</form>
<?php }?>

