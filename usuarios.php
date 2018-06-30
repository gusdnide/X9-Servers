<?php 
    include "../classes/daotabusuario.class.php";
	$dao = new DaoTabUsuario;
	$users = $dao->listarUsuarios();
 ?>
<div class="row">
    <div class="col-lg-12">
        <h1>Perfil <small>Editar informaçoes do perfil</small></h1>                   
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
		<table class="table table-dark">
			<thead>
				<tr>
					<center><h1>Gerenciamento de Usuarios</h1></center>
				</tr>
				<tr>
					<th>Id</th>
					<th>Nome</th>
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
						echo "<td>" . $u->cargo. "</td>";
						echo '<td>';
						echo '<button type="button" class="btn btn-info btn-sm" onclick="red(' . "'" .'del.php?i='. $u->id . "'" .');" >Promover</button>';
						echo '<button type="button" class="btn btn-danger btn-sm" onclick="red(' . "'" .'pro.php?i='. $u->id . "'" .');" >Excluir</button>';
						echo '</td>';
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
</div>
