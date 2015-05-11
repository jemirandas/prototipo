	<?php
		require('configs/include.php');
		
		class c_inicioadministrador extends super_controller {
		public function display()
		{		

		}
		
		
    public function run()
    {
		if ($_SESSION['usuario']['type']=='administrador'){
			header('Location: index.php');
		}
		else{
			$_SESSION[nuestro_techo][mensaje][estado]="zona_restringida";
			header('Location: index.php');
		}	
        $this->display();
    }
}
		$call = new c_inicioadministrador();
		$call->run();