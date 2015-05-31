{literal}		
    <script>
    
        var flag = 0;   

        //var $valores new Array("nombre"=>"", "apellido"=>"", "cedula"=>"", "nombre_de_usuario"=>"", "password"=>"", "direccion"=>"", "telefono"=>"", "correo_electronico"=>"", "sucursal"=>"");
        var valores = new Array();
        
        valores["direccion"]={/literal}"{$form->get('direccion')}"{literal};
        valores["telefono"]={/literal}"{$form->get('telefono')}"{literal};        
        valores["ciudad"]={/literal}"{$form->get('ciudad')}"{literal};       

        function regresarModificar(){

            var bandera =false;

            if(flag==1){        

                var r=confirm("¿Seguro que desea salir de esta página sin guardar los cambios?");

                if(r==true){                    
                    location.href="lista_de_sucursales.php";

                }else{                    

                    bandera=true;
                }
            }

            if(bandera==false){                
                location.href="lista_de_sucursales.php";
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

<body>

<div class="square">
<form name="crear_empleado" action="{$gvar.l_global}modificar_sucursal.php?option=update" method="post">
    <table width="100%" border="0" cellpadding="0" cellspacing="5">
        <tr>
            <td>
                <h3>Modificar Sucursal</h3><br /><br />
                
                <b>Ciudad:<font color="red">*</font></b> 
                <input required type="text" onchange="cambio(this.value, this.name)" name="ciudad" {if $form ne null} value="{$form->get('ciudad')}" {/if} /><br />
                
                <b>Direcci&oacuten:<font color="red">*</font></b> 
                <input required type="text" name="direccion" onchange="cambio(this.value, this.name)" {if $form ne null} value="{$form->get('direccion')}" {/if} /><br />
                
                <b>Tel&eacutefono:<font color="red">*</font></b> 
                <input required type="text" name="telefono" onchange="cambio(this.value, this.name)" {if $form ne null} value="{$form->get('telefono')}" {/if} /><br />
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