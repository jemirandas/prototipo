<?php
require('configs/include.php');
class c_extraer_empleados extends super_controller{
public function display(){
    $options['empleado']['lvl2']="all";
    $this->orm->connect();
    $this->orm->read_data(array("empleado"), $options);
    $empleado=$this->orm->get_objects("empleado");
    $this->orm->close();
    
    $this->engine->assign('empleado',$empleado);
    $this->engine->assign('title','Extraer empleados');
        
    $this->engine->display('header.tpl');
    $this->engine->display('extraer_empleados.tpl');
    $this->engine->display('footer.tpl');
}
public function run(){
    $this->display();   
}
}

$call=new c_extraer_empleados();
$call->run();
?>
