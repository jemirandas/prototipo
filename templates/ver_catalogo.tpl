<form action="{$gvar.l_global}buscar_bien_raiz.php?sucursal={$bien_raiz[0]->get("sucursal")}&option=display" method="post">
<b>Zona de busqueda</br> 
<b>Precio de venta entre</b>
<select name="precioVenta">
    <option value="barato">10000000-25000000</option>
    <option value="medio">25000000-40000000</option>
    <option value="caro">40000000-50000000</option>
</select></br>   

<b>Precio de alquiler entre</b>
<select name="precioAlquiler">
    <option value="barato">100000-250000</option>
    <option value="medio">250000-40000000</option>
    <option value="caro">400000-500000</option>
</select></br> 

<b>Area entre </b>
<select name="area">
    <option value="pequeño">50-150</option>
    <option value="mediano">150-300</option>
    <option value="grande">300-500</option>
</select></br> 

<b><input class="btn btn-primary" type="submit" value="Buscar" /></b></br>

<table border="0" width="100%" cellpadding="0" cellspacing="1">
<b>Lista de todos los bienes raices</b>    
<tr>
  <td><strong>Numero de escritura</strong></td>
  <td><strong>Area</strong></td>
  <td><strong>Numero de habitaciones</strong></td>
</tr>
{section loop=$bien_raiz name=i}
<tr>
  <td>{$bien_raiz[i]->get("numero_escritura")}</td>
  <td>{$bien_raiz[i]->get("area")}</td>
  <td>{$bien_raiz[i]->get("numero_habitaciones")}</td>
  <td><a  href="{$gvar.l_global}ver_bien_raiz.php
         ?escritura={$bien_raiz[i]->get("numero_escritura")}?sucursal={$bien_raiz[i]->get("sucursal")}&option=display">
          ver mas</a></td>
</tr>
{/section}
</table>
</form> 