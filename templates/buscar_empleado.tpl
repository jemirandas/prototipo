 {literal}
  <script>
  $(function() {
        var availableTags= [];
        var nombre;
        
        {/literal}{section loop=$empleado name=i}{literal}
             nombre = {/literal}"{$empleado[i]->get('nombre')}"{literal}.concat(" ");    
             availableTags.push(nombre.concat({/literal}"{$empleado[i]->get('apellido')}"{literal})+" "+{/literal}"{$empleado[i]->get('cedula')}"{literal});
        {/literal}{/section}{literal}
        
    $( "#busqueda" ).autocomplete({
      source: availableTags
    });
  });
  
  </script>   
 {/literal}
 
 
 
 
 {literal}
<script> 
  function modificar(divName){
	  
    var porNombre = document.getElementById("busqueda").value;
	
	
	{/literal}{section loop=$empleado name=i}{literal}
	var nombre={/literal}"{$empleado[i]->get('nombre')}"{literal};
	var apellido={/literal}"{$empleado[i]->get('apellido')}"{literal};
	var cedula={/literal}"{$empleado[i]->get('cedula')}"{literal};
	
if (porNombre == nombre+" "+apellido+" "+cedula){


		
var pagina={/literal}"{$gvar.l_global}"{literal}+"modificar_empleado.php?option=mostrar&cedula="+{/literal}"{$empleado[i]->get('cedula')}"{literal};

		location.href=pagina;


		}

		
      
    {/literal}{/section}{literal} 
	document.getElementById("busqueda").value="";
        
  }       
  </script>
    {/literal}



	   <h3><div class="panel-heading" align="center">Buscar Empleados</div></h3>
	   <div class="ui-widget" align="center">
          <input name="busqueda" id="busqueda" type="text" size="30" maxlength="30"/> 
          <input class="btn btn-primary" type="button" value="modificar" onclick="modificar('dynamicInput');"/>
      </div>    

	  


	<input class="btn btn-primary" type="button" value="Regresar" onclick="location.href='inicioAdministrador.php'">	
	
</body>