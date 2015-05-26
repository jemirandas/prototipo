<center>
    <h6>Ahora diligencie sus datos personales para consolidar su cita con los empleados de la sucursal</h6>		<br/><br/>
    <b>Si ya ha diligenciado antes este fomormulario, ingrese s&oacutelo la c&eacutedula</b><br>
    
    <br/><br/>
  
    <!-- formulario cédula -->
    
    <form name="F1" action="{$gvar.l_global}conciliar_cita.php?option=regExist" method="post">		
        <table width="100%" border="0" cellpadding="0" cellspacing="1">                
            <tr  colspan="2">
                <td align="center">
                     <b>C&eacutedula:<font color="red">*</b><input required type="text" name="cedula" {if $form ne null} value="{$form->get('cedula')}" {/if} />
                </td>
            </tr>        	        
            <tr>
                <input type="hidden" name="empleado" value="{$empleado}"/>
                <input type="hidden" name="fecha" value="{$fecha}"/>
                <input type="hidden" name="hora" value="{$hora}"/>
                <td  align="center">                    
                    <input class="btn btn-primary" type="submit" value="Enviar" />                
                    
                </td>
            </tr>
        </table>
    </form>  
                    
    <!-- formulario completo -->                
    <br><br>
    <i>Si ya ha diligenciado este formulario, puede volver a hacerlo para actualizar sus datos</i> 
    <br><br>
    <form name="F2" action="{$gvar.l_global}conciliar_cita.php?option=regNew" method="post">		
        <table width="100%" border="0" cellpadding="0" cellspacing="1">                
            <tr>
                <td   align="right">
                    <b>Nombres:<font color="red">*</b>                 
                </td>
                <td>
                    <input required type="text" name="nombre" {if $form ne null} value="{$form->get('nombre')}" {/if} />
                </td>
            </tr>
         
	    <tr>
                <td  align="right">
                    <b>Apellidos:<font color="red">*</b>                
                    </td>
                <td>
                    <input required type="text" name="apellido" {if $form ne null} value="{$form->get('apellido')}" {/if} />
                </td>
            </tr>
            <tr>
                <td  align="right"> 
                    <b>C&eacutedula:<font color="red">*</b> 
                </td>
                <td>
                    <input required type="text" name="cedula" {if $form ne null} value="{$form->get('cedula')}" {/if} />
                </td>
            </tr>            
            
            <tr>  
                <td  align="right">
                    <b>Direcci&oacuten de residencia:<font color="red">*</b>
                </td>
                <td>
                    <input required type="text" name="direccion" {if $form ne null} value="{$form->get('direccion')}" {/if} />
                </td>
            </tr>
            
            <tr>
                <td  align="right">
                    <b>N&uacutemero de tel&eacutefono:<font color="red">*</b>
                </td>
                <td>            
                    <input required type="text" name="telefono" {if $form ne null} value="{$form->get('telefono')}" {/if} />
                </td>
            </tr>
            <tr>	
                <td  align="right">
                    <b>Correo electr&oacutenico:<font color="red">*</b>
                </td>
                <td>
                    <input required type="email" name="correo_electronico" {if $form ne null} value="{$form->get('correo_electronico')}" {/if} />
                    
                </td>
            </tr>
            
            <tr>
                <td  align="right">
                    <b>Ingresos mensuales: <font color="blue">(opcional)</b>
                </td>
                <td>
                    <input required type="text" name="ingreso_mensual" {if $form ne null} value="{$form->get('ingreso_mensual')}" {/if} />
                </td>
            </tr>
            
            <tr >
                <td align="right">
                    <input type="hidden" name="empleado" value="{$empleado}"/>
                    <input type="hidden" name="fecha" value="{$fecha}"/>
                    <input type="hidden" name="hora" value="{$hora}"/>                    
                    <input type="hidden" name="bien_raiz" value="{$bien_raiz}"/>                    
                    
                    <input class="btn btn-primary" type="submit" value="Enviar" />
                 </td>
                <td align="left">   
                    <input class="btn btn-primary" type="button" value="Regresar" onclick="regresarCrear()">	

                </td>
            </tr>
        </table>
    </form>                
</center>

