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
	echo "Erro ao realizar a consulta!";
}

if(!empty($_POST)){
	extract($_POST);

	// var_dump($_POST);
	$fin = array("(",")","-"," ");
	$rep = array("","","","");
	$phone  = str_replace($fin, $rep, $fone);

	if (!empty($nome) and !empty($phone) and !empty($atv))
	{
		echo "teste";
		$sql_up = $pdo->prepare("UPDATE clientes SET nome = :nome, telefone = :fone, ativo = :atv, tipo = :tipo, login = :login WHERE  id = :id");
		$sql_up->execute(array('nome' => $nome, 'fone' => $phone, 'atv' => $atv, 'login' => $login, 'id' => (int)$id, 'tipo' => $tipo));

		echo "<script>alert('Usuario alterado com sucesso.')</script>";
		header("Location: ../cli.php");
	}
	else{
		echo "<script>alert('Erro ao Alterar.')</script>";
		header("Location: ../cli.php");
	}

}else {
	echo "<script>alert('Erro ao tentar alterar.')</script>";
	header("Location: ../cli.php");
}

?>