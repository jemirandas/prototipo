<table border="0" width="100%" cellpadding="0" cellspacing="10">
    <tr><td><b>Lista de sucursales</b></td></tr>
    {section loop=$sucursal name=i}
        <tr><td><a  href="{$gvar.l_global}ver_catalogo.php?id={$sucursal[i]->get('ID')}&option=display">
                    {$sucursal[i]->get('ciudad')}</a><br />
            </td></tr>
        {/section}
</table>