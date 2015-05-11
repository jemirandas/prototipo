<?php /* Smarty version Smarty-3.0.9, created on 2015-05-06 05:49:21
         compiled from "C:/wamp/www/hito2/templates\lista_de_empleados.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1002155498f414dc218-24596076%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1180dcd0c63917476da443075a89ac547a7063ca' => 
    array (
      0 => 'C:/wamp/www/hito2/templates\\lista_de_empleados.tpl',
      1 => 1430522628,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1002155498f414dc218-24596076',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>



<h5>Haga clic en el nombre del empleado que desea modificar</h5>
<br>
    <table align="center" border="0" cellpadding="10" cellspacing="0">
	
	<tr><td width="10"><b>C&eacutedula</b></td> <td><b>Nombre</b></td>
	<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('empleado')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <tr>
			<td align="right"> <?php echo $_smarty_tpl->getVariable('empleado')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('cedula');?>
 </td>           
            <td><a href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
modificar_empleado.php?option=mostrar&cedula=<?php echo $_smarty_tpl->getVariable('empleado')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('cedula');?>
"> 
				<?php echo $_smarty_tpl->getVariable('empleado')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('nombre');?>
 <?php echo $_smarty_tpl->getVariable('empleado')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('apellido');?>
 </a>
			</td>	
        </tr>
	<?php endfor; endif; ?>
    </table>
	<br>
	
	<input class="btn btn-primary" type="button" value="Regresar" onclick="location.href='inicioAdministrador.php'">	
	
</body>