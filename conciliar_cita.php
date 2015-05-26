<?php


require('configs/include.php');

class c_conciliar_cita extends super_controller {
    
    public function regNew()
    {
        $cliente = new cliente($this->post);
        $cliente->set('rol', 'demandante');
        $cita = new cita($this->post); 
        $cita->set('cliente', $cliente->get('cedula'));       
        $bien_raiz = $this->post->bien_raiz; 
        
        //validar que se hayan ingresado los campos obligatorios
        if(is_empty($cliente->get('nombre'))){
			
            $this->engine->assign('form',$cliente);
            throw_exception("Debe ingresar un nombre");
			
	}else if(is_empty($cliente->get('apellido'))){
			
            $this->engine->assign('form',$cliente);
            throw_exception("Debe ingresar un apellido");
			
	}else if(is_empty($cliente->get('cedula'))){
			
            $this->engine->assign('form',$cliente);
            throw_exception("Debe ingresar una cédula");			
			
        }else if(!is_numeric($cliente->get('cedula'))){
            $this->engine->assign('form',$cliente);
            throw_exception("Debe ingresar una cédula numérica");

         }else if(is_empty($cliente->get('direccion'))){

                $this->engine->assign('form',$cliente);
                throw_exception("Debe ingresar una dirección");

        }else if(is_empty($cliente->get('telefono'))){

            $this->engine->assign('form',$cliente);
            throw_exception("Debe ingresar un número de teléfono");

        }else if(is_empty($cliente->get('correo_electronico'))){

            $this->engine->assign('form',$cliente);
            throw_exception("Debe ingresar un correo electrónico");

        }else if (!filter_var($cliente->get('correo_electronico'), FILTER_VALIDATE_EMAIL)) {
                
            $this->type_warning = "mensaje";
            $this->engine->assign('form',$cliente);
            throw_exception("Debe ingresar un correo electrónico válido");			
                
        }else if(is_empty($cliente->get('ingreso_mensual'))){

            $cliente->set('ingreso_mensual', 0);            
        }
        
        ///////////////Verificar si ya existe el cliente///////////////////////
        
        $this->orm->connect();
        $option['cliente']['lvl2'] = "one" ;     
        $cod['cliente']['cedula'] = $cliente->get('cedula');	
        $this->orm->read_data(array("cliente"), $option, $cod);        
        $temp = $this->orm->get_objects("cliente");         
        $this->orm->close();
        print_r2($temp[0]);
        
        if(!is_empty($temp[0])){
                        
            $this->orm->connect();            
            $this->orm->update_data("normal", $cliente);
            $this->orm->close(); 
            //throw_exception( "La acción ha fallado porque ya  existe un empleado con esa cédula");
        }else{
            /////Ingresar cliente nuevo////////
            $this->orm->connect();            
            $this->orm->insert_data("normal", $cliente);
            $this->orm->close();
        }
        
        ///////////////crear la cita///////////////////////////
        $this->orm->connect();            
        $this->orm->insert_data("normal", $cita);
        //$this->orm->close();
        
        ///////////modificar disponibilidad de la agenda//////////////
        $this->orm->connect();            
        $agenda = new agenda();
        $agenda -> set('fecha', $cita->get('fecha'));
        $agenda -> set('hora', $cita->get('hora'));
        $agenda -> set('empleado', $cita->get('empleado'));
        $this->orm->update_data("normal", $agenda);
        //$this->orm->close(); 
        
        ///////////////Extraer la información de la cita para obtener el código generado///////////////////////                
        $this->orm->connect();
        
        $option['cita']['lvl2'] = "one" ;     
        $cod['cita']['empleado'] = $cita->get('empleado');	        
        $cod['cita']['fecha'] = $cita->get('fecha');
        $cod['cita']['hora'] = $cita->get('hora');
        $this->orm->read_data(array("cita"), $option, $cod);        
        $cita2 = $this->orm->get_objects("cita");         
        print_r2($cita);
        ///////////////Extraer la información del empleado///////////////////////                
        
        $option['empleado']['lvl2'] = "one2" ;     
        $cod['empleado']['cedula'] = $cita2[0]->get('empleado');	                
        $this->orm->read_data(array("empleado"), $option, $cod);        
        $empleado = $this->orm->get_objects("empleado");
        
        ///////////////Extraer la información del bien raíz///////////////////////                        
        $option['bien_raiz']['lvl2'] = "one" ;     
        $cod['bien_raiz']['numero_escritura'] = $bien_raiz;	                
        $this->orm->read_data(array("bien_raiz"), $option, $cod);        
        $bien_raiz2 = $this->orm->get_objects("bien_raiz");                 
        
        ///////////////Extraer la información de la sucursal///////////////////////                        
        $option['sucursal']['lvl2'] = "one" ;     
        $cod['sucursal']['ID'] = $bien_raiz2[0]->get('sucursal');	                
        $this->orm->read_data(array("sucursal"), $option, $cod);        
        $sucursal = $this->orm->get_objects("sucursal");                 
        
        $this->orm->close();

        print_r2($cita2[0]);
        print_r2($empleado[0]);
        print_r2($sucursal[0]);
        print_r2($bien_raiz2[0]);
        $this->type_warning = "success";
        $this->msg_warning = "La cita se generó exitosamente";
        $this->temp_aux = 'message.tpl';
        $this->engine->assign('type_warning',$this->type_warning);
        $this->engine->assign('type_warning',$this->type_warning);
        $this->engine->assign('msg_warning',$this->msg_warning);
        
    }   

    public function display()
    {   
        $this->engine->display('header.tpl');
        $this->engine->display($this->temp_aux);
        //$this->engine->display($this->gvar['template_caso_uso6']);
        $this->engine->display('footer.tpl');

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

$call = new c_conciliar_cita();
$call->run();


