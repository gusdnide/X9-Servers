<?php
	if(!isset($_GET['i']) || !isset($_GET['p']))
		die;
	$i = $_GET['i'];
	Header("Location: index.php?p=" . $_GET['p']);
?>