$(document).ready(function () {
	
	function attLastActivity() {
		$.ajax({
			url: 'last-activity.php',
			type: 'GET',
			data: '',
			success: function(data) {
				//Essa função é disparada caso a requisição dê certo, se quiser implementar alguma funcionalidade, edite aqui.
			},
			beforeSend: function() {
				//Função disparada antes de fazer a requisição.
			}
		});
	}
	setInterval(attLastActivity, 10000); //Faz uma requisição a cada 30 segundos
	
});