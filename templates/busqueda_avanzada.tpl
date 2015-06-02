<form action="{$gvar.l_global}buscar_bien_raiz.php?sucursal={$bien_raiz[0]->get("sucursal")}&option=buscar" method="post">
<b>Zona de busqueda</br> 
<b>Precio de venta entre</b>
<select name="precioVenta">
    <option value="none"> </option>
    <option value="barato">10000000-25000000</option>
    <option value="medio">25000000-40000000</option>
    <option value="caro">40000000-50000000</option>
</select></br>   

<b>Precio de alquiler entre</b>
<select name="precioAlquiler">
    <option value="none"> </option>
    <option value="barato">100000-250000</option>
    <option value="medio">250000-40000000</option>
    <option value="caro">400000-500000</option>
</select></br> 

<b>Area entre </b>
<select name="area">
    <option value="none"> </option>
    <option value="pequeño">50-150</option>
    <option value="mediano">150-300</option>
    <option value="grande">300-500</option>
</select></br> 

<b>Numero de habitaciones </b>
<select name="habitaciones">
    <option value="none"> </option>    
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    <option value=5>5</option>    
</select></br>

<b>Numero de baños </b>
<select name="banos">
    <option value="none"> </option>    
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
</select></br>

<b><input class="btn btn-primary" type="submit" value="Buscar" /></b>
<input type="button" onclick="history.back()" name="volver atrás" value="Regresar">
</form>