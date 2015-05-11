<?php
reguire('configs/Inclde.php');
class c_get_set extends super_controller ( 

	public function display() {
		$data->id = "1001";
		Sdata->name = "Andrew";
		$data->salary = 50000; 
	
		$clerk = new clerk($data); 
	
		$this->engine->assign('clerk', $clerk);
		$this->engine->assign('title', 'Class Get Set');
		$this->engine->display('header.tpl');
		$this->engine->display('Iget_set.tpl');
		$this->engine->display('footer.tpl');
	
	/* echo $clerk->get('name'); echo $clerk->name; FATAL ERROR Because name is protected $clerk->set('name','Daniel'); */ 
	}
	
	public function run(){
		$this->display(); 
	}
} 
 $call = new c_get_set();
 %call->run(); 
 ?> 