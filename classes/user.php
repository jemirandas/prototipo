<?php
 
class user extends object_standard
{
	//attributes
	protected $cedula;
	protected $nombre;
	protected $user;
	protected $password;
	protected $type;
	protected $email;
	protected $direccion;
	protected $telefono;
	
	//components
	var $components = array();
	
	//auxiliars for primary key and for files
	var $auxiliars = array();
	
	//data about the attributes
	public function metadata()
	{
		return array("cedula" => array(), "nombre" => array(), "user" => array(), "password" => array(), "type" => array(), "email" => array(), "direccion" => array(), "telefono" => array()); 
	}

	public function primary_key()
	{
		return array("cedula");
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