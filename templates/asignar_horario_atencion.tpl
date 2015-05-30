{if (is_empty($cedula))} 


<h5>Haga clic en el nombre del empleado que desea modificar</h5>
<br>
    <table align="center" border="0" width="20" cellpadding="10" cellspacing="0">
	
	<tr><td width="10"><b>C&eacutedula</b></td> <td><b>Nombre</b></td>
	{section loop=$empleado name=i}
        <tr>
			<td align="right"> {$empleado[i]->get('cedula')} </td>           
            <td><a href="{$gvar.l_global}asignar_horario_atencion.php?option=horario&cedula={$empleado[i]->get('cedula')}"> 
				{$empleado[i]->get('nombre')} {$empleado[i]->get('apellido')} </a>
			</td>	
        </tr>
	{/section}
	<tr></tr>
	<tr><td>
	
	</td><td >		
		<input class="btn btn-primary" type="button" value="Regresar" onclick="location.href='inicioAdministrador.php'">
	</td></tr>
    </table>
	
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