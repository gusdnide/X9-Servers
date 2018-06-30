<?php 
	
?>
<!DOCTYPE html>
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
				font-size: 13px;
				color: white;
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
							<div id="accordion">
								<div class="card text-white bg-dark mb-3">
									<div class="card-header">
										Perguntas frequentes
									</div>
									<div class="card-body">
										<div class="col-md-12">
											<div class="card text-white bg-primary mb-3 mb-3">
												<div class="card-header">
													P: Como anunciar meu servidor?
												</div>
												<div class="card-body">
													<ul>
														<li>Vá em painel</li>
														<li>Crie uma conta</li>
														<li>Logue na sua conta</li>
														<li>Vá em comprar</li>
														<li>Selecione um dos nossos pacotes</li>
														<li>Preencha os campos e clica em comprar</li>
													</ul>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="card text-white bg-primary mb-3 mb-3">
												<div class="card-header">
													P: Qual a forma do pagamento?
												</div>
												<div class="card-body">
													<p>Em nosso site só é possivel fazer a compra via <b>Cartão de credito</b> breves atualizaçoes vamos incluir outras formas de pagamentos.</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card text-white bg-dark mb-3">
									<div class="card-header">
										Enviar sugestão
									</div>
									<div class="card-body">
										<form method="POST" action="obrigado.php">
											<label>Nome:</label>
											<input class="form-control" maxlength="100" type="text" name="nome" required/>
											<label>Email:</label>
											<input class="form-control"  maxlength="100" type="email" name="email" required/>
											<label>Texto: <small class="t">  (Máximo de 255 caractéres)</small></label>
											<textarea class="form-control" maxlength="255" name="texto" rows="3" required></textarea>
											<center><button class="btn btn-primary" type="submit">Enviar</button></center>											
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>					
				</div>
 			</div>
		</div>
	</body>
</html>
