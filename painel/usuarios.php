<?php 	
	if(isset($_GET['act'])){
		if($_GET['act'] == "del"){
			$daoU->Deletar($_GET['i']);
		}
		if($_GET['act'] == "pro"){
			$daoU->Promover($_GET['i'], $_GET['cid']);
		}
	}
	$users;
	if(isset($_GET['buscau']) && strlen($_GET['buscau']) > 0){
		$users = $daoU->listarUsuarios2($_GET['buscau']);
	}
	if(isset($_GET['buscae'])&& strlen($_GET['buscae']) > 0){
		$users = $daoU->listarUsuarios3($_GET['buscae']);
	}
	if(isset($_GET['buscan'])&& strlen($_GET['buscan']) > 0){
		$users = $daoU->listarUsuarios4($_GET['buscan']);
	}
	if(!isset($users)){
		$users = $daoU->listarUsuarios();
	}
 ?>
<div class="row">
    <div class="col-lg-12">
        <h1>Usuarios <small>Gerenciar usuarios </small></h1>                   
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
			<form action="index.php" method="get" >
				<input type="text" name="p" value="<?php echo $_GET['p']; ?>" hidden>
				<div class="row">
					<div class="col-md-4">
						<input type="text" name="buscau"  class="form-control" placeholder="Pesquisar usuario" />
						<center><button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Pesquisar</button> </center>
					</div>	
					<div class="col-md-4">
						<input type="text" name="buscae"  class="form-control" placeholder="Pesquisar email" />
						<center><button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Pesquisar</button> </center>
					</div>
					<div class="col-md-4">
						<input type="text" name="buscan"  class="form-control" placeholder="Pesquisar nome" />
						<center><button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Pesquisar</button> </center>
					</div>				
				</div>
			</form> 
			<br>	
			<table class="table table-striped table-dark">
				<thead>				
					<tr>
						<th>Id</th>
						<th>Nome</th>
						<th>Usuario</th>
						<th>Email</th>
						<th>Cargo</th>
						<th>Opçoes</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($users as $u) {
							echo "<tr>";
							echo "<td>" . $u->id . "</td>";
							echo "<td>" . $u->nome . "</td>";
							echo "<td>" . $u->usuario. "</td>";
							echo "<td>" . $u->email. "</td>";
							echo "<td>" . $u->cargo. "</td>";
							echo '<td>';
							if($u->cargoid != 3){
								echo '<button type="button" class="btn btn-warning btn-sm" onclick="red(' . "'" .'index.php?p=u&act=pro&i='. $u->id. "&cid=". ($u->cargoid + 1)  . "'" .');" >Promover</button>';
							}
							echo '<button type="button" class="btn btn-danger btn-sm" onclick="red(' . "'" .'index.php?p=u&act=del&i='. $u->id . "'" .');" >Excluir</button>';
							echo '</td>';
							echo "</tr>";
						}
					?>
				</tbody>				
		</table>
		</div>
		</div>
	</div>
</div>
