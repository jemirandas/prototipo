<table border="0" width="100%" cellpadding="0" cellspacing="10">
<tr><td><b>Informacion del bien raiz</b></td></tr>
{section loop=$bien_raiz name=i} 
<tr><td><b>Numero de escritura:</b> {$bien_raiz[i]->get("numero_escritura")}<br />
    <b>Area:</b> {$bien_raiz[i]->get("area")} <br />
    <b>precio venta:</b> {$bien_raiz[i]->get("precio_venta")}<br />
    <b>precio alquiler:</b> {$bien_raiz[i]->get("precio_alquiler")}<br />
    <b>Direccion:</b> {$bien_raiz[i]->get("direccion")}<br />
    <b>Numero de habitaciones:</b> {$bien_raiz[i]->get("numero_habitaciones")}<br />
    <b>Numero de banos:</b> {$bien_raiz[i]->get("numero_banos")}<br /> 
    {if {$bien_raiz[i]->get("balcon")} eq 0 }
    <b>Balcon:</b> No posee<br />
    {else} <b>Balcon:</b> Si posee<br />
    {/if}
    <b>observaciones:</b> {$bien_raiz[i]->get("observaciones")}<br />
    <b>Imagenes</b><br />
    <img src="bienes_raices\casa1.jpg" width="280" height="210">
    <h4><b><a  href="{$gvar.l_global}ver_bien_raiz.php
            ?escritura={$bien_raiz[i]->get("numero_escritura")}
            &?sucursal={$bien_raiz[i]->get("sucursal")}&option=display">ver mas</a></br>     
        </td></tr></h4>
{/section}
</table>  
    <input type="button" onclick="history.go(-2)" name="volver atrás" value="Regresar">
 
    