<?php
	require "../sec.php";
	session_destroy();
	unset($_SESSION['iduser']);
	header("Location: ../login.php");
?>