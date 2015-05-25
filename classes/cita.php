<?php
 
class cita extends object_standard
{
	//attributes
	protected $codigo;
	protected $fecha;
	protected $hora;
	protected $empleado;	
	protected $cliente;		
	
	//components
	var $components = array();
	
	//auxiliars for primary key and for files
	var $auxiliars = array();
	
	//data about the attributes
	public function metadata()
	{
		return array("codigo" => array(), "fecha" => array(), "hora" => array(), "empleado" => array(), 
                    "cliente" => array());
	}
		
	public function primary_key()
	{
		return array("codigo");
	}	
	
	public function relational_keys($class, $rel_name) 
	{	
		switch($class) 
		{
		case "empleado":
		
			switch($rel_name)
			{
				case "c_e":
                                    return array("empleado");
				break;
			}
			
		break;
            
                case "cliente":
		
			switch($rel_name)
			{
				case "c_c":
                                    return array("cliente");
				break;
			}
			
		break;
            
		default:
		break; 
		} 
	}
}