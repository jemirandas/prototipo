<?php /* Smarty version Smarty-3.0.9, created on 2015-05-25 07:23:36
         compiled from "C:/wamp/www/prototipo/templates\pedir_cita.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21289555fca1531d6f0-17245438%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '530c16803e52c6e8602e35be8620dc0362ceebbe' => 
    array (
      0 => 'C:/wamp/www/prototipo/templates\\pedir_cita.tpl',
      1 => 1432531123,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21289555fca1531d6f0-17245438',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript">
	var seleccion;
	var activado = false;
	
	function selecciona(obj){
		//obj.style.background = (obj.style.background=='blue') ? 'black' : 'blue';		
		if(obj.style.background == "green"){
			pintar();
			obj.style.background = "yellow";
			seleccion = obj.id;			
			activado = true;
		}
	}
	
	function pintar(){
		<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('agenda')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			document.getElementById("<?php echo $_smarty_tpl->getVariable('agenda')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('dia');?>
:<?php echo $_smarty_tpl->getVariable('agenda')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('hora');?>
").style.background="green";		
		<?php endfor; endif; ?>
	}
	
	function ir(){
		if(activado==true){
			location.href='<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
pedir_cita.php?option=registrar&sucursal=<?php echo $_smarty_tpl->getVariable('sucursal')->value;?>
&semana=<?php echo $_smarty_tpl->getVariable('semana')->value;?>
&seleccion='+seleccion;
		}else{
			alert("¡Debe de seleccionar un horario primero!");
		}
	}
	
</script>

<style>
			.cita{
				table, th, td {
					border: 1px solid black;
					border-collapse: collapse;
				}
				th, td {
					padding: 5px;
					text-align: left;
				}
				tr{
					width:4%;
				}
				td{
					width:16%;
				}
			}
</style>
<center>
<?php if ($_smarty_tpl->getVariable('semana')->value=='actual'){?>
	<?php if ($_smarty_tpl->getVariable('agenda')->value==null){?>
		<font color='red'><b>No hay agenda para esta semana</b></font>		<br>
	<?php }?>	
		Semana Actual (<?php echo $_smarty_tpl->getVariable('primerDia')->value;?>
 al <?php echo $_smarty_tpl->getVariable('ultimoDia')->value;?>
) >> <a href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
pedir_cita.php?option=horario&semana=siguiente&sucursal=<?php echo $_smarty_tpl->getVariable('sucursal')->value;?>
">Semana Siguiente</a>
	
<?php }else{ ?>
	<?php if ($_smarty_tpl->getVariable('agenda')->value==null){?>
		<font color='red'><b>No hay agenda para la próxima semana </b></font><br>		
	<?php }?>
		Pr&oacutexima Semana(<?php echo $_smarty_tpl->getVariable('primerDia2')->value;?>
 al <?php echo $_smarty_tpl->getVariable('ultimoDia2')->value;?>
) 
		>> <a href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
pedir_cita.php?option=horario&semana=actual&sucursal=<?php echo $_smarty_tpl->getVariable('sucursal')->value;?>
">Regresar a Semana Actual</a> 
<?php }?>


	 <table id="t01" class="cita" cellpadding="0" bordercolor="blue" border="1"  width="50">
	  <tr bgcolor="">
		<th ><font color="">Hora</font></th>
		<th ><font color="">Lunes</th>
		<th ><font color="">Martes</th>
		<th ><font color="">Mi&eacutercoles</th>
		<th ><font color="">Jueves</th>
		<th> <font color="">Viernes</th>
		<th ><font color="">S&aacutebado</th>
	  </tr>	  	
	  <?php $_smarty_tpl->tpl_vars['hora'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['hora']->step = 1;$_smarty_tpl->tpl_vars['hora']->total = (int)ceil(($_smarty_tpl->tpl_vars['hora']->step > 0 ? 20+1 - (8) : 8-(20)+1)/abs($_smarty_tpl->tpl_vars['hora']->step));
if ($_smarty_tpl->tpl_vars['hora']->total > 0){
for ($_smarty_tpl->tpl_vars['hora']->value = 8, $_smarty_tpl->tpl_vars['hora']->iteration = 1;$_smarty_tpl->tpl_vars['hora']->iteration <= $_smarty_tpl->tpl_vars['hora']->total;$_smarty_tpl->tpl_vars['hora']->value += $_smarty_tpl->tpl_vars['hora']->step, $_smarty_tpl->tpl_vars['hora']->iteration++){
$_smarty_tpl->tpl_vars['hora']->first = $_smarty_tpl->tpl_vars['hora']->iteration == 1;$_smarty_tpl->tpl_vars['hora']->last = $_smarty_tpl->tpl_vars['hora']->iteration == $_smarty_tpl->tpl_vars['hora']->total;?>	
		  <tr>	
			<td align="center"><font color=""><?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
:00</td>
			<td align="center" id="Lunes:<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
" onclick="selecciona(this)"></td>
			<td align="center" id="Martes:<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
" onclick="selecciona(this)"></td>
			<td align="center" id="Miércoles:<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
" onclick="selecciona(this)"></td>
			<td align="center" id="Jueves:<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
" onclick="selecciona(this)"></td>
			<td align="center" id="Viernes:<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
" onclick="selecciona(this)"></td>
			<td align="center" id="Sábado:<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
" onclick="selecciona(this)"></td>
		  </tr>
	  <?php }} ?>	 
	</table>
	<input class="btn btn-primary" type="button" value="Pedir Cita" name="pedir_cita" onclick="ir()">
	<script>	
		pintar();
	</script>
	
</center>

	


