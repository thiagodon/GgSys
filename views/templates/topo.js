$('#btnSairGeral').bind('click', function(){
	if (confirm("Deseja sair?")){
		xajax_Funcoes('control/login', 'login', 'sair', '', '');
	}

});