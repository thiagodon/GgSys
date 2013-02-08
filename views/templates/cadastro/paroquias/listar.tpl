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
			<th style="min-width:64px;">&nbsp;</th>
			<th>Tipo</th>
			<th>Par&oacute;quia</th>
			<th>Nome</th>
			<th>Dt. Fund.</th>
			<th>Dt. Pad.</th>
			<th>Fundador</th>
			<th>Desc.</th>
			<th>Endere&ccedil;o</th>
			<th>Num.</th>
			<th>Comp.</th>
			<th>CEP</th>
			<th>Bairro</th>
			<th>UF</th>
			<th>Cidade</th>
			<th>Tel.</th>
			<th>Fax</th>
			<th>E-mail</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$dados item=paroquias key=us}
			<tr {if $us % 2 == 0} class="linhas_tabela par"{else} class="linhas_tabela" {/if} rel="{$paroquias.id}||{$paroquias.ativo}">
				<td style="text-align:center;"><div id="table_id" name="table_id" class="table_id"></div> </td>
				<td>{$paroquias.tipo}</td>
				<td>{$paroquias.paroquia_id}</td>
				<td>{$paroquias.nome}</td>
				<td>{$paroquias.data_fundacao}</td>
				<td>{$paroquias.data_padroeiro}</td>
				<td>{$paroquias.fundador}</td>
				<td>{$paroquias.descricao}</td>
				<td>{$paroquias.endereco}</td>
				<td>{$paroquias.numero}</td>
				<td>{$paroquias.complemento}</td>
				<td>{$paroquias.cep}</td>
				<td>{$paroquias.bairro}</td>
				<td>{$paroquias.estado}</td>
				<td>{$paroquias.cidade}</td>
				<td>{$paroquias.telefone}</td>
				<td>{$paroquias.fax}</td>
				<td>{$paroquias.email}</td>
			</tr>
		{/foreach}
	</tbody>
</table>
</div>