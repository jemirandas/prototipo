
<h3>Haga clic en el ID de la sucursal que desea modificar</h3>
<br>
<center>        	  
	
    <div class="rTable" id=dynamicInput>	  
        <div class="rTableRow">
            <div class="rTableHead">
                <strong>ID</strong>
            </div>
            
            <div class="rTableHead">
                <span style="font-weight: bold;">Ciudad</span>
            </div>            
            
        </div>
     </div>	 	 
	 
    {section loop=$sucursal name=i}
           <div class="rTableRow">
                    <div class="rTableCell">
                         <a href="{$gvar.l_global}modificar_sucursal.php?option=mostrar&ID={$sucursal[i]->get('ID')}"> 
		{$sucursal[i]->get('ID')}</a>
                    </div>                    

                   <div class="rTableCell">
                       {$sucursal[i]->get('ciudad')}
                   </div>
           </div>
	              
    {/section}
    <br>
	
	<br>
	
	
    <div>
        <input class="btn btn-primary" type="button" value="Regresar" onclick="location.href='inicioAdministrador.php'">
    </div>    
	
        <br><br>

</center>
    
    
    