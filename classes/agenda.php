<?php
 
class agenda extends object_standard
{
	//attributes
	protected $id;
<<<<<<< HEAD
	protected $hora;
	protected $fecha;
	protected $dia;
	protected $disponibilidad;	
	protected $empleado;
	protected $semana_de_agenda;
=======
	protected $fecha;
	protected $dia;
	protected $hora;	
	protected $disponibilidad;	
	protected $empleado;
	
>>>>>>> 74188224608be5609a72ae6ca04b3b9c671815d4
	//components
	var $components = array();
	
	//auxiliars for primary key and for files
	var $auxiliars = array();
	
	//data about the attributes
	public function metadata()
	{
<<<<<<< HEAD
		return array("id" => array(), "fecha" => array(), "dia" => array(), "hora" => array(),  "disponibilidad" => array(),  "empleado" => array(),  "semana_de_agenda" => array());
=======
		return array("id" => array(), "fecha" => array(), "dia" => array(), "hora" => array(),  "disponibilidad" => array(),  "empleado" => array());
>>>>>>> 74188224608be5609a72ae6ca04b3b9c671815d4
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
<<<<<<< HEAD

		case "semana_de_agenda":
		
			switch($rel_name)
			{
				case "a_s":
					return array("semana_de_agenda");
				break;
			}
			
		break;
=======
>>>>>>> 74188224608be5609a72ae6ca04b3b9c671815d4
		
		default:
		break; 
		} 
	}
}