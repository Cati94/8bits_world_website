<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8">
		<title>Projecto Website</title>

		<link  rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

		<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />

		<link rel="stylesheet" href="estilos.css">
	</head>
<body>

<header>
	<div class="logo">
		<img src=".../ 8 bits world.jpeg">
	</div>
	<div class="menu">
		<ul>
			<li>
				<a href="#">Início</a>
			</li>
			<li>
				<a href="#sobrenos">Sobre nós</a>
			</li>
			<li>
				<a href="#produtos">Produtos</a>
			</li>
			<li>
				<a href="#galeria">Galeria</a>
			</li>
			<li>
				<a href="#contactos">Contactos</a>
			</li>
		</ul>
	</div>
</header>

<?php require_once "bd.php"; ?>

<section id="slider">

	<!-- Slider main container -->
	<div class="swiper">
		<!-- Additional required wrapper -->
		<div class="swiper-wrapper">
			<!-- Slides -->

<?php
	$sql = "SELECT * FROM lista_slides ";

	$listaRegistos = mysqli_query($ligacaoBD, $sql);

	while($linha = mysqli_fetch_assoc($listaRegistos)){
?>
			<div class="swiper-slide" style="background-image: url('imagens/upload/<?= $linha['ficheiro'] ?>')">
				<h4><?= $linha['titulo'] ?></h4>
				<h5><?= $linha['descricao'] ?></h5>
			</div>
<?php
	}
?>
			
		</div>

		<!-- If we need navigation buttons -->
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>

	</div>

</section>


<section id="destaques">

<?php
	$sql = "SELECT * FROM lista_destaques ";

	$listaRegistos = mysqli_query($ligacaoBD, $sql);

	while($linha = mysqli_fetch_assoc($listaRegistos)){
?>

	<div class="destaques-item">
		<div class="destaques-conteudo">
			<img src="imagens/upload/<?= $linha['ficheiro'] ?>">
			<h4><?= $linha['titulo'] ?></h4>
		</div>
	</div>

<?php
	}
?>
	
</section>

<section></section>

<section id="noticias">
	<h2>NOTÍCIAS</h2>
<?php
	$sql = "SELECT * FROM lista_noticias ";

	$listaRegistos = mysqli_query($ligacaoBD, $sql);

	while($linha = mysqli_fetch_assoc($listaRegistos)){
?>

	<div class="noticias-item">
		<div class="noticias-conteudo">
			<img src="imagens/upload/<?= $linha['ficheiro'] ?>">
			<h4><?= $linha['titulo'] ?></h4>
			<p><?= $linha['descricao'] ?></p>
		</div>
	</div>

<?php
	}
?>
	
</section>

<section></section>

<section id="sobrenos">
	<h2>Sobre Nós</h2>
<?php
	$sql = "SELECT * FROM lista_sobrenos ";

	$listaRegistos = mysqli_query($ligacaoBD, $sql);

	while($linha = mysqli_fetch_assoc($listaRegistos)){
?>

	<div class="sobrenos-item">
		<div class="sobrenos-conteudo">
			<img src="imagens/upload/<?= $linha['ficheiro'] ?>">
			<h4><?= $linha['titulo'] ?></h4>
			<p><?= $linha['descricao'] ?></p>
		</div>
	</div>

<?php
	}
?>
	
</section>

<section></section>

<section id="produtos">
	<h2>Produtos</h2>
<?php
	$sql = "SELECT * FROM lista_produtos ";

	$listaRegistos = mysqli_query($ligacaoBD, $sql);

	while($linha = mysqli_fetch_assoc($listaRegistos)){
?>

	<div class="produtos-item">
		<div class="produtos-conteudo">
			<img src="imagens/upload/<?= $linha['ficheiro'] ?>">
			<h4><?= $linha['titulo'] ?></h4>
			<p><?= $linha['descricao'] ?></p>
		</div>
	</div>

<?php
	}
?>
	
</section>

<section></section>

<section id="galeria">
	<h2>GALERIA DE FOTOS</h2>
<?php
	$sql = "SELECT * FROM lista_gal_fotos ";

	$listaRegistos = mysqli_query($ligacaoBD, $sql);

	while($linha = mysqli_fetch_assoc($listaRegistos)){
?>

	<div class="galeria-item">
		<div class="galeria-conteudo">
			<a href="imagens/upload/<?= $linha['ficheiro'] ?>" data-fancybox="fotos" data-caption="<?= $linha['titulo'] ?>">
				<img src="imagens/upload/<?= $linha['ficheiro'] ?>">
			</a>
			<h4><?= $linha['titulo'] ?></h4>
		</div>
	</div>

<?php
	}
?>	
	<div style="clear:both;"></div>

	<h2>GALERIA DE VIDEOS</h2>

	<?php
		$sql = "SELECT * FROM lista_gal_videos ";

		$listaRegistos = mysqli_query($ligacaoBD, $sql);

		while($linha = mysqli_fetch_assoc($listaRegistos)){
	?>

		<div class="galeria-item">
			<div class="galeria-conteudo">
				<a href="https://youtu.be/<?= $linha['ficheiro'] ?>" data-fancybox="videos" data-caption="<?= $linha['titulo'] ?>">
					<img src="https://img.youtube.com/vi/<?= $linha['ficheiro'] ?>/0.jpg">
				</a>
				<h4><?= $linha['titulo'] ?></h4>
			</div>
		</div>

	<?php
		}
	?>	
	<div style="clear:both;"></div>

</section>

<section></section>

<section id="contactos">
	<h2>Contactos</h2>


	
</section>



<footer>
	RODAPE
</footer>



<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

<script>
	const swiper = new Swiper('.swiper', {
		// Optional parameters
		direction: 'horizontal',
		loop: true,

		// Navigation arrows
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},

	});
</script>

</body>
</html>
