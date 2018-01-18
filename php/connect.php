<?php

include_once 'config.php';

try {
	
	$pdo = new PDO('mysql:host='.$host.';dbname='.$bd, $usr, $pass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
	echo 'ERRO: '.$e->getMessage().' Erro na conexão!!!';	
}

?>