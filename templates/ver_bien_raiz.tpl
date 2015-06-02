<center>
<table border="0" width="100%" cellpadding="0" cellspacing="10">
    <tr><td align="center" colspan="2"><font color="blue"><h4>Informaci&oacute;n del bien ra&iacute;z</h4></font></td></tr>
    
    <tr>
        <td width="38%" align="center">
            <b>Im&aacute;genes</b><br />
            <img src="bienes_raices\casa1.jpg" width="280" height="210"><br><br>
            <img src="bienes_raices\casa2.jpg" width="280" height="210"><br><br>
            <img src="bienes_raices\casa3.jpg" width="280" height="210">
        </td>
        <td align="left" valign="top"><b>N&uacute;mero de escritura:</b> {$bien_raiz->get("numero_escritura")}<br />
            <b>&Aacute;rea:</b> {$bien_raiz->get("area")} <br />
            <b>precio venta:</b> {$bien_raiz->get("precio_venta")}<br />
            <b>precio alquiler:</b> {$bien_raiz->get("precio_alquiler")}<br />
            <b>Direcci&oacute;n:</b> {$bien_raiz->get("direccion")}<br />
            <b>N&uacute;mero de habitaciones:</b> {$bien_raiz->get("numero_habitaciones")}<br />
            <b>N&uacute;mero de baños:</b> {$bien_raiz->get("numero_banos")}<br /> 
            {if {$bien_raiz->get("balcon")} eq 0 }
                <b>Balc&oacute;n:</b> No posee<br />
            {else} <b>Balc&oacute;n:</b> S&iacute; posee<br />
            {/if}
            <b>observaciones:</b> {$bien_raiz->get("observaciones")}<br /><br /><br />
            <i>Si desea arrendar o comprar esta propiedad, puede pedir una cita con los empleados:  </i>
            <b><a href="{$gvar.l_global}pedir_cita.php?option=horario&semana=actual&sucursal={$bien_raiz->get("sucursal")}&bien_raiz={$bien_raiz->get("numero_escritura")}">Pedir cita</a>   
                <br><br>    
            <input type="button" class="btn btn-primary" onclick=
                "location.href='{$gvar.l_global}ver_catalogo.php?option=display&id={$bien_raiz->get('sucursal')}'"
                name="Volver Atrás" value="Regresar">       
        </td>
    </tr>
</table>  

   
    
</center>