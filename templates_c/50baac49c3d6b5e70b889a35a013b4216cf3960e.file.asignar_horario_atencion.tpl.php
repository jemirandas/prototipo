<?php /* Smarty version Smarty-3.0.9, created on 2015-05-06 02:24:20
         compiled from "C:/wamp/www/login/templates\asignar_horario_atencion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:581755495f348238d1-45262148%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50baac49c3d6b5e70b889a35a013b4216cf3960e' => 
    array (
      0 => 'C:/wamp/www/login/templates\\asignar_horario_atencion.tpl',
      1 => 1430871858,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '581755495f348238d1-45262148',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ((is_empty($_smarty_tpl->getVariable('cedula')->value))){?> 


<h5>Haga clic en el nombre del empleado que desea modificar</h5>
<br>
    <table align="center" border="0" width="20" cellpadding="10" cellspacing="0">
	
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
asignar_horario_atencion.php?option=horario&cedula=<?php echo $_smarty_tpl->getVariable('empleado')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('cedula');?>
"> 
				<?php echo $_smarty_tpl->getVariable('empleado')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('nombre');?>
 <?php echo $_smarty_tpl->getVariable('empleado')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('apellido');?>
 </a>
			</td>	
        </tr>
	<?php endfor; endif; ?>
	<tr></tr>
	<tr><td>
	
	</td><td >		
		<input class="btn btn-primary" type="button" value="Regresar" onclick="location.href='inicioAdministrador.php'">
	</td></tr>
    </table>
	
<?php }else{ ?>
<form name="asignar_horario" action="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
asignar_horario_atencion.php?option=horario&cedula=<?php echo $_smarty_tpl->getVariable('cedula')->value;?>
" method="post">
	 <table id="t01" cellpadding="0" bordercolor="blue" border="0"  width="50">
	  <tr bgcolor="#0089FF">
		<th ><font color="#FFFFFF">	  Hora</font></th>
		<th ><font color="#FFFFFF">Lunes</th>
		<th ><font color="#FFFFFF">Martes</th>
		<th ><font color="#FFFFFF">Mi&eacutercoles</th>
		<th ><font color="#FFFFFF">Jueves</th>
		<th> <font color="#FFFFFF">Viernes</th>
		<th ><font color="#FFFFFF">S&aacutebado</th>		</font>
	  </tr>	  	
	  <?php $_smarty_tpl->tpl_vars['hora'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['hora']->step = 1;$_smarty_tpl->tpl_vars['hora']->total = (int)ceil(($_smarty_tpl->tpl_vars['hora']->step > 0 ? 20+1 - (8) : 8-(20)+1)/abs($_smarty_tpl->tpl_vars['hora']->step));
if ($_smarty_tpl->tpl_vars['hora']->total > 0){
for ($_smarty_tpl->tpl_vars['hora']->value = 8, $_smarty_tpl->tpl_vars['hora']->iteration = 1;$_smarty_tpl->tpl_vars['hora']->iteration <= $_smarty_tpl->tpl_vars['hora']->total;$_smarty_tpl->tpl_vars['hora']->value += $_smarty_tpl->tpl_vars['hora']->step, $_smarty_tpl->tpl_vars['hora']->iteration++){
$_smarty_tpl->tpl_vars['hora']->first = $_smarty_tpl->tpl_vars['hora']->iteration == 1;$_smarty_tpl->tpl_vars['hora']->last = $_smarty_tpl->tpl_vars['hora']->iteration == $_smarty_tpl->tpl_vars['hora']->total;?>	
	  <tr <?php if ($_smarty_tpl->tpl_vars['hora']->value%2){?> bgcolor="#81BEF7" <?php }else{ ?> bgcolor="#A9D0F5" <?php }?>>	
		<td align="center"><font color="#000000"><?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
:00</td>
		<td align="center"><input id="'L':<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
" type="checkbox" name="H['L'][<?php echo $_smarty_tpl->tpl_vars['hora']->value-8;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
" > </td>
		<td align="center"><input id="'M':<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
" type="checkbox" name="H['M'][<?php echo $_smarty_tpl->tpl_vars['hora']->value-8;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
"> </td>
		<td align="center"><input id="'C':<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
" type="checkbox" name="H['C'][<?php echo $_smarty_tpl->tpl_vars['hora']->value-8;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
"> </td>
		<td align="center"><input id="'J':<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
" type="checkbox" name="H['J'][<?php echo $_smarty_tpl->tpl_vars['hora']->value-8;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
"> </td>
		<td align="center"><input id="'V':<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
" type="checkbox" name="H['V'][<?php echo $_smarty_tpl->tpl_vars['hora']->value-8;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
"> </td>
		<td align="center"><input id="'S':<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
" type="checkbox" name="H['S'][<?php echo $_smarty_tpl->tpl_vars['hora']->value-8;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
"> </td>
	  </tr>
	  <?php }} ?>
	 
	</table>
	<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('horario')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<script> 
			document.getElementById("<?php echo $_smarty_tpl->getVariable('horario')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('dia');?>
:<?php echo $_smarty_tpl->getVariable('horario')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('hora');?>
").checked = true; 
		</script>				
	<?php endfor; endif; ?>
<center>

            <input class="btn btn-primary" type="submit" value="Asignar Horario" />
			<input class="btn btn-primary" type="button" value="Regresar" onclick="location.href='asignar_horario_atencion.php?option=lista'" />	
</center>
</form>

<?php }?>