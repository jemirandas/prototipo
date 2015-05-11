<?php /* Smarty version Smarty-3.0.9, created on 2015-05-06 18:23:28
         compiled from "C:/wamp/www/hito2/templates\crear_empleado.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23869554a4000292be3-56239920%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cda29ed66f8e61a858aa75e0430d028c0b28c6db' => 
    array (
      0 => 'C:/wamp/www/hito2/templates\\crear_empleado.tpl',
      1 => 1430929407,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23869554a4000292be3-56239920',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<body>

<div class="square">
<form name="crear_empleado" action="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
crear_empleado.php?option=add" method="post">
		
		<b>Crear Empleado</b>
		
		
    <table width="100%" border="0" cellpadding="0" cellspacing="1">        
		<tr>
			<td width="150" align="left"><b>Ingrese el nombre:<font color="red">*</b> </td><td><input required type="text" name="nombre" <?php if ($_smarty_tpl->getVariable('form')->value!=null){?> value="<?php echo $_smarty_tpl->getVariable('form')->value->get('nombre');?>
" <?php }?> /></td></tr>
		<tr >
			<td align="left"><b>Ingrese el apellido:<font color="red">*</b> </td><td><input required type="text" name="apellido" <?php if ($_smarty_tpl->getVariable('form')->value!=null){?> value="<?php echo $_smarty_tpl->getVariable('form')->value->get('apellido');?>
" <?php }?> /></td>
			</tr>
        <tr><td align="left"> <b>Ingrese la c&eacutedula:<font color="red">*</b> </td><td><input required type="text" name="cedula" <?php if ($_smarty_tpl->getVariable('form')->value!=null){?> value="<?php echo $_smarty_tpl->getVariable('form')->value->get('cedula');?>
" <?php }?> /></td></tr>
		<tr>
			<td align="left"><b>Ingrese el nombre de usuario:<font color="red">*</b> </td><td><input required type="text" name="nombre_de_usuario" <?php if ($_smarty_tpl->getVariable('form')->value!=null){?> value="<?php echo $_smarty_tpl->getVariable('form')->value->get('nombre_de_usuario');?>
" <?php }?> /></td></tr>
		<tr>
		    <td align="left"><b>Ingrese el password:<font color="red">*</b></td><td> <input required type="password" name="password" <?php if ($_smarty_tpl->getVariable('form')->value!=null){?> value="<?php echo $_smarty_tpl->getVariable('form')->value->get('password');?>
" <?php }?> /></td>
		</tr>
         <tr>  <td align="left"> <b>Ingrese la direcci&oacuten:<font color="red">*</b> </td><td><input required type="text" name="direccion" <?php if ($_smarty_tpl->getVariable('form')->value!=null){?> value="<?php echo $_smarty_tpl->getVariable('form')->value->get('direccion');?>
" <?php }?> /></td> </tr>
		 <tr>
            <td align="left"><b>Ingrese el n&uacutemero de tel&eacutefono:<font color="red">*</b></td><td> <input required type="text" name="telefono" <?php if ($_smarty_tpl->getVariable('form')->value!=null){?> value="<?php echo $_smarty_tpl->getVariable('form')->value->get('telefono');?>
" <?php }?> /></td></tr>
		<tr>	
			<td align="left"><b>Ingrese el correo electr&oacutenico:<font color="red">*</b></td><td> <input required type="text" name="correo_electronico" <?php if ($_smarty_tpl->getVariable('form')->value!=null){?> value="<?php echo $_smarty_tpl->getVariable('form')->value->get('correo_electronico');?>
" <?php }?> /></td>
		</tr>
	<tr>	
			<td align="left"><b>Seleccione la sucursal:<font color="red">*</b></td>
			<td> 
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
			</td>
			</tr>
			<tr>
			<td colspan="2">
            <input class="btn btn-primary" type="submit" value="Crear" />
			<input class="btn btn-primary" type="button" value="Regresar" onclick="regresarCrear()">	

        </td></tr>
    </table>
</form>
</div>
</body>


			<script>
function regresarCrear(){

var nombre=document.getElementsByTagName("nombre");
var bandera=false;



    if(nombre!=""){
        var r=confirm("Esta seguro que desea salir");
        if(r==true){
            location.href="inicioAdministrador.php";
        }
        else{
           bandera=true;
        }
    }


if(bandera==false){
location.href="inicioAdministrador.php";
}
}
			</script>
