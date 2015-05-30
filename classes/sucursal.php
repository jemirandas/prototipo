<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class sucursal extends object_standard
{
    //attribute variables
    protected $ID;
    protected $direccion;
    protected $ciudad;
    protected $telefono;
    //components
    var $components = array();
    //auxiliars for primary key and for files
    var $auxiliars = array();
    
    //data about the attributes
    public function metadata(){
        return array(
			"ID" => array(),
            "direccion" => array(),
            "ciudad" => array(),
            "telefono" => array()
            );
    }
    
    public function primery_key(){
        return array("ID");
    }
    
    public function relational_keys($class, $rel_name){
        switch($class){
            default: break;
            }
    }
}
    

?>
