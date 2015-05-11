<?php
require('configs/include.php');
class c_extraer_empleados extends super_controller{
public function display(){



	if ($_SESSION['usuario']['type']=='administrador'){

		$options['empleado']['lvl2']="all2";
		$this->orm->connect();
		$this->orm->read_data(array("empleado"), $options);
		$empleado=$this->orm->get_objects("empleado");
		$this->orm->close();
    
		$this->engine->assign('empleado',$empleado);
		$this->engine->assign('title','Lista de Empleados');
        
		$this->engine->display('header.tpl');
		$this->engine->display('lista_de_empleados.tpl');
		$this->engine->display('footer.tpl');
	}
	else{
		$_SESSION[nuestro_techo][mensaje][estado]="zona_restringida";
		header('Location: index.php');
	}
}
public function run(){

    $this->display();   
}
}

$call=new c_extraer_empleados();
$call->run();
?>
