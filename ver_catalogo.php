<?php
require('configs/include.php');
class c_ver_catalogo extends super_controller{
    
public function display(){
    
    $IDsucursal=$this->get->id;
    $cod['bien_raiz']['sucursal']=$IDsucursal;
    $options['bien_raiz']['lvl2']="porSucursal";
    $this->orm->connect();

    $this->orm->read_data(array("bien_raiz"), $options, $cod);
    $bien_raiz=$this->orm->get_objects("bien_raiz");
    //print_r2($bien_raiz);

    $this->orm->close();
    
    $this->engine->assign('bien_raiz',$bien_raiz);
    $this->engine->assign('title','Bienes raices');
        
    $this->engine->display('header2.tpl');
    $this->engine->display('ver_catalogo.tpl');
    $this->engine->display('footer.tpl');
}
public function run(){
    $this->display();   
}
}

$call=new c_ver_catalogo();
$call->run();
?>


