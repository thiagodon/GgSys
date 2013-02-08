$('.selUf').bind('change', function(){
	if ($(this).val()!=''){
		$('#'+$(this).attr('rel')+' option').remove();
		xajax_Funcoes('{$arquivo}', '{$class}', 'carregarCidades', $(this).val(), $(this).attr('rel'));
	}
});

$('.selUf').change();
$('#cl_data_nascimento').datepicker();
$('#cl_data_emissao').datepicker();

$('#btnSalvarForm').bind('click', function(e){
	e.preventDefault();
	p1=xajax.getFormValues('formCadastroCliente');
	xajax_Funcoes('{$arquivo}', '{$class}', 'salvar', p1, '');
});