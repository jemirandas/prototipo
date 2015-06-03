 {literal}
  <script>
  $(function() {
        var availableTags= [];
        var numero_escritura;
        
        {/literal}{section loop=$bien_raiz name=i}{literal}
             numero_escritura = {/literal}"{$bien_raiz[i]->get('numero_escritura')}"{literal}+" "+{/literal}"{$bien_raiz[i]->get('direccion')}"{literal};    
             availableTags.push(numero_escritura);
        {/literal}{/section}{literal}
        
    $( "#busqueda" ).autocomplete({
      source: availableTags
    });
  });
  
  </script>   
 {/literal}
 
 
	
{literal}
<script>



  function seleccionar(){
	  
    var porNumeroEscritura = document.getElementById("busqueda").value;
	
	
	{/literal}{section loop=$bien_raiz name=i}{literal}
	var numero_escritura={/literal}"{$bien_raiz[i]->get('numero_escritura')}"{literal};
	var pos={/literal}{$smarty.section.i.index}{literal};



if (porNumeroEscritura == numero_escritura){

		checkear(pos);

		}		
      
    {/literal}{/section}{literal} 
	document.getElementById("busqueda").value="";
        
  }
  
  

function checkear(pos){

var inputs = document.getElementById("bien_raiz_"+pos);

  inputs.checked=true;



}




  </script>
    {/literal}
	
	
	
	
	
<form action="{$gvar.l_global}eliminar_bien_raiz.php?option=del" method="POST">
   
	  <div class="panel-heading" align="center">Buscar bien raiz</div>
	   <div class="ui-widget" align="center">
	   
          <input name="busqueda" id="busqueda" type="text" size="30" maxlength="30"/> 
          <input class="btn btn-primary" type="button" value="seleccionar" onclick="seleccionar();"/>
      </div>    
	  
	  
	  
	  
	<h3>seleccione los bienes raices para eliminar</h3>	  
	<div class="rTable" id=dynamicInput>	  
			<div class="rTableRow">
				 <div class="rTableHead"><strong>numero de escritura</strong></div>
 				 <div class="rTableHead"><strong>direccion</strong></div>
			</div>
     </div>
	 
	 {section loop=$bien_raiz name=i}
	
		<div class="rTableRow">
			 <div class="rTableCell"><input id="bien_raiz_{$smarty.section.i.index}" type="checkbox" name="bien_raizs_a_eliminar[]" 
                value="{$bien_raiz[i]->get('numero_escritura')}">{$bien_raiz[i]->get('numero_escritura')}</div>
				<div class="rTableCell">{$bien_raiz[i]->get('direccion')}</div>

		</div>
	              
    {/section}
<div align="center">
 <input class="btn btn-primary" type="submit" value="Eliminar" />
 <input class="btn btn-primary" type="button" value="Regresar" onclick="regresarEliminar();"/></div>
 
</form>
