<!DOCTYPE html>
<?php
	require "classes/conexao.php";
	function EnviarSugestao($n, $e, $t){
		$stmt = Conecta::abrirConexao()->prepare('INSERT INTO sugestoes (nome, email, texto) VALUES(:n, :e, :t);');
		$stmt->bindValue(":n", $n);
		$stmt->bindValue(":e", $e);
		$stmt->bindValue(":t", $t);
		return $stmt->execute();
	}
	if(isset($_POST['nome'])){
		EnviarSugestao($_POST['nome'], $_POST['email'], $_POST['texto']);
	}
?>
<html>
	<head>
		<title>X9 Servers</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/fundo.css"/>
		<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<style type="text/css">
			.tuca{
				text-align: center;
vertical-align: middle;
line-height: 90px;
			}
			.t{
				font-size: 11px;
				color: red;
			}
	
		</style>
		<link rel="shortcut icon" type="image/x-icon" href="img/icon.ico" />
	</head>
	<body style="background-color: black;">		
		<div class="content-fluid">
			<div class="row">	
 				<h1 class="col-md-12" style="text-align: center;"><img src="img/logo.png"></h1> 
 				<div class="col-md-3"></div>
 				<div class="menu col-md-6">
 					<nav class="cl-effect-1">
 						<center>
						<a href="index.php" data-hover="Inicio"><span>Inicio</span></a>
						<a href="login.php" data-hover="Painel"><span>Painel</span></a>
						<a href="suporte.php" data-hover="Suporte"><span>Suporte</span></a>
						</center>
					</nav>
 				</div>
 				<div class="col-md-3"></div> 				
 			</div>	
 			<br>
 			<div class="row">
				<div class="col-md-8 offset-md-2 conteudo">					
					<div class="card text-white bg-dark mb-3">						
						<div class="card-body">
							<div class="row">								
								<div class="col-md-6 offset-md-3">
									<p><img src="img/ok.png" width="50" height="50"> <b>Obrigado</b> pela sua sugestão, vamos trabalhar o maximo nela.</p>
								</div>
							</div>
						</div>
					</div>					
				</div>
 			</div>
		</div>
	</body>
</html>
