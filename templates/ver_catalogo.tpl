<table border="0" width="100%" cellpadding="0" cellspacing="1">
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
         ?escritura={$bien_raiz[i]->get("numero_escritura")}&option=display">
          ver mas</a></td>
</tr>
{/section}
</table>