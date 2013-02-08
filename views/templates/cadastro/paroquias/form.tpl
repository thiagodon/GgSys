<form class="formCadastro" id="formCadastroCliente">
	<input type="hidden" name="id" id="id" value="{$dados.id}"/>
	<table>
		<tr>
			<td>
				<label for="tipo">Tipo:</label>
				<select name="tipo" id="tipo">
					<option value="p">Par&oacute;quia</option>
					<option value="c">Comunidade</option>
				</select>
			</td>
			<td id="paroquia" style="display:none;">
				<select id="paroquia_id" name="paroquia_id">
					{$dados.paroquias}
				</select>
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td style="width:88px;"><label>Nome:</label></td>
			<td><input id="nome" style="width:444px;"  name="nome" value"{$dados.nome}"></td>
		</tr>
	</table>
	<table>
		<tr>
			<td style="width:88px;"><label>Dt. Funda&ccedil;&atilde;o:</label></td>
			<td><input id="data_fundacao" name="data_fundacao"  style="width:159px;" value"{$dados.data_fundacao}"></td>
			<td><label>Dt. Padroeiro:</label></td>
			<td><input id="data_padroeiro" name="data_padroeiro" style="width:159px;" value"{$dados.data_padroeiro}"></td>
		</tr>
	</table>
	<table>
		<tr>
			<td style="width:88px;"><label>Fundador:</label></td>
			<td><input id="fundador" style="width:444px;"  name="fundador" value"{$dados.fundador}"></td>
		</tr>
	</table>
	<table>
		<tr>
			<td style="width:88px;"><label>Descri&ccedil;&atilde;o:</label></td>
			<td><textarea id="descricao" style="width:444px;"  name="descricao">{$dados.descricao}</textarea></td>
		</tr>
	</table>
	<table>
		<tr>
			<td>
				<fieldset>
				<legend>Endereço e Contato</legend>
				<table>
					<tr>
						<td style="width:64px;"><label>Endere&ccedil;o:</label></td>
						<td><input id="endereco" style="width:344px;" name="endereco" value"{$dados.endereco}"></td>
						<td><label>N&uacute;mero:</label></td>
						<td><input id="numero" style="width:64px;" name="numero" value"{$dados.numero}"></td>
					</tr>
					<tr>
						<td><label>Comp.:</label></td>
						<td colspan="3"><input id="complemento"  style="width:471px;" name="complemento" value"{$dados.complemento}"></td>
					</tr>
				</table>
				<table>
					<tr>
						<td style="width:64px;"><label>CEP:</label></td>
						<td><input id="cep" name="cep"  style="width:210px;" value"{$dados.cep}"></td>
						<td><label>Bairro:</label></td>
						<td><input id="bairro" name="bairro"  style="width:210px;" value"{$dados.bairro}"></td>
					</tr>
				</table>
				<table>
					<tr>
						<td style="width:64px;"><label>UF:</label></td>
						<td>
							<select style="width:214px;" rel="cidade" name="estado" class="selUf">
								{$dados.ufs}
							</select>		
						</td>
						<td><label>Cidade:</label></td><td><select style="width:214px;"  id="divcidade"></select></td>
					</tr>
				</table>
				<table>
					<tr>
						<td style="width:64px;"><label>Telefone:</label></td>
						<td><input id="telefone" style="width:216px;" name="telefone" value"{$dados.telefone}"></td>
						<td><label>Fax:</label></td>
						<td><input id="fax" style="width:217px;" name="fax" value"{$dados.fax}"></td>
					</tr>
				</table>
				<table>
					<tr>
						<td style="width:64px;"><label>E-mail:</label></td>
						<td><input id="email" name="email" value"{$dados.email}"></td>
					</tr>
				</table>
				</fieldset>
			</td>
		</tr>
	</table>
	{include 'views/templates/btnForm.tpl'}
</form>