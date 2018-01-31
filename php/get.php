<?php

// function Read(){

include 'connect.php';

$i=1;

$busca = $pdo->prepare("SELECT * FROM lookup_cli ORDER BY nome;");
$busca->execute();
echo "<div class='table table-responsive'>";
echo '<table id="cli" class="table-striped table-hover table-condensed display" cellspacing="0">';
echo "<thead>";
echo "<th class='dn'>Nº</th>";
echo "<th>NOME</th>";
echo "<th class='dn'>TELEFONE</th>";
echo "<th class='dn'>TIPO</th>";
echo "<th class='dn'>RESPONSAVEL</th>";
echo "<th class='dn'>ATIVO</th>";
echo "<th class='dn'>EDITAR</th>";
echo "</thead>";
echo "<tboby>";
while ($result = $busca->fetch(PDO::FETCH_ASSOC)) {
	$result['lin'] = $i;
	$tipo = $result['tipo'];
	if ($tipo == 1) {
		$tipo = "Pagante";
	}elseif ($tipo == 2) {
		$tipo = "Oferta";
	}else{$tipo = "Parceiro";}
	$ativo = ($result['ativo'] == 1) ? 'Sim' : 'Não';
	echo "<tr>";
	echo "<td class='dn'>".$result['lin']."</td>";
	echo "<td>".$result['nome']."</td>";
	echo "<td class='dn'>".$result['telefone']."</td>";
	echo "<td class='dn'>".$tipo."</td>";
	echo "<td class='dn'>".$result['login']."</td>";
	echo "<td class='dn'>".$ativo."</td>";
	echo '<td class="dn"><button class="btn btn-xs btn-warning" name="up" id="up" data-toggle="modal" data-target="#myModal" data-whatever="'.$result['id'].'" data-whatevernome="'.$result['nome'].'" data-whateverfone="'.$result['telefone'].'" data-whateveratv="'.$result['ativo'].'" data-whatevertipo="'.$result['tipo'].'"><span class="glyphicon glyphicon-edit"></span></button></td>';
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
