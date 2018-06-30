<?php
	require "../classes/conexao.php";
	require "../classes/daotabusuario.class.php";
	require "../classes/daotabservidor.class.php";
	require "../classes/daotabpagamento.class.php";
	require "../classes/daotabjogo.class.php";
	
	function BuscarInfoP($id){
		$stmt = Conecta::abrirConexao()->prepare('SELECT * FROM pacote WHERE id = :u');
		$stmt->bindValue(":u", $id);
		$stmt->execute();
		$row = $stmt->fetch();
		return $row;
	}
	$daoU = new DaoTabUsuario();
	$daoS = new DaoTabServidor();
	$daoJ = new DaoTabJogo();
	$Produto = BuscarInfoP($_GET['id']);
	$Usuario = $daoU->PegarUsuario($_GET['userid']);
    $daoP = new DaoTabPagamento();	
	if(isset($_POST['comprado'])){
		$nome = rand(11111111, 99999999) . "." . pathinfo($_FILES['serv_banner']['name'])['extension'];
		$updir = "../img/" . $nome;
		if(move_uploaded_file($_FILES['serv_banner']['tmp_name'], $updir)){
			$daoS->cadastrarServidor($_POST['serv_nome'], $_POST['serv_ip'], $_POST['serv_porta'], $nome,  $_POST['serv_maxp'], $_POST['serv_jogoid']);
			$idServidor = Conecta::abrirConexao()->lastInsertId();
			$daoP->InserirPagamento($idServidor, $Produto["id"], $Usuario->id);
		}
		else{
			echo "ERROR AO ENVIAR FOTO";
			die;
		}
	}
?>
<html>
	<head>	
		<title>Fazer compra</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css"/>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<form method="POST" enctype="multipart/form-data" action="#">
						<div class="card card-black">
							<div class="card-header">Pacote <?php echo $Produto["nome"]; ?></div>
							<div class="card-body">								
								<center><img src="../img/<?php echo $Produto["img"]; ?>" width="143px" height="147px"/>
								<p>Preço: R$ <?php echo $Produto["preco"];  ?>,00 </p>	
								</center>
							</div>
						</div>
						<?php if(!isset($_POST['comprado'])){?>
						<div class="card">
							<div class="card-header">Informaçoes do servidor</div>
							<div class="card-body">
								<label>Nome do servidor:</label>
								<input type="text" name="serv_nome" placeholder="teste" class="form-control" required/>
								<label>IP do servidor: </label>
								<input type="text" name="serv_ip" placeholder="xxx.xxx.xxx.xxx" class="form-control"required/>
								<label>Porta do servidor: </label>
								<input type="number" min="1" max="99999" name="serv_porta" placeholder="8888" class="form-control" required/>
								<label>Maximo de jogadores: </label>
								<input type="number" name="serv_maxp" min="1" placeholder="10" class="form-control" required/>
								<input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
								<label>Jogo: </label>
								<select class="form-control" name="serv_jogoid">
									<?php
										foreach($daoJ->listarJogo() as $jogo){
											echo '<option class="form-control" value="' .  $jogo->id .'">'. $jogo->nome .'</option>';
										}
									?>
								</select>
								<label>Banner: </label>								
								<input type="file" name="serv_banner" accept="image/*" class="form-control" placeholder="8888" required/>
							</div>
						</div>
						<div class="card">
							<div class="card-header">Informaçoes do pagamento</div>
							<div class="card-body">
								
								<p>Olá <b><?php echo $Usuario->nome; ?> </b> digite os detalhes do cartão de credito para fazer a compra (todos campos são requeridos)</p>
								<label>Nome do dono do cartao:</label>
								<input type="text" name="nome" placeholder="<?php  $Usuario->nome; ?>" class="form-control" required/>
								<label>Numero do cartao:</label>
								<input type="text" name="numero"  placeholder="567845955675" class="form-control" maxlength="16" required />								
								<label>Data de vencimento:</label>
								<input type="text" name="expire" class="form-control" placeholder="05/22" maxlength="5" required />
								<label>CCV:</label>
								<input type="text" name="ccv" class="form-control" placeholder="322" maxlength="4" required />
								<br>
								<button  name="comprado"  value="1" class="btn btn-primary" type="submit">Finalizar compra</button>
								
								<br><br>
								
							</div>
						</div>
						<?php }else {?>
							<br>
							<div class="card">
								<div class="card-header">Informaçoes do pagamento</div>
								<div class="card-body">
									<strong style="color: green;">Comprado</strong> com sucesso! <a href="index.php">Voltar ao menu</a>
								</div>
							</div>
						<?php }?>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>