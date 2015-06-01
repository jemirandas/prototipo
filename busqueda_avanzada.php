<?php
require('configs/include.php');
class c_busqueda_avanzada extends super_controller{
    
public function display(){
 
    $sucursal=$_POST['sucursal'];

    $cod['bien_raiz']['sucursal']=$sucursal;
    $options['bien_raiz']['lvl2']="porSucursal";
    $this->orm->connect();
    $this->orm->read_data(array("bien_raiz"), $options, $cod);
    $bien_raiz=$this->orm->get_objects("bien_raiz");
    //print_r2($bien_raiz);
    $this->orm->close();
    
    $this->engine->assign('bien_raiz',$bien_raiz);
    $this->engine->assign('title','Busqueda avanzada');
    
    $this->engine->display('header2.tpl');
    $this->engine->display('busqueda_avanzada.tpl');
    $this->engine->display('footer.tpl');
}
public function run(){
    $this->display();   
}
}

$call=new c_busqueda_avanzada();
$call->run();
?>
