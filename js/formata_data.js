function formta_data(id){
	var id_nm = '#'+id;
	$(id_nm).mask("99/99/9999");
	$(id_nm).css("width", "150");
	
}

function formta_hora(id){
	var id_nm = '#'+id;
	$(id_nm).mask("99:99:99");
	$(id_nm).css("width", "150");
	
}



