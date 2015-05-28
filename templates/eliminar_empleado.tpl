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
  function agregar(divName){
	  
    var porNombre = document.getElementById("busqueda").value;
	
	
	{/literal}{section loop=$empleado name=i}{literal}
	var nombre={/literal}"{$empleado[i]->get('nombre')}"{literal};
	var apellido={/literal}"{$empleado[i]->get('apellido')}"{literal};
	var cedula={/literal}"{$empleado[i]->get('cedula')}"{literal};
	
if (porNombre == nombre+" "+apellido+" "+cedula){
		addAllInputs(divName, 'checkbox', nombre, apellido, cedula)

		}
		
		
		
		
		
		
		
      
    {/literal}{/section}{literal} 
	document.getElementById("busqueda").value="";
        
  }       
 

 
var counterText = 0;
var counterRadioButton = 0;
var counterCheckBox = 0;
var counterTextArea = 0;
function addAllInputs(divName, inputType, nombre, apellido, cedula){
	 var newdiv = document.createElement('div');
     var celda_nombre = document.createElement('div');
     var celda_apellido = document.createElement('div');
     var celda_cedula = document.createElement('div');  
	 
     switch(inputType) {
          case 'text':
               newdiv.innerHTML = "Entry " + (counterText + 1) + " <br><input type='text' name='myInputs[]'>";
               counterText++;
               break;
          case 'radio':
               newdiv.innerHTML = "Entry " + (counterRadioButton + 1) + " <br><input type='radio' name='myRadioButtons[]' ";
               counterRadioButton++;
               break;
          case 'checkbox':
               celda_nombre.innerHTML = "<input type='checkbox' name='empleados_a_eliminar[]' value="+cedula+">"+ nombre;
			   celda_apellido.innerHTML=apellido;
			   celda_cedula.innerHTML=cedula;
			   
               counterCheckBox++;
               break;
          case 'textarea':
	       newdiv.innerHTML = "Entry " + (counterTextArea + 1) + " <br><textarea name='myTextAreas[]'>type here...</textarea>";
               counterTextArea++;
               break;
          }


			newdiv.className  = "rTableRow";		  
			celda_nombre.className="rTableCell";
			celda_apellido.className="rTableCell";
			celda_cedula.className="rTableCell";
			newdiv.appendChild(celda_nombre);
			newdiv.appendChild(celda_apellido);
			newdiv.appendChild(celda_cedula);
		  
		  
     document.getElementById(divName).appendChild(newdiv);
}
  </script>
    {/literal}












<form action="{$gvar.l_global}eliminar_empleado.php?option=del" method="POST">
   <table class="table" border="0" alingn="center">
   
	   <TD><div class="panel-heading" align="center">Buscar Empleados</div></TD>
  </table>
	   <div class="ui-widget" align="center">
          <input name="busqueda" id="busqueda" type="text" size="30" maxlength="30"/> 
          <input class="btn btn-primary" type="button" value="agregar" onclick="agregar('dynamicInput');"/>
      </div>    
	  
	  
	  
	  
	<h3>Lista de empleados</h3>	  
	<div class="rTable" id=dynamicInput>	  
			<div class="rTableRow">
				 <div class="rTableHead"><strong>Nombre</strong></div>
				 <div class="rTableHead"><span style="font-weight: bold;">Apellidos</span></div>
				 <div class="rTableHead"><span style="font-weight: bold;">Cedula</span></div>
			</div>

     </div>

		 
 <input class="btn btn-primary" type="submit" value="Eliminar" />
 <input class="btn btn-primary" type="button" value="Regresar" onclick="regresarEliminar();"/>
 
 
 
 
 
 
 
 
 
 
 
 
</form>



