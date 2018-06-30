<?php
	require "../classes/daotabjogo.class.php";
	$dao = new DaoTabJogo;
	if(isset($_GET['act'])){
		$dao->Deletar($_GET['i']);
	}
?>
<div class="row">
    <div class="col-lg-12">
        <h1>Jogos <small> gerenciar categorias de jogo</small></h1>  
    </div>
</div>

<div class="row">
    <div class="col-lg-12">								
			<div class="panel panel-primary">
			 	<div class="panel-heading">Jogos</div>
			 	<div class="panel-body">
					<div class="row">
						<div class="col-md-6 offset-md-3">
							<div class="panel panel-default">
								<div class="panel-heading">Adicionar jogo novo</div>
								<div class="panel-body">
								<form  enctype="multipart/form-data"  action="jadd.php" method="POST">
									<input type="text" value="j" name="p" hidden/>
									<label>Nome:</label>
									<input type="text" style="color: black;" class="form-control" placeholder="Counter-Strike" name="nome" required>
									<label>Imagem: </label>								
									<input type="file" name="img" accept="image/*" style="color: black" class="form-control" placeholder="8888" required/>
									<input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
									<center><br><button class="btn btn-primary" type="submit" name="add" value="1">Adicionar</button></center>
								</form>
								</div>
							</div>
						</div>
						<br>
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">Lista de jogos</div>
								<div class="panel-body">
									<table class="table table-striped table-dark">
										<thead>
											<tr>
												<th>Nome</th>
												<th>Açoes</th>
											</tr>
										</thead>
										<tbody>
											<?php
												foreach($dao->listarJogo() as $j){
													echo "<tr>";
													echo '<td><img width="30px" heigth="30px" src="../img/' . $j->img . '"/>'.  $j->nome . '</td>';
													echo '<td><button type="button" class="btn btn-danger" onclick="red(' . "'" .'index.php?p=j&act=2&i='. $j->id . "'" .');" >Deletar</button>';
													echo '<tr>';
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
</div>