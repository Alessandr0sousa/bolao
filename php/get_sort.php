<?php
include 'connect.php';

$url = file_get_contents('https://confiraloterias.com.br/api/json/?loteria=megasena&token=koHcIekFISRBMfd');
$res = json_decode($url);
// var_dump($res);

$conc = $res->concurso->numero;
echo $conc."&nbsp";
for ($i=0; $i < 6 ; $i++) { 
	$d = $res->concurso->dezenas[$i];	
print $d."&nbsp;";
}

var_dump($d);


?>