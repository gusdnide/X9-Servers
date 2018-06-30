<!DOCTYPE html>
<html>
	<head>
		<title>Painel administrativo</title>
		<link rel="shortcut icon" type="image/x-icon" href="img/icon.ico" />
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<style type="text/css">
			* {
				
				background-color: black;				
			}
			.menu{    			
				padding-top: 50px;
				border-left: 3px solid red;
				border-right: 3px solid red;
				color: white;
			}
			.menu h4{
				text-align: center;
				color: red;

			}
			.menu ul{

			}
			.menu li:hover {
				color: white;
				cursor: pointer;
				border-bottom: 2px solid red;
			}
			.conteudo{
				border-left: 3px solid red;
				width: 100%;
				height: 100%;
				color: white;
			}
			.conteudo iframe{
				border : none;
				display: block;       /* iframes are inline by default */
    			background: #000;
    			border: none;         /* Reset default border */
    			height: 90vh;        /* Viewport-relative units */
    			width: 70vw;
    			border-right: 3px solid red;
			}

		</style>
		<script type="text/javascript">
			function red(te){
				console.log(te);
				window.location.href = te;
			}
		</script>
	</head>
	<body class="container-fluid">
		<div class="row" style="margin-top: 10px">
			<div class="col-md-3 menu">
				<h4><b>MENU</b></h4>
				<ul style="	list-style-type: none;">
					<li>Perfil</li>
					<li>Comprar</li>
					<li>Usuarios</li>
					<li>Servidores</li>
					<li>Jogos</li>
					<li>Deslogar</li>
				</ul>
			</div>
			<div class="col-md-8 conteudo">
				<div class="row">
					<?php require "usuarios.php" ?>
				</div>
			</div>
		</div>
	</body>
</html>