<?php
	$Loc = "index.php?";
	require "../classes/conexao.php";
	require "../classes/daotabusuario.class.php";
	$msg = "";
	if(isset($_POST['userid'])){
		if($_POST['vsenha'] == $_POST['senha']){
			$dao = new DaoTabUsuario();
			$dao->AtualizarInfo($_POST['userid'], $_POST['nome'], $_POST['email'], $_POST['usuario']);
			if(isset($_POST['nsenha'])){
				if(strlen($_POST['nsenha']) > 8){
					$dao->TrocarSenha($_POST['userid'], $_POST['nsenha']);
					
				}else if (strlen($_POST['nsenha']) > 0){
					$Msg = "A nova senha precisa ter no minimo 8 caracteres";
				}
			}
		}else{
		    $msg = "A confirmaчуo de senha estс invalida";
		}		
	}
	if($msg != ""){
		$Loc += "msg=" . $msg;
	}
	Header("Location: " . $Loc);
?>