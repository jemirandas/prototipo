{if $cita neq null}
<center>
    <br/><br/>
    <h4>Informaci&oacuten</h4>		
    <br/><br/>
</center>    
<p >
<h6>C&oacutedigo de cita: {$cita->get('codigo')}</h6>
    Fecha: {$cita->get('fecha')}  </br>
    Hora: {$cita->get('hora')}:00 </br>
    Funcionario: {$empleado->get('nombre')} {$empleado->get('apellido')}  </br>
    E-mail del funcionario: {$empleado->get('correo_electronico')}  </br>
    Direcci&oacuten de vivienda: {$bien_raiz->get('direccion')}  </br>   
</p>
<br/><br/>
<h5>
    Señor usuario conserve el c&oacutedigo de la cita para porderla cancelar<br>   
</h5>
<br/><br/><br/>
    <center><input class="btn btn-primary" type="button" value="Aceptar"
           onclick="location.href='{$gvar.l_global}index.php'">
    </center>
{else}
    <center><input class="btn btn-primary" type="button" value="Regresar" name="pedir_cita" 
           onclick="javascript:window.history.back();">
    </center>
{/if}