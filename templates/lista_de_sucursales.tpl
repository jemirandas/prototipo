


<h5>Haga clic en el ID de la sucursal que desea modificar</h5>
<br><center>
    <table align="center" border="0" cellpadding="10" cellspacing="0">
	
	<tr>
            <td width="10">
                <b>ID</b>
            </td>
            <td>
                <b>Ciudad</b>
            </td>
        {section loop=$sucursal name=i}
        <tr>            
            <td>
                <a href="{$gvar.l_global}modificar_sucursal.php?option=mostrar&ID={$sucursal[i]->get('ID')}"> 
		{$sucursal[i]->get('ID')}</a>
            </td>	
            <td align="left"> 
                {$sucursal[i]->get('ciudad')} 
            </td>           
        </tr>
	{/section}
    </table>
	<br>
	
	<input class="btn btn-primary" type="button" value="Regresar" onclick="location.href='inicioAdministrador.php'">	
        <br><br>
	</center>
</body>