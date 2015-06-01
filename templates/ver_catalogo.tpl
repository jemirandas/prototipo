<form action="{$gvar.l_global}busqueda_avanzada.php?sucursal={$bien_raiz[0]->get("sucursal")}&option=display" method="post">
<input type="hidden" name="sucursal" value={$bien_raiz[0]->get("sucursal")}/>
<b>Clic en el siguiente boton para realizar una busqueda avanzada</br> 

    <b><input class="btn btn-primary" type="submit" value="Busqueda avanzada" /></b></br>
    <br></br>

<table border="0" width="100%" cellpadding="0" cellspacing="10">
<b>Lista de todos los bienes raices</b>    
<tr>
  <th VALIGN="MIDDLE" ALIGN="CENTER"><h4><strong>Caracteristicas</strong></h4></th>
  <th VALIGN="MIDDLE" ALIGN="CENTER"><h4><strong>Foto</strong></h4></th>
  <th VALIGN="MIDDLE" ALIGN="CENTER"></th>
</tr>
{section loop=$bien_raiz name=i}
<tr>
    <td VALIGN="MIDDLE" ALIGN="CENTER"><b>Precio venta: {$bien_raiz[i]->get("precio_venta")}</br>
         <b>Precio Alquiler: {$bien_raiz[i]->get("precio_alquiler")}</br>   
         <b>Area: {$bien_raiz[i]->get("area")}</br>
         <b>Nro habitaciones: {$bien_raiz[i]->get("numero_habitaciones")}</br>
         <b>Nro de baños: {$bien_raiz[i]->get("numero_banos")}</br>    
         <b><a  href="{$gvar.l_global}ver_bien_raiz.php
            ?escritura={$bien_raiz[i]->get("numero_escritura")}
            &?sucursal={$bien_raiz[i]->get("sucursal")}&option=display">ver mas</a></br>    
    </td>
    <td VALIGN="MIDDLE" ALIGN="CENTER"><img src="bienes_raices\casa1.jpg" width="280" height="210"></td>
</tr>



{/section}
</table>
 <input type="button" onclick="history.back()" name="volver atrás" value="Regresar">
</form> 