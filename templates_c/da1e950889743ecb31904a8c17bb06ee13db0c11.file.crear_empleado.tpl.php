<?php /* Smarty version Smarty-3.0.9, created on 2015-05-05 19:22:28
         compiled from "C:/wamp/www/login/templates\crear_empleado.tpl" */ ?>
<?php /*%%SmartyHeaderCode:97035548fc546ba945-51793846%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da1e950889743ecb31904a8c17bb06ee13db0c11' => 
    array (
      0 => 'C:/wamp/www/login/templates\\crear_empleado.tpl',
      1 => 1430423377,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97035548fc546ba945-51793846',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<body>

<div class="square">
<form name="crear_empleado" action="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
crear_empleado.php?option=add" method="post">
    <table width="100%" border="0" cellpadding="0" cellspacing="5">
        <tr><td>
            <b>Crear Empleado</b><br /><br />
            <b>Ingrese el nombre:</b> <input required type="text" name="nombre" <?php if ($_smarty_tpl->getVariable('form')->value!=null){?> value="<?php echo $_smarty_tpl->getVariable('form')->value->get('nombre');?>
" <?php }?> /><br />
			<b>Ingrese el apellido:</b> <input required type="text" name="apellido" <?php if ($_smarty_tpl->getVariable('form')->value!=null){?> value="<?php echo $_smarty_tpl->getVariable('form')->value->get('apellido');?>
" <?php }?> /><br />
            <b>Ingrese la c&eacutedula:</b> <input required type="text" name="cedula" <?php if ($_smarty_tpl->getVariable('form')->value!=null){?> value="<?php echo $_smarty_tpl->getVariable('form')->value->get('cedula');?>
" <?php }?> /><br />
			<b>Ingrese el nombre de usuario:</b> <input required type="text" name="nombre_de_usuario" <?php if ($_smarty_tpl->getVariable('form')->value!=null){?> value="<?php echo $_smarty_tpl->getVariable('form')->value->get('nombre_de_usuario');?>
" <?php }?> /><br />
			<b>Ingrese el password:</b> <input required type="password" name="password" <?php if ($_smarty_tpl->getVariable('form')->value!=null){?> value="<?php echo $_smarty_tpl->getVariable('form')->value->get('password');?>
" <?php }?> /><br />
            <b>Ingrese la direcci&oacuten:</b> <input required type="text" name="direccion" <?php if ($_smarty_tpl->getVariable('form')->value!=null){?> value="<?php echo $_smarty_tpl->getVariable('form')->value->get('direccion');?>
" <?php }?> /><br />
            <b>Ingrese el n&uacutemero de tel&eacutefono:</b> <input required type="text" name="telefono" <?php if ($_smarty_tpl->getVariable('form')->value!=null){?> value="<?php echo $_smarty_tpl->getVariable('form')->value->get('telefono');?>
" <?php }?> /><br />
			<b>Ingrese el correo electr&oacutenico:</b> <input required type="text" name="correo_electronico" <?php if ($_smarty_tpl->getVariable('form')->value!=null){?> value="<?php echo $_smarty_tpl->getVariable('form')->value->get('correo_electronico');?>
" <?php }?> /><br />
			<b>Seleccione la sucursal:</b> 
			<select name="sucursal">
				<option selected> </option>
				<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('sucursal')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
					<option value="<?php echo $_smarty_tpl->getVariable('sucursal')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('ID');?>
" <?php if ($_smarty_tpl->getVariable('form')->value!=null&&($_smarty_tpl->getVariable('form')->value->get('sucursal')==$_smarty_tpl->getVariable('sucursal')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('ID'))){?> selected <?php }?> >
						<?php echo $_smarty_tpl->getVariable('sucursal')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('ciudad');?>

					</option>
				<?php endfor; endif; ?>
			</select>
			<br/>
            <input class="btn btn-primary" type="submit" value="Crear" />
			<input class="btn btn-primary" type="button" value="Regresar" onclick="myFunction()">	
			
			
			
			
			
			<script>
function myFunction() {
    confirm("desea salir sin guardar los cambios?!");
}
</script>

        </td></tr>
    </table>
</form>
</div>
</body>