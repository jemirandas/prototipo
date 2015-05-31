<?php

/**
 * Project:     Framework G - G Light
 * File:        gvar.php
 * 
 * For questions, help, comments, discussion, etc., please join to the
 * website www.frameworkg.com
 * 
 * @link http://www.frameworkg.com/
 * @copyright 2013-02-07
 * @author Group Framework G  <info at frameworkg dot com>
 * @version 1.2
 */
 
$gvar=array();

//messages

//links and names
$gvar['l_global'] = "http://localhost/prototipo/";
$gvar['n_global'] = "Nuestro techo";

$gvar['n_login'] = "Ingresar al sistema";
$gvar['n_logout'] = "Logout";

$gvar['l_index'] = $gvar['l_global']."index.php";
$gvar['n_index'] = "Home";
$gvar['l_contact'] = $gvar['l_global']."contact.php";
$gvar['n_contact'] = "Contact";
$gvar['m_user_empty']="debe ingresar un nombre de usuario";
$gvar['m_password_empty']="debe ingresar una contraseña";
$gvar['m_incorrect_login']="usuario y/o contraseña incorrectos";
$gvar['m_correct_login']="usuario autentificado con éxito";

$gvar['caso_uso12']="Pedir Cita";

$gvar['caso_uso6']="crear empleado";
$gvar['caso_uso8']['nombre']="Modificar Empleado";

$gvar['template_caso_uso6']="crear_empleado.tpl";
$gvar['template_caso_uso8']="modificar_empleado.tpl";

$gvar['caso_uso8']['template_interface1']="buscar_empleado.tpl";
$gvar['caso_uso1']['nombre']="crear bien raiz";
$gvar['caso_uso1']['template']="crear_bien_raiz.tpl";
$gvar['caso_uso1']['controlador']="crear_bien_raiz.php";
$gvar['caso_uso2']['nombre']="modificar bien raiz";
$gvar['caso_uso2']['template']="modificar_bien_raiz.tpl";
$gvar['caso_uso2']['controlador']="modificar_bien_raiz.php";



$gvar['zona_restringida']="zona restringida";




?>