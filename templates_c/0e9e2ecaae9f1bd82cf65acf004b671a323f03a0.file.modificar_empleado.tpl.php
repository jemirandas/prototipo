<?php /* Smarty version Smarty-3.0.9, created on 2015-05-06 18:31:53
         compiled from "C:/wamp/www/hito2/templates\modificar_empleado.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13068554a41f9c3b175-41247823%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e9e2ecaae9f1bd82cf65acf004b671a323f03a0' => 
    array (
      0 => 'C:/wamp/www/hito2/templates\\modificar_empleado.tpl',
      1 => 1430929898,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13068554a41f9c3b175-41247823',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		
			
			
		<script>
function regresarModificar(){


        var r=confirm("Esta seguro que desea salir");
        if(r==true){
            location.href="inicioAdministrador.php";
        }
        else{
           bandera=true;
        }
    
	}	
			</script>

<body>

<div class="square">
<form name="crear_empleado" action="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
modificar_empleado.php?option=update" method="post">
    <table width="100%" border="0" cellpadding="0" cellspacing="5">
        <tr><td>
            <b>Modificar Empleado</b><br /><br />
            <b>Ingrese el nombre:<font color="red">*</font></b> <input required type="text" name="nombre" <?php if ($_smarty_tpl->getVariable('form')->value!=null){?> value="<?php echo $_smarty_tpl->getVariable('form')->value->get('nombre');?>
" <?php }?> /><br />
			<b>Ingrese el apellido:<font color="red">*</font></b> <input required type="text" name="apellido" <?php if ($_smarty_tpl->getVariable('form')->value!=null){?> value="<?php echo $_smarty_tpl->getVariable('form')->value->get('apellido');?>
" <?php }?> /><br />
            <b>Ingrese la c&eacutedula:<font color="red">*</font></b> <input required type="text" name="cedula" <?php if ($_smarty_tpl->getVariable('form')->value!=null){?> value="<?php echo $_smarty_tpl->getVariable('form')->value->get('cedula');?>
" <?php }?> /><br />
			<b>Ingrese el nombre de usuario:<font color="red">*</font></b> <input required type="text" name="nombre_de_usuario" <?php if ($_smarty_tpl->getVariable('form')->value!=null){?> value="<?php echo $_smarty_tpl->getVariable('form')->value->get('nombre_de_usuario');?>
" <?php }?> /><br />
			<b>Ingrese el password:<font color="red">*</font></b> <input type="password" name="password" <?php if ($_smarty_tpl->getVariable('form')->value!=null){?> value="<?php echo $_smarty_tpl->getVariable('form')->value->get('password');?>
" <?php }?> /><br />
            <b>Ingrese la direcci&oacuten<font color="red">*</font>:</b> <input required type="text" name="direccion" <?php if ($_smarty_tpl->getVariable('form')->value!=null){?> value="<?php echo $_smarty_tpl->getVariable('form')->value->get('direccion');?>
" <?php }?> /><br />
            <b>Ingrese el n&uacutemero de tel&eacutefono:<font color="red">*</font></b> <input required type="text" name="telefono" <?php if ($_smarty_tpl->getVariable('form')->value!=null){?> value="<?php echo $_smarty_tpl->getVariable('form')->value->get('telefono');?>
" <?php }?> /><br />
			<b>Ingrese el correo electr&oacutenico:<font color="red">*</font></b> <input required type="text" name="correo_electronico" <?php if ($_smarty_tpl->getVariable('form')->value!=null){?> value="<?php echo $_smarty_tpl->getVariable('form')->value->get('correo_electronico');?>
" <?php }?> /><br />
			<b>Seleccione la sucursal:<font color="red">*</font></b>
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
            <input class="btn btn-primary" type="submit" value="Guardar" />
			<input class="btn btn-primary" type="button" value="Regresar" onclick="regresarModificar()">				
			<input type="hidden" name="cedula_vieja" <?php if ($_smarty_tpl->getVariable('form')->value!=null){?> value="<?php echo $_smarty_tpl->getVariable('form')->value->get('cedula');?>
" <?php }?>/>
        </td></tr>
    </table>
</form>
</div>
</body>