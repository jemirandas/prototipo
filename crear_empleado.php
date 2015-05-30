<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require('configs/include.php');

class c_insert extends super_controller {
    
    public function add()
    {
        $empleado = new empleado($this->post);

		if(is_empty($empleado->get('nombre'))){
			
			$this->engine->assign('form',$empleado);
            throw_exception("Debe ingresar un nombre");
			
		}else if(is_empty($empleado->get('apellido'))){
			
			$this->engine->assign('form',$empleado);
            throw_exception("Debe ingresar un apellido");
			
		}else if(is_empty($empleado->get('cedula'))){
			
			$this->engine->assign('form',$empleado);
            throw_exception("Debe ingresar una cédula");
			
			
        }else if(!is_numeric($empleado->get('cedula'))){
				$this->engine->assign('form',$empleado);
	            throw_exception("Debe ingresar una cedula numerica");

		}
		else if(is_empty($empleado->get('nombre_de_usuario'))){
			
			$this->engine->assign('form',$empleado);
            throw_exception("Debe ingresar un nombre de usuario");
			
		}else if(is_empty($empleado->get('password'))){
			
			$this->engine->assign('form',$empleado);
            throw_exception("Debe ingresar un password");
			
		}else if(is_empty($empleado->get('direccion'))){
			
			$this->engine->assign('form',$empleado);
            throw_exception("Debe ingresar una dirección");
			
		}else if(is_empty($empleado->get('telefono'))){
			
			$this->engine->assign('form',$empleado);
            throw_exception("Debe ingresar un número de teléfono");
			
		}else if(is_empty($empleado->get('correo_electronico'))){
			
			$this->engine->assign('form',$empleado);
            throw_exception("Debe ingresar un correo electrónico");
			
		}else if (!filter_var($empleado->get('correo_electronico'), FILTER_VALIDATE_EMAIL)) {
			$this->type_warning = "mensaje";
			$this->engine->assign('form',$empleado);
            throw_exception("Debe ingresar un correo electrónico válido");			
		}
		else if(is_empty($empleado->get('sucursal'))){
			
			$this->engine->assign('form',$empleado);
            throw_exception("Debe seleccionar una sucursal");
		}
        $this->orm->connect();
		$option['empleado']['lvl2'] = "one" ;     
		$cod['empleado']['cedula'] = $empleado->get('cedula');	
        $this->orm->read_data(array("empleado"), $option, $cod);        
        $temp = $this->orm->get_objects("empleado");         
         $this->orm->close(); 
 		if(!is_empty($temp[0])){
			$this->type_warning = "advertencia";
			$this->engine->assign('form',$empleado);
            throw_exception( "La acción ha fallado porque ya  existe un empleado con esa cédula");
		}
	$this->orm->connect();			
        $this->orm->insert_data("normal", $empleado);
        $this->orm->close(); 
        
        $this->type_warning = "success";
        $this->msg_warning = "El empleado se creó exitosamente";
        
        $this->temp_aux = 'message.tpl';
        $this->engine->assign('type_warning',$this->type_warning);
        $this->engine->assign('msg_warning',$this->msg_warning);

    
	}   

    public function display()
    {
		if ($_SESSION['usuario']['type']=='administrador'){
			
			$this->orm->connect();
			$option['sucursal']['lvl2'] = "all" ;     		
			$this->orm->read_data(array("sucursal"), $option);        
			$tempo = $this->orm->get_objects("sucursal");        
			$this->orm->close();
			
			//print_r2($tempo);
			
			$this->engine->assign('sucursal',$tempo);
			$this->engine->display('header.tpl');
			$this->engine->display($this->temp_aux);
			$this->engine->display($this->gvar['template_caso_uso6']);
			$this->engine->display('footer.tpl');
		}
		else{
			$_SESSION[nuestro_techo][mensaje][estado]="zona_restringida";
			header('Location: index.php');
		}	
		

    }
    
    public function run()
    {
		$this->engine->assign('title',$this->gvar['caso_uso6']);

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

$call = new c_insert();
$call->run();


