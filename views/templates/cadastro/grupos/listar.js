gerarFT('{$arquivo}','{$class}');

$('#btnBuscar').unbind('click').bind('click', function(e){
	e.preventDefault();
    xajax_Funcoes('{$arquivo}', '{$class}', 'listar', $('#busca').val(), '');
});
$('#busca').bind('keypress',function(e){
	if (e.keyCode=='13'){
    	xajax_Funcoes('{$arquivo}', '{$class}', 'listar', $(this).val(), '');
	}
});