<?php

require('configs/include.php');

class c_conciliar_cita extends super_controller {
    
    public function regExist(){
        
        $cliente = new cliente($this->post);
        //$cliente->set('rol', 'demandante');
        $cita = new cita($this->post); 
        $cita->set('cliente', $cliente->get('cedula'));       
        $bien_raiz = $this->post->bien_raiz; 
        
        if(is_empty($cliente->get('cedula'))){			
            $this->engine->assign('form',$cliente);
            throw_exception("Debe ingresar una cédula");						
        }
        
        ///////////////Verificar si ya existe el cliente///////////////////////        
        $this->orm->connect();
        $option['cliente']['lvl2'] = "one" ;     
        $cod['cliente']['cedula'] = $cliente->get('cedula');	
        $this->orm->read_data(array("cliente"), $option, $cod);        
        $temp = $this->orm->get_objects("cliente");         
        $this->orm->close();        
        
        if(is_empty($temp[0])){            
            $this->engine->assign('form1',$cliente);
            throw_exception( "Señor usuario, la c&eacutedula ingresada no est&aacute registrada en la base de datos");            
        }
        
        ///////////////crear la cita///////////////////////////
        $this->orm->connect();            
        $this->orm->insert_data("normal", $cita);        
        
        ///////////modificar disponibilidad de la agenda//////////////        
        $agenda = new agenda();
        $agenda -> set('fecha', $cita->get('fecha'));
        $agenda -> set('hora', $cita->get('hora'));
        $agenda -> set('empleado', $cita->get('empleado'));
        $this->orm->update_data("normal", $agenda);
        //$this->orm->close(); 
        
        ///////////////Extraer la información de la cita para obtener el código generado///////////////////////                                
        $option['cita']['lvl2'] = "one" ;     
        $cod['cita']['empleado'] = $cita->get('empleado');	        
        $cod['cita']['fecha'] = $cita->get('fecha');
        $cod['cita']['hora'] = $cita->get('hora');
        $this->orm->read_data(array("cita"), $option, $cod);        
        $cita2 = $this->orm->get_objects("cita");         
        
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
        
        //Establecer la fecha en español
        setlocale(LC_TIME, 'es_ES.UTF-8');        
        $fecha = strftime("%A %d de %B de %Y", $cita2[0]->get('fecha')); //mktime(0, 0, 0, 12, 22, 1978)
        
        $this->type_warning = "success";
        $this->msg_warning = "La cita se gener&oacute exitosamente";
        $this->temp_aux = 'message.tpl';
        $this->engine->assign('cita',$cita2[0]);
        $this->engine->assign('empleado',$empleado[0]);
        $this->engine->assign('sucursal',$sucursal[0]);
        $this->engine->assign('bien_raiz',$bien_raiz2[0]);
        $this->engine->assign('fecha',$fecha);
        $this->engine->assign('type_warning',$this->type_warning);
        $this->engine->assign('type_warning',$this->type_warning);
        $this->engine->assign('msg_warning',$this->msg_warning);        
	$this->engine->assign('title',$this->gvar['caso_uso12']);
    }
    
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
        //print_r2($temp[0]);
        
        if(!is_empty($temp[0])){
                        
            $this->orm->connect();            
            $this->orm->update_data("normal", $cliente);
            $this->orm->close(); 
            
        }else{
            
            //verificar si la cédula ingresada está en la tabla persona -->incluye empleados y administradores
            $this->orm->connect();
            $option['persona']['lvl2'] = "one" ;     
            $cod['persona']['cedula'] = $cliente->get('cedula');	
            $this->orm->read_data(array("persona"), $option, $cod);        
            $temp = $this->orm->get_objects("persona");         
            $this->orm->close();
            
            if(!is_empty($temp[0])){
                $this->type_warning = "mensaje";
                $this->engine->assign('form',$cliente);
                throw_exception( "La acción ha fallado porque la  c&eacutedula pertenece a la de un empleado");
            }
        
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
        $agenda = new agenda();
        $agenda -> set('fecha', $cita->get('fecha'));
        $agenda -> set('hora', $cita->get('hora'));
        $agenda -> set('empleado', $cita->get('empleado'));
        $this->orm->update_data("normal", $agenda);
        //$this->orm->close(); 
        
        ///////////////Extraer la información de la cita para obtener el código generado///////////////////////                        
        
        $option['cita']['lvl2'] = "one" ;     
        $cod['cita']['empleado'] = $cita->get('empleado');	        
        $cod['cita']['fecha'] = $cita->get('fecha');
        $cod['cita']['hora'] = $cita->get('hora');
        $this->orm->read_data(array("cita"), $option, $cod);        
        $cita2 = $this->orm->get_objects("cita");         
        
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
        
        //establecer la fecha en español
        setlocale(LC_TIME, 'es_ES.UTF-8');        
        $fecha = strftime("%A %d de %B de %Y", $cita2[0]->get('fecha')); //mktime(0, 0, 0, 12, 22, 1978)
        
        $this->type_warning = "success";
        $this->msg_warning = "La cita se gener&oacute exitosamente";
        $this->temp_aux = 'message.tpl';
        $this->engine->assign('cita',$cita2[0]);
        $this->engine->assign('empleado',$empleado[0]);
        $this->engine->assign('sucursal',$sucursal[0]);
        $this->engine->assign('bien_raiz',$bien_raiz2[0]);
        $this->engine->assign('fecha',$fecha);
        $this->engine->assign('type_warning',$this->type_warning);
        $this->engine->assign('type_warning',$this->type_warning);
        $this->engine->assign('msg_warning',$this->msg_warning);        
	$this->engine->assign('title',$this->gvar['caso_uso12']);
        
    }   

    public function display()
    {   
        $this->engine->display('header.tpl');
        $this->engine->display($this->temp_aux);
        $this->engine->display('info_cita.tpl');
        $this->engine->display('footer.tpl');

    }
    
    public function run()
    {
        

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


