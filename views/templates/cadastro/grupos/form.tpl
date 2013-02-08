<form class="formCadastro" id="formCadastroCliente">
	<input type="hidden" name="id" id="id" value="{$dados.id}"/>
	<label>Ativo:</label><input type="checkbox" id="ativo" name="ativo" {if $dados.ativo=='s'}CHECKED{/if} value="s"></br>
	<table>
		<tr>
			<td>
				<label for="login">Usu&aacute;rio:</label>
				<input id="login" style="width:144px;" name="login" value="{$dados.login}">
			</td>
			<td>
				<label for="senha">Senha:</label>
				<input id="senha" style="width:144px;" type="password" name="senha" value="{$dados.senha}">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<label for="nome">Nome:</label>
				<input id="nome" style="width:344px;" name="nome" value="{$dados.nome}">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<label for="email">E-mail:</label>
				<input id="email" style="width:344px;" name="email" value="{$dados.email}">
			</td>
		</tr>	
		<tr>
			<td>
				<label for="telefone">Telefone:</label>
				<input id="telefone" style="width:144px;" name="telefone" value="{$dados.telefone}">
			</td>
			<td>
				<label for="celular1">Celular:</label>
				<input id="celular1" style="width:144px;" name="celular1" value="{$dados.celular1}">
			</td>
		</tr>
	</table>
	{include 'views/templates/btnForm.tpl'}
</form>