<?php

	function listarSugestao(){		
 		$stmt = Conecta::abrirConexao()->prepare('SELECT * FROM sugestoes');
 		$stmt->execute();
 		$resul = array();
 		while($row = $stmt->fetch(PDO::FETCH_OBJ)){
 			array_push($resul, $row);
 		}
 		return $resul;
	}
	function DeletarSugestao($i){
		$stmt = Conecta::abrirConexao()->prepare('DELETE FROM sugestoes WHERE sugestoes.id = :i');
		$stmt->bindValue(":i", $i);
		return $stmt->execute();
	}	
	if(isset($_GET['act'])){
		DeletarSugestao($_GET['i']);
	}
	$S = listarSugestao();
?>
<div class="row">
    <div class="col-lg-12">
        <h1>Sugestoes <small>Gerenciar sugestoes</small></h1>                   
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
			<div class="panel-heading">Sugestoes</div>
			<div class="panel-body"> 
				<table class="table table-striped table-dark">
					<thead>				
						<tr>
							<th>Nome</th>
							<th>Opçoes</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$count = 1;
							foreach ($S as $u) {
								echo "<tr>";
								echo "<td>";
								echo '<div class="panel panel-heading"><center>';

								echo '<p  data-toggle="collapse" href="#c'. $count . '" role="button" aria-expanded="false" aria-controls="c'. $count . '">#';
								echo $u->id;								
								echo "</center></div>";
								echo '<div class="collapse" id="c'. $count . '">';
								echo '<div class="panel panel-body">';
								echo "<h4>" . $u->nome . "</h4>";
								echo "<small>" . $u->email . "</small>";
								echo "<p>" . $u->texto . "</p>";
								echo '</div>';
								echo '</div>';
								echo "</td>";
								echo '<td>';
								echo '<button type="button" class="btn btn-info btn-sm bg-green" onclick="red(' . "'" .'index.php?p=su&act=del&i='. $u->id . "'" .');" >Visualizar</button>';

								echo '</td>';
								echo "</tr>";
								$count++;
							}
						?>
					</tbody>				
				</table>				
			</div>
		</div>
	</div>
</div>