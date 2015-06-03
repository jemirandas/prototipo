<form action="{$gvar.l_global}busqueda_avanzada.php?sucursal={$bien_raiz[0]->get("sucursal")}&option=display" method="post">

<center>
<br>
<h4>Clic en el siguiente bot&oacuten para realizar una b&uacute;squeda avanzada</br> </h4>

    <b><input class="btn btn-primary" type="submit" value="Búsqueda Avanzada" /></b></br>
<h4>Clic en el siguiente enlace para cancelar una cita</br> </h4>
    <b><a href="{$gvar.l_global}cancelar_cita.php?sucursal={$bien_raiz[0]->get("sucursal")}option=display">Cancelar cita</a> 
    <br></br>

    <h4>Lista de todos los bienes ra&iacute;ces</h4>

<table border="0" width="100%" cellpadding="10" cellspacing="10">

<tr>
    <th VALIGN="MIDDLE" ALIGN="right" width="25%"  ><font color="blue"><h4><strong>Caracter&iacute;sticas</strong></h4></font></th>
  <th VALIGN="MIDDLE" ALIGN="center" width="25%"><font color="blue"><h4><strong>Foto</strong></h4></th>
    <th VALIGN="MIDDLE" ALIGN="right" width="25%"  ><font color="blue"><h4><strong>Caracter&iacute;sticas</strong></h4></font></th>
  <th VALIGN="MIDDLE" ALIGN="center" width="25%"><font color="blue"><h4><strong>Foto</strong></h4></th>
</tr>

{section loop=$bien_raiz name=i}

{if $smarty.section.i.index is div by 2 }
    <tr>

{/if}
    <td VALIGN="MIDDLE" ALIGN="right"><b>Precio venta: {$bien_raiz[i]->get("precio_venta")}</br>
         <b>Precio Alquiler: {$bien_raiz[i]->get("precio_alquiler")}</br>   
         <b>Area: {$bien_raiz[i]->get("area")}</br>
         <b>Nro habitaciones: {$bien_raiz[i]->get("numero_habitaciones")}</br>
         <b>Nro de baños: {$bien_raiz[i]->get("numero_banos")}</br>    
         <b><a  href="{$gvar.l_global}ver_bien_raiz.php?escritura={$bien_raiz[i]->get("numero_escritura")}&sucursal={$bien_raiz[i]->get("sucursal")}&option=display">ver m&aacute;s</a></br>    
    </td>
{section loop=$imagenes name=j}
    {if $imagenes[j]->get('bien_raiz') eq $bien_raiz[i]->get("numero_escritura")}
    <td VALIGN="MIDDLE" ALIGN="left" width=""><img src={$imagenes[j]->get("ruta")} width="280" height="210"></td>
    {/if}
{/section}
{if $smarty.section.i.index is not div by 2 }
    

</tr>{/if}



{/section}
</table>

<input type="hidden" name="sucursal" value={$bien_raiz[0]->get("sucursal")}/>
<input type="button" class="btn btn-primary" onclick="
    location.href='{$gvar.l_global}ver_sucursales.php'" name="volver atras" value="Regresar">
 </center>
</form> 
