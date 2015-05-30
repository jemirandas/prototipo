<?php
 
class bien_raiz extends object_standard
{
	protected $numero_escritura;
	protected $precio_venta;
	protected $precio_alquiler;
	protected $direccion;
	protected $numero_habitaciones;
	protected $numero_banos;
	protected $balcon;
	protected $observaciones;
	protected $sucursal;
	protected $area;
	
        //components
	var $components = array();
	
	//auxiliars for primary key and for files
	var $auxiliars = array();
	
	//data about the attributes
	public function metadata()
	{

		return array("numero_escritura" => array(), "precio_venta" => array(), "precio_alquiler" => array(),  "direccion" => array(), "numero_habitaciones" => array(), "numero_banos" => array(), "balcon" => array(), "observaciones" => array(), "sucursal" => array(), "area" => array()); 
	}

	public function primary_key()
	{
		return array("numero_escritura");
	}
	
    public function relational_keys($class, $rel_name){
        switch($class){		
            case "sucursal":
                switch($rel_name)
                {
                    case "b_s":
                       return array("sucursal");
                    break;
               }
            break;
        
            default:
                break;
        }
    }
}