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
  function asignar_horario(divName){
	  
    var porNombre = document.getElementById("busqueda").value;
	
	
	{/literal}{section loop=$empleado name=i}{literal}
	var nombre={/literal}"{$empleado[i]->get('nombre')}"{literal};
	var apellido={/literal}"{$empleado[i]->get('apellido')}"{literal};
	var cedula={/literal}"{$empleado[i]->get('cedula')}"{literal};
	
if (porNombre == nombre+" "+apellido+" "+cedula){


		
var pagina={/literal}"{$gvar.l_global}"{literal}+"asignar_horario_atencion.php?option=horario&cedula="+{/literal}"{$empleado[i]->get('cedula')}"{literal};

		location.href=pagina;





		}
		
		
		
		
		
		
		
      
    {/literal}{/section}{literal} 
	document.getElementById("busqueda").value="";
        
  }       
 

 
  </script>
    {/literal}






{if (is_empty($cedula))} 







 <h3><div class="panel-heading" align="center">Buscar Empleados</div></h3>
	   <div class="ui-widget" align="center">
          <input name="busqueda" id="busqueda" type="text" size="30" maxlength="30"/> 
          <input class="btn btn-primary" type="button" value="asignar horario" onclick="asignar_horario('dynamicInput');"/>
		  
		  	<input class="btn btn-primary"  type="button" value="Regresar" onclick="location.href='inicioAdministrador.php'">	
	
      </div>





	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
{else}
<form name="asignar_horario" action="{$gvar.l_global}asignar_horario_atencion.php?option=horario&cedula={$cedula}" method="post">
	 <table id="t01" cellpadding="0" bordercolor="blue" border="0"  width="50">
	  <tr bgcolor="#0089FF">
		<th ><font color="#FFFFFF">	  Hora</font></th>
		<th ><font color="#FFFFFF">Lunes</th>
		<th ><font color="#FFFFFF">Martes</th>
		<th ><font color="#FFFFFF">Mi&eacutercoles</th>
		<th ><font color="#FFFFFF">Jueves</th>
		<th> <font color="#FFFFFF">Viernes</th>
		<th ><font color="#FFFFFF">S&aacutebado</th>		</font>
	  </tr>	  	
	  {for $hora = 8 to 20 }	
	  <tr {if $hora % 2} bgcolor="#81BEF7" {else} bgcolor="#A9D0F5" {/if}>	
		<td align="center"><font color="#000000">{$hora}:00</td>
		<td align="center"><input id="'L':{$hora}" type="checkbox" name="H['L'][{$hora-8}]" value="{$hora}" > </td>
		<td align="center"><input id="'M':{$hora}" type="checkbox" name="H['M'][{$hora-8}]" value="{$hora}"> </td>
		<td align="center"><input id="'C':{$hora}" type="checkbox" name="H['C'][{$hora-8}]" value="{$hora}"> </td>
		<td align="center"><input id="'J':{$hora}" type="checkbox" name="H['J'][{$hora-8}]" value="{$hora}"> </td>
		<td align="center"><input id="'V':{$hora}" type="checkbox" name="H['V'][{$hora-8}]" value="{$hora}"> </td>
		<td align="center"><input id="'S':{$hora}" type="checkbox" name="H['S'][{$hora-8}]" value="{$hora}"> </td>
	  </tr>
	  {/for}
	 
	</table>
	{section loop=$horario name=i}		
		<script> 
			document.getElementById("{$horario[i]->get('dia')}:{$horario[i]->get('hora')}").checked = true; 
		</script>				
	{/section}
<center>

            <input class="btn btn-primary" type="submit" value="Asignar Horario" />
			<input class="btn btn-primary" type="button" value="Regresar" onclick="location.href='asignar_horario_atencion.php?option=lista'" />	
</center>
</form>

{/if}