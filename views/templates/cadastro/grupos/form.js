$('.selUf').bind('change', function(){
	if ($(this).val()!=''){
		$('#'+$(this).attr('rel')+' option').remove();
		xajax_Funcoes('{$arquivo}', '{$class}', 'carregarCidades', $(this).val(), $(this).attr('rel'));
	}
});

$('.selUf').change();
$('#cl_data_nascimento').datepicker();
$('#cl_data_emissao').datepicker();

$('#btnSalvarForm').unbind('click').bind('click', function(e){
	e.preventDefault();
	p1=xajax.getFormValues('formCadastroCliente');
	xajax_Funcoes('{$arquivo}', '{$class}', 'salvar', p1, '');
});

$('#btnCancelarForm').unbind('click').bind('click', function(e){
	e.preventDefault();
	$('#btnAdicionar').html('Adicionar&nbsp;&nbsp;<img style="margin-top:5px" src="imagens/adicionar.png"/>');
	$('#btnAdicionar').attr('rel', 'adicionar');
	funcao='listar';
	xajax_Funcoes('{$arquivo}', '{$class}', funcao, '', '');
});


$('#btnAdicionar').unbind('click').bind('click', function(e){
	e.preventDefault();
	if ($(this).attr('rel')=='adicionar'){
		$(this).html('Listar&nbsp;&nbsp;<img style="margin-top:5px" src="imagens/listar.png"/>');
		$(this).attr('rel', 'listar');
		funcao='editar';
	}else{
		$(this).html('Adicionar&nbsp;&nbsp;<img style="margin-top:5px" src="imagens/adicionar.png"/>');
		$(this).attr('rel', 'adicionar');
		funcao='listar';
	}
	xajax_Funcoes('{$arquivo}', '{$class}', funcao, '', '');
	// alert('{$arquivo}'+'{$class}'+funcao+''+'');
});