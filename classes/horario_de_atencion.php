<?php
 
class horario_de_atencion extends object_standard
{
	//attributes
	protected $id;
	protected $dia;
	protected $hora;	
	protected $empleado;	
	
	//components
	var $components = array();
	
	//auxiliars for primary key and for files
	var $auxiliars = array();
	
	//data about the attributes
	public function metadata()
	{
		return array("id" => array(), "dia" => array(), "hora" => array(),  "empleado" => array()); 
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
				case "e_h":
					return array("empleado");
				break;
			}
			
		break;
		
		default:
		break; 
		} 
	}
}