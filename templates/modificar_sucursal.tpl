		
			
{literal}		
		<script>
            function regresarModificar(){


                var r=confirm("¿Está seguro que desea salir?");
                if(r==true){
                    location.href="inicioAdministrador.php";
                }
                else{
                   bandera=true;
                }

            }	
			</script>
         {/literal}		

<body>

<div class="square">
<form name="crear_empleado" action="{$gvar.l_global}modificar_sucursal.php?option=update" method="post">
    <table width="100%" border="0" cellpadding="0" cellspacing="5">
        <tr>
            <td>
                <b>Modificar Sucursal</b><br /><br />
                <b>Ciudad:<font color="red">*</font></b> 
                <input required type="text" name="ciudad" {if $form ne null} value="{$form->get('ciudad')}" {/if} /><br />
                <b>Direcci&oacuten:<font color="red">*</font></b> 
                <input required type="text" name="direccion" {if $form ne null} value="{$form->get('direccion')}" {/if} /><br />
                <b>Tel&eacutefono:<font color="red">*</font></b> 
                <input required type="text" name="telefono" {if $form ne null} value="{$form->get('telefono')}" {/if} /><br />
		<br/>
                <input class="btn btn-primary" type="submit" value="Guardar" />
		<input class="btn btn-primary" type="button" value="Regresar" onclick="regresarModificar()">				
		<input type="hidden" name="ID" {if $form ne null} value="{$form->get('ID')}" {/if}/>
            </td>
        </tr>
    </table>
</form>
</div>
</body>