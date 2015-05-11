<div class="square">
<table border="0" width="100%" cellpadding="0" cellspacing="10"›
{section loop=$boss name=j}
	<tr>
		<td><b>Personas a Cargo del jefe: {$boss[j]->get('name')} - con id:
		{$boss[j]->get('id')}</b></td> 
	</tr>
	
		

	{section loop=$boss[j]->components['clerk']['b_c'] name=i}
	<tr>
		<td><b>Id:</b> {$boss[j]->components['clerk']['b_c'][i]->get('id')}<br />
			<b>Nombre:</b> {$boss[j]->components['clerk']['b_c'][i]->get('name')}<br />
			<b>Salario:</b>
			{$boss[j]->components['clerk']['b_c'][i]->get('salary')}</td>
	</tr> 
	{/section} 
	{/section} 
	</table> 
</div>
