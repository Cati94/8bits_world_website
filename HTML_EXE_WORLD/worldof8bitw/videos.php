<?php include "header.php" ?>

		<h1>Galeria de Videos</h1>
		
		
		<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$uploadOk = 1;
				$titulo = $_POST["titulo"];
				$descricao = $_POST["descricao"];
				$ficheiro = $_POST["ficheiro"];

				if ($titulo == "") {
					echo "Falta o título";
					$uploadOk = 0;
				}
				if ($ficheiro == "") {
					echo "Falta o ficheiro";
					$uploadOk = 0;
				}
				
				if($uploadOk == 1){
					
					require_once "../bd.php";

					$sql = "INSERT INTO conteudo (titulo, descricao, ficheiro, id_tipo)
					VALUES ('$titulo', '$descricao', '$ficheiro', 7)";
					
					if(mysqli_query($ligacaoBD, $sql)){
						echo "Video do YouTube bem inserido.";
						} else {
						echo "ERRO: " . mysqli_error($ligacaoBD);
					}						
				}

			}
			
		?>
		
		
		<form class="bo-form" action="<?= basename(__FILE__); ?>" method="POST" enctype="multipart/form-data">
			<div>
				<label for="titulo">Título</label>
				<input type="text" name="titulo">
			</div>
			
			<div>
				<label for="descricao">Descrição</label>
				<textarea name="descricao" rows="10"></textarea>
			</div>
			
			<div>
				<label for="ficheiro">ID do YouTube</label>
				<input type="text" name="ficheiro">
			</div>
			
			<div>
				<input type="submit" value="Enviar">
			</div>	
		</form>
		
		
	</body>
</html>