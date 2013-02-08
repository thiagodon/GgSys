$('.pMenu a').bind('click', function(e){
	e.preventDefault();
	var rel = $(this).attr('rel');
	$('#divIntSubMenu ul').each(function(){
		$(this).hide();
	});
	$('#divCentro').html('');
	$('#pSubmenu_'+rel).show();
});
$('.pSubmenu a').bind('click', function(e){
	e.preventDefault();
	xajax_Funcoes('control/menu', 'menu', 'chamar', $(this).attr('rel'), '');
});