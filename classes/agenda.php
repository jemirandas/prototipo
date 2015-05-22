<?php
 
class agenda extends object_standard
{
	//attributes
	protected $id;
	protected $fecha;
	protected $dia;
	protected $hora;	
	protected $disponibilidad;	
	protected $empleado;
	
	//components
	var $components = array();
	
	//auxiliars for primary key and for files
	var $auxiliars = array();
	
	//data about the attributes
	public function metadata()
	{
		return array("id" => array(), "fecha" => array(), "dia" => array(), "hora" => array(),  "disponibilidad" => array(),  "empleado" => array());
	}
		
	public function primary_key()
	{
		return array("id");
	}	
	
	public function relational_keys($class, $rel_name) 
	{	
		switch($class) 
		{
		case "empleado":
		
			switch($rel_name)
			{
				case "a_e":
					return array("empleado");
				break;
			}
			
		break;
		
		default:
		break; 
		} 
	}
}