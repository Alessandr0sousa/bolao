<?php

session_start();

error_reporting(0);
ini_set(“display_errors”, 0 );

if((!isset ($_SESSION['user']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['user']);
	unset($_SESSION['senha']);
	header('location: home.php');
}

$user = ucfirst($_SESSION['user']);
?>
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
						<li class="active"><a href="#">Apostas</a></li>
						<li><a href="concurso_sorteios.php">Concurso&Sorteios</a></li>
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

		<div class="page-header">
			<h1>Lista de Apostas</h1>
			<div class="form-group">
				<button class="btn btn-info pull-right" id="new_2"><span class="glyphicon glyphicon-plus-sign"></span> Novo</button>
			</div>

			<div class="modal fade" id="mdez" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog modal-sm" role="document">
					<!-- Modal conteudo-->
					<div class="modal-content">
						<div class="modal-header" style="padding:10px 15px;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h2 class="modal-title" id="title"><span id="ico" class=""></span></h2>
						</div>
						<div class="modal-body" style="padding:10px 15px;">
							
							<!-- Fomulario -->
							<form action="" id="form2" role="form2" method="post">
								<input type="hidden" name="id_dez" id="id_dez">
								<div class="form-group">
									<label for="nome"><span class="glyphicon glyphicon-user"></span> Cliente</label>
									<select name="nome" class="form-control" id="nome">
										<option value="">Selecione um Cliente</option>
										<?php include "php/read.php";
										while ($linha = $get->fetch(PDO::FETCH_ASSOC)) {
											echo "<option value=".$cliente = $linha['id'].">".$cliente = $linha['nome']."</option>";
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="concurso"><span class="glyphicon glyphicon-list-alt"></span> Concursos</label>
									<select name="concurso" class="form-control" id="concurso">
										<option value="">Selecione um Concurso</option>
										<?php 
										while ($linha2 = $get2->fetch(PDO::FETCH_ASSOC)) {
											echo "<option value=".$concurso = $linha2['id'].">".$concurso = $linha2['cod']."</option>";
										}
										?>
									</select>
								</div>
								<div id="dezenas" align="center">
									<?php
									echo"<table>";
									$i=1;
									for ($z=1; $z<=10 ; $z++) { 
										echo"<tr>";
										for ($j=1; $j<=6 ; $j++) { 
											$nm_input = "imp_".$i;
											$nm_radio = "radio_".$i;
											echo"<td>";
											echo '<label><input type="checkbox" value="'.$i.'" name="d[]" id="d[]">'.$i.'&nbsp;</label>';
											echo"</td>";
											$i++;
										}
										$j++;
										echo"</tr>";
									}
									echo"</table>";
									?>
									<span id="qtd" class="qtd"></span>
								</div>
								<button class="btn btn-success btn-block bts" id="save2"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
							</form>

						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal" id="canc" onclick="canc()"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div id="apostas" class="">
			<?php include "php/busca_dez.php";?>
		</div>
	</section>
	<footer class="rodape navbar-fixed-bottom">
		<p class="t_ftr">Desenvolvido por: Alessandro Sousa</p>
		<p class="t_ftr">&copy; Copyright 2017 - All Rights Reserved</p>
	</footer>
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="js/set.js"></script>
</body>
</html>