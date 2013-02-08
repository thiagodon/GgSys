function login(){
	xajax_Funcoes('control/login', 'login', 'base', '', '');
}



//Aplicando uma máscara o campo de data
$(function() {
// CONFIGURAÇÃO DO DATEPICKER DO JQUERYUI PARA PT-BR
$.datepicker.setDefaults({
    dateFormat: 'dd/mm/yy',
    showOn: "button",
    buttonImage: "imagens/calendar.png",
    buttonImageOnly: true,
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro', 'Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set', 'Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior',
});

$('.dialog').dialog({
    autoOpen: false,
    width: 600,
    buttons: {
    "Ok": function() {
    $(this).dialog("close");
    },
    "Cancel": function() {
    $(this).dialog("close");
    }
    }
});

});

function gerarFT($arquivo, $_class){
    $fEditar='<a href="" id="tbEditar" rel="editar" class="tbF"><img src="imagens/editar.png"></a>&nbsp;';
    $fExcluir='<a href="" id="tbExcluir" rel="excluir" class="tbF"><img src="imagens/excluir.png"></a>&nbsp;';
    $('.tableLista tbody tr').each(function(){
        if ($(this).attr('rel').split('||')[1]=='s'){
            $fAtivo='<a href="" id="tbAtivo" rel="ativo" class="tbF"><img src="imagens/ativo.png"></a>&nbsp;';
        }else{
            $fAtivo='<a href="" id="tbAtivo" rel="ativo" class="tbF"><img src="imagens/desativo.png"></a>&nbsp;';
        }
        $(this).children().children().html($fEditar).append($fExcluir).append($fAtivo);
    });
    $('.tbF').click(function(e){
        e.preventDefault();
        var id=$(this).parent().parent().parent().attr('rel').split('||')[0];
        var ativo=$(this).parent().parent().parent().attr('rel').split('||')[1];
        var funcao=$(this).attr('rel');
        if (funcao=='excluir'){
            $('#dialog').html('Tem certeza que deseja excluir?');
            $('#dialog').dialog('close');
            $('.dialog').dialog({
                title: 'Confirma&ccedil;&atilde;o',
                autoOpen: false,
                width: 300,
                buttons: {
                    "Ok": function() {
                        xajax_Funcoes($arquivo, $_class, funcao, id, '');
                        $(this).dialog("close");
                    },
                    "Cancel": function() {
                        $(this).dialog("close");
                    }
                }
            }).dialog('open');
            // $('#dialog').dialog('open');

        }else if (funcao=='ativo'){
            if (ativo=='s'){
                $('#dialog').html('Tem certeza que deseja desativar?');
            }else{
                $('#dialog').html('Tem certeza que deseja ativar?');
            }
            $('#dialog').dialog('close');
            $('.dialog').dialog({
                title: 'Confirma&ccedil;&atilde;o',
                autoOpen: false,
                width: 300,
                buttons: {
                    "Ok": function() {
                        xajax_Funcoes($arquivo, $_class, funcao, id, ativo);
                        $(this).dialog("close");
                    },
                    "Cancel": function() {
                        $(this).dialog("close");
                    }
                }
            }).dialog('open');

        }else{
            xajax_Funcoes($arquivo, $_class, funcao, id, '');
        }

    });
}