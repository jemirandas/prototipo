<?php

require('configs/include.php');

class c_cancelar_cita extends super_controller {
	
	public function display()
	{
		$this->engine->assign('title',$this->gvar['n_cancelar_cita']);
		$this->engine->assign('sucursal',$this->get->sucursal);
		$this->engine->display('header2.tpl');
		$this->engine->display($this->temp_aux);
		
		$this->engine->display('cancelar_cita.tpl');
		$this->engine->display('footer.tpl');
	}
	
	public function cancelar()
	{
				
		$option['cita']['lvl2']="one_2";
		$cod['cita']['cliente'] = $this->post->cliente;
		$cod['cita']['codigo'] = $this->post->codigo;
		
		
		$this->orm->connect();
		$this->orm->read_data(array("cita"), $option, $cod);
		$citas=$this->orm->get_objects("cita");
		
		$this->orm->close();
		
		if(is_empty($citas[0])){
			throw_exception("Codigo o cedula invalidos");
		}
		
		$this->orm->connect();
		$this->orm->delete_data("normal", $citas[0]);
		$this->orm->close();
		
		$agenda = new agenda();
		$agenda->set('fecha', $citas[0]->get('fecha'));
		$agenda->set('hora', $citas[0]->get('hora'));
		$agenda->set('empleado', $citas[0]->get('empleado'));
		$this->orm->connect();
		$this->orm->update_data("cancelar", $agenda);
		$this->orm->close();
		
		$this->type_warning = "success";
		$this->msg_warning = "La cita se cancelo exitosamente";
		
		$this->temp_aux = 'message.tpl';
		$this->engine->assign('type_warning',$this->type_warning);
		$this->engine->assign('msg_warning',$this->msg_warning);
	}
	public function run()
	{
		try {
			if (isset($this->get->option)){$this->{$this->get->option}();}
		}catch (Exception $e) 	{
			
				$this->error=1; $this->msg_warning=$e->getMessage();
				$this->engine->assign('type_warning',$this->type_warning);
				$this->engine->assign('msg_warning',$this->msg_warning);
				$this->temp_aux = 'message.tpl';
			}    
	        $this->display();
	}
	
}

$call = new c_cancelar_cita();
$call->run();

?>