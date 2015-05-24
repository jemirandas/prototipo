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
        
 		if(!is_empty($temp[0])){
			$this->type_warning = "advertencia";
			$this->engine->assign('form',$empleado);
            throw_exception( "La acción ha fallado porque ya  existe un empleado con esa cédula");
		}
				
        $this->orm->insert_data("normal", $empleado);
        $this->orm->close(); 
        
        $this->type_warning = "success";
        $this->msg_warning = "El empleado se creó exitosamente";
        
        $this->temp_aux = 'message.tpl';
        $this->engine->assign('type_warning',$this->type_warning);
        $this->engine->assign('msg_warning',$this->msg_warning);

    
	}
	
	public function es_dia_de_crear_agenda(){
	
	$this->orm->connect();
		$option['semana_de_agenda']['lvl2'] = "ultima" ;     
        $this->orm->read_data(array("semana_de_agenda"), $option);        
        $ultima_semana_array = $this->orm->get_objects("semana_de_agenda");
		$ultima_semana=$ultima_semana_array[0];
	    $this->orm->close();
		
		
		$hoy = getdate();			
		$año_actual=$hoy[year];
		$mes_actual=$hoy[mon];
		$dia_actual=$hoy[mday];		
		
		# Obtenemos el número de la semana
		$semana_actual=date("W",mktime(0,0,0,$mes_actual,$dia_actual,$año_actual));			 
		# Obtenemos el día de la semana de la fecha dada	
		$diaSemana_actual=date("w",mktime(0,0,0,$mes_actual,$dia_actual,$año_actual));
				 
		# A la fecha recibida, le restamos el dia de la semana y obtendremos el lunes
		$primer_dia_semana_actual=date("Y-m-d",mktime(0,0,0,$mes_actual,$dia_actual-$diaSemana_actual+1,$año_actual));			 
		# A la fecha recibida, le sumamos el dia de la semana menos siete y obtendremos el domingo
		$ultimo_dia_semana_actual=date("Y-m-d",mktime(0,0,0,$mes_actual,$dia_actual+(7-$diaSemana_actual),$año_actual));
		
		
		$datetime_ultima_semana = new DateTime($ultima_semana->get(fecha_fin));
		$datetime_hoy = new DateTime($año_actual.'-'.$mes_actual."-".$dia_actual);

		$diferencia = $datetime_hoy->diff($datetime_ultima_semana);
		$entero_diferencia=(int)$diferencia->format('%R%a');
		 
		if($entero_diferencia<7){
		
		
		return true;
		}
		else{
		return false;
		}
		
		
		
		
		
	}

	
	public function crear_agenda()
    {
	
		if(!$this->es_dia_de_crear_agenda()){}
	
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
				print_r2($agenda);
				$this->engine->assign('primerDia',$primerDia);			
				$this->engine->assign('primerDia2',$primerDia2);			
				$this->engine->assign('ultimoDia',$ultimoDia);			
				$this->engine->assign('ultimoDia2',$ultimoDia2);			
				$this->engine->assign('sucursal',$this->get->sucursal);
				$this->engine->assign('semana',$this->get->semana);
				$this->engine->assign('agenda',$agenda);
				
			$this->orm->connect();
			$option['horario_de_atencion']['lvl2'] = "all" ;     
			$this->orm->read_data(array("horario_de_atencion"), $option);        
			$horarios_atencion = $this->orm->get_objects("horario_de_atencion");
			print_r2($horarios_atencion);
						print_r2("sdsds");

			$this->orm->close();
		
			// foreach($horarios_atencion as $horario){
				// $agenda= new agenda();
				// $agenda->hora=$horario->hora;
				// print_r2($horario);
		
		
		
			// }
			
	}

    public function display()
    {
		
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


