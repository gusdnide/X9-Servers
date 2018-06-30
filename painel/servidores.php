<?php 
    
    include "../classes/daotabservidor.class.php";
    include "../classes/daotabjogo.class.php";
	
	$dao = new DaoTabServidor;
	$daoJogo = new DaoTabJogo;
	
	$servidores;
	if(isset($_GET['jogo'])){
		if(isset($_GET['i'])){		
			$servidores = $dao->Deletar($_GET['i']);
		}else if(isset($_GET['userid'])){
			$servidores = $dao->listarServersDe($_GET['jogo'], $_GET['userid']);			
		}else{
			$servidores = $dao->listarServers($_GET['jogo']);
		}
		
	}
?>
<div class="row">
    <div class="col-lg-12">
        <h1>Servidores <small>Gerenciar servidores</small></h1>                   
    </div>
</div>
<div class="row">
	<div class="col-lg-12">   
		<div class="row">
			<div class="col-lg-4">
				
			</div>
		</div> 
	</div>
      <div class="col-lg-12">   
    	<div class="panel panel-primary">
			<div class="panel-heading"></div>
			<div class="panel-body"> 	
    	<?php if(!isset($servidores)){?>
    			<div class="row">
					<?php
	 					foreach ($daoJogo->listarJogo() as $j) {
								echo '<div class="col-md-3">';
								echo '<center>';
								if($Usuario->cargoid != 3){			
									echo '<a style="color:white;" href="index.php?p=s&jogo=' . $j->id  .'&userid=' .  $Usuario->id.'">';
								}else{
									echo '<a  style="color:white;" href="index.php?p=s&jogo=' . $j->id  .'">';
								}								
								echo '<img width="100px" height="100px" src="../img/'. $j->img .'">';
								echo '<p>' . $j->nome . '</p>';
								echo '</a>';
								echo '</center>';							
 								echo '</div>' . PHP_EOL;
							}
 					?> 
				</div>	
    	<?php }else{?>
		<table class="table table-striped table-dark"> 
 							<thead>
 								<tr>
 									<th>Nome</th>
 									<th>IP</th>
 									<th>Pacote</th>
 									<th>Açoes</th>
 								</tr>
 							</thead>
 							<tbody>
 								<?php
 									if(isset($servidores)){
 										foreach ($servidores as $s) {
	 										echo '';
	 										echo "<tr>";
	 										echo '<td style="max-height: 90px; text-align: center;">' . $s->nome . "</td>";
	 										echo '<td class="tuca">' . $s->ip . ":" . $s->porta .  "</td>";
	 										echo '<td class="tuca">' . $s->pacote . "</td>";	 										
	 										echo '<td><button type="button" class="btn btn-danger btn-sm" onclick="red(' . "'" .'index.php?p=s&i='. $s->id . "'" .');" >Cancelar</button>';
											echo '</td>';
	 										echo "<tr>" . PHP_EOL;
	 									}
 									}else{
 										echo "<tr><td><center><strong>Nenhum</strong> servidor</center></td></tr>";
 									}
 								?>
 							</tbody> 							
 						</table>
		</div>
		</div>
		<?php }?>
	</div>
</div>
