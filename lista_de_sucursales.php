<?php
require('configs/include.php');
class c_extraer_sucursales extends super_controller{
public function display(){

	if ($_SESSION['usuario']['type']=='administrador'){

		$options['sucursal']['lvl2'] = "all";
		$this->orm->connect();
		$this->orm->read_data(["sucursal"], $options);
		$sucursal = $this->orm->get_objects("sucursal");
		$this->orm->close();
                //print_r2($sucursal);    
		$this->engine->assign('sucursal',$sucursal);
		$this->engine->assign('title','Lista de Sucursales');
        
		$this->engine->display('header.tpl');
		$this->engine->display('lista_de_sucursales.tpl');
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

$call=new c_extraer_sucursales();
$call->run();
?>
