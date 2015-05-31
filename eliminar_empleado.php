<?php

require('configs/include.php');

class c_eliminar_empleado extends super_controller {
    
    public function del()
    {             
        if(!is_empty($_POST['empleados_a_eliminar'])){
		foreach($_POST['empleados_a_eliminar'] as $empleados_a_eliminar){
                    $empleado = new empleado();
                    $empleado->set('cedula', $empleados_a_eliminar);
                    if(is_empty($empleado->get('cedula')))
                    {throw_exception("La cédula no existe");}

                    $this->orm->connect();
                    $this->orm->delete_data("normal",$empleado);
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
		if ($_SESSION['usuario']['type']=='administrador'){

			$options['empleado']['lvl2']="all";
			$this->orm->connect();
			$this->orm->read_data(array("empleado"), $options);
			$empleado=$this->orm->get_objects("empleado");
			$this->orm->close();
                        $nroEmpleados=  count($empleado); 
                        
                        $this->engine->assign('nroEmpleados',$nroEmpleados);
			$this->engine->assign('empleado',$empleado);
                        
                        $this->engine->assign('title',"Eliminar Empleado");
			$this->engine->display('header.tpl');
			$this->engine->display($this->temp_aux);
			$this->engine->display('eliminar_empleado.tpl');
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

$call = new c_eliminar_empleado();
$call->run();

?>
