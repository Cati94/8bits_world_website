<?php
	$servidor = "localhost";
	$baseDados = "wordpress test";
	$userBaseDados = "MACOS10.15";
	$passwordBaseDados = "G8XkZOoH.xnj.6KO";
	
	//Estabelecer ligação e guardar a mesma
	$ligacaoBD = mysqli_connect($servidor, $userBaseDados, $passwordBaseDados, $baseDados) or die("Erro de acesso à Base de Dados.");
?>