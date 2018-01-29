<?php
require "connect.php";

if(!empty($_POST)){
	extract($_POST);
	var_dump($_POST);

	$c=count($d);

	if(empty($id_) || empty($sort) || $c != 6){
		if(empty($cod) || empty($atv)){
			header("Location: ../concurso_sorteios.php");
		}
		echo "deu certo";

		$sql_set = $pdo->prepare("INSERT INTO concurso VALUES (NULL, :cod, :atv)");
		$sql_set->execute(array('cod' => $cod, 'atv' => $atv));

		header("Location: ../concurso_sorteios.php");

	}
	echo "deu certo";

	$sql_set = $pdo->prepare("INSERT INTO sorteio VALUES (NULL, :cod, :d1, :d2, :d3, :d4, :d5, :d6, :concurso)");
	$sql_set->execute(array('cod' => $sort, 'd1' => $d[0], 'd2' => $d[1], 'd3' => $d[2], 'd4' => $d[3], 'd5' => $d[4], 'd6' => $d[5], 'concurso' => $id_));
	header("Location: ../concurso_sorteios.php");

}else{
	header("Location: ../concurso_sorteios.php");
}

?>