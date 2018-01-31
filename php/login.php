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

		if (!isset($_SESSION['session_id'])) {

			$idAutenticado = false;
			while ($idAutenticado === false) {
				$novoID = rand();

				$consultarID = $pdo->prepare("SELECT session_id FROM sessions WHERE session_id = :session_id");
				$consultarID->bindValue(':session_id', $novoID);
				$consultarID->execute();

				if ($consultarID->rowCount() === 0) {
					$idAutenticado = true;
				}
			}

			$cadastrarID = $pdo->prepare("INSERT INTO sessions (session_id, last_activity, logout_time) VALUES (:session_id, :last_activity, :logout_time)");
			$cadastrarID->bindValue(':session_id', $novoID);
			$cadastrarID->bindValue(':last_activity', time());
			$cadastrarID->bindValue(':logout_time', time() + (5 * 60));
			$cadastrarID->execute();

			$_SESSION['session_id'] = $novoID;
			header("Location: ../cli.php");

		} else {
			$validarID = $pdo->prepare("SELECT * FROM sessions WHERE session_id = :session_id AND last_activity >= :last_activity AND logout_time <= :logout_time");
			$validarID->bindValue(':session_id', $_SESSION['session_id']);
	$validarID->bindValue(':last_activity', (time() - (1 * 60))); //Permite até 1 minutos de inatividade
	$validarID->bindValue(':logout_time', (time() + (5 * 60))); //5 minutos de duração pra sessão
	$validarID->execute();

	if ($validarID->rowCount() === 0) {
		unset($_SESSION['session_id']);
		header("Location: ../home.php");
	}

}

		// header("Location: ../cli.php");
}else{
	unset ($_SESSION['user']);
	unset ($_SESSION['senha']);
	header("Location: ../home.php");
}
}



?>


