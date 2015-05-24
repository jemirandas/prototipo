<?php
require('modules/m_phpass/PasswordHash.php');

/**
 * Project:     Framework G - G Light
 * File:        db.php
 * 
 * For questions, help, comments, discussion, etc., please join to the
 * website www.frameworkg.com
 * 
 * @link http://www.frameworkg.com/
 * @copyright 2013-02-07
 * @author Group Framework G  <info at frameworkg dot com>
 * @version 1.2
 */

class db
{
    var $server = C_DB_SERVER; //DB server
	var $user = C_DB_USER; //DB user
    var $pass = C_DB_PASS; //DB password
	var $db = C_DB_DATABASE_NAME; //DB database name
	var $limit = C_DB_LIMIT; //DB limit of elements by page
	var $cn;
	var $numpages;
	
	public function db(){}
	
	//connect to database
	public function connect()
	{
		$this->cn = mysqli_connect($this->server, $this->user, $this->pass);
		if(!$this->cn) {die("Failed connection to the database: ".mysqli_error($this->cn));}
		if(!mysqli_select_db($this->cn,$this->db)) {die("Unable to communicate with the database $db: ".mysqli_error($this->cn));}
		mysqli_query($this->cn,"SET NAMES utf8");
	}
	
	//function for doing multiple queries
	public function do_operation($operation, $class = NULL)
	{
		$result = mysqli_query($this->cn, $operation) ;
		if(!$result) {$this->throw_sql_exception($class);}	
	}
	
	//function for obtain data from db in object form
	private function get_data($operation)
	{		
		$data = array(); 
		$result = mysqli_query($this->cn, $operation) or die(mysqli_error($this->cn));
		while ($row = mysqli_fetch_object($result))
		{
			array_push($data, $row);
		}
		return $data;
	}
	
	//throw exception to web document
	private function throw_sql_exception($class)
    {
		$errno = mysqli_errno($this->cn); $error = mysqli_error($this->cn);
		$msg = $error."<br /><br /><b>Error number:</b> ".$errno;
        throw new Exception($msg);
    }
	
	//for avoid sql injections, this functions cleans the variables
	private function escape_string(&$data)
	{
		if(is_object($data))
		{
			foreach ($data->metadata() as $key => $attribute)
			{if(!is_empty($data->get($key))){$data->set($key,mysqli_real_escape_string($this->cn,$data->get($key)));}}
		}
		else if(is_array($data))
		{
			foreach ($data as $key => $value) 
			{if(!is_array($value)){$data[$key]=mysqli_real_escape_string($this->cn,$value);}}
		}
	}
	
	//function for add data to db
	public function insert($options,$object) 
	{
		switch($options['lvl1'])
		{																
			case "user":
			switch($options['lvl2'])
			{
				case "normal":
					//
					break;
			}
			break;
			
			case "empleado":
			
            switch($options['lvl2'])
            {
                    case "normal":                              
						$cedula = mysqli_real_escape_string($this->cn,$object->get('cedula'));
						$nombre = mysqli_real_escape_string($this->cn,$object->get('nombre'));
						$apellido = mysqli_real_escape_string($this->cn,$object->get('apellido'));
						$telefono = mysqli_real_escape_string($this->cn,$object->get('telefono'));
						$direccion = mysqli_real_escape_string($this->cn,$object->get('direccion'));                                
						$email = mysqli_real_escape_string($this->cn,$object->get('correo_electronico'));                                
						$sucursal = mysqli_real_escape_string($this->cn,$object->get('sucursal'));                                
						$user = mysqli_real_escape_string($this->cn,$object->get('nombre_de_usuario'));
						$password = mysqli_real_escape_string($this->cn,$object->get('password'));
						$hasher = new PasswordHash(8, false);
						$encriptada = $hasher->HashPassword($password);

						$this->do_operation("INSERT INTO persona (cedula, nombre, apellido, correo_electronico, direccion, telefono) VALUES ('$cedula', '$nombre', '$apellido',  '$email', '$direccion', '$telefono');");
						
						$this->do_operation("INSERT INTO empleado (cedula, nombre_de_usuario, password, sucursal) VALUES ('$cedula', '$user', '$encriptada', '$sucursal');");
												
						unset($hasher);		
                    break;
            }
            break;
			
			case "horario_de_atencion":			
            switch($options['lvl2'])
            {
                    case "normal":                              						
						$dia = mysqli_real_escape_string($this->cn,$object->get('dia'));
						$hora = mysqli_real_escape_string($this->cn,$object->get('hora'));
						$empleado = mysqli_real_escape_string($this->cn,$object->get('empleado'));
						
						$this->do_operation("INSERT INTO horario_de_atencion (dia, hora, empleado) VALUES ('$dia', '$hora', '$empleado');");						
						
                    break;
            }
            break;
			
			default: break;
			
			

		}
	}
	
	//function for edit data from db
	public function update($options,$object) 
	{
		switch($options['lvl1'])
		{																														
			case "user":
			switch($options['lvl2'])
			{
				case "normal":
					//
					break;
			}
			break;
			
			case "empleado":
			switch($options['lvl2'])
            {
                    case "normal":    
						$auxiliars = $object->get('auxiliars');
						$cedula_vieja = mysqli_real_escape_string($this->cn,$auxiliars['cedula_vieja']);
						$cedula = mysqli_real_escape_string($this->cn,$object->get('cedula'));
						$nombre = mysqli_real_escape_string($this->cn,$object->get('nombre'));
						$apellido = mysqli_real_escape_string($this->cn,$object->get('apellido'));
						$telefono = mysqli_real_escape_string($this->cn,$object->get('telefono'));
						$direccion = mysqli_real_escape_string($this->cn,$object->get('direccion'));                                
						$email = mysqli_real_escape_string($this->cn,$object->get('correo_electronico'));                                
						$sucursal = mysqli_real_escape_string($this->cn,$object->get('sucursal'));                                
						$user = mysqli_real_escape_string($this->cn,$object->get('nombre_de_usuario'));
						//$password = mysqli_real_escape_string($this->cn,$object->get('password'));
						//$hasher = new PasswordHash(8, false);
						//$encriptada = $hasher->HashPassword($password);

						$this->do_operation("UPDATE persona SET cedula='$cedula', nombre='$nombre', apellido='$apellido', correo_electronico='$email', direccion='$direccion', telefono='$telefono' WHERE cedula = '$cedula_vieja';");
						$this->do_operation("UPDATE empleado SET nombre_de_usuario='$user', sucursal='$sucursal' WHERE cedula = '$cedula';");
						
												
						//unset($hasher);		
                    break;
            }
			break;
			
			default: break;
		}
	}
	
	//function for delete data from db
	public function delete($options, $object)
	{
		switch($options['lvl1'])
		{
			case "horario_de_atencion":
				switch($options['lvl2'])
				{
					case "by_empleado":
						$cedula=mysqli_real_escape_string($this->cn,$object->get('empleado'));						
						$this->do_operation("DELETE FROM horario_de_atencion WHERE (empleado = '$cedula');");
					break;
					
					
				}
			break;
			
			
			
			case "empleado":                                                    
			switch($options['lvl2'])
			{
				case "all" :					
                     $info=$this->get_data("SELECT * FROM empleado;"); 
                     break;
					 
				case "normal" :	
								$cedula=mysqli_real_escape_string($this->cn,$object->get('cedula'));
								$this->do_operation("DELETE FROM horario_de_atencion WHERE (empleado = '$cedula');");
								$this->do_operation("DELETE FROM empleado WHERE(cedula='$cedula' );");
								$this->do_operation("DELETE FROM persona WHERE(cedula='$cedula' );");
								
                     break;
			}
			break;

			
			
			
			
			default: break;			  
		}
	}
	
	//function that returns an array with data from a operation

		public function select($option,$data)
	{
		$info = array();
		switch($option['lvl1'])
		{																												
			case "user":
			switch($option['lvl2'])
			{
				case "all": 
					//
				break;

				case "one_login":
					$hasher = new PasswordHash(8, false);
                    $user=mysqli_real_escape_string($this->cn,$data['user']);
                    $password=mysqli_real_escape_string($this->cn,$data['password']);
                    $result = $this->get_data("SELECT * FROM user WHERE user = '$user';");
					
					$stored_hash=$result[0]->password;
					if($hasher->CheckPassword($password, $stored_hash)){
					$info=$result;
					}
					unset($hasher);		
                break;
			}
			break;
			
			
			case "administrador":
			switch($option['lvl2'])
			{
				case "all": 
					//
				break;

				case "one_login":
					$hasher = new PasswordHash(8, false);
                    $nombre_de_usuario=mysqli_real_escape_string($this->cn,$data['nombre_de_usuario']);
                    $password=mysqli_real_escape_string($this->cn,$data['password']);					
                    $result = $this->get_data("SELECT * FROM administrador WHERE nombre_de_usuario = '$nombre_de_usuario';");
					$cedula=$result[0]->cedula;
					$result = $this->get_data("SELECT persona.*, administrador.nombre_de_usuario, administrador.password FROM persona INNER JOIN administrador ON (administrador.cedula=$cedula) AND (persona.cedula='$cedula');");
					
					$stored_hash=$result[0]->password;
					if($hasher->CheckPassword($password, $stored_hash)){
					$info=$result;
					}
					unset($hasher);		
                break;
				
				case "one2":	
						$cedula=mysqli_real_escape_string($this->cn,$data['cedula']);             
						$info=$this->get_data("SELECT persona.*, empleado.nombre_de_usuario, empleado.sucursal  FROM persona INNER JOIN empleado ON (empleado.cedula=$cedula) AND (persona.cedula='$cedula');");
						
                break;
			}
			break;

			
			
			
			case "sucursal":
			switch($option['lvl2'])
			{
				case "all": 
					$info = $this->get_data("SELECT * FROM sucursal;"); 
			     break;
			}
			break;
			
			case "horario_de_atencion":
			switch($option['lvl2'])
			{
				case "by_empleado":	
                        $empleado = mysqli_real_escape_string($this->cn,$data['empleado']);
                        $info = $this->get_data("SELECT * FROM horario_de_atencion WHERE empleado='$empleado';"); 
                break;
			}
			break;
                    
			case "empleado":
                switch($option['lvl2'])
                {
                    case "all" :
					
						$info=$this->get_data("SELECT DISTINCT persona.*, empleado.nombre_de_usuario, empleado.sucursal  FROM persona INNER JOIN empleado ON (empleado.cedula=persona.cedula);");
						
				    break;
					
					case "all2":							
						// $info=$this->get_data("SELECT cedula, nombre, apellido FROM persona ;");
						$info=$this->get_data("SELECT DISTINCT persona.cedula, nombre, apellido  FROM persona INNER JOIN empleado ON (empleado.cedula=persona.cedula);");
                    break;
            
					case "by_sucursal":	
                        $sucursal = mysqli_real_escape_string($this->cn,$data['sucursal']);
                        $info = $this->get_data("SELECT * FROM empleado WHERE sucursal='$sucursal';"); 
                    break;
                    
					case "one":	
						$cedula=mysqli_real_escape_string($this->cn,$data['cedula']);             
						$info=$this->get_data("SELECT * FROM empleado WHERE cedula='$cedula';"); 
                    break;
					
					case "one_login":
					$hasher = new PasswordHash(8, false);
                    $nombre_de_usuario=mysqli_real_escape_string($this->cn,$data['nombre_de_usuario']);
                    $password=mysqli_real_escape_string($this->cn,$data['password']);
                    $result = $this->get_data("SELECT * FROM empleado WHERE nombre_de_usuario = '$nombre_de_usuario';");
					
					$stored_hash=$result[0]->password;
					if($hasher->CheckPassword($password, $stored_hash)){
					$info=$result;
					}
					unset($hasher);		
					break;
				
					
					case "one2":	
						$cedula=mysqli_real_escape_string($this->cn,$data['cedula']);             
						$info=$this->get_data("SELECT persona.*, empleado.nombre_de_usuario, empleado.sucursal  FROM persona INNER JOIN empleado ON (empleado.cedula=$cedula) AND (persona.cedula='$cedula');");
						
                    break;
                }
            break;
			
			
			case "agenda":
			
				switch($option['lvl2'])
				{
					case "semana_actual":	         
							$sucursal = mysqli_real_escape_string($this->cn,$data['sucursal']);
							$info = $this->get_data("SELECT agenda.*, empleado.cedula, empleado.sucursal FROM agenda,empleado WHERE cedula = empleado and sucursal=$sucursal and disponibilidad = 1 and fecha > CURDATE() and 
							WEEKOFYEAR(fecha) = WEEKOFYEAR(CURDATE());"); 
					break;
					
					case "semana_siguiente":	         
							$sucursal = mysqli_real_escape_string($this->cn,$data['sucursal']);
							$info = $this->get_data("SELECT agenda.*, empleado.cedula, empleado.sucursal FROM agenda,empleado WHERE cedula = empleado and sucursal=$sucursal and disponibilidad = 1 and fecha > CURDATE() and 
							WEEKOFYEAR(fecha) = (WEEKOFYEAR(CURDATE())+1);"); 
					break;
				}
			break;
			
			case "semana_de_agenda":
			
				switch($option['lvl2'])
				{
					case "ultima":	         
							$info = $this->get_data("SELECT*
							FROM semana_de_agenda 
							WHERE id=(
							SELECT max(id) FROM semana_de_agenda
							);"); 
					break;				
					
				}
			break;
			
			

			
			default: break;


		}
		return $info;
	}
	
	//close the db connection
	public function close()
	{
		if($this->cn){mysqli_close($this->cn);}
	}
	
}

?>