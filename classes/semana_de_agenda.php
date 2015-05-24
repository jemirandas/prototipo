<?php
 
class semana_de_agenda extends object_standard
{
	//attributes
	protected $id;
	protected $fecha_inicio;
	protected $fecha_fin;
	
	//components
	var $components = array();
	
	//auxiliars for primary key and for files
	var $auxiliars = array();
	
	//data about the attributes
	public function metadata()
	{
		return array("id" => array(), "fecha_inicio" => array(), "fecha_fin" => array());
	}
		
	public function primary_key()
	{
		return array("id");
	}	
	
	public function relational_keys($class, $rel_name) 
	{	
		switch($class)
		{		
		default:
		break; 
		}
	}
}