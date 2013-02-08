<form class="formCadastro" id="formCadastroCliente">
	<label>Ativo:</label><input type="checkbox" id="cl_ativo" name="cl_ativo" value"{$dados.cl_ativo}"></br>
	<label>Correspond&ecirc;ncia:</label><input type="radio" id="cl_correspondencia" name="cl_correspondencia" {if $dados.cl_correspondencia=='r'}checked="checked" {/if} value="r">Residencial <input type="radio" id="cl_correspondencia" name="cl_correspondencia" {if $dados.cl_correspondencia=='c'} checked="checked"{/if} value="c">Comercial</br>
	<label>C&oacute;digo:</label><input id="cl_codigo" name="cl_codigo" value"{$dados.cl_codigo}"></br>
	<fieldset>
	<legend>Dados Pessoais</legend>
		<label for="cl_nome">Nome:</label><input id="cl_nome" style="width:544px;" name="cl_nome" value"{$dados.cl_nome}">
		<label>Sexo:</label><input type="radio" id="cl_sexo" name="cl_sexo" {if $dados.cl_sexo=='m'}checked="checked" {/if} value="m"> Masc. <input type="radio" id="cl_sexo" name="cl_sexo" {if $dados.cl_sexo=='f'} checked="checked" {/if} value="f">Fem.</br>
		<label for="cl_data_nascimento">Data Nasc.:</label><input id="cl_data_nascimento" style="width:88px;" name="cl_data_nascimento" value"{$dados.cl_data_nascimento}">
		<label>UF:</label> 
			<select rel="cl_local_nascimento" class="selUf" name="cl_uf">
				{foreach from=$dados.ufs item=ufs}
					<option value="{$ufs.cod_estados}">{$ufs.nome}</option>
				{/foreach}
			</select>
		<label>Local Nasc:</label><select id="divcl_local_nascimento"></select>
		<label>Nacionalidade:</label><input id="cl_nacionalidade" name="cl_nacionalidade" value"{$dados.cl_nacionalidade}">
		<label>CPF:</label><input id="cl_cpf" name="cl_cpf" value"{$dados.cl_cpf}">
		<label>RG:</label><input id="cl_rg" name="cl_rg" value"{$dados.cl_rg}">
		<label>Data Em.:</label><input id="cl_data_emissao" name="cl_data_emissao" value"{$dados.cl_data_emissao}">
		<label>Org. Em.:</label><input id="cl_orgao_emissor" name="cl_orgao_emissor" value"{$dados.cl_orgao_emissor}">
		<label>UF Em.:</label>
			<select name="cl_uf_emissor">
				{foreach from=$dados.ufs item=ufs}
					<option value="{$ufs.cod_estados}">{$ufs.nome}</option>
				{/foreach}
			</select>
		<label>Est. Civil:</label><input id="cl_estado_civil" name="cl_estado_civil" value"{$dados.cl_estado_civil}">
		<label>Conjuge:</label><input id="cl_conjuge" name="cl_conjuge" value"{$dados.cl_conjuge}">
		<label>Nome M&atilde;e:</label><input id="cl_nome_mae" name="cl_nome_mae" value"{$dados.cl_nome_mae}">
		<label>Nome Pai:</label><input id="cl_nome_pai" name="cl_nome_pai" value"{$dados.cl_nome_pai}">
	</fieldset>
	<fieldset>
	<legend>Endereço Residencial e Contato</legend>
		<label>Endere&ccedil;o:</label><input id="cl_endereco" name="cl_endereco" value"{$dados.cl_endereco}">
		<label>N&uacute;mero:</label><input id="cl_numero" name="cl_numero" value"{$dados.cl_numero}">
		<label>Complemento:</label><input id="cl_complemento" name="cl_complemento" value"{$dados.cl_complemento}">
		<label>CEP:</label><input id="cl_cep" name="cl_cep" value"{$dados.cl_cep}">
		<label>Bairro:</label><input id="cl_bairro" name="cl_bairro" value"{$dados.cl_bairro}">
		<label>UF:</label> 
			<select rel="cl_cidade" name="cl_estado" class="selUf">
				{foreach from=$dados.ufs item=ufs}
					<option value="{$ufs.cod_estados}">{$ufs.nome}</option>
				{/foreach}
			</select>		
		<label>Cidade:</label><select id="divcl_cidade"></select>
		<label>Celular 1:</label><input id="cl_celular1" name="cl_celular1" value"{$dados.cl_celular1}">
		<label>Celular 1:</label><input id="cl_celular1" name="cl_celular1" value"{$dados.cl_celular1}">
		<label>Telefone:</label><input id="cl_telefone" name="cl_telefone" value"{$dados.cl_telefone}">
		<label>Fax:</label><input id="cl_fax" name="cl_fax" value"{$dados.cl_fax}">
		<label>E-mail:</label><input id="cl_email" name="cl_email" value"{$dados.cl_email}">
	</fieldset>
	<fieldset>
	<legend>Informações Comerciais</legend>
		<label>Local:</label><input id="cl_local_trabalho" name="cl_local_trabalho" value"{$dados.cl_local_trabalho}">
		<label>Profiss&atilde;o:</label><input id="cl_profissao" name="cl_profissao" value"{$dados.cl_profissao}">
		<label>Endere&ccedil;o:</label><input id="cl_endereco_comercial" name="cl_endereco_comercial" value"{$dados.cl_endereco_comercial}">
		<label>Telefone:</label><input id="cl_telefone_comercial" name="cl_telefone_comercial" value"{$dados.cl_telefone_comercial}"></div>
		<label>Fax:</label><input id="cl_fax_comercial" name="cl_fax_comercial" value"{$dados.cl_fax_comercial}">
		<label>Bairro:</label><input id="cl_bairro_comercial" name="cl_uf" value"{$dados.cl_bairro_comercial}">
		<label>UF:</label> 
			<select class="selUf" rel="cl_cidade_comercial" name="cl_estado_comercial">
				{foreach from=$dados.ufs item=ufs}
					<option value="{$ufs.cod_estados}">{$ufs.nome}</option>
				{/foreach}
			</select>
		<label>Cidade:</label><select id="divcl_cidade_comercial"></select>
	</fieldset>
	{include 'views/templates/btnForm.tpl'}
</form>