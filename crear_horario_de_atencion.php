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
		$ultimo_dia_semana_actual=date("Y-m-d",mktime(0,0,0,$mes_actual,$dia_actual+(6-$diaSemana_actual),$año_actual));
		
		
		$datetime_ultima_semana = new DateTime($ultima_semana->get("fecha_fin"));
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
	
	
	
			$this->orm->connect();						
			$option['semana_de_agenda']['lvl2'] = "ultima" ;
			$this->orm->read_data(array("semana_de_agenda"), $option);
			$ultima_semana_array = $this->orm->get_objects("semana_de_agenda");
			$ultima_semana=$ultima_semana_array[0];
	
	
		//fechas para la semana actual
				$ultima_semana->get("fecha_fin");
				
				//$ultima_semana_fecha = date_format(new DateTime(date("Y-m-d", echo $ultima_semana->get("fecha_fin"))), 'Y-m-d');
				$ultima_semana_fecha = date("Y-m-d", strtotime($ultima_semana->get("fecha_fin")));
				
				$year=date("Y", strtotime($ultima_semana_fecha));  
				print_r2($year);
				$month=date("m", strtotime($ultima_semana_fecha));  
				
				print_r2($month);
				$day=date("d", strtotime($ultima_semana_fecha));  
				# Obtenemos el número de la semana
				$semana=date("W",mktime(0,0,0,$month,$day,$year));
				 
				# Obtenemos el día de la semana de la fecha dada
				$diaSemana=date("w",mktime(0,0,0,$month,$day,$year));				
				
				//semana siguiente
				$lunes_siguiente_semana=date_format(new DateTime(date("d-m-Y",mktime(0,0,0,$month,$day-$diaSemana+8,$year))), 'Y-m-d');
				$martes_siguiente_semana=date_format(new DateTime(date("d-m-Y",mktime(0,0,0,$month,$day-$diaSemana+9,$year))), 'Y-m-d');
				$miercoles_siguiente_semana=date_format(new DateTime(date("d-m-Y",mktime(0,0,0,$month,$day-$diaSemana+10,$year))), 'Y-m-d');
				$jueves_siguiente_semana=date_format(new DateTime(date("d-m-Y",mktime(0,0,0,$month,$day-$diaSemana+11,$year))), 'Y-m-d');
				$viernes_siguiente_semana=date_format(new DateTime(date("d-m-Y",mktime(0,0,0,$month,$day-$diaSemana+12,$year))), 'Y-m-d');
				$sabado_siguiente_semana=date_format(new DateTime(date("d-m-Y",mktime(0,0,0,$month,$day-$diaSemana+13,$year))), 'Y-m-d');
					
				
			$option['horario_de_atencion']['lvl2'] = "all" ;     
			$this->orm->read_data(array("horario_de_atencion"), $option);        
			$horarios_atencion = $this->orm->get_objects("horario_de_atencion");
			$semana_de_agenda= new semana_de_agenda();
			$semana_de_agenda->set("fecha_inicio", $lunes_siguiente_semana);
			$semana_de_agenda->set("fecha_fin", $sabado_siguiente_semana);
			$this->orm->insert_data("normal", $semana_de_agenda);
			unset($semana_de_agenda);
			
			$option['semana_de_agenda']['lvl2'] = "ultima" ;
			$this->orm->read_data(array("semana_de_agenda"), $option);
			$ultima_semana_array = $this->orm->get_objects("semana_de_agenda");
			$ultima_semana=$ultima_semana_array[0];
			$this->orm->close();

						
			if(!is_empty($horarios_atencion)){
			
				foreach($horarios_atencion as $horario){
					$agenda= new agenda();
					$agenda->set("hora",$horario->get("hora"));
					$agenda->set("semana_de_agenda",$ultima_semana->get("id"));
					$agenda->set("disponibilidad",true);
					$agenda->set("empleado",$horario->get("empleado"));
					$inicial=$horario->get("dia");
					
					
					if(strcmp((string)$inicial,'\'L\'')==0){
						$dia= "Lunes";
						$agenda->set("fecha",$lunes_siguiente_semana);
						$agenda->set("dia",$dia);		
					}
					
					if(strcmp($inicial, '\'M\'')==0){
						$dia= "Martes";
						$agenda->set("fecha",$martes_siguiente_semana);
						$agenda->set("dia",$dia);
					}
					
					if(strcmp($inicial, '\'C\'')==0){
						$dia= "Miércoles";
						$agenda->set("fecha",$miercoles_siguiente_semana);		
						$agenda->set("dia",$dia);		
					}
					if(strcmp($inicial, '\'J\'')==0){
						$dia= "Jueves";
						$agenda->set("fecha",$jueves_siguiente_semana);		
						$agenda->set("dia",$dia);

					}			
					if(strcmp($inicial, '\'V\'')==0){
						$dia= "Viernes";
						$agenda->set("fecha",$viernes_siguiente_semana);		
						$agenda->set("dia",$dia);

					}
					if(strcmp($inicial, '\'S\'')==0){
						$dia= "Sábado";
						$agenda->set("fecha",$sabado_siguiente_semana);		
						$agenda->set("dia",$dia);

		
					}
					
		
					
					//$this->orm->insert_data("normal", $agenda);
					//$this->orm->insert_data("normal", $agenda);

					 print_r2($agenda);
		// print_r2($horario->get("dia"));
				$this->orm->connect();						
				$this->orm->insert_data("normal", $agenda);

				$this->orm->close();
		
				}

			}
			
	}
	public function inicial_a_dia($inicial)
    {

		if(strcmp((string)$inicial,'\'L\'')==0){
			$dia= "Lunes";

		
		
		}
		if(strcmp($inicial, '\'M\'')==0){
			$dia= "Martes";
		
		
		}
		if(strcmp($inicial, '\'C\'')==0){
			$dia= "Miércoles";
		
		
		}
		if(strcmp($inicial, '\'J\'')==0){
			$dia= "Jueves";
		
		
		}
		if(strcmp($inicial, '\'V\'')==0){
			$dia= "Viernes";
		
		
		}
		if(strcmp($inicial, '\'S\'')==0){
			$dia= "Sábado";
		
		
		}
		return $dia;
		
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


