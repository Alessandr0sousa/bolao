<?php

session_start();

if((!isset ($_SESSION['user']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['user']);
	unset($_SESSION['senha']);
	header('location: ../cli.php');
	// echo "Erro";
}

$user = $_SESSION['user'];

include 'connect.php';

try {

	$get = $pdo->prepare("SELECT * FROM login WHERE user = '{$user}'");
	$get->execute();

	while ($linha = $get->fetch(PDO::FETCH_ASSOC)) {
		$login = $linha['id'];
	}

} catch (PDOException $e) {
	echo "Erro ao realoizar a consulta!";
}

if(!empty($_POST)){
	extract($_POST);

	var_dump($_POST);
	$fin = array("(",")","-"," ");
	$rep = array("","","","");
	$phone  = str_replace($fin, $rep, $fone);

	if (!empty($nome) and !empty($fone) and !empty($atv))
	{

		$sql_set = $pdo->prepare("INSERT INTO clientes VALUES (NULL, :nome, :fone, :atv, :tipo, :login)");
		$sql_set->execute(array('nome' => $nome, 'fone' => $phone, 'atv' => $atv, 'tipo' => $tipo, 'login' => $login));

		//echo "<script>alert('Usuario cadastrado com sucesso.')</script>";
		header("Location: ../cli.php");
	}
	ELSE{
		//echo "<script>alert('Erro ao cadastrar.')</script>";
		header("Location: ../cli.php");
	}

}else {
	//echo "<script>alert('Erro tentar ao cadastrar.')</script>";
	header("Location: ../cli.php");
}

?>