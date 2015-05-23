<?php
require('configs/include.php');

class pedir_cita extends super_controller{
	
	public function registrar(){
		if (isset($this->get->seleccion)){
			
			$seleccion = $this->get->seleccion;
			$fecha = explode(":", $seleccion);
			echo "Usted seleccionó: día=$fecha[0], hora=$fecha[1], semana=".$this->get->semana;
			$this->engine->display('header.tpl');
			$this->engine->display($this->temp_aux);
			$this->engine->display('conciliar_cita.tpl');						
		}
	}
	
	public function horario(){			
			
			if (isset($this->get->semana) && isset($this->get->sucursal)){
				
				$this->orm->connect();
				$suc['agenda']['sucursal'] = $this->get->sucursal;
				
                if($this->get->semana=='actual'){
					
					$options['agenda']['lvl2']="semana_actual";					
					$this->orm->read_data(array("agenda"), $options, $suc);
					$agenda = $this->orm->get_objects("agenda");					
				}else{
					
					$options['agenda']['lvl2']="semana_siguiente";					
					$this->orm->read_data(array("agenda"), $options, $suc);
					$agenda = $this->orm->get_objects("agenda");					
				}

				$this->orm->close();							
				$hoy = getdate();			
				$year=$hoy[year];
				$month=$hoy[mon];
				$day=$hoy[mday];
				 
				# Obtenemos el número de la semana
				$semana=date("W",mktime(0,0,0,$month,$day,$year));
				 
				# Obtenemos el día de la semana de la fecha dada
				$diaSemana=date("w",mktime(0,0,0,$month,$day,$year));
				 
				# A la fecha recibida, le restamos el dia de la semana y obtendremos el lunes
				$primerDia=date("d-m-Y",mktime(0,0,0,$month,$day-$diaSemana+1,$year));			 
				$primerDia2=date("d-m-Y",mktime(0,0,0,$month,$day-$diaSemana+1+7,$year));			 
				# A la fecha recibida, le sumamos el dia de la semana menos siete y obtendremos el domingo
				$ultimoDia=date("d-m-Y",mktime(0,0,0,$month,$day+(7-$diaSemana),$year));
				$ultimoDia2=date("d-m-Y",mktime(0,0,0,$month,$day+(7-$diaSemana)+7,$year));
				//print_r2($agenda);
				$this->engine->assign('primerDia',$primerDia);			
				$this->engine->assign('primerDia2',$primerDia2);			
				$this->engine->assign('ultimoDia',$ultimoDia);			
				$this->engine->assign('ultimoDia2',$ultimoDia2);			
				$this->engine->assign('sucursal',$this->get->sucursal);
				$this->engine->assign('semana',$this->get->semana);
				$this->engine->assign('agenda',$agenda);							
				
				
				
            }else{
				$this->engine->display('header.tpl');
				$this->engine->display($this->temp_aux);														
				$this->engine->assign('title','Pedir Cita');
				$this->engine->display('pedir_cita.tpl');										
				$this->type_warning = "mensaje";
     		    throw_exception("Error");
			}					
				
			$this->engine->assign('title','Pedir Cita');			
			$this->engine->display('header.tpl');				
			$this->engine->display('pedir_cita.tpl');										
	}	
	
	public function display(){
		
		//$this->engine->display($this->gvar['template_caso_uso6']);
		$this->engine->display('footer.tpl');
						
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

$call=new pedir_cita();
$call->run();
?>
