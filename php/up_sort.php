<?php
include 'connect.php';

if(!empty($_POST)){
	extract($_POST);

	var_dump($_POST);


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
