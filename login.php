<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-language" content="pt-br">
	<title>Bolão dos Amigos</title>
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/login.js"></script>
</head>
<body class="cli">
	<section class="container">
		<div class="container-fluid log">
			<div class="col-sm-4 col-sm-offset-4">
				<div class="form img-rounded">
					<div class="img">
						<img src="img/logo-LK-3.png" width="60%" class="im img-circle">
					</div>
					<form id="login" action="php/login.php" method="POST">

						<input id="user" class="form-control" type="text" name="user" autocomplete="off" placeholder="Login"><br/>

						<input id="senha" class="form-control" type="password" name="senha" placeholder="Senha"><br/>

						<button type="submit" class="btn btn-block btn-primary">Logar</button>
					</form>
				</div>
			</div>
		</div>
	</section>

	<footer class="rodape navbar-fixed-bottom">
		<p class="t_ftr">Desenvolvido por: Alessandro sousa</p>
		<p class="t_ftr">&copy; Copyright 2014-2017 - All Rights Reserved</p>
	</footer>
</body>
</html>
