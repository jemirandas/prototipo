<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require('configs/include.php');

class c_insert_sucursal extends super_controller {
    
    public function add()
    {
        $sucursal = new sucursal($this->post);

	if(is_empty($sucursal->get('ciudad'))){
			
            $this->engine->assign('form',$sucursal);
            throw_exception("Debe ingresar una ciudad");
			
	}else if(is_empty($sucursal->get('telefono'))){
			
            $this->engine->assign('form',$sucursal);
            throw_exception("Debe ingresar un tel&eacutefono");
			
	}else if(is_empty($sucursal->get('direccion'))){
			
            $this->engine->assign('form',$sucursal);
            throw_exception("Debe ingresar una direcci&oacuten");			
			
        }                
                				
        $this->orm->connect();
        $this->orm->insert_data("normal", $sucursal);
        $this->orm->close(); 
        
        $this->type_warning = "success";
        $this->msg_warning = "La sucursal se creó exitosamente";
        
        $this->temp_aux = 'message.tpl';
        $this->engine->assign('type_warning',$this->type_warning);
        $this->engine->assign('msg_warning',$this->msg_warning);

    
	}   
        
        function quitar_tildes($cadena) {
            $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
            $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
            $texto = str_replace($no_permitidas, $permitidas ,$cadena);
            return $texto;
        }

    public function display()
    {
		if ($_SESSION['usuario']['type']=='administrador'){
						
			
			//print_r2($tempo);
			
			$this->engine->assign('sucursal',$tempo);
			$this->engine->display('header.tpl');
			$this->engine->display($this->temp_aux);
			$this->engine->display('crear_sucursal.tpl');
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

$call = new c_insert_sucursal();
$call->run();


