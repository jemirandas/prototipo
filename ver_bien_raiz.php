<?php
require('configs/include.php');
class c_ver_bien_raiz extends super_controller{
    
public function display(){
    
    $nroEscritura=$this->get->escritura;
    $cod['bien_raiz']['numero_escritura']=$nroEscritura;
    $options['bien_raiz']['lvl2']="one";
    $this->orm->connect();
    $this->orm->read_data(array("bien_raiz"), $options, $cod);
    $bien_raiz=$this->orm->get_objects("bien_raiz");
    //print_r2($bien_raiz);
    $this->orm->close();
    
   
    $cod['imagen']['bien_raiz']=$nroEscritura;
    $options['imagen']['lvl2']="one";
    $this->orm->connect();
    $this->orm->read_data(array("imagen"), $options, $cod);  
    $imagenes= $this->orm->get_objects("imagen");
    //print_r2($imagenes);
    $this->orm->close();
    
    $this->engine->assign('nroImagenes',count($imagenes));
    if(count($imagenes)==1){
      $this->engine->assign('imagenes',$imagenes[0]);
    }
    else{
      $this->engine->assign('imagenes',$imagenes);  
    }
    
    $this->engine->assign('bien_raiz',$bien_raiz[0]);
    $this->engine->assign('title','Informacion del bien raiz');
        
    $this->engine->display('header2.tpl');
    $this->engine->display('ver_bien_raiz.tpl');
    $this->engine->display('footer.tpl');
}
public function run(){
    $this->display();   
}
}

$call=new c_ver_bien_raiz();
$call->run();
?>