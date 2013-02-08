<div id="divFiltros" class="divContainerT">
	<fieldset>
		<legend>Filtros: </legend>
		<table>
			<tr>
				<td>
					<input id="busca" name="busca"/>
				</td>
				<td>
					<div class="btn" style="position:relative;">
						<div class="btnL"></div>
						<div class="btnC"><a href="" id="btnBuscar">Buscar&nbsp;&nbsp;<img style="margin-top:5px" src="imagens/busca.png"/></a></div>
						<div class="btnR"></div>
						</td>
					</div>
			</tr>
		</table>
	</fieldset>
</div>
<div class="divTabela">
<table class="tableLista" cellpadding="2" cellspacing="2">
	<thead>
		<tr>
			<th style="width:64px;">&nbsp;</th>
			<th>Usu&aacute;rio</th>
			<th>Nome</th>
			<th>E-mail</th>
			<th>Telefone</th>
			<th>Celular</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$dados item=usuarios key=us}
			<tr {if $us % 2 == 0} class="linhas_tabela par"{else} class="linhas_tabela" {/if} rel="{$usuarios.id}||{$usuarios.ativo}">
				<td style="text-align:center;"><div id="table_id" name="table_id" class="table_id"></div> </td>
				<td>{$usuarios.login}</td>
				<td>{$usuarios.nome}</td>
				<td>{$usuarios.email}</td>
				<td>{$usuarios.telefone}</td>
				<td>{$usuarios.celular1}</td>
			</tr>
		{/foreach}
	</tbody>
</table>
</div>