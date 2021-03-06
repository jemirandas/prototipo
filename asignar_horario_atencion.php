<?php
require('configs/include.php');

class c_asignar_horario_atencion extends super_controller{
	
	public function lista(){
		
		$options['empleado']['lvl2']="all2";
		$this->orm->connect();
		$this->orm->read_data(array("empleado"), $options);
		$empleado=$this->orm->get_objects("empleado");
		$this->orm->close();
		
		$this->engine->assign('empleado',$empleado);
		$this->engine->assign('title','Lista de Empleados');
	}
	
	public function horario(){
		$cedula = $this->get->cedula;		
		$horario = new horario_de_atencion();        
		
		if(isset($_POST['H'])){
			$horario->set('empleado', $cedula);
			if(is_empty($horario->get('empleado')))
            {
				throw_exception("La cédula no existe");
			}
			//print_r2($horario);
			$this->orm->connect();
            $this->orm->delete_data("by_empleado",$horario);            
			$horario2 = new horario_de_atencion();							
			$horario2->set('empleado', $cedula);
			 
			foreach($_POST['H'] as $d=>$h) {
				foreach($h as $hr) {
					//echo "Indice: ",$d,"  Hora: ",$hr,"<br>";   					
					$horario2->set('dia', $d);
					$horario2->set('hora', $hr);
					$this->orm->insert_data("normal", $horario2);
				}
			}	
			
			$this->orm->close();          	
		

			$this->type_warning = "success";
			$this->msg_warning = "El horario fue asignado con éxito";
			
			$this->engine->assign('type_warning',$this->type_warning);
			$this->engine->assign('msg_warning',$this->msg_warning);
			$this->temp_aux = 'message.tpl';
		}
		
		$this->orm->connect();
		$option['horario_de_atencion']['lvl2'] = "by_empleado";     
		$cod['horario_de_atencion']['empleado'] = $cedula;	
        $this->orm->read_data(array("horario_de_atencion"), $option, $cod);        
        $horario = $this->orm->get_objects("horario_de_atencion");         
		$this->orm->close();		
		$this->engine->assign('horario',$horario);
		$this->engine->assign('cedula',$cedula);
		$this->engine->assign('title','Asignar Horario');		
		
		//print_r2($horario);
	}
	
	public function asignar(){
		$cedula = $this->post->cedula;		
		$horario = new horario_de_atencion();
		
		//foreach($_POST['L'] as $lunes){
			//print_r2( $lunes);
		//}		
		
        $this->orm->connect();
		$option['horario_de_atencion']['lvl2'] = "by_empleado";     
		$cod['horario_de_atencion']['empleado'] = $cedula;	
        $this->orm->read_data(array("horario_de_atencion"), $option, $cod);        
        $horario = $this->orm->get_objects("horario_de_atencion");         
		$this->orm->close();		
		print_r2($horario);
		$this->engine->assign('horario',$horario);
		$this->engine->assign('title','Asignar ');
		
	}
	
	
	public function display(){
	
		if ($_SESSION['usuario']['type']=='administrador'){			
		$this->engine->display('header.tpl');
		$this->engine->display($this->temp_aux);
		$this->engine->display('asignar_horario_atencion.tpl');
		$this->engine->display('footer.tpl');
		}
		else{
			$_SESSION[nuestro_techo][mensaje][estado]="zona_restringida";
			header('Location: index.php');
		}	
	}

	public function run(){		
		 
		try {
			
            if (isset($this->get->option)){
                $this->{$this->get->option}();
				
            }
        }catch (Exception $e){
			$this->error=1; 
			$this->msg_warning=$e->getMessage();
			$this->engine->assign('type_warning',$this->type_warning);			
			$this->engine->assign('msg_warning',$this->msg_warning);
			$this->temp_aux = 'message.tpl';			  
		}
		$this->display();	
	}
}

$call=new c_asignar_horario_atencion();
$call->run();
?>
