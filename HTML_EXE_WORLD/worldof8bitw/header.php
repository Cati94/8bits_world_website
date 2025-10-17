<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Backoffice</title>
		<link rel="stylesheet" href="../estilos.css" />
	</head>
	<body>
		<header>
			<div class="logo">
				<img src="../ 8 bits world">
			</div>
			<div class="menu">
				<ul>
					<li>
						<a href="index.php">Início</a>
					</li>
					<li>
						<a href="slider.php">Slider</a>
					</li>
					<li>
						<a href="destaques.php">Destaques</a>
					</li>
					<li>
						<a href="noticias.php">Notícias</a>
					</li>
					<li>
						<a href="sobrenos.php">Sobre nós</a>
					</li>
					<li>
						<a href="produtos.php">Produtos</a>
					</li>
					<li>
						<a href="galeria.php">Fotos</a>
					</li>
					<li>
						<a href="videos.php">Videos</a>
					</li>
	<?php
		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}
		if(isset ($_SESSION['utilizador'])) {
	?>
					<li class="bt-logout">
						<a href="logout.php">LOGOUT</a>
					</li>
	<?php
		} else if ( basename($_SERVER['PHP_SELF']) != "index.php") {
			header("Location: index.php");
			die();			
		}

	?>
				</ul>
			</div>
		</header>
