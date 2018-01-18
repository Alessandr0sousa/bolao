function formta_moeda(id){
	$(id).maskMoney();
	
}
function desformta_moeda(id){
	$(id).maskMoney('unmasked');
	var valor = $(id).val();
	var valor_ = valor.replace("R$ ", "");
	var valor_2 = valor_.replace(",", ".");
	$(id).val(valor_2);
	
}