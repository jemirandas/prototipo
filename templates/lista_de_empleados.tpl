


<h5>Haga clic en el nombre del empleado que desea modificar</h5>
<br>
    <table align="center" border="0" cellpadding="10" cellspacing="0">
	
	<tr><td width="10"><b>C&eacutedula</b></td> <td><b>Nombre</b></td>
	{section loop=$empleado name=i}
        <tr>
			<td align="right"> {$empleado[i]->get('cedula')} </td>           
            <td><a href="{$gvar.l_global}modificar_empleado.php?option=mostrar&cedula={$empleado[i]->get('cedula')}"> 
				{$empleado[i]->get('nombre')} {$empleado[i]->get('apellido')} </a>
			</td>	
        </tr>
	{/section}
    </table>
	<br>
	
	<input class="btn btn-primary" type="button" value="Regresar" onclick="location.href='inicioAdministrador.php'">	
	
</body>