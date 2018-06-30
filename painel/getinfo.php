<?php
	require "../classes/daotabrelatorio.class.php";
	require "../classes/conexao.php";
	header('Content-Type: application/json');
	
	$dao = new DaoTabRelatorio;
	if($_GET['rel'] == "upc"){
		echo $dao->UsuariosPorCompra();
	}
	if($_GET['rel'] == "ppm"){
		echo $dao->PagamentosPorMes();
	}
	if($_GET['rel'] == "pmc"){
		echo $dao->PacotesMaisComprados();
	}
	if($_GET['rel'] == "smc"){
		echo $dao->ServidorMaisComentado();
	}
?>