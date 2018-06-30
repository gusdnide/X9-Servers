<?php 
	function PegarPacotes(){
		$stmt = Conecta::abrirConexao()->prepare('SELECT * FROM pacote');
		$stmt->execute();
		$resultado = array();
		while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
			array_push($resultado , $row );
		}
		return $resultado;
	}
 ?>
<div class="row">
    <div class="col-lg-12">
        <h1>Comprar <small>Comprar os pacotes para divulgar seu servidor</small></h1>                   
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
    	<div class="panel panel-primary">
			<div class="panel-heading">Selecione o pacote</div>
			<div class="panel-body">
				
					<div class="row">
						<?php
							foreach(PegarPacotes() as $p){
								echo '<form method="GET" action="comprar.php">';
								echo '<div class="col-md-4">';
								echo '<div class="panel panel-primary">';
								echo '<input type="text" name="userid" value="'. $Usuario->id .'" hidden />';
								echo '<input type="text" name="id" value="'. $p->id .'" hidden />';
								echo '<div class="panel-heading"><p>Pacote '. $p->nome .'</p></div>';
								echo '<div class="panel-body">';
								echo '<center>';
								echo '<img width="143px" height="147px" src="../img/'. $p->img . '"/>';
								echo '<p>' . ($p->dias ) . ' dias</p>';
								echo '<p> R$' . ($p->preco) . " </p>";
								echo '<button type="submit" " class="btn btn-warning btn-sm"> Fazer compra</button>';
								echo '</center></div></div></div>';
								echo '</form>';
							}
						?>											
					</div>
				
			</div>
		</div>
    </div>
</div>