<?php
require('configs/include.php');
class c_buscar_bien_raiz extends super_controller{

public function buscar(){

    $sucursal=$this->get->sucursal;
    $this->resultados = array();
    $precioVenta=$this->post->precioVenta;
    $precioAlquiler=$this->post->precioAlquiler;
    $area=$this->post->area;
    $habitaciones=$this->post->habitaciones;
    $banos=$this->post->banos;
    
    if($precioVenta == "none"){
        if($precioAlquiler == "none"){
	    if($area == "none"){
	        if($habitaciones == "none"){
                    if($banos == "none"){
			throw_exception("¡Debe seleccionar al menos un valor!");
                    }  
                }	
            }		
        }		
    }
    
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
        if((10000000 < (int)$propiedad->get('precio_venta')) && ((int)$propiedad->get('precio_venta') <= 25000000)){            
            array_push($this->resultados, $propiedad);
        }
      }
     elseif (strcmp ($precioVenta , "medio" ) == 0){  
         
        if((25000000 <= (int)$propiedad->get('precio_venta')) && ((int)$propiedad->get('precio_venta') <= 40000000)){
            array_push($this->resultados, $propiedad);
        }
      }  
      elseif (strcmp ($precioVenta , "caro" ) == 0){  
        if((40000000<=(int)$propiedad->get('precio_venta')) && ((int)$propiedad->get('precio_venta')<=50000000)){
            array_push($this->resultados, $propiedad);
        }
      }  
      
      elseif (strcmp ($precioAlquiler , "barato" ) == 0){  
        if((100000<=(int)$propiedad->get('precio_alquiler')) && ((int)$propiedad->get('precio_precio alquiler')<=250000)){
            array_push($this->resultados, $propiedad);
        }
      } 
      elseif (strcmp ($precioAlquiler , "medio" ) == 0){  
        if((250000<=(int)(int)$propiedad->get('precio_alquiler')) && ((int)$propiedad->get('precio_precio alquiler')<=400000)){
            array_push($this->resultados, $propiedad);
        }
      }  
      elseif (strcmp ($precioAlquiler , "caro" ) == 0){  
        if((400000<=(int)$propiedad->get('precio_alquiler')) && ((int)$propiedad->get('precio_precio alquiler')<=500000)){
            array_push($this->resultados, $propiedad);
        }
      }
      //filtro por area
      elseif (strcmp ($area , "pequeño" ) == 0){  
        if((50<=(int)$propiedad->get('area')) && ((int)$propiedad->get('area')<=150)){
            array_push($this->resultados, $propiedad);
        }
      }      
      elseif (strcmp ($area , "mediano" ) == 0){  
        if((150<=(int)$propiedad->get('area')) && ((int)$propiedad->get('area')<=300)){
            array_push($this->resultados, $propiedad);
        }
      }
      elseif (strcmp ($area , "grande" ) == 0){  
        if((300<=(int)$propiedad->get('area')) && ((int)$propiedad->get('area')<=500)){
            array_push($this->resultados, $propiedad);
        }
      }
      //filtro por numero de habitaciones      
      elseif ((int)$propiedad->get('numero_habitaciones')==$habitaciones){
            array_push($this->resultados, $propiedad);
      }
      //filtro por numero de baños     
      elseif ((int)$propiedad->get('numero_banos')==$banos){
            array_push($this->resultados, $propiedad);
      }            

    }
    
  
}

public function display(){
    $this->engine->display('header2.tpl');
    $this->engine->display($this->temp_aux);
    
    //print_r2($this->resultados);
    $this->engine->assign('nroElementos',count($this->resultados));
    if(count($this->resultados)==0){
        $this->engine->assign('title','Resultados busqueda');
        $this->engine->display('sin_resultados.tpl');
        $this->engine->display('footer.tpl');
    }
    
    elseif(count($this->resultados)==1){
        $this->engine->assign('bien_raiz',$this->resultados[0]);
        $this->engine->assign('title','Informacion del bien raiz');
        $this->engine->display('buscar_bien_raiz.tpl');
        $this->engine->display('footer.tpl');
    }
    else{
        $this->engine->assign('bien_raiz',$this->resultados);
        $this->engine->assign('title','Informacion del bien raiz');
        $this->engine->display('buscar_bien_raiz.tpl');
        $this->engine->display('footer.tpl');
        
    }

}
public function run(){
        try {
            if (isset($this->get->option)){
                $this->{$this->get->option}();
            }
        }
        catch (Exception $e){
			$this->error=1; $this->msg_warning=$e->getMessage();
			$this->engine->assign('type_warning',$this->type_warning);
			// El mensaje pasa a ser el que se arrojó en la función add()
			$this->engine->assign('msg_warning',$this->msg_warning);
			$this->temp_aux = 'message.tpl';
		}    
    
    $this->display();   
}
}

$call=new c_buscar_bien_raiz();
$call->run();
?>

