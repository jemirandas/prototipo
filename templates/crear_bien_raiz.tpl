 <!--bloque de funciones no usadas agregan checkboxes a un div de forma automatica-->
 {literal}
 <script> 



var counterCheckBox = 0;
function agregar_uploader(divName){
	 var newdiv = document.createElement('div');
 
	 
				var contenido='uploadedfile'+counterCheckBox;
               newdiv.innerHTML = "<input name="+contenido+"  type='file' />";

			   
               counterCheckBox++;

          


			newdiv.className  = "Linea_formulario";		  

		  
		  
     document.getElementById(divName).appendChild(newdiv);
}
  </script>
    {/literal}






<form name="crear_bien_raiz" action="{$gvar.l_global}crear_bien_raiz.php?option=add" method="post" enctype="multipart/form-data">
		
		
    <div class="Bloque_formulario" align="center" id=formulario>

		<div class="Encabezado_formulario">Crear Bien raiz</div>
		
		<div class="Linea_formulario">        
				<div class="Celda_formulario1">Ingrese numero de escritura:<font color="red">*</font></div>
				<div class="Celda_formulario2"> <input required type="text" name="numero_escritura" {if $form ne null} value="{$form->get('numero_escritura')}" {/if} /></div>
		</div>

		<div class="Linea_formulario" >

		<div class="Celda_formulario1" >Ingrese el precio de venta:<font color="red">*</font></div>
			<div class="Celda_formulario2"><input required type="number" name="precio_venta" {if $form ne null} value="{$form->get('precio_venta')}" {/if} /></div>
			
		</div>
		

			

		<div  class="Linea_formulario">
			<div  class="Celda_formulario1" >Ingrese el precio de alquiler:<font color="red">*</font> </div>
			<div class="Celda_formulario2"><input required type="number" name="precio_alquiler" {if $form ne null} value="{$form->get('precio_alquiler')}" {/if} /></div>
		</div>			
		<div  class="Linea_formulario">
			<div  class="Celda_formulario1" >Ingrese el numero de habitaciones:<font color="red">*</font> </div>
			<div class="Celda_formulario2">
				<select name="numero_habitaciones">

				{for $foo=1 to 5}
						<option value=$foo {if $form ne null and ($form->get('numero_habitaciones') == $foo) } selected {/if} >
							{$foo}
			
						</option>
				
				{/for}
				</select>
			
			</div>
		</div>

		<div  class="Linea_formulario">
			<div  class="Celda_formulario1" >Ingrese el numero de baños:<font color="red">*</font> </div>
			<div class="Celda_formulario2">
			
				<select name="numero_baños">

				{for $foo=1 to 4}
						<option value=$foo {if $form ne null and ($form->get('numero_baños') == $foo) } selected {/if} >
							{$foo}
			
						</option>
				
				{/for}
				</select>
			
			</div>
		</div>
		<div   class="Linea_formulario" >
			<div class="Celda_formulario1">Ingrese el area:<font color="red">*</font> </div>
			<div class="Celda_formulario2"><input required type="number" name="area" {if $form ne null} value="{$form->get('area')}" {/if} /></div>
		</div>
				
				
				
				
		<div  class="Linea_formulario">
			<div class="Celda_formulario1" > Ingrese la direccion:<font color="red">*</font> </div>
			<div class="Celda_formulario2"><input required type="text" name="direccion" {if $form ne null} value="{$form->get('direccion')}" {/if} /></div>
			
		</div>
		
		<div  class="Linea_formulario">
			<div  class="Celda_formulario1" >Ingrese observaciones:<font color="red">*</font> </div>
			<div class="Celda_formulario2"><textarea required  name="observaciones">{if $form ne null}{$form->get('observaciones')}{/if}</textarea></div>
		</div>
		

		<div  class="Linea_formulario">
			<div  class="Celda_formulario1" >¿El bien raiz tiene balcon?</div>
			 <div class="Celda_formulario2">
				<select name="balcon">
					<option value="no">No</option>
					<option value="si">Si</option>			  
				</select> 
			</div> 			
		</div> 

		<div class="Linea_formulario"> 
						
				<div class="Celda_formulario1" ><b>Seleccione la sucursal:<font color="red">*</b></div>
				<div  class="Celda_formulario2"> 
				<select name="sucursal">
					<option selected> </option>
					{section loop=$sucursal name=i}
						<option value="{$sucursal[i]->get('ID')}" {if $form ne null and ($form->get('sucursal') == $sucursal[i]->get('ID')) } selected {/if} >
							{$sucursal[i]->get('ciudad')}
						</option>
					{/section}			
				</select>
				</div>
			
		</div>	

		<div class="Linea_formulario" > 
			<div class="Celda_formulario1" ><input name="uploadedfile" type="file" /></div>
			<div class="Celda_formulario2" ><input name="agregar" type="button" value=agregar onclick="agregar_uploader('formulario')"/></div>

		</div>
	




		
				

		
	</div>
	
</form>
		<div colspan="2">
			<input class="btn btn-primary" type="submit" value="Crear" />
			<input class="btn btn-primary" type="button" value="Regresar" onclick="regresarCrear()">	

		</div>

			<script>
function regresarCrear(){

var nombre=document.getElementsByTagName("nombre");
var bandera=false;



    if(nombre!=""){
        var r=confirm("Esta seguro que desea salir");
        if(r==true){
            location.href="inicioAdministrador.php";
        }
        else{
           bandera=true;
        }
    }


if(bandera==false){
location.href="inicioAdministrador.php";
}
}
			</script>
