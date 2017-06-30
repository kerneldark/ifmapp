jQuery(function($){
	$.datepicker.regional['pt-BR'] = {
		closeText: 'Fechar',
		prevText: '&#x3c;Anterior',
		nextText: 'Pr&oacute;ximo&#x3e;',
		currentText: 'Hoje',
		monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho',
		'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun',
		'Jul','Ago','Set','Out','Nov','Dez'],
		dayNames: ['Domingo','Segunda-feira','Terça-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sábado'],
		dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb'],
		dayNamesMin: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb'],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 0,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['pt-BR']);
});

jQuery(document).ready(function() {
	$.datepicker.setDefaults($.datepicker.regional['pt-BR']);
	$("#date").datepicker();
	$("#datef").datepicker();
	$("button, input:submit, input:button").button();
	//$("#cpf").mask("999.999.999-99");
	$("#fone_f").mask("(99) 9999-9999");
	$("#fone_m").mask("(99) 9999-9999");
	$("#cep").mask("99999-999");
	if ($("#pf").is(":checked")) {
		$("#cpf").mask("999.999.999-99");
	}
	else  {
		$("#cpf").mask("99.999.999/9999-99");
	}
	$("#cpf").on("change", function(){
	if ($("#pf").is(":checked")) {
		if(!valida_cpf($("#cpf").val()))
			$("#cpfcnpj_error").html("CPF Inválido.");
	}
	else  {
		if(!valida_cnpj($("#cpf").val()))
			$("#cpfcnpj_error").html("CNPJ Inválido.");
	}
	});
	//$("#down").mask("9999999");
	//$("#up").mask("9999999");
	//$("#carencia").mask("999");
	$("#dnasc").mask("99/99/9999");
	$("#pf").on("change", function() {
		$("#cpfcnpj_error").html("");
		$("#cpf").mask("999.999.999-99");
	});
	$("#pj").on("change", function() {
		$("#cpfcnpj_error").html("");
		$("#cpf").mask("99.999.999/9999-99");
	});
	
	$('#nome').autocomplete(
    {
        source: "bnome.php",
        minLength: 2
    });
	$("#form_cliente").submit(function(event) {
		var ok = 1;
		$(":submit").attr("disabled", "disabled");
		$(":submit").val("Por favor aguarde...");
		$("#nome_error").html("");
		$("#apelido_error").html("");
		$("#down_error").html("");
		$("#up_error").html("");
		$("#carencia_error").html("");
		
		if ($("#fmain").val() == '') {
			$("#nome_error").html("Campo Nome é obrigatório.");
			ok = 0;
		}
		if ($("#apelido").val() == '') {
			$("#apelido_error").html("Campo Apelido é obrigatório.");
			ok = 0;
		}
		if ($("#down").val() == '') {
			$("#down_error").html("Campo Download é obrigatório.");
			ok = 0;
		}
		if ($("#up").val() == '') {
			$("#up_error").html("Campo Upload é obrigatório.");
			$("#up").focus();
			ok = 0;
		}
		if ($("#carencia").val() == '') {
			$("#carencia_error").html("Campo Carência é obrigatório.");
			$("#carencia").focus();
			ok = 0;
		}
		if (ok)
			return
		else {
			$(":submit").removeAttr("disabled");
			$(":submit").val("Salvar");
			event.preventDefault();
		}
	});
});
	
function valida_cpf(cpf){
	cpf = cpf.replace(/[.-]/g, '');
	var numeros, digitos, soma, i, resultado, digitos_iguais;
			digitos_iguais = 1;
	if (cpf.length < 11)
		return false;
	for (i = 0; i < cpf.length - 1; i++)
		if (cpf.charAt(i) != cpf.charAt(i + 1)) {
			digitos_iguais = 0;
			break;
		}
	if (!digitos_iguais) {
		numeros = cpf.substring(0,9);
		digitos = cpf.substring(9);
		soma = 0;
		for (i = 10; i > 1; i--)
			  soma += numeros.charAt(10 - i) * i;
		resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
		if (resultado != digitos.charAt(0))
			  return false;
		numeros = cpf.substring(0,10);
		soma = 0;
		for (i = 11; i > 1; i--)
			  soma += numeros.charAt(11 - i) * i;
		resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
		if (resultado != digitos.charAt(1))
			  return false;
		return true;
	}
	else
		return false;
}

function valida_cnpj(cnpj){
	cnpj = cnpj.replace(/[./-]/g, '');
    var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais;
    digitos_iguais = 1;
    if (cnpj.length < 14 && cnpj.length < 15)
        return false;
    for (i = 0; i < cnpj.length - 1; i++)
        if (cnpj.charAt(i) != cnpj.charAt(i + 1))
    {
        digitos_iguais = 0;
        break;
    }
    if (!digitos_iguais)
    {
        tamanho = cnpj.length - 2
        numeros = cnpj.substring(0,tamanho);
        digitos = cnpj.substring(tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--)
        {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0))
            return false;
        tamanho = tamanho + 1;
        numeros = cnpj.substring(0,tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--)
        {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1))
            return false;
        return true;
    }
    else
        return false;
}

