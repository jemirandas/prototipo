{literal}
    <script>
        function regresarCrear(){
                                    
            var bandera=false;
            
            for(i=0; i<9; i++){

                if(document.forms["crear_empleado"].elements[i].value !== ""){

                    var r=confirm("¿Seguro que desea salir de esta página sin guardar los cambios?");

                    if(r==true){                    
                            location.href="inicioAdministrador.php";
                    }else{                    
                        bandera=true;
                    }
                }
            }
            
            if(bandera==false){
                location.href="inicioAdministrador.php";
            }
        }
    </script>
{/literal}

<div class="square">
    <form name="crear_empleado" action="{$gvar.l_global}crear_empleado.php?option=add" method="post">
		
        <h3>Crear Empleado</h3>
        
        <table width="100%" border="0" cellpadding="0" cellspacing="1">        
            <tr>
                <td width="150" align="left">
                    <b>Ingrese el nombre:<font color="red">*</b> 
                </td>
                <td>
                    <input required type="text" name="nombre" {if $form ne null} value="{$form->get('nombre')}" {/if} />
                </td>
            </tr>
            
            <tr >
                <td align="left">
                    <b>Ingrese el apellido:<font color="red">*</b>
                </td>
                
                <td>
                    <input required type="text" name="apellido" {if $form ne null} value="{$form->get('apellido')}" {/if} />
                </td>
            </tr>
            
            <tr>
                <td align="left"> 
                    <b>Ingrese la c&eacutedula:<font color="red">*</b> 
                </td>
                <td>
                    <input required type="text" name="cedula" {if $form ne null} value="{$form->get('cedula')}" {/if} />
                </td>
            </tr>
            
            <tr>
                <td align="left">
                    <b>Ingrese el nombre de usuario:<font color="red">*</b> 
                </td>
                <td>
                    <input required type="text" name="nombre_de_usuario" {if $form ne null} value="{$form->get('nombre_de_usuario')}" {/if} />
                </td>
            </tr>
            
            <tr>
                <td align="left">
                    <b>Ingrese el password:<font color="red">*</b>
                </td>
                <td>
                    <input required type="password" name="password" {if $form ne null} value="{$form->get('password')}" {/if} />
                </td>
            </tr>
            <tr>
                <td align="left">
                    <b>Ingrese la direcci&oacuten:<font color="red">*</b> 
                </td>
                
                <td>
                    <input required type="text" name="direccion" {if $form ne null} value="{$form->get('direccion')}" {/if} />
                </td> 
            </tr>
            
            <tr>
            
                <td align="left">
                    <b>Ingrese el n&uacutemero de tel&eacutefono:<font color="red">*</b>
                </td>
                <td>
                    <input required type="text" name="telefono" {if $form ne null} value="{$form->get('telefono')}" {/if} />
                </td>
            </tr>
            
            <tr>	
                <td align="left">
                    <b>Ingrese el correo electr&oacutenico:<font color="red">*</b>
                </td>
                <td>
                    <input required type="text" name="correo_electronico" {if $form ne null} value="{$form->get('correo_electronico')}" {/if} />
                </td>
            </tr>
            
            <tr>	
                <td align="left">
                    <b>Seleccione la sucursal:<font color="red">*</b>
                </td>
                
                <td> 
                    <select name="sucursal">
			<option selected> </option>
				{section loop=$sucursal name=i}
					<option value="{$sucursal[i]->get('ID')}" {if $form ne null and ($form->get('sucursal') == $sucursal[i]->get('ID')) } selected {/if} >
						{$sucursal[i]->get('ciudad')}
					</option>
				{/section}
			</select>
                </td>
            </tr>
            
            <tr>
                <td colspan="2"><br><br>
                    <input class="btn btn-primary" type="submit" value="Crear" />
                    <input class="btn btn-primary" type="button" value="Regresar" onclick="regresarCrear()">	

                </td>
            </tr>
    </table>
</form>
</div>
