		
			
			
		<script>
function regresarModificar(){


        var r=confirm("Esta seguro que desea salir");
        if(r==true){
            location.href="inicioAdministrador.php";
        }
        else{
           bandera=true;
        }
    
	}	
			</script>

<body>

<div class="square">
<form name="crear_empleado" action="{$gvar.l_global}modificar_empleado.php?option=update" method="post">
    <table width="100%" border="0" cellpadding="0" cellspacing="5">
        <tr><td>
            <b>Modificar Empleado</b><br /><br />
            <b>Ingrese el nombre:<font color="red">*</font></b> <input required type="text" name="nombre" {if $form ne null} value="{$form->get('nombre')}" {/if} /><br />
			<b>Ingrese el apellido:<font color="red">*</font></b> <input required type="text" name="apellido" {if $form ne null} value="{$form->get('apellido')}" {/if} /><br />
            <b>Ingrese la c&eacutedula:<font color="red">*</font></b> <input required type="text" name="cedula" {if $form ne null} value="{$form->get('cedula')}" {/if} /><br />
			<b>Ingrese el nombre de usuario:<font color="red">*</font></b> <input required type="text" name="nombre_de_usuario" {if $form ne null} value="{$form->get('nombre_de_usuario')}" {/if} /><br />
			<b>Ingrese el password:<font color="red">*</font></b> <input type="password" name="password" {if $form ne null} value="{$form->get('password')}" {/if} /><br />
            <b>Ingrese la direcci&oacuten<font color="red">*</font>:</b> <input required type="text" name="direccion" {if $form ne null} value="{$form->get('direccion')}" {/if} /><br />
            <b>Ingrese el n&uacutemero de tel&eacutefono:<font color="red">*</font></b> <input required type="text" name="telefono" {if $form ne null} value="{$form->get('telefono')}" {/if} /><br />
			<b>Ingrese el correo electr&oacutenico:<font color="red">*</font></b> <input required type="text" name="correo_electronico" {if $form ne null} value="{$form->get('correo_electronico')}" {/if} /><br />
			<b>Seleccione la sucursal:<font color="red">*</font></b>
			<select name="sucursal">
				<option selected> </option>
				{section loop=$sucursal name=i}
					<option value="{$sucursal[i]->get('ID')}" {if $form ne null and ($form->get('sucursal') == $sucursal[i]->get('ID')) } selected {/if} >
						{$sucursal[i]->get('ciudad')}
					</option>
				{/section}
			</select>
			<br/>
            <input class="btn btn-primary" type="submit" value="Guardar" />
			<input class="btn btn-primary" type="button" value="Regresar" onclick="regresarModificar()">				
			<input type="hidden" name="cedula_vieja" {if $form ne null} value="{$form->get('cedula')}" {/if}/>
        </td></tr>
    </table>
</form>
</div>
</body>