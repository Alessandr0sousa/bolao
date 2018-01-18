<?php

session_start();

include_once 'connect.php';

if(!empty($_POST)){
	extract($_POST);

	$sql_get = $pdo->prepare("SELECT * FROM login WHERE user = :user and senha = :senha");
	$sql_get->execute(array('user' => $user, 'senha' => sha1($senha)));

	$i = $sql_get->rowCount();

	if ($i == 1) {
		$_SESSION['user'] = $user;
		$_SESSION['senha'] = $senha;
		header("Location: ../cli.php");
	}else{
		unset ($_SESSION['user']);
		unset ($_SESSION['senha']);
		header("Location: ../index.php");
	}
}

?>


