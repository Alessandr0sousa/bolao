<?php  
	include 'connect.php';

	try {

	$get = $pdo->prepare("SELECT * FROM apuracao");
	$get->execute();

	$get2 = $pdo->prepare("SELECT * FROM cli_dez_conc");
	$get2->execute();

} catch (PDOException $e) {
	echo "Erro ao realizar a consulta!";
}

?>