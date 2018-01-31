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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.maskedinput.js"></script>
	<script type="text/javascript" src="js/jquery.maskMoney.min.js"></script>

	<script type="text/javascript" src="js/formata_data.js"></script>
	<script type="text/javascript" src="js/formata_moeda.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Baloo+Paaji|Contrail+One|Poppins" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="cli">
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
						<li class="active"><a href="#">Clientes</a></li>
						<li><a href="apostas.php">Apostas</a></li>
						<li><a href="concurso_sorteios.php">Concurso&Sorteios</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#"><span class="user">&nbsp;Olá, <?php echo $user;?>, obrigado pelo acesso!</span></a>
						</li>
						<a href="php/sair.php">
							<button type="submit" class="btn btn-danger navbar-btn"><span class="glyphicon glyphicon-log-out"></span> Logout</button>
						</a>&nbsp;&nbsp;
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<section class="container home" id="topo">
		<br/><br/>
		<div class="page-header">
			<h1>Lista de Clientes</h1>
			<div class="form-group">
				<button class="btn btn-info pull-right" id="new"><span class="glyphicon glyphicon-plus-sign"></span> Novo</button>
			</div>
			<!-- Formulário de Inserção de Clientes -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog modal-sm" role="document">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header" style="padding:10px 15px;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h2 class="modal-title" id="title"><span id="ico" class=""></span></h2>
						</div>
						<div class="modal-body" style="padding:10px 15px;">
							<form action="" id="form" role="form" method="post">
								<div class="form-group">
									<input type="hidden" name="id" id="id">
									<label for="concurso"><span class="glyphicon glyphicon-list-alt"></span> Concursos</label>
									<input type="text" name="nome" class="form-control" id="nome" placeholder="Nome">
								</div>
								<div class="form-group">
									<label for="fone"><span class="glyphicon glyphicon-earphone"></span> Telefone</label>
									<input type="text" name="fone" class="form-control fone" id="fone" placeholder="(99) 99999-9999" maxlength="11">
								</div>
								<div class="form-group">
									<label for="atv"><span class="glyphicon glyphicon-briefcase"></span> Ativo</label>
									<select name="atv" class="form-control" id="atv">
										<option value="">Selecione uma opção</option>
										<option value="1">Sim</option>
										<option value="2">Não</option>
									</select>
								</div>
								<div class="form-group">
									<label for="atv"><span class="glyphicon glyphicon-subtitles"></span> Tipo</label>
									<select name="tipo" class="form-control" id="tipo">
										<option value="">Selecione uma opção</option>
										<option value="1">Pagante</option>
										<option value="2">Oferta</option>
										<option value="3">Parceiro</option>
									</select>
								</div>
								<div class="form-group">	
									<button class="btn btn-success btn-block bts" id="save"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
								</div>
							</form>
							<div class="modal-footer">
								<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal" id="canc" onclick="canc()"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="clientes">
				<?php include "php/get.php"; ?>
			</div>
		</div>
		<div class="seta">
			<a href="#topo" name="voltar">
				<button class="btn btn-success"><span class="glyphicon glyphicon-circle-arrow-up"></span> Topo</button>
			</a>
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