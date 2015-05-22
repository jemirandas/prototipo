<script type="text/javascript">
	var seleccion;
	var activado = false;
	function selecciona(obj){
		//obj.style.background = (obj.style.background=='blue') ? 'black' : 'blue';		
		if(obj.style.background == "green"){
			pintar();
			obj.style.background = "yellow";
			seleccion = obj.id;			
			activado = true;
		}
	}
	function pintar(){
			{section loop=$agenda name=i}	
				document.getElementById("{$agenda[i]->get('dia')}:{$agenda[i]->get('hora')}").style.background = "green";		
			{/section}
	}
	function ir(){
		if(activado==true)
			location.href='{$gvar.l_global}pedir_cita.php?option=registrar&seleccion='+seleccion;
		else
			alert("¡Debe de seleccionar un horario primero!");
	}
</script>

<style>
			.cita{
				table, th, td {
					border: 1px solid black;
					border-collapse: collapse;
				}
				th, td {
					padding: 5px;
					text-align: left;
				}
				tr{
					width:4%;
				}
				td{
					width:16%;
				}
			}
</style>
<center>
{if $semana eq 'actual'}
	{if $agenda eq null}
		<b>No hay agenda para esta semana</b>		<br>
	{/if}	
		Semana Actual ({$primerDia} al {$ultimoDia}) >> <a href="{$gvar.l_global}pedir_cita.php?option=horario&semana=siguiente">Semana Siguiente</a>
	
{else}
	{if $agenda eq null}
		<b>No hay agenda para la próxima semana </b><br>		
	{/if}
		Próxima Semana({$primerDia2} al {$ultimoDia2}) 
		>> <a href="{$gvar.l_global}pedir_cita.php?option=horario&semana=actual">Regresar a Semana Actual</a> 
{/if}


	 <table id="t01" class="cita" cellpadding="0" bordercolor="blue" border="1"  width="50">
	  <tr bgcolor="">
		<th ><font color="">	  Hora</font></th>
		<th ><font color="">Lunes</th>
		<th ><font color="">Martes</th>
		<th ><font color="">Mi&eacutercoles</th>
		<th ><font color="">Jueves</th>
		<th> <font color="">Viernes</th>
		<th ><font color="">S&aacutebado</th>
	  </tr>	  	
	  {for $hora = 8 to 20 }	
		  <tr>	
			<td align="center"><font color="">{$hora}:00</td>
			<td align="center" id="Lunes:{$hora}" onclick="selecciona(this)"></td>
			<td align="center" id="Martes:{$hora}" onclick="selecciona(this)"></td>
			<td align="center" id="Miércoles:{$hora}" onclick="selecciona(this)"></td>
			<td align="center" id="Jueves:{$hora}" onclick="selecciona(this)"></td>
			<td align="center" id="Viernes:{$hora}" onclick="selecciona(this)"></td>
			<td align="center" id="Sábado:{$hora}" onclick="selecciona(this)"></td>
		  </tr>
	  {/for}	 
	</table>
	<input class="btn btn-primary" type="button" value="Pedir Cita" name="pedir_cita" 
	onclick="ir()">
</center>
	<script>	
	pintar();
</script>
	


