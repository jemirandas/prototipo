<?php
require('configs/include.php');
class c_ver_catalogo extends super_controller{
    
public function display(){
    
    $id=$this->get->id;
    $cod ['sucursal']['ID']= $id;
    $options['sucursal']['lvl2']="one";
    $options['bien_raiz']['lvl2']="all";
    $components['sucursal']['bien_raiz']=array('b_s');
    $this->orm->connect();
    $this->orm->read_data(array("sucursal","bien_raiz"), $options,$cod);
    //$sucursal=$this->orm->get_objects("sucursal",$components);
    print_r2($id);
    
    $this->orm->close();
    
    $this->engine->assign('sucursal',$sucursal[0]);
    $this->engine->assign('title','Bienes raices');
        
    $this->engine->display('header.tpl');
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


