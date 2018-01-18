$(document).ready(function(){

	$('#fone').mask('(99) 99999-9999');
	$('#cpf').mask('999.999.999-99');

	$('button#new').click(function(){
		$('#myModal').modal({backdrop: "static"});
		$('h2#title').text(" Cadastro").attr({class:"glyphicon glyphicon-ok"});
		$('form#form').attr({action:"php/set.php"});
	});
	$('button#new_2').click(function(){
		$('#mdez').modal({backdrop: "static"});
		$('h2#title').text(" Cadastro").attr({class:"glyphicon glyphicon-ok"});
		$('form#form2').attr({action:"php/set_dez.php"});
		$('button#save2').prop("disabled", true);
	});
	$('button#new_3').click(function(){
		$('#mConc').modal({backdrop: "static"});
		$('h2#title').text(" Cadastro").attr({class:"glyphicon glyphicon-ok"});
		$('form#form2').attr({action:"php/get_con_sort.php"});
		$('#cod').attr('disabled', 'true');
		$('input#cod').val("c"+Math.floor((Math.random() * 1000) + 1));

	});
	$('button#up').click(function(){
		$('h2#title').text(" Alterar").attr({class:"glyphicon glyphicon-edit"});
		$('form#form').attr({action:"php/up.php"});
	});
	$('button#up_2').click(function(){
		$('h2#title').text(" Alterar").attr({class:"glyphicon glyphicon-edit"});
		$('form#form2').attr({action:"php/up_apostas.php"});
		$('#nome').attr('disabled', 'true');
		$('#concurso').attr('disabled', 'true');
		$('button#save2').prop("disabled", true);
	});
	$('button#up_3').click(function(){
		$('h2#title').text(" Alterar").attr({class:"glyphicon glyphicon-edit"});
		$('form#form3').attr({action:""});
		$('#cod').attr('disabled', 'true');
		// $('button#save3').prop("disabled", true);
	});
	/*contador de checkbox*/
	$('input[type=checkbox]').on('change', function () {
		var qt = $('input[type=checkbox]:checked').length;
		if (qt>10) {
			qt -= 1;
			alert("Selecione somente 10 dezenas!");
			$(this).prop("checked", false);
		}else if (qt<10) {
			$('button#save2').prop("disabled", false);
		}
		$('span#qtd').text("Dezenas Selecionadas: "+qt);
	})

	/*verifica fomulário*/
	/*Clientes*/
	$('form#form').on("change", function(){
		if ($('input#nome').val()!="" && $('input#fone').val()!="") {
			$('button#save').prop("disabled", false);
		}
	});
	/*Concursos*/
	$('form#form').on("change", function(){
		if ($('select#nome').val()!="" && $('select#concurso').val()!="") {
			$('button#save2').prop("disabled", false);
		}
	});
	/*Modal de edição clientes*/
	$('#myModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) 
		var recipient = button.data('whatever')
		var recipientnome = button.data('whatevernome')
		var recipientfone = button.data('whateverfone')
		var recipientatv = button.data('whateveratv')
		var recipienttipo = button.data('whatevertipo')
		var modal = $(this)
		modal.find('#id').val(recipient)
		modal.find('#nome').val(recipientnome)
		modal.find('#fone').val(recipientfone)
		modal.find('#tipo').val(recipienttipo)
		modal.find('#atv').val(recipientatv)
	})
	/*Modal de edição apostas*/
	$('#mdez').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) 
		var recipient = button.data('whatever')
		var recipientconcurso = button.data('whateverconcurso')
		var recipientid = button.data('whateverid')
		var modal = $(this)
		modal.find('#nome').val(recipient)
		modal.find('#concurso').val(recipientconcurso)
		modal.find('#id_dez').val(recipientid)	
	})
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
	/*Paginação e consulta*/
	$('#cli').DataTable({
		"ordering": false,
		"language": {
			"lengthMenu": "_MENU_",
			"zeroRecords": "Nem um registro encontrado.",
			"info": "Página _PAGE_ de _PAGES_",
			"infoEmpty": "Nenhum registro.",
			"infoFiltered": "(Filtrando de _MAX_.)"
		}
	})
	$('#apt').DataTable({
		"ordering": false,
		"language": {
			"lengthMenu": "_MENU_",
			"zeroRecords": "Nem um registro encontrado.",
			"info": "Página _PAGE_ de _PAGES_",
			"infoEmpty": "Nenhum registro.",
			"infoFiltered": "(Filtrando de _MAX_.)"
		}
	})
	// $('#lcli').DataTable({
	// 	"ordering": false,
	// 	"language": {
	// 		"lengthMenu": "_MENU_",
	// 		"zeroRecords": "Nem um registro encontrado.",
	// 		"info": "Página _PAGE_ de _PAGES_",
	// 		"infoEmpty": "Nenhum registro.",
	// 		"infoFiltered": "(Filtrando de _MAX_.)"
	// 	}
	// })

	// $('#save2').prop("disabled", false);
	// btnInativo()
});

function canc() {
	$('#form input').val('');
	$('#form select').val('');
	$('input[type=checkbox]').prop("checked", false);
	// $('#corpo1').hide();
}

// function desmarcar() {
// 	$('.marcar').each(function () {
// 		if (this.checked) this.checked = false;
// 	});
// }