<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-language" content="pt-br"/>
	<title>Bolão dos Amigos</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.maskedinput.js"></script>
	<script type="text/javascript" src="js/jquery.maskMoney.min.js"></script>
	<script src="js/controller.js"></script>

	<script type="text/javascript" src="js/formata_data.js"></script>
	<script type="text/javascript" src="js/formata_moeda.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Baloo+Paaji|Contrail+One|Poppins" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="cli">

	<!-- header navbar -->
	
	<header>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">Bolão dos Amigos</a>
				<div class="collapse navbar-collapse" id="myNavbar">	
					<ul class="nav navbar-nav navbar-right">
						<a href="index.html">
							<button type="submit" class="btn btn-info navbar-btn"><span class="glyphicon glyphicon-log-out""></span> login</button>
						</a>&nbsp;&nbsp;
					</ul>
				</div>
			</div>
		</nav>
	</header>
	
	<!-- Conteudo  -->
	<section class="container home">
		<br/><br/>
		<!-- dash board -->

		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="pull-right">
							<h4 class="glyphicon glyphicon-user"></h4>
						</div>
						<h4>Apostadores Ativos</h4>
					</div>
					<div class="panel-footer">
						<?php include "php/read.php";
						echo "<span>Temos ".$qtd." apostadores</span><br/>";
						?>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<div class="pull-right">
							<h4 class="glyphicon glyphicon-usd"></h4>
						</div>
						<h4>Mais Pontos</h4>
					</div>
					<div class="panel-footer">
						<?php
						echo "<span>R$ ".number_format($mais, 2, ',', '.')."</span><br/>";
						?>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="panel panel-success">
					<div class="panel-heading">
						<div class="pull-right">
							<h4 class="glyphicon glyphicon-usd"></h4>
						</div>
						<h4>Menos Pontos</h4>
					</div>
					<div class="panel-footer">
						<?php
						echo "<span>R$ ".number_format($menos, 2, ',', '.')."</span><br/>";
						?>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<div class="pull-right">
							<h4 class="glyphicon glyphicon-usd"></h4>
						</div>
						<h4>Total em Prêmios</h4>
					</div>
					<div class="panel-footer">
						<?php
						echo "<span>R$ ".number_format($arrecad, 2, ',', '.')."</span><br/>";
						?>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal -->

		<div class="">
			<!-- <h1>Lista de Concursos</h1> -->
			<div class="modal fade" id="mConc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog modal-sm" role="document">
					<!-- Modal conteudo-->
					<div class="modal-content">
						<div class="modal-header" style="padding:10px 15px;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h2 class="modal-title" id="title"><span id="ico" class=""></span></h2>
						</div>
						<div class="modal-body" style="padding:10px 15px;">

							<!-- Fomulario -->
							<form action="" id="form4" role="form" method="post">
								<input type="hidden" name="id" id="id">
								<div class="form-group">
									<label for="cod"><span class="glyphicon glyphicon-list-alt"></span> Concurso</label>
									<input type="text" name="cod" class="form-control" id="cod" placeholder="Código">
								</div>
								<div class="form-group">
									<label for="atv"><span class="glyphicon glyphicon-briefcase"></span> Ativo</label>
									<select name="atv" class="form-control" id="atv">
										<option value="">Selecione uma opção</option>
										<option value="1">Sim</option>
										<option value="2">Não</option>
									</select>
									<button class="btn btn-success btn-block bts" id="save3"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
								</div>

							</form>

							<div class="modal-footer">
								<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal" id="canc" onclick="canc()"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="listaCli" class="col-sm-6">
				<h3>Dezenas dos Clientes</h3>
				<div class="col-sm-6 input-group">	
					<input type="text" id="busca" class="form-control" alt="result" autocomplete="off"/>
					<div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
				</div>
				<table id="lcli" class="table table-striped table-hover table-condensed display result" cellspacing="0">
					<thead>
						<th>Nome</th>
						<th>D1</th>
						<th>D2</th>
						<th>D3</th>
						<th>D4</th>
						<th>D5</th>
						<th>D6</th>
						<th>D7</th>
						<th>D8</th>
						<th>D9</th>
						<th>D10</th>
						<th>Acertos</th>
					</thead>
					<tbody>
						<?php
						include "php/apuracao.php";
						$n = 0;
						while ($res = $get2->fetch(PDO::FETCH_ASSOC)) {
						echo "<tr id='l".$n."'>";
							echo "<td name='".$res['nome']."'>".$res['nome']."</td>";
							echo "<td class='dn' name='c' id='c".$n."0'>".$res['d1']."</td>";
							echo "<td class='dn' name='c' id='c".$n."1'>".$res['d2']."</td>";
							echo "<td class='dn' name='c' id='c".$n."2'>".$res['d3']."</td>";
							echo "<td class='dn' name='c' id='c".$n."3'>".$res['d4']."</td>";
							echo "<td class='dn' name='c' id='c".$n."4'>".$res['d5']."</td>";
							echo "<td class='dn' name='c' id='c".$n."5'>".$res['d6']."</td>";
							echo "<td class='dn' name='c' id='c".$n."6'>".$res['d7']."</td>";
							echo "<td class='dn' name='c' id='c".$n."7'>".$res['d8']."</td>";
							echo "<td class='dn' name='c' id='c".$n."8'>".$res['d9']."</td>";
							echo "<td class='dn' name='c' id='c".$n."9'>".$res['d10']."</td>";
							echo "<td class='dn' name='n_hits' id='n_hits".$n."'></td>";
						echo "</tr>";
						$n++;
					}
					?>
				</tbody>
			</table>
		</div>
		<div id="Sorteios" class="col-sm-3">
			<h3>Dezenas dos Sorteios</h3>
			<table id="sort" class="table table-striped table-hover table-condensed display" cellspacing="0">
				<thead>
					<th class='dn'>Sorteios</th>
					<th class='dn'>D1</th>
					<th class='dn'>D2</th>
					<th class='dn'>D3</th>
					<th class='dn'>D4</th>
					<th class='dn'>D5</th>
					<th class='dn'>D6</th>
				</thead>
				<tbody>
					<?php
					include "php/apuracao.php";
					$m = 0;
					while ($res = $get->fetch(PDO::FETCH_ASSOC)) {
					echo "<tr>";
						echo "<td class='dn'>".$res['cod']."</td>";
						echo "<td class='dn' name='s' id='s".$m."0'>".$res['d1']."</td>";
						echo "<td class='dn' name='s' id='s".$m."1'>".$res['d2']."</td>";
						echo "<td class='dn' name='s' id='s".$m."2'>".$res['d3']."</td>";
						echo "<td class='dn' name='s' id='s".$m."3'>".$res['d4']."</td>";
						echo "<td class='dn' name='s' id='s".$m."4'>".$res['d5']."</td>";
						echo "<td class='dn' name='s' id='s".$m."5'>".$res['d6']."</td>";
					echo "</tr>";
					$m++;
				}
				?>
			</tbody>
		</table>
	</div>
	<div id="acertos" class="col-xs-6 col-sm-4 col-md-2">
		<h3>Acertos</h3>
		<table id="t_acert" class="table table-striped table-hover table-condensed display" cellspacing="0">
			<thead>
				<th  class='dn'>Dez.</th>
				<th  class='dn'>Qtd</th>
			</thead>
			<tbody>
				<?php 
				for ($i=10; $i >= 0; $i--) { 
				echo "<tr>";
					echo "<td class='dn'>".$i."</td>";
					echo "<td class='dn' id='a".$i."'></td>";
				echo "</tr>";
			}
			?>
		</tbody>
	</table>
</div>
</section>
<footer class="rodape navbar-fixed-bottom">
	<p class="t_ftr">Desenvolvido por: Alessandro Sousa</p>
	<p class="t_ftr">&copy; Copyright 2017 - All Rights Reserved</p>
</footer>
<script src="js/set_sort.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

</body>
</html>