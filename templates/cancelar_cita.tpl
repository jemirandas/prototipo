<div class="square">
<!-- En el action del form se indica que se llama al hacer uso del boton
-->
<form action="{$gvar.l_global}cancelar_cita.php?option=cancelar" method="post">
<table width="100%" border="0" cellpadding="0" cellspacing="5">
<tr><td>
<b>Cancelar mi cita</b><br /><br />
<b>Ingrese el codigo de cita:</b> <input type="text" name="codigo" required /><br />
<b>Ingrese su cedula:</b> <input type="text" name="cliente" required /><br />

<input class="btn btn-primary" type="submit" value="Confirmar" />
</td></tr></table>
</form>
</div>