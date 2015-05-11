<?php
require('configs/include.php');


class c_index extends super_controller {

	protected $temp;
	protected $user;


	public function login() {
	
	
		 // $hasher = new PasswordHash(8, false);
		 // $contraseña = '12345';
		 // $encriptada = $hasher->HashPassword($contraseña);
		// print_r2($encriptada);
		if(is_empty($this->post->nombre_de_usuario)){
			throw_exception($this->gvar['m_user_empty']);
		}
		else if(is_empty($this->post->password)) {
			throw_exception($this->gvar['m_password_empty']);
		}


		
		
		if(strcmp($this->post->tipo_de_usuario,"administrador")==0){
		
		
		$usuario=new administrador($this->post);
		$cod['administrador']['password']=$this->post->password;
		$cod['administrador']['nombre_de_usuario']=$this->post->nombre_de_usuario;				
		$options['administrador']['lvl2']="one_login";
		
		$this->orm->connect();

		$this->orm->read_data(array("administrador"),$options,$cod);
		$this->usuario = $this->orm->get_objects("administrador");
		$this->orm->close();		
		
		if (is_empty($this->usuario[0])){
			throw_exception($this->gvar['m_incorrect_login']);
		}
		else {
			$_SESSION['usuario']['nombre']=$this->usuario[0]->get('nombre');
			$_SESSION['usuario']['cedula']=$this->usuario[0]->get('cedula');
			$_SESSION['usuario']['type']="administrador";
			$this->session=$_SESSION;
		    $this->engine->assign('type_warning','success');
			$this->engine->assign('msg_warning',$this->gvar['m_correct_login']);
			$this->temp_aux = 'message.tpl';
			}
		
		}
		if(strcmp($this->post->tipo_de_usuario,"empleado")==0){
		
		
		$usuario=new empleado($this->post);
		$cod['empleado']['password']=$this->post->password;
		$cod['empleado']['nombre_de_usuario']=$this->post->nombre_de_usuario;				
		$options['empleado']['lvl2']="one_login";
		
		$this->orm->connect();

		$this->orm->read_data(array("empleado"),$options,$cod);
		$this->usuario = $this->orm->get_objects("empleado");
		
		$this->orm->close();		
		
		if (is_empty($this->usuario[0])){
			throw_exception($this->gvar['m_incorrect_login']);
		}
		else {
			$_SESSION['usuario']['nombre_de_usuario']=$this->usuario[0]->get('nombre_de_usuario');
			$_SESSION['usuario']['cedula']=$this->usuario[0]->get('cedula');
			$_SESSION['usuario']['type']="empleado";
			$this->session=$_SESSION;
			
		    $this->engine->assign('type_warning','success');
			$this->engine->assign('msg_warning',$this->gvar['m_correct_login']);
			$this->temp_aux = 'message.tpl';
			}
		
		}
		unset($this->usuario);

		



	}

	public function logout() {
		session_destroy();
		unset($this->session);
		unset($_SESSION);
		
		$this->engine->assign('type_warning','success');
		$this->engine->assign('msg_warning',$this->gvar['m_correct_logout']);
		$this->temp_aux = 'message.tpl';	
		$this->temp='empty.tpl';		
	}
	

		public function display()
	   {
		   
		if($this->session['usuario']['type']=='empleado') {
			$this->temp='inicioEmpleado.tpl';
		}
		
		else if ($this->session['usuario']['type']=='administrador'){
			$this->temp='inicioAdministrador.tpl';
		}
		else{
			$this->temp='index.tpl';

		}
		
		$this->engine->assign('title','Inicio de Empleado');
		$this->engine->display('header.tpl');
		$this->engine->display($this->temp_aux);		
		$this->engine->display($this->temp);
		//$this->engine->display('index.tpl');
		$this->engine->display('footer.tpl');
		
	}
	
		public function run() {
		try{
			if (isset($this->get->option)){
				$this->{$this->get->option}();
			}
			if (strcmp($_SESSION[nuestro_techo][mensaje][estado],"zona_restringida")==0){
				unset ($_SESSION[nuestro_techo][mensaje][estado]);
				throw_exception($this->gvar['zona_restringida']);
				}
		}
		catch (Exception $e){
			$this->error=1; $this->msg_warning=$e->getMessage(); $this->temp_aux = 'message.tpl';
		    $this->engine->assign('type_warning',$this->type_warning); $this->engine->assign('msg_warning',$this->msg_warning);}
		    $this->display();
	}
}

$call = new c_index();
$call->run();

?>