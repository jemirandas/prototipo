{literal}
    <script>
        function regresarCrear(){
                                    
            var bandera=false;
            
            for(i=0; i<3; i++){

                if(document.forms["crear_sucursal"].elements[i].value !== ""){

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
    <form name="crear_sucursal" action="{$gvar.l_global}crear_sucursal.php?option=add" method="post">
		
        <b>Crear Sucursal</b>
				
        <table width="100%" border="0" cellpadding="0" cellspacing="1">        
            <tr>
                <td width="150" align="left">
                    <b>Ciudad: <font color="red">*</b> 
                </td>
                <td>
                    <input required type="text" name="ciudad" {if $form ne null} value="{$form->get('ciudad')}" {/if} />
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
                     <b>Tel&eacutefono:<font color="red">*</b>
                 </td>

                 <td>
                     <input required type="text" name="telefono" {if $form ne null} value="{$form->get('telefono')}" {/if} />
                 </td>
             </tr>

             <tr>
                <td colspan="2">
                    <input class="btn btn-primary" type="submit" value="Crear" />
                    <input class="btn btn-primary" type="button" value="Regresar" onclick="regresarCrear()">	
                </td>
             </tr>
    </table>
</form>
</div>