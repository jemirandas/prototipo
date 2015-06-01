<?php
require('configs/include.php');
class c_ver_sucursales extends super_controller{
public function display(){
    
    $options['sucursal']['lvl2']="all";
    $this->orm->connect();
    $this->orm->read_data(array("sucursal"), $options);
    $sucursal=$this->orm->get_objects("sucursal");
    $this->orm->close();
    
    $this->engine->assign('sucursal',$sucursal);
    $this->engine->assign('title','Bienvenido al catalogo');
        
    $this->engine->display('header2.tpl');
    $this->engine->display('ver_sucursales.tpl');
    $this->engine->display('footer.tpl');
}
public function run(){
    $this->display();   
}
}

$call=new c_ver_sucursales();
$call->run();
?>
