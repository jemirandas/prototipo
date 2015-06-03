<?php

require('configs/include.php');

class c_eliminar_bien_raiz extends super_controller {
    
    public function del()
    {             
        if(!is_empty($_POST['bien_raizs_a_eliminar'])){
		foreach($_POST['bien_raizs_a_eliminar'] as $bien_raizs_a_eliminar){
                    $bien_raiz = new bien_raiz();
                    $bien_raiz->set('numero_escritura', $bien_raizs_a_eliminar);
                    if(is_empty($bien_raiz->get('numero_escritura')))
                    {throw_exception("La cédula no existe");}

                    $this->orm->connect();
                    $this->orm->delete_data("normal",$bien_raiz);
                    $this->orm->close();
        
                };
        }
		        
        $this->type_warning = "success";
        $this->msg_warning = "Borrado exitoso";
        
        $this->temp_aux = 'message.tpl';
        $this->engine->assign('type_warning',$this->type_warning);
        $this->engine->assign('msg_warning',$this->msg_warning);
    }

    public function display()
    {	
		if ($_SESSION['usuario']['type']=='empleado'){

			$options['bien_raiz']['lvl2']="all";
			$this->orm->connect();
			$this->orm->read_data(array("bien_raiz"), $options);
			$bien_raiz=$this->orm->get_objects("bien_raiz");
			$this->orm->close();
                        $nrobien_raizs=  count($bien_raiz); 
                        
                        $this->engine->assign('nrobien_raizs',$nrobien_raizs);
			$this->engine->assign('bien_raiz',$bien_raiz);
                        
                        $this->engine->assign('title',"Eliminar bien raiz");
			$this->engine->display('header.tpl');
			$this->engine->display($this->temp_aux);
			$this->engine->display('eliminar_bien_raiz.tpl');
			$this->engine->display('footer.tpl');
				}
		else{
			$_SESSION[nuestro_techo][mensaje][estado]="zona_restringida";
			header('Location: index.php');
		}
		
	
    }
    
    public function run()
    {
	
		
        try {if (isset($this->get->option)){$this->{$this->get->option}();}}
        catch (Exception $e) 
		{
			$this->error=1; $this->msg_warning=$e->getMessage();
			$this->engine->assign('type_warning',$this->type_warning);
			$this->engine->assign('msg_warning',$this->msg_warning);
			$this->temp_aux = 'message.tpl';
		}    
        $this->display();
    }
}

$call = new c_eliminar_bien_raiz();
$call->run();

?>
