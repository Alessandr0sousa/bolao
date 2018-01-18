<?php

include 'connect.php';

if(!empty($_POST)){
	extract($_POST);
	// var_dump($_POST);

	$c=count($d);

	if(empty($nome) || empty($concurso) || $c != 10){
		header("Location: ../apostas.php");
	}
		echo "deu certo";

		$sql_set = $pdo->prepare("INSERT INTO dezenas VALUES (NULL, :d1, :d2, :d3, :d4, :d5, :d6, :d7, :d8, :d9, :d10, :clientes, :concurso)");
		$sql_set->execute(array('d1' => $d[0], 'd2' => $d[1], 'd3' => $d[2], 'd4' => $d[3], 'd5' => $d[4], 'd6' => $d[5], 'd7' => $d[6], 'd8' => $d[7], 'd9' => $d[8], 'd10' => $d[9], 'clientes' => $nome, 'concurso' => $concurso));

		echo "<script>alert('Usuario cadastrado com sucesso.')</script>";
		header("Location: ../apostas.php");

}else{
	echo "<script>alert('Erro ao cadastrar.')</script>";
	header("Location: ../apostas.php");
}


?>
