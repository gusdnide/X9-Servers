<?php
	require "classes/conexao.php";
	require "classes/daotabservidor.class.php";
	$dao = new DaoTabServidor;
	$dao->cadastrarComentario($_POST['nome'], $_POST['texto'], $_POST['rank'], $_POST['sid']);
	Header("Location: " . $_SERVER['HTTP_REFERER']);
?>