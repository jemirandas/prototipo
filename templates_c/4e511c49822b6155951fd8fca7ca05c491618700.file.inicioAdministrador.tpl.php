<?php /* Smarty version Smarty-3.0.9, created on 2015-05-05 19:12:35
         compiled from "C:/wamp/www/login/templates\inicioAdministrador.tpl" */ ?>
<?php /*%%SmartyHeaderCode:265865548fa033270d7-93032450%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e511c49822b6155951fd8fca7ca05c491618700' => 
    array (
      0 => 'C:/wamp/www/login/templates\\inicioAdministrador.tpl',
      1 => 1430769742,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '265865548fa033270d7-93032450',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>



		<b>Inicio de Administrador</b><br /><br />
		<input class="btn btn-primary" type="button" value="Crear Empleado" name="crear_empleado" onclick="location.href='crear_empleado.php'">
		<input class="btn btn-primary" type="button" value="Modificar Empleado" name="modificar_empleado" onclick="location.href='lista_de_empleados.php'">
		<input class="btn btn-primary" type="button" value="Eliminar Empleado" name="eliminar_empleado" onclick="location.href='eliminar_empleado.php'">
		<input class="btn btn-primary" type="button" value="Asignar Horario de Atención" name="asignar_horario" onclick="location.href='asignar_horario_atencion.php?option=lista'">


