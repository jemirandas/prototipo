<?php /* Smarty version Smarty-3.0.9, created on 2015-05-06 18:21:53
         compiled from "C:/wamp/www/hito2/templates\extraer_empleados.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8935554a3fa1600017-46336287%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01b511b1ecd0cb1669d6a048e8b50eeafdde2212' => 
    array (
      0 => 'C:/wamp/www/hito2/templates\\extraer_empleados.tpl',
      1 => 1430929312,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8935554a3fa1600017-46336287',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form action="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
eliminar_empleado.php?option=del" method="post">
  <table border="0" width="80%" cellpadding="0" cellspacing="8">
    <tr><td><b>Lista de Empleados </b></td></tr>
         <tr>
         <TD><b>Nombre y Apellidos</b></TD> 
         <TD><b>C&eacutedula</b></TD> 
        </tr> 
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
             <TD width="300"><input id="<?php echo $_smarty_tpl->getVariable('i')->value;?>
" type="checkbox" name="empleados_a_eliminar[]" 
                value="<?php echo $_smarty_tpl->getVariable('empleado')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('cedula');?>
">
                <?php echo $_smarty_tpl->getVariable('empleado')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('nombre');?>
 <?php echo $_smarty_tpl->getVariable('empleado')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('apellido');?>
</TD> 
             <TD><?php echo $_smarty_tpl->getVariable('empleado')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('cedula');?>
</TD>
        </tr>                 
    <?php endfor; endif; ?>
  </table>
 <input class="btn btn-primary" type="submit" value="Eliminar" />
 <input class="btn btn-primary" type="button" value="Regresar" onclick="regresarEliminar()"/>
</form>
