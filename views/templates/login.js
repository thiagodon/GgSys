$('#logar').bind('click', function(e){
	e.preventDefault();
	var p1 = xajax.getFormValues('formLogin');
	xajax_Funcoes('{$arquivo}', '{$class}', 'logar', p1, '');
});

$("#formLogin").bind('keypress', function(e) {
  if (e.keyCode==13){
  	if ($('#login').val()!=''){
	  	var p1 = xajax.getFormValues('formLogin');
		xajax_Funcoes('{$arquivo}', '{$class}', 'logar', p1, '');	
  	}
  }
});