<?php
include 'connect.php';

$i=1;

$b_dez = $pdo->prepare("SELECT * FROM cli_dez_conc");
$b_dez->execute();
echo "<div class='table table-responsive'>";
echo '<table id="apt" class="table-striped table-hover table-condensed display" cellspacing="0">';
echo "<thead>";
echo "<th class='dn'>Nº</th>";
echo "<th>NOME</th>";
echo "<th class='dn' colspan='10'>DEZENAS</th>";
echo "<th class='dn'>CONCURSO Nº</th>";
echo "<th class='dn'>EDITAR</th>";
echo "</thead>";
echo "<tboby>";

while ($result = $b_dez->fetch(PDO::FETCH_ASSOC)) {
	$result['lin'] = $i;
	echo "<tr>";
	echo "<td class='dn'>".$result['lin']."</td>";
	echo "<td>".$result['nome']."</td>";
	echo "<td class='dn'>".$result['d1']."</td>";
	echo "<td class='dn'>".$result['d2']."</td>";
	echo "<td class='dn'>".$result['d3']."</td>";
	echo "<td class='dn'>".$result['d4']."</td>";
	echo "<td class='dn'>".$result['d5']."</td>";
	echo "<td class='dn'>".$result['d6']."</td>";
	echo "<td class='dn'>".$result['d7']."</td>";
	echo "<td class='dn'>".$result['d8']."</td>";
	echo "<td class='dn'>".$result['d9']."</td>";
	echo "<td class='dn'>".$result['d10']."</td>";
	echo "<td class='dn'>".$result['cod']."</td>";
	echo '<td class="dn"><button class="btn btn-xs btn-warning" name="up_2" id="up_2" data-toggle="modal" data-target="#mdez" data-whateverid="'.$result['id_dez'].'" data-whatever="'.$result['id_cli'].'" data-whateverconcurso="'.$result['id_cod'].'"><span class="glyphicon glyphicon-edit"></span></button></td>';
	echo "</tr>";
	  $i++;
	// $saida[] = $result;
}
echo "</tboby>";
echo "</table>";
echo "</div>";
// echo json_encode($saida);
?>
