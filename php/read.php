<?php  

include 'connect.php';

try {

	$get = $pdo->prepare("SELECT * FROM clientes WHERE ativo = 1;");
	$get->execute();	

	$get2 = $pdo->prepare("SELECT * FROM concurso WHERE ativo = 1;");
	$get2->execute();

	$get3 = $pdo->prepare("SELECT * FROM sorteio order by cod desc limit 1");
	$get3->execute();

	$get4 = $pdo->prepare("SELECT * FROM cli_log");
	$get4->execute();

	$get5 = $pdo->prepare("SELECT * FROM clientes WHERE ativo = 1 and tipo = 2;");
	$get5->execute();

	$get6 = $pdo->prepare("SELECT * FROM clientes WHERE ativo = 1 and tipo = 3;");
	$get6->execute();

} catch (PDOException $e) {
	echo "Erro ao realizar a consulta!";
}

$qtd = $get->rowCount();

$qtd_np = $get5->rowCount();

$qtd_parc = $get6->rowCount();

$valor = 30.00;

$casa = 20/100;

$per_mais = 81.25/100;

$per_menos = 18.75/100;

$parceiros = $qtd_parc*3.00;

$n_pg = $qtd_np*$valor;

$montante = $qtd*$valor;

$lucro = ($montante*$casa) - $parceiros - $n_pg;

$arrecad = $montante*(1 - $casa);

$mais = $arrecad*$per_mais;

$menos = $arrecad*$per_menos;

?>