<?php
	require "classes/conexao.php";
	require "classes/daotabusuario.class.php";
	$dao = new DaoTabUsuario();
	$msg = "";
	
	if(isset($_POST['submit'])){
		try{
			$Usuario = new TabUsuario;
			if(strlen($_POST['senha']) < 8){
				$msg = "Minimo de 8 caracteres na senha";
			}else{
				if(!$dao->UsuDispo($_POST['usuario'])){
					$Usuario->setNome($_POST['nome']);
					$Usuario->setEmail($_POST['email']);
					$Usuario->setUsuario($_POST['usuario']);
					
					$Usuario->setSenha($_POST['senha']);
					$Usuario->setCargoid(1);			
					if($dao->CadastrarUsuario( $Usuario)){
						Header("Location: login.php");
					}else{
						$msg = "Nao cadastrado";
					}
				}else{
					
				}
			}
		}catch(Exception $e){
			$msg = "Error";
		}
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="shortcut icon" type="image/x-icon" href="img/icon.ico" />
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<
		<style type="text/css">
			.login{
				color: white;
				padding: 15px 15px 15px 15px;
			}
			h1{
				text-align: center;
			}
			.t{
				font-size: 11px;
				color: red;
			}
		</style>
		<script type="text/javascript">
			//setTimeout(function(){window.location.reload();}, 300);
		</script>
	</head>
	<body style="background-color: black;">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 login">				
				<form method="POST" action="#">
					
					<h1> Cadastro </h1>					
					<div class="card text-white bg-dark mb-3">
					 	<div class="card-header">Dados do perfil</div>
					  	<div class="card-body">
					  		<p class="t">Os dados com * são obrigatorio</p>
					    	<div class="form-group">
					    		<label >Nome *:</label>
					    		<input type="text" class="form-control" name="nome" maxlength="255" required>
							</div>
							<div class="form-group">
					    		<label >Email *:</label>
					    		<input type="email" class="form-control" name="email" maxlength="255" required>
							</div>
					  	</div>
					</div>
					
						<div class="card text-white bg-dark mb-3" >
					 	<div class="card-header">Dados do login</div>
					  	<div class="card-body">
					  		<p class="t">Os dados com * são obrigatorio</p>
					    	<div class="form-group">					    		
					    		<label >Usuario *:</label>
					    		<input type="text" class="form-control" name="usuario" maxlength="50" required>
							</div>
							<div class="form-group">
					    		<label >Senha *:</label>
					    		<input type="password" class="form-control" name="senha" maxlength="16" required>
							</div>
					  	</div>
					</div>
					<center>
						<button type="submit" name="submit" class="btn btn-primary">Registrar</button>
						<button onclick="window.location.href = 'login.php';" class="btn btn-default">Login</button>
						<?php if($msg != ""){ ?>
						<div class="alert alert-danger" role="alert">
  							<p> <?php echo $msg; ?> </p>
						</div>
						<?php }?>
					</center>		
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
	</body>
</html>