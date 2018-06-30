
<div class="row">
    <div class="col-lg-12">
        <h1>Perfil <small>Editar informaçoes do perfil</small></h1>  
		<p class="t"><i>Os dados com * são obrigatorio</i></p>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
		<form method="POST" action="edit.php">									
			<div class="panel panel-primary">
			 	<div class="panel-heading">Dados do perfil</div>
				
			 	 <input   type="text" name="userid" value="<?php echo $Usuario->id; ?>" hidden>
			  	 <div class="panel-body">
			    	<div class="form-group">
			    		<label >Nome:</label>
			    		<input  type="text" class="form-control" name="nome"   style="max-width: 350px;" maxlength="255" value="<?php echo $Usuario->nome ;?>" required>
					</div>
					<div class="form-group">
			    		<label >Email:</label>
			    		<input type="email" class="form-control" name="email" style="max-width: 300px;" value="<?php echo $Usuario->email;?>" maxlength="255" required>
					</div>
			  	</div>
			</div>	
			<div class="panel panel-primary">
			 	<div class="panel-heading">Dados do login</div>
				<input type="text" value="<?php echo $Usuario->senha; ?>" name="vsenha" hidden>
			  	 <div class="panel-body">					
			    	<div class="form-group">					    		
			    		<label >Usuario:</label>
			    		<input type="text" class="form-control" name="usuario" value="<?php echo $Usuario->usuario;?>" maxlength="50" style="max-width: 300px;" required>
					</div>
					<div class="form-group">						
			    		<label >Nova senha: </label>
			    		<input type="password" class="form-control" name="nsenha" maxlength="16" style="max-width: 300px;">
					</div>					
			  	</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading">Confirmar senha</div>
				<div class="panel-body">
					<div class="form-group">						
			    		<label >Senha*:</label>
			    		<input type="password" class="form-control" name="senha" maxlength="16" style="max-width: 300px;"  required>
						<p class="t"><br><i>Digite sua senha novamente para alterar os dados</i></p>
					</div>
				</div>
				<?php 
					if(isset($_GET['msg'])){
				?>
				<div class="alert alert-danger" role="alert">
						<?php echo $_GET['msg']; ?>
					</div>
				<?php } ?>
			</div>
			
			<center>
				<button type="submit" name="submit" class="btn btn-primary">Editar</button><br>
			</center>		
		</form>
	</div>
</div>        
