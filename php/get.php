<?php

// function Read(){

include 'connect.php';

$i=1;

$busca = $pdo->prepare("SELECT * FROM lookup_cli ORDER BY nome;");
$busca->execute();
echo "<div class='table table-responsive'>";
echo '<table id="cli" class="table-striped table-hover table-condensed display" cellspacing="0">';
echo "<thead>";
echo "<th>Nº</th>";
echo "<th>NOME</th>";
echo "<th>TELEFONE</th>";
echo "<th>TIPO</th>";
echo "<th>RESPONSAVEL</th>";
echo "<th>ATIVO</th>";
echo "<th>EDITAR</th>";
echo "</thead>";
echo "<tboby>";
while ($result = $busca->fetch(PDO::FETCH_ASSOC)) {
	$result['lin'] = $i;
	$ativo = ($result['ativo'] == 1) ? 'Sim' : 'Não';
	echo "<tr>";
	echo "<td>".$result['lin']."</td>";
	echo "<td>".$result['nome']."</td>";
	echo "<td>".$result['telefone']."</td>";
	echo "<td>".$result['tipo']."</td>";
	echo "<td>".$result['login']."</td>";
	echo "<td>".$ativo."</td>";
	echo '<td><button class="btn btn-xs btn-warning" name="up" id="up" data-toggle="modal" data-target="#myModal" data-whatever="'.$result['id'].'" data-whatevernome="'.$result['nome'].'" data-whateverfone="'.$result['telefone'].'" data-whateveratv="'.$result['ativo'].'" data-whatevertipo="'.$result['tipo'].'"><span class="glyphicon glyphicon-edit"></span></button></td>';
	echo "</tr>";
	$i++;
}
echo "</tboby>";
echo "</table>";
echo '</div>'
// 	return $result;
// }
// //echo '<pre>';
// //var_dump(Read());
// //echo '</pre>';
// print_r(Read());
// // echo json_encode(Read());

?>
