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
<!DOCTYPE html>
<html>
<head>
	<title>X9 Servers</title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/fundo.css"/>
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<style type="text/css">
		* a{
			color: white;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class=" col-md-12 conteudo"> 					
 					<?php if(!isset($servidores) && !isset($info)){ ?>
 					<div class="card text-white bg-dark mb-3">
						<div class="card-header">
							<h4 style="text-align: center; color: white">Selecione o Jogo</h4>
						</div>
						<div class="card-body">
 							<div class="row" id="djogos"> 	 						
		 						<?php
		 							foreach ($daoJogo->listarJogo() as $j) {
		 								echo '<div class="col-sm-2">';
		 								echo '<center> 				';
		 								echo '<form method="POST" action="#">';			
		 								echo '<a href="app.php?jogo=' . $j->id  .'">';
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
 						<div class="col-sm-12">					
	 						<div class="card text-white bg-dark mb-3">
	 							<div class="card-header">
	 								<a href="<?php echo "app.php" ?>"><h4>Voltar</h4></a>
	 								<h4 style="text-align: center; color: white">Servidores</h4>
	 							</div>
	 							<div class="card-body">
	 								<small><center style="color: white;">Clique no servidor para mais detalhes</center> </small>
	 								<?php
	 									foreach ($servidores as $s) { 										
	 										echo '<div class="row">';
	 										echo '<div class="col-sm-12">
	 										<a href="app.php?info=' . $s->id  . '">
	 										<center><img src="img/'. $s->banner . '" width="150px" height="50px"/><br><p>
	 										' . $s->nome . "</p></center></a>";
	 										echo '<p style="font-family: Arial" class="tuca"><b>IP: </b>' . $s->ip . ":" . $s->porta .  "</p>";
	 										echo '<p class="tuca"><b>Players: </b> 0/' . $s->maxjogador . "</p>";
	 										echo "</div></div><hr>";
	 									}
			 						?>
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
									  	<a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>"><h4>Voltar</h4></a>
									  	<center>
									  		<h2 class="card-title"><?php echo $info->nome; ?></h2>
									  		<img width="150px" height="50px" src="img/<?php echo $info->banner; ?>"/>							  		
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
									    				echo '<div class="col-sm-12">';
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