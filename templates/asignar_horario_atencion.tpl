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
 
    var flag=false;
    
    function cambio(){
        flag=true;
    }
    
    function regresar(){
        
        var bandera=false;
        
        if(flag===true){             
            
            var r=confirm("¿Seguro que desea salir de esta página sin guardar cambios?");
            
            if(r===true){
                location.href='asignar_horario_atencion.php?option=lista';
                
            }else{
               bandera=true;               
            }
        }
        
        if(bandera==false){
            location.href='asignar_horario_atencion.php?option=lista';
        }
    }
 
  </script>
{/literal}


{if (is_empty($cedula))} 


 <h3>
     <div class="panel-heading" align="center">Buscar Empleados</div>
 </h3>
    <div class="ui-widget" align="center">
    <input name="busqueda" id="busqueda" type="text" size="30" maxlength="30"/> 
    <input class="btn btn-primary" type="button" value="Asignar Horario" onclick="asignar_horario('dynamicInput');"/>		       
  </div>
    	
		<div class="rTableRow">
                    <div class="rTableCell"><b>Nombre</b></div>
				
			 <div class="rTableCell"><b>Apellido</b></div>
			
			<div class="rTableCell"><b>C&eacutedula</b> </div>
		</div>

	 {section loop=$empleado name=i}
	
		<div class="rTableRow">
			 <div class="rTableCell">{$empleado[i]->get('nombre')}</div>
				
			 <div class="rTableCell">{$empleado[i]->get('apellido')}</div>
			
			<div class="rTableCell"> <a href={$gvar.l_global}asignar_horario_atencion.php?option=horario&cedula={$empleado[i]->get('cedula')}>{$empleado[i]->get('cedula')}</a> </div>
		</div>
	              
    {/section}
	
	<div align="center">
            <br> <br> 
                <input class="btn btn-primary" type="button" value="Regresar" onclick="location.href='inicioAdministrador.php'">
            <br><br> 
        </div>
	
{else}
<form name="asignar_horario" action="{$gvar.l_global}asignar_horario_atencion.php?option=horario&cedula={$cedula}" method="post">
    <br/>
    <center>
        <h4>
            Horario de Atenci&oacuten para {$empleado[0]->get('nombre')} {$empleado[0]->get('apellido')}
        </h4>
    </center>    
    <br/><br/>
    
	 <table id="t01" cellpadding="0" bordercolor="blue" border="0"  width="50">
	  <tr bgcolor="#0089FF" align="center">
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
                <td align="center"><input id="'L':{$hora}" type="checkbox" name="H['L'][{$hora-8}]" onchange="cambio()" value="{$hora}" > </td>
		<td align="center"><input id="'M':{$hora}" type="checkbox" name="H['M'][{$hora-8}]"  onchange="cambio()" value="{$hora}"> </td>
		<td align="center"><input id="'C':{$hora}" type="checkbox" name="H['C'][{$hora-8}]"  onchange="cambio()" value="{$hora}"> </td>
		<td align="center"><input id="'J':{$hora}" type="checkbox" name="H['J'][{$hora-8}]"  onchange="cambio()" value="{$hora}"> </td>
		<td align="center"><input id="'V':{$hora}" type="checkbox" name="H['V'][{$hora-8}]"  onchange="cambio()" value="{$hora}"> </td>
		<td align="center"><input id="'S':{$hora}" type="checkbox" name="H['S'][{$hora-8}]"  onchange="cambio()" value="{$hora}"> </td>
	  </tr>
	  {/for}
	 
	</table>
	{section loop=$horario name=i}		
           
            <script> 
                document.getElementById("{$horario[i]->get('dia')}:{$horario[i]->get('hora')}").checked = true; 
            </script>				
           
	{/section}
<center>
    <br/><br/>
        <input type="hidden" name="asignar" value="1" />
        <input class="btn btn-primary" type="submit" value="Asignar Horario" />
        <input class="btn btn-primary" type="reset" value="Borrar Todo" onclick="cambio()" />
	<input class="btn btn-primary" type="button" value="Regresar" onclick="regresar()" />	
        <br/><br/>
</center>
</form>

{/if}