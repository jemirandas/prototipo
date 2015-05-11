<?php /* Smarty version Smarty-3.0.9, created on 2015-05-06 05:47:29
         compiled from "C:/wamp/www/hito2/templates\inicioAdministrador.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2385855498ed1524c47-17490554%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '521e467ea0ca5784826f91cccd7a4c02327af990' => 
    array (
      0 => 'C:/wamp/www/hito2/templates\\inicioAdministrador.tpl',
      1 => 1430762542,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2385855498ed1524c47-17490554',
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


