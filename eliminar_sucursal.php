<?php

require('configs/include.php');

class c_eliminar_sucursal extends super_controller {
    
    public function del()
    {
        $seleccion=$_POST['sucursal_a_eliminar'];        
        
        foreach($_POST['sucursal_a_eliminar'] as $sucursal_a_eliminar){
            
            $sucursal = new sucursal();
            $sucursal->set('ID', $sucursal_a_eliminar);
            
            if(is_empty($sucursal->get('ID'))){
                throw_exception("El ID está vacío");
            }
			
            $this->orm->connect();
            $option['sucursal']['lvl2'] = "one" ;     
            $cod['sucursal']['ID'] = $sucursal->get('ID');	
            $this->orm->read_data(array("sucursal"), $option, $cod);        
            $temp = $this->orm->get_objects("sucursal");         
            $this->orm->close();        	

            if(is_empty($temp[0])){

                $this->type_warning = "advertencia";
                throw_exception( "Se ha ingresado una ID no válida");
            }
		
            $this->orm->connect();
            $this->orm->delete_data("normal", $sucursal);
            $this->orm->close();
        
        };
        
        $this->type_warning = "success";
        $this->msg_warning = "Borrado exitoso";
        
        $this->temp_aux = 'message.tpl';
        $this->engine->assign('type_warning',$this->type_warning);
        $this->engine->assign('msg_warning',$this->msg_warning);
    }

    public function display()
    {
        $options['sucursal']['lvl2']="all";
        $this->orm->connect();
        $this->orm->read_data(array("sucursal"), $options);
        $sucursal = $this->orm->get_objects("sucursal");
        $this->orm->close();
    
        $this->engine->assign('sucursal',$sucursal);
        
        $this->engine->display('header.tpl');
        $this->engine->display($this->temp_aux);
        $this->engine->display('eliminar_sucursal.tpl');
        $this->engine->display('footer.tpl');
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

$call = new c_eliminar_sucursal();
$call->run();

?>
