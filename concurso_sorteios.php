<?php

session_start();

error_reporting(0);
ini_set(“display_errors”, 0 );

if((!isset ($_SESSION['user']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['user']);
	unset($_SESSION['senha']);
	header('location: index.php');
}

$user = ucfirst($_SESSION['user']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-language" content="pt-br"/>
	<title>Bolão dos Amigos</title>
	<meta charset="utf-8">
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
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					<a class="navbar-brand" href="#">Bolão dos Amigos</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li><a href="cli.php">Clientes</a></li>
						<li><a href="apostas.php">Apostas</a></li>
						<li class="active"><a href="#">Concurso&Sorteios</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#"><span class="user">&nbsp;Olá, <?php echo $user;?>, obrigado pelo acesso!</span></a>
						</li>
						<a href="php/sair.php">
							<button type="submit" class="btn btn-danger navbar-btn"><span class="glyphicon glyphicon-log-out""></span> Logout</button>
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
						<h4>Lucro do Concurso</h4>
					</div>
					<div class="panel-footer">
						<?php include "php/read.php";
						echo "<span>R$ ".number_format($lucro, 2, ',', '.')."</span><br/>";
						?>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<div class="pull-right">
							<h4 class="glyphicon glyphicon-list"></h4>
						</div>
						<h4>Concurso Nº</h4>
					</div>
					<div class="panel-footer">
						<button class="btn btn-xs btn-info pull-right" id="new_3" data-toggle="modal"><span class="glyphicon glyphicon-new-window"></span></button>
						<?php 
						$res = $get2->fetch(PDO::FETCH_ASSOC);
						echo "<span>".$res['cod']."</span>";
						echo '<button class="btn btn-xs btn-warning pull-right" name="up_3" id="up_3" data-toggle="modal" data-target="#mConc" data-whateverid="'.$res['id'].'" data-whatever="'.$res['cod'].'" data-whateveratv="'.$res['ativo'].'"><span class="glyphicon glyphicon-edit"></span></button>';
						?>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="panel panel-success">
					<div class="panel-heading">
						<div class="pull-right">
							<h4 class="glyphicon glyphicon-list-alt"></h4>
						</div>
						<h4>Ultimo sorteio</h4>
					</div>
					<div class="panel-footer">
						<?php 
						while ($res = $get3->fetch(PDO::FETCH_ASSOC)) {
							echo "<span class='dez'>".$res['d1']."</span>&nbsp;";
							echo "<span class='dez'>".$res['d2']."</span>&nbsp;";
							echo "<span class='dez'>".$res['d3']."</span>&nbsp;";
							echo "<span class='dez'>".$res['d4']."</span>&nbsp;";
							echo "<span class='dez'>".$res['d5']."</span>&nbsp;";
							echo "<span class='dez'>".$res['d6']."</span>";
						}
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
						<h4>Estimativa de Prêmios</h4>
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
							<form action="" id="form2" role="form" method="post">
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
			<div id="listaCli" class="col-sm-5">
				<table id="lcli" class="table table-striped table-hover table-condensed display" cellspacing="0">
					<thead>
						<th>nome</th>
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
					</thead>
					<tbody>
						<?php
						include "php/apuracao.php";
						while ($res = $get2->fetch(PDO::FETCH_ASSOC)) {
							echo "<tr>";
							echo "<td>".$res['nome']."</td>";
							echo "<td>".$res['d1']."</td>";
							echo "<td>".$res['d2']."</td>";
							echo "<td>".$res['d3']."</td>";
							echo "<td>".$res['d4']."</td>";
							echo "<td>".$res['d5']."</td>";
							echo "<td>".$res['d6']."</td>";
							echo "<td>".$res['d7']."</td>";
							echo "<td>".$res['d8']."</td>";
							echo "<td>".$res['d9']."</td>";
							echo "<td>".$res['d10']."</td>";
							echo "</tr>";
						}
						?>
					</tbody>
				</table>
			</div>
			<div id="Sorteios" class="col-sm-3">
				<table id="sort" class="table table-striped table-hover table-condensed display" cellspacing="0">
					<thead>
						<th>Sorteios</th>
						<th>D1</th>
						<th>D2</th>
						<th>D3</th>
						<th>D4</th>
						<th>D5</th>
						<th>D6</th>
					</thead>
					<tbody>
						<?php
						include "php/apuracao.php";
						while ($res = $get->fetch(PDO::FETCH_ASSOC)) {
							echo "<tr>";
							echo "<td>".$res['cod']."</td>";
							echo "<td>".$res['d1']."</td>";
							echo "<td>".$res['d2']."</td>";
							echo "<td>".$res['d3']."</td>";
							echo "<td>".$res['d4']."</td>";
							echo "<td>".$res['d5']."</td>";
							echo "<td>".$res['d6']."</td>";
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
		<script src="js/set.js"></script>
		<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
		<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

	</body>
	</html>