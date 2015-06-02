{literal}
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
                    {/literal}
                    {section loop=$agenda name=i}
                    {literal}
                            document.getElementById("{/literal}{$agenda[i]->get('dia')}{literal}:{/literal}{$agenda[i]->get('hora')}{literal}").style.background="green";
                    {/literal}{/section}{literal}
            }

            function ir(){
                    if(activado==true){
                            location.href='{/literal}{$gvar.l_global}{literal}pedir_cita.php?option=registrar&sucursal={/literal}{$sucursal}{literal}&semana={/literal}{$semana}{literal}&bien_raiz={/literal}{$bien_raiz}{literal}&seleccion='+seleccion;
                    }else{
                            alert("¡Debe seleccionar un horario primero!");
                    }
            }

    </script>
{/literal}
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
<br>
<center>
{if $semana eq 'actual'}
	{if $agenda eq null}
		<font color='red'><b>No hay agenda para esta semana</b></font>		<br>
	{/if}	
        <i>Seleccione uno de los horarios disponibles (verdes)</i>	<br><br>Semana Actual ({$primerDia} al {$ultimoDia}) >> <a href="{$gvar.l_global}pedir_cita.php?option=horario&semana=siguiente&sucursal={$sucursal}&bien_raiz={$bien_raiz}">Semana Siguiente</a>
	
{else}
	{if $agenda eq null}
		<font color='red'><b>No hay agenda para la próxima semana </b></font><br>		
	{/if}
            <i>Seleccione uno de los horarios disponibles (verdes)</i>	<br><br>
		Pr&oacutexima Semana({$primerDia2} al {$ultimoDia2}) 
		>> <a href="{$gvar.l_global}pedir_cita.php?option=horario&semana=actual&sucursal={$sucursal}&bien_raiz={$bien_raiz}">Regresar a Semana Actual</a> 
{/if}
<br><br>

	 <table id="t01" class="cita" cellpadding="0" bordercolor="blue" border="1"  width="50">
	  <tr bgcolor="">
		<th ><font color="">Hora</font></th>
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
        <br><br>	
        <input class="btn btn-primary" type="button" value="Pedir Cita" name="pedir_cita" onclick="ir()">
        <input type="button" class="btn btn-primary" onclick="location.href='{$gvar.l_global}ver_bien_raiz.php?option=display&sucursal={$sucursal}&escritura={$bien_raiz}';" value="Regresar">       
         

            
        <br><br>
        {literal}
            <script>	
                    pintar();
            </script>
        {/literal}
	
</center>

	
