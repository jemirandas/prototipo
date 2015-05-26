<?php /* Smarty version Smarty-3.0.9, created on 2015-05-25 07:34:23
         compiled from "C:/wamp/www/prototipo/templates\conciliar_cita.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6320555fc9ce5998f9-20941057%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2580ae24d805b6131777e5bb6982855226a2405d' => 
    array (
      0 => 'C:/wamp/www/prototipo/templates\\conciliar_cita.tpl',
      1 => 1432531273,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6320555fc9ce5998f9-20941057',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<center>
		Semana Actual (<?php echo $_smarty_tpl->getVariable('primerDia')->value;?>
 al <?php echo $_smarty_tpl->getVariable('ultimoDia')->value;?>
) >> <a href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
pedir_cita.php?option=horario&semana=siguiente">Semana Siguiente</a>
		Próxima Semana(<?php echo $_smarty_tpl->getVariable('primerDia2')->value;?>
 al <?php echo $_smarty_tpl->getVariable('ultimoDia2')->value;?>
) 
		>> <a href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
pedir_cita.php?option=horario&semana=actual">Regresar a Semana Actual</a> 



</center>

