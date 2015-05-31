
<form action="{$gvar.l_global}eliminar_sucursal.php?option=del" method="post">
  <table border="0" width="80%" cellpadding="0" cellspacing="8">
    <tr>
        <td>
            <h3>Lista de Sucursales</h3>
        </td>
    </tr>
    
    <tr>
         <TD width="100">
             <b>ID</b>
         </TD> 
         
         <TD align="left">
             <b>Ciudad</b>
         </TD> 
    </tr>
    
    {section loop=$sucursal name=i}  
        <tr>
             <TD>
                 <input id="{$i}" type="checkbox" name="sucursal_a_eliminar[]" value="{$sucursal[i]->get('ID')}">
                {$sucursal[i]->get('ID')}
             </TD> 
             <TD  align="left">
                 {$sucursal[i]->get('ciudad')}
             </TD>
        </tr>                 
    {/section}
  </table>
  <br><br>  
 <input class="btn btn-primary" type="submit" value="Eliminar" />
 <input class="btn btn-primary" type="button" value="Regresar" onclick="regresarEliminar()"/>
 
</form>
