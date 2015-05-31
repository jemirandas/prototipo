{literal}						
    
<script>
    
    var flag = 0;   
    
    //var $valores new Array("nombre"=>"", "apellido"=>"", "cedula"=>"", "nombre_de_usuario"=>"", "password"=>"", "direccion"=>"", "telefono"=>"", "correo_electronico"=>"", "sucursal"=>"");
    var valores = new Array();
    valores["nombre"]={/literal}"{$form->get('nombre')}"{literal};
    valores["apellido"]={/literal}"{$form->get('apellido')}"{literal};
    valores["cedula"]={/literal}"{$form->get('cedula')}"{literal};
    valores["nombre_de_usuario"]={/literal}"{$form->get('nombre_de_usuario')}"{literal};
    valores["password"]={/literal}"{$form->get('password')}"{literal};
    valores["direccion"]={/literal}"{$form->get('direccion')}"{literal};
    valores["telefono"]={/literal}"{$form->get('telefono')}"{literal};
    valores["correo_electronico"]={/literal}"{$form->get('correo_electronico')}"{literal};
    valores["sucursal"]={/literal}"{$form->get('sucursal')}"{literal};       
    
    function regresarModificar(){
        
        var bandera =false;
                
        if(flag==1){        
            
            var r=confirm("¿Seguro que desea salir de esta página sin guardar los cambios?");
            
            if(r==true){                    
                location.href="buscar_empleado.php";
                
            }else{                    
                
                bandera=true;
            }
        }
        
        if(bandera==false){                
            location.href="buscar_empleado.php";
        }
    }	
    
    function cambio(valor, campo){
        
        if(valores[campo] !== valor){
            flag = 1;
        }else{
            flag = 0;
        }      
        
    }
    
</script>
{/literal}


<div class="square">
    <form name="modificar_empleado" action="{$gvar.l_global}modificar_empleado.php?option=update" method="post">
        <table width="100%" border="0" cellpadding="0" cellspacing="5">
            <tr>
                <td>
                    <h3>Modificar Empleado</h3>
                    <br /><br />                    
                    
                    <b>Ingrese el nombre:<font color="red">*</font></b>
                    <input required type="text" name="nombre" onchange="cambio(this.value)" {if $form ne null}  value="{$form->get('nombre')}" {/if} /><br />
                    
                    <b>Ingrese el apellido:<font color="red">*</font></b>
                    <input required type="text" name="apellido" onchange="cambio(this.value)" {if $form ne null} value="{$form->get('apellido')}" {/if} /><br />
            
                    <b>Ingrese la c&eacutedula:<font color="red">*</font></b>
                    <input required type="text" name="cedula" onchange="cambio(this.value, this.name)" {if $form ne null} value="{$form->get('cedula')}" {/if} /><br />
                    
                    <b>Ingrese el nombre de usuario:<font color="red">*</font></b> 
                    <input required type="text" name="nombre_de_usuario" onchange="cambio(this.value)" {if $form ne null} value="{$form->get('nombre_de_usuario')}" {/if} /><br />         
                    
                    <b>Ingrese el password:<font color="red">*</font></b>
                    <input type="password" name="password" onchange="cambio(this.value)" {if $form ne null} value="{$form->get('password')}" {/if} /><br />
            
                    <b>Ingrese la direcci&oacuten<font color="red">*</font>:</b> 
                    <input required type="text" name="direccion" onchange="cambio(this.value)" {if $form ne null} value="{$form->get('direccion')}" {/if} /><br />
            
                    <b>Ingrese el n&uacutemero de tel&eacutefono:<font color="red">*</font></b> 
                    <input required type="text" name="telefono" onchange="cambio(this.value)" {if $form ne null} value="{$form->get('telefono')}" {/if} /><br />
                    
                    <b>Ingrese el correo electr&oacutenico:<font color="red">*</font></b>
                    <input required type="text" name="correo_electronico" onchange="cambio(this.value)" {if $form ne null} value="{$form->get('correo_electronico')}" {/if} /><br />
		
                    <b>Seleccione la sucursal:<font color="red">*</font></b>
                    
                    <select name="sucursal" onchange="cambio(this.value)">
                        <option selected> </option>
			
                        {section loop=$sucursal name=i}
			<option value="{$sucursal[i]->get('ID')}" {if $form ne null and ($form->get('sucursal') == $sucursal[i]->get('ID')) } selected {/if} >
                            {$sucursal[i]->get('ciudad')}
			</option>
			{/section}
                    </select>
                    
                    <br/>
                    
                    <input type="hidden" name="cedula_vieja" {if $form ne null} value="{$form->get('cedula')}" {/if}/>
                    <br/>    
                    <input class="btn btn-primary" type="submit" value="Guardar" />
                    <input class="btn btn-primary" type="button" value="Regresar" onclick="regresarModificar()">
                    <br/><br/>
                </td>
            </tr>
    </table>
</form>
</div>
</body>