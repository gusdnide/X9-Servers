<?php
	require "sec.php";
	require "classes/conexao.php";
	require "classes/daotabusuario.class.php";
	$msg = "";
	
	if(isset($_POST['usuario']) && isset($_POST['senha'])){
		$dao = new DaoTabUsuario;
		if($dao->Login($_POST['usuario'], $_POST['senha'] )){						
			$_SESSION['iduser'] = $dao->RetornaID($_POST['usuario']);			
		}else{
			$msg = "Usuario ou senha incorreto!";
		}
		
	}	
	if(isset($_SESSION["iduser"]))
		Header("Location: " . "painel/index.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="shortcut icon" type="image/x-icon" href="img/icon.ico" />
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<style type="text/css">
			.login{
				margin-top: 10%;
				color: white;
				background-color: rgba(50, 50, 50, 0.5);
				padding: 15px 15px 15px 15px;
				border-left: 2px solid blue;
				border-radius: 3px;
			}
			.t{
				font-size: 13px;
				color: orange;
			}
		</style>

	</head>
	<body style="background-color: black;">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 login">				
				<form method="POST" action="#">
					<center><h3>Login</h3></center>
					<p class="t">Os dados com * são obrigatorio</p>
					<div class="form-group">
					    <label for="email">Usuario:</label>
					    <input type="text" class="form-control" name="usuario" required>
					</div>
					<div class="form-group">
					    <label for="pwd">Senha:</label>
					    <input type="password" class="form-control" name="senha" required>
					</div>
					<div class="checkbox">
					    <label><input type="checkbox"> Lembrar Senha</label>
					</div>
					<center>
						<button type="submit" class="btn btn-primary">Login</button>	
						<button type="submit" onclick="window.location.href = 'cadastro.php';" class="btn btn-default">Registrar</button>
						
					</center><br>
					<?php if($msg != ""){  ?>
					<div class="alert alert-danger" role="alert">
						<?php echo $msg; ?>
					</div>
					<?php } ?>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
	</body>
</html>