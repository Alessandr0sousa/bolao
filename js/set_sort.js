$(document).ready(function(){
	/*button para cod do sorteio*/
	$('button#new_3').click(function(){
		$('#mConc').modal({backdrop: "static"});
		$('h2#title').text(" Cadastro").attr({class:"glyphicon glyphicon-ok"});
		$('form#form2').attr({action:"php/set_sort.php"});
		$('#cod').attr('disabled', 'true');
		$('input#cod').val("c"+Math.floor((Math.random() * 1000) + 1));

	});
	/*buton new pra numeros da megasena*/
	$('button#new_4').click(function(){
		$('#s_dez').modal({backdrop: "static"});
		$('h2#title').text(" Sorteio").attr({class:"glyphicon glyphicon-ok"});
		$('form#form3').attr({action:"php/set_sort.php"});
		$('#cod').attr('disabled', 'true');
	});
	/*button up pra cod sorteio*/
	$('button#up_3').click(function(){
		$('h2#title').text(" Alterar").attr({class:"glyphicon glyphicon-edit"});
		$('form#form3').attr({action:""});
		$('#cod').attr('disabled', 'true');
		// $('button#save3').prop("disabled", true);
	});
	/*verifica dezenas*/
	$('input[type=checkbox]').on('change', function () {
		var qt = $('input[type=checkbox]:checked').length;
		if (qt>6) {
			qt -= 1;
			alert("Selecione somente 6 dezenas!");
			$(this).prop("checked", false);
		}else if (qt<6) {
			$('button#save2').prop("disabled", false);
		}
		$('span#qtd').text("Dezenas Selecionadas: "+qt);
	})
	/*recupera dados pra update concurso*/
	$('#mConc').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) 
		var recipient = button.data('whatever')
		var recipientatv= button.data('whateveratv')
		var recipientid = button.data('whateverid')
		var modal = $(this)
		modal.find('#cod').val(recipient)
		modal.find('#atv').val(recipientatv)
		modal.find('#id').val(recipientid)
	})
	/*conferencia de dezenas*/
	var c_ = ($("[name=c]").length)/10;
	var s_ = ($("[name=s]").length)/6;
	var y = 0;
	// console.log("c: "+c_+" e s: "+s_)
	var count = 0
	for (var i = 0; i < c_; i++) {	
		for (var j = 0; j < 10; j++) {
			var c = $("#c"+i+j+"").text();
			for (var a = 0; a < s_; a++) {
				for (var b = 0; b < 6; b++) {
					var s = $("#s"+a+b+"").text();
					if (c == s) {
						$("#c"+i+j+"").attr({class:"img-circle c"});
					}
				}
			}
		}
		var x = $('#l'+i).find('.c').length;
		$('#n_hits'+i).text(x).css("color", "#ff0003").css("font-weight", "bolder");
	}
		
});