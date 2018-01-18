<?php
include 'connect.php';

$url = file_get_contents('https://confiraloterias.com.br/api/json/?loteria=megasena&token=9ukIWdpaWa7B980');
$res = json_decode($url);
$concurso = $res->concurso;
// print_r($concurso);

foreach ($concurso as $c) {
	echo "numero: $c->numero";
}

?>