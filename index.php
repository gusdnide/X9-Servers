<!DOCTYPE html>
<?php
	require "classes/conexao.php";
	require "classes/daotabjogo.class.php";
	require "classes/daotabservidor.class.php";
	$daoJogo = new DaoTabJogo;
	$daoServers = new DaoTabServidor;
	$servidores;
	$info;
	$comentarios;
	if(isset($_GET['jogo']) && $_GET['jogo'] > 0){
		$servidores = $daoServers->listarServers( $_GET['jogo'] );
	}
	if(isset($_GET['info']) && $_GET['info'] > 0){
		$info = $daoServers->buscarServidor( $_GET['info']);
		$tempCom = $daoServers->retornaComentario($info->id);
		if($tempCom != -1){
			$comentarios = $tempCom;
		}else{
			$comentarios = array();
		}
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
		<script src="js/jquery-3.3.1.min.js"></script>
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
 				<div class=" col-md-8 offset-md-2 conteudo"> 					
 					<?php if(!isset($servidores) && !isset($info)){ ?>
 					<div class="card text-white bg-dark mb-3">
						<div class="card-header">
							<h4 style="text-align: center; color: white">Selecione o Jogo</h4>
						</div>
						<div class="card-body">
 							<div class="row" id="djogos"> 	 						
		 						<?php
		 							foreach ($daoJogo->listarJogo() as $j) {
		 								echo '<div class="col-md-3">';
		 								echo '<center> 				';
		 								echo '<form method="POST" action="#">';			
		 								echo '<a href="index.php?jogo=' . $j->id  .'">';
		 								echo '<img width="100px" height="100px" src="../img/'. $j->img .'">';
										echo '<p>' . $j->nome . '</p>';
		 								echo '</a>';
		 								echo '</form>';
		 								echo '</center>';							
			 							echo '</div>';
		 							}
		 						?> 
 							</div> 	
 						</div>
 					</div>
 				<?php }else if(!isset($info)){ ?>
 					<div class="row" id="dservers"> 	
 						<div class="col-md-12">					
	 						<div class="card text-white bg-dark mb-3">
	 							<div class="card-header">
	 								<h4 style="text-align: center; color: white">Servidores</h4>
	 							</div>
	 							<div class="card-body">
	 								<small><center style="color: white;">Clique no servidor para mais detalhes</center> </small>
			 						<table class="table table-striped table-dark"> 
			 							<thead>
			 								<tr>
			 									<th>Nome</th>
			 									<th>IP</th>
			 									<th>Max Jogadores</th>
			 								</tr>
			 							</thead>
			 							<tbody>
			 								<?php
			 									foreach ($servidores as $s) { 										
			 										echo "<tr>";
			 										echo '<td style="max-height: 90px; text-align: center;"> 
			 										<a href="index.php?info=' . $s->id  . '">
			 										<img src="img/'. $s->banner . '" width="200px" height="70px"/><br>
			 										' . $s->nome . "</a></td>";
			 										echo '<td style="font-family: Arial" class="tuca">' . $s->ip . ":" . $s->porta .  "</td>";
			 										echo '<td class="tuca">' . $s->maxjogador . "</td>";
			 										echo "<tr>";
			 									}
			 								?>
			 							</tbody> 							
			 						</table>
		 						</div>
	 						</div>
 						</div>
 					</div>
 				<?php }else{
 					?>
 					<div class="row" id="dinfo">
 						<div class="col-md-12">
 							<div class="row">
 								<div class="col-md-12">
 									<div class="card text-white bg-dark mb-3">
									  <div class="card-header">
									  	<center>
									  		<h2 class="card-title"><?php echo $info->nome; ?></h2>
									  		<img style="max-height: 140px; max-width: 300px;" src="img/<?php echo $info->banner; ?>"/>									  		
									  	</center>
									  	<p><strong>IP:</strong> <?php  echo $info->ip; ?></p>
									  	<p><strong>Porta:</strong> <?php  echo $info->porta; ?></p>
									  	<p><strong>Maximo jogadores:</strong> <?php  echo $info->maxjogador; ?></p>
									  </div>
									  <div class="card-body">
									    
									    <p class="card-text">
									    	<div class="col-md-12">
									    		<div class="card text-white bg-dark mb-3">
									    			<div class="card-header">
									    				<h4 class="card-title">Adicionar comentario</h4>
									    			</div>
									    			<div class="card-body">
									    				<p class="t">Os dados com * são obrigatorio</p>
									    				<form method="post" action="addcom.php">
									    					<input type="text"  name="sid" value="<?php echo $info->id; ?>" hidden="">
									    					<div class="form-group">
					    										<label>Nome *:</label>
					    										<input type="text" class="form-control" name="nome" required>
															</div>
															<div class="form-group">
    															<label>Comentario *:</label>
    															<textarea class="form-control" name="texto" rows="3" required></textarea>
  															</div>
  															 <div class="form-group">
															    <label>Estrelas *:</label>
															    <select class="form-control" name="rank" required>
															      <option>1</option>
															      <option>2</option>
															      <option>3</option>
															      <option>4</option>
															      <option selected>5</option>
															    </select>
															</div>
															<center>
																<button type="submit" class="btn btn-primary">Comentar</button>
															</center>
									    				</form>
									    			</div>
									    		</div>
									    	</div>

									    	<h5><center>Comentarios(<?php echo $info->numcomentario ?>)</center></h5>							    	
									    	<div class="row">
									    		<?php 
									    			for($i = $info->numcomentario-1; $i >= 0; $i--){
									    				$item = $comentarios[$i];
									    				echo '<div class="col-md-12">';
									    				echo '<div class="card text-white bg-dark mb-3">';
									    				echo '<div class="card-header">';
									    				echo '<small>'. $item->nome . ' - ';
														for($j = 0; $j < $item->rank; $j++){
															echo '<i class="fa fa-star" style="color: yellow;"></i>';
														}
														echo '</small>';
									    				echo '</div>';
									    				echo '<div class="card-body">';
									    				echo '<p>' . $item->texto . '</p>';
									    				echo '</div>';
									    				echo '</div>';
									    				echo '</div>' . PHP_EOL;
									    			}
									    		?>									    		
									    	</div>
									    </p>
									  </div>
									</div>
 								</div>
 							</div>
 						</div>					
 					</div>
 				<?php }?>
 				</div> 	
 			</div>
		</div>
	</body>
</html>
