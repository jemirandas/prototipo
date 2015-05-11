<form action="{$gvar.l_global}eliminar_empleado.php?option=del" method="post">
  <table border="0" width="80%" cellpadding="0" cellspacing="8">
    <tr><td><b>Lista de Empleados </b></td></tr>
         <tr>
         <TD><b>Nombre y Apellidos</b></TD> 
         <TD><b>C&eacutedula</b></TD> 
        </tr> 
    {section loop=$empleado name=i}  
        <tr>
             <TD width="300"><input id="{$i}" type="checkbox" name="empleados_a_eliminar[]" 
                value="{$empleado[i]->get('cedula')}">
                {$empleado[i]->get('nombre')} {$empleado[i]->get('apellido')}</TD> 
             <TD>{$empleado[i]->get('cedula')}</TD>
        </tr>                 
    {/section}
  </table>
 <input class="btn btn-primary" type="submit" value="Eliminar" />
 <input class="btn btn-primary" type="button" value="Regresar" onclick="regresarEliminar()"/>
</form>
