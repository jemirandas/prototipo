<?php
require('configs/include.php');
class c_display extends super_controller{
	public function display(){
		$this->engine->display('display.tpl');		
	} 
	
	public function run(){
		$this->display();
	}
}
$call = new c_display();
$call->run();	
?>