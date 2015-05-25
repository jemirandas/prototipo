<?php
 
class cliente extends persona
{
	//attributes
	protected $ingreso_mensual;
	protected $rol;
		
	//components
	var $components = array();
	
	//auxiliars for primary key and for files
	var $auxiliars = array();
	
	//data about the attributes
	public function metadata()
	{
		return array("cedula" => array(), "nombre" => array(), "apellido" => array(),  
                    "correo_electronico" => array(), "direccion" => array(), "telefono" => array(), 
                    "ingreso_mensual" => array(), "rol" => array()); 
	}
	
	public function relational_keys($class, $rel_name) 
	{	/*
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
        
         */
	}
}


