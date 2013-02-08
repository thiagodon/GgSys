$('#btnAdicionar').bind('click', function(e){
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
