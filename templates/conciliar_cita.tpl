
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


</center>

