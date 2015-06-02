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
		print_r2($this->post);
		print_r2($_FILES);

        $bien_raiz = new bien_raiz($this->post);

		if(is_empty($bien_raiz->get('numero_escritura'))){
			
			$this->engine->assign('form',$bien_raiz);
            throw_exception("Debe ingresar un numero_escritura");
			
		}else if(is_empty($bien_raiz->get('precio_venta'))){
			
			$this->engine->assign('form',$bien_raiz);
            throw_exception("Debe ingresar un precio_venta");
			
		}else if(is_empty($bien_raiz->get('precio_alquiler'))){
			
			$this->engine->assign('form',$bien_raiz);
            throw_exception("Debe ingresar un precio_alquiler");
			
			
        }
		else if(is_empty($bien_raiz->get('direccion'))){
			
			$this->engine->assign('form',$bien_raiz);
            throw_exception("Debe ingresar una direccion");
			
		}else if(is_empty($bien_raiz->get('numero_habitaciones'))){
			
			$this->engine->assign('form',$bien_raiz);
            throw_exception("Debe ingresar un numero_habitaciones");
			
		}else if(is_empty($bien_raiz->get('numero_banos'))){
			
			$this->engine->assign('form',$bien_raiz);
            throw_exception("Debe ingresar un numero_banos");
			
		}else if(is_empty($bien_raiz->get('balcon'))){
			
			$this->engine->assign('form',$bien_raiz);
            throw_exception("Debe si tiene balcon");
			
		}else if(is_empty($bien_raiz->get('sucursal'))){
			
			$this->engine->assign('form',$bien_raiz);
            throw_exception("Debe elegir una sucursal");
			
		}else if(!is_numeric($bien_raiz->get('precio_venta'))){
				$this->engine->assign('form',$bien_raiz);
	            throw_exception("Debe ingresar una precio_venta numerico");

		}
		
        $this->orm->connect();
		$option['bien_raiz']['lvl2'] = "one" ;     
		$cod['bien_raiz']['numero_escritura'] = $bien_raiz->get('numero_escritura');	
        $this->orm->read_data(array("bien_raiz"), $option, $cod);        
        $temp = $this->orm->get_objects("bien_raiz");         
        
 		if(!is_empty($temp[0])){
			$this->type_warning = "advertencia";
			$this->engine->assign('form',$bien_raiz);
            throw_exception( "La acción ha fallado porque ya  existe un bien_raiz con este numero_escritura");
		}
				
        $this->orm->insert_data("normal", $bien_raiz);
        $this->orm->close(); 
        
        $this->type_warning = "success";
        $this->msg_warning = "El bien_raiz se creó exitosamente";
        
        $this->temp_aux = 'message.tpl';
        $this->engine->assign('type_warning',$this->type_warning);
        $this->engine->assign('msg_warning',$this->msg_warning);
		
		
	
		$uploadedfileload="true";
		$uploadedfile_size=$_FILES['uploadedfile'][size];
		echo $_FILES[uploadedfile][name];
		if ($_FILES[uploadedfile][size]>2000000000)
		{$msg=$msg."El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo<BR>";
		$uploadedfileload="false";}

		// if (!($_FILES[uploadedfile][type] =="image/pjpeg" OR $_FILES[uploadedfile][type] =="image/gif"))
		// {$msg=$msg." Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
		// $uploadedfileload="false";}

		$file_name=$_FILES[uploadedfile][name];
		$add="bienes_raices/$file_name";

		if($uploadedfileload=="true"){

		if(move_uploaded_file ($_FILES[uploadedfile][tmp_name], $add)){
		
		$imagen=new imagen();
		$imagen->set('ruta',$add);
		$imagen->set('bien_raiz',$bien_raiz->get('numero_escritura'));
		print_r2($imagen);
		

		
		$this->orm->connect();
		
        $this->orm->insert_data("normal", $imagen);
		$this->orm->close();
		
		
		
		
		echo " Ha sido subido satisfactoriamente";
		}else{echo "Error al subir el archivo";}

		}else{echo $msg;}
		
		
		
		

    
	}   

    public function display()
    {
		if ($_SESSION['usuario']['type']=='administrador'){
			
			$this->orm->connect();
			$option['sucursal']['lvl2'] = "all" ;     		
			$this->orm->read_data(array("sucursal"), $option);        
			$tempo = $this->orm->get_objects("sucursal");        
			$this->orm->close();
			
			//print_r2($tempo);
			
			$this->engine->assign('sucursal',$tempo);
			$this->engine->display('header.tpl');
			$this->engine->display($this->temp_aux);
			$this->engine->display($this->gvar['caso_uso1']['template']);
			$this->engine->assign('title',$this->gvar['caso_uso1']['nombre']);

			$this->engine->display('footer.tpl');
		}
		else{
			$_SESSION[nuestro_techo][mensaje][estado]="zona_restringida";
			header('Location: index.php');
		}	
		

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

$call = new c_insert();
$call->run();


