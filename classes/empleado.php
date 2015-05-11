<?php
 
class empleado extends persona
{
	//attributes
	protected $nombre_de_usuario;
	protected $password;
	protected $sucursal;	
	
	//components
	var $components = array();
	
	//auxiliars for primary key and for files
	var $auxiliars = array();
	
	//data about the attributes
	public function metadata()
	{
		return array("cedula" => array(), "nombre" => array(), "apellido" => array(),  "correo_electronico" => array(), "direccion" => array(), "telefono" => array(), "nombre_de_usuario" => array(), "password" => array(), "sucursal" => array()); 
	}
	
	public function relational_keys($class, $rel_name) 
	{	
		switch($class) 
		{
		case "sucursal":
			switch($rel_name)
			{
				case "e_s":
				return array("sucursal");
				break;
			}
			
		break;
		
		default:
		break; 
		} 
	}
}