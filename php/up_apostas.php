<?php

include 'connect.php';

if(!empty($_POST)){
	extract($_POST);
	// var_dump($_POST);
	$c=count($d);
	if ($c == 10) {
		$up = $pdo->prepare("UPDATE dezenas SET d1 = :d1, d2 = :d2, d3 = :d3, d4 = :d4, d5 = :d5, d6 = :d6, d7 = :d7, d8 = :d8, d9 = :d9, d10 = :d10 WHERE id = :id_dez");
		$up->execute(array('d1' => $d[0], 'd2' => $d[1], 'd3' => $d[2], 'd4' => $d[3], 'd5' => $d[4], 'd6' => $d[5], 'd7' => $d[6], 'd8' => $d[7], 'd9' => $d[8], 'd10' => $d[9], 'id_dez' => (int)$id_dez));
		// echo "<script>alert('Usuario alterado com sucesso.')</script>";
		header("Location: ../apostas.php");
	}else{
		// echo "<script>alert('Erro ao Alterar.')</script>";
		header("Location: ../apostas.php");
	}
}else{
	// echo "<script>alert('Erro ao tentar alterar.')</script>";
	header("Location: ../apostas.php");
}

?>