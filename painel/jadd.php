<?php
	require "../classes/conexao.php";
	require "../classes/daotabjogo.class.php";
	$dao = new DaoTabJogo;
	if(isset($_POST['nome'])){
		$nome = rand(11111111, 99999999) . "." . pathinfo($_FILES['img']['name'])['extension'];
		$updir = "../img/" . $nome;
		if(move_uploaded_file($_FILES['img']['tmp_name'], $updir)){
			$dao->Inserir($_POST['nome'], $nome);
			Header("Location: index.php?p=j");
		}
		else{
			echo "ERROR AO ENVIAR FOTO";
			die;
		}
	}
?>