<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require('configs/include.php');

class c_modificar_sucursal extends super_controller {
    
    public function update()
    {

        $sucursal = new sucursal($this->post);
        
	if(is_empty($sucursal->get('ciudad'))){
			
            $this->engine->assign('form',$sucursal);
            throw_exception("Debe ingresar una ciudad");
			
	}else if(is_empty($sucursal->get('telefono'))){
			
            $this->engine->assign('form',$sucursal);
            throw_exception("Debe ingresar un teléfono");
			
	}else if(is_empty($sucursal->get('direccion'))){
			
            $this->engine->assign('form',$sucursal);
            throw_exception("Debe ingresar una dirección");			
        }
				
        
            $this->orm->connect();				
            $this->orm->update_data("normal", $sucursal);
            $this->orm->close(); 

            $this->type_warning = "success";
            $this->msg_warning = "La surcursal se actualizó exitosamente";

            $this->engine->assign('form',$sucursal);
            $this->temp_aux = 'message.tpl';
            $this->engine->assign('type_warning',$this->type_warning);
            $this->engine->assign('msg_warning',$this->msg_warning);
		
	}

        public function mostrar()
        {
            $sucursal = new sucursal($this->get);
            $this->orm->connect();
            $option['sucursal']['lvl2'] = "one";
            $cod['sucursal']['ID'] = $sucursal->get('ID');	
            $this->orm->read_data(array("sucursal"), $option, $cod); 
            $temp = $this->orm->get_objects("sucursal"); 
            $this->orm->close(); 

            if(is_empty($temp[0])){
                
                 $this->type_warning = "advertencia";			
                 throw_exception( "No existe una sucursal con esa ID");
                 
            }else{
                $this->engine->assign('form',$temp[0]);
            }
		
    }
        

    public function display()
    {
		if ($_SESSION['usuario']['type']=='administrador'){
						
			$this->engine->display('header.tpl');
			$this->engine->display($this->temp_aux);
			$this->engine->display('modificar_sucursal.tpl');
			$this->engine->display('footer.tpl');
		}
		else{
			$_SESSION[nuestro_techo][mensaje][estado]="zona_restringida";
			header('Location: index.php');
		}
		

    }
    
    public function run()
    {
		$this->engine->assign('title',$this->gvar['Modificar Sucursal']);

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

$call = new c_modificar_sucursal();
$call->run();


