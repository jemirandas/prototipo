<?php
 
class persona extends object_standard
{
	//attributes
	protected $cedula;
	protected $nombre;
	protected $apellido;
	protected $telefono;
	protected $direccion;
	protected $correo_electronico;
	
	//components
	var $components = array();
	
	//auxiliars for primary key and for files
	var $auxiliars = array();
	
	//data about the attributes
	public function metadata()
	{
		return array("cedula" => array(), "nombre" => array(), "apellido" => array(),  "correo_electronico" => array(), "direccion" => array(), "telefono" => array()); 
	}

	public function primary_key()
	{
		return array("cedula");
	}
	
    public function relational_keys($class, $rel_name){
        switch($class){
            default: break;
            }
    }
}