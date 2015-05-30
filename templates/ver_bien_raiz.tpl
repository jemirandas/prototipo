<table border="0" width="100%" cellpadding="0" cellspacing="10">
<tr><td><b>Informacion del bien raiz</b></td></tr>
    
<tr><td><b>Numero de escritura:</b> {$bien_raiz->get("numero_escritura")}<br />
    <b>Area:</b> {$bien_raiz->get("area")} <br />
    <b>precio venta:</b> {$bien_raiz->get("precio_venta")}<br />
    <b>precio alquiler:</b> {$bien_raiz->get("precio_alquiler")}<br />
    <b>Direccion:</b> {$bien_raiz->get("direccion")}<br />
    <b>Numero de habitaciones:</b> {$bien_raiz->get("numero_habitaciones")}<br />
    <b>Numero de baños:</b> {$bien_raiz->get("numero_banos")}<br /> 
    {if {$bien_raiz->get("balcon")} eq 0 }
    <b>Balcon:</b> No posee<br />
    {else} <b>Balcon:</b> Si posee<br />
    {/if}
    <b>observaciones:</b> {$bien_raiz->get("observaciones")}<br />
    </td></tr>
</table>  