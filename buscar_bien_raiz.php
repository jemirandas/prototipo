<?php
require('configs/include.php');
class c_buscar_bien_raiz extends super_controller{
    
public function display(){
    
    $sucursal=$this->get->sucursal;
    $resultados = array();
    $precioVenta=$_POST['precioVenta'];
    $precioAlquiler=$_POST['precioAlquiler'];
    $area=$_POST['area'];
    echo $precioVenta;
    echo $precioAlquiler;
    echo $area;

    $cod['bien_raiz']['sucursal']=$sucursal;
    $options['bien_raiz']['lvl2']="porSucursal";
    $this->orm->connect();
    $this->orm->read_data(array("bien_raiz"), $options, $cod);
    $bien_raiz=$this->orm->get_objects("bien_raiz");
    //print_r2($bien_raiz);
    $this->orm->close();
    
    foreach ($bien_raiz as $propiedad){
      //filtro por precio de venta y de alquiler  
      if (strcmp ($precioVenta , "barato" ) == 0){  
        if((10000000<=$propiedad->get('precio_venta') && ($propiedad->get('precio_venta')<=250000))){
            array_push($resultados, $propiedad);
        }
      }
      elseif (strcmp ($precioVenta , "medio" ) == 0){  
        if((25000000<$propiedad->get('precio_venta') && $propiedad->get('precio_venta'))<=40000000){
            array_push($resultados, $propiedad);
        }
      }  
      elseif (strcmp ($precioVenta , "caro" ) == 0){  
        if((40000000<$propiedad->get('precio_venta') && $propiedad->get('precio_venta'))<=50000000){
            array_push($resultados, $propiedad);
        }
      }  
      elseif (strcmp ($precioAlquiler , "barato" ) == 0){  
        if((100000<=$propiedad->get('precio_alquiler') && $propiedad->get('precio_precio alquiler'))<=250000){
            array_push($resultados, $propiedad);
        }
      } 
      elseif (strcmp ($precioAlquiler , "medio" ) == 0){  
        if((250000<$propiedad->get('precio_alquiler') && $propiedad->get('precio_precio alquiler'))<=400000){
            array_push($resultados, $propiedad);
        }
      }  
      elseif (strcmp ($precioAlquiler , "caro" ) == 0){  
        if((400000<$propiedad->get('precio_alquiler') && $propiedad->get('precio_precio alquiler'))<=500000){
            array_push($resultados, $propiedad);
        }
      }
      //filtro por area
      elseif (strcmp ($area , "pequeño" ) == 0){  
        if((50<=$propiedad->get('area') && $propiedad->get('area'))<=150){
            array_push($resultados, $propiedad);
        }
      }      
      elseif (strcmp ($area , "mediano" ) == 0){  
        if((150<$propiedad->get('area') && $propiedad->get('area'))<=300){
            array_push($resultados, $propiedad);
        }
      }
      elseif (strcmp ($area , "grande" ) == 0){  
        if((300<$propiedad->get('area') && $propiedad->get('area'))<=500){
            array_push($resultados, $propiedad);
        }
      }
      //filtro por numero de habitaciones
      
      
      
    }    
    print_r2($resultados);
    
    if(count($resultados)==1){
        $this->engine->assign('bien_raiz',$resultados[0]);
        $this->engine->assign('title','Informacion del bien raiz');
        $this->engine->display('header.tpl');
        $this->engine->display('ver_bien_raiz.tpl');
        $this->engine->display('footer.tpl');
    }
    else{
        $this->engine->assign('bien_raiz',$resultados);
        $this->engine->assign('title','Informacion del bien raiz');
        $this->engine->display('header.tpl');
        $this->engine->display('buscar_bien_raiz.tpl');
        $this->engine->display('footer.tpl');        
    }

}
public function run(){
    $this->display();   
}
}

$call=new c_buscar_bien_raiz();
$call->run();
?>

