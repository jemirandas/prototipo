<?php
 
class imagen extends object_standard
{
	//attributes
	protected $codigo;
	protected $bien_raiz;
	protected $ruta;

	
	//components
	var $components = array();
	
	//auxiliars for primary key and for files
	var $auxiliars = array();
	
	//data about the attributes
	public function metadata()
	{
		return array("codigo" => array(), "bien_raiz" => array(), "ruta" => array()); 
	}

	public function primary_key()
	{
		return array("codigo");
	}
	
	public function relational_keys($class, $rel_name)
	{
		switch($class)
		{
		
		
			case "bien_raiz":
			switch($rel_name)
			{
				case "b_i":
				return array("bien_raiz");
				break;
			}
			
			break;
			
			
		    default:
			break;
		}
	}
}