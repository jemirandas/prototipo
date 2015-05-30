<table border="0" width="100%" cellpadding="0" cellspacing="10">
<tr>
  <td><strong>Numero de escritura</strong></td>
  <td><strong>Area</strong></td>
  <td><strong>Numero de habitaciones</strong></td>
</tr>
{section loop=$sucursal->components['bien_raiz']['b_s'] name=i}
<tr>
  <td>{$sucursal->components['bien_raiz']['b_s'][i]->get("numero_escritura")}</td>
  <td>{$sucursal->components['bien_raiz']['b_s'][i]->get("area")}</td>
  <td>{$sucursal->components['bien_raiz']['b_s'][i]->get("numero_habitaciones")}</td>
  <a  href="{$gvar.l_global}ver_bien_raiz.php
         ?escritura={$sucursal->components['bien_raiz']['b_s'][i]->get("numero_escritura")}&option=display">
           ver mas</a>
</tr>
{/section}
</table>