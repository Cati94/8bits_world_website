<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $uploadOk = 1;
            $utilizador = $_POST["utilizador"];
            $password = $_POST["password"];

            if ($utilizador == "") {
                echo "Falta o utilizador";
                $uploadOk = 0;
            }
            if ($password == "") {
                echo "Falta a password";
                $uploadOk = 0;
            } else {
                $password = md5($password);
            }
            
                        
            if($uploadOk == 1){
                
                require_once "../bd.php";

                $sql = "SELECT utilizador, pass
                        FROM utilizador
                        WHERE utilizador = '" . $utilizador ."'
                        AND pass = '" . $password ."' 
                        AND id_perfil = 1 ";

                $listaRegistos = mysqli_query($ligacaoBD, $sql);
                
                if(mysqli_num_rows($listaRegistos) == 0 ){
                    echo "DADOS INVALIDOS";
                } else {
                    $_SESSION['utilizador'] = $utilizador;
                }
            }
        }

    include "header.php" 
?>

		<h1>BACKOFFICE</h1>
		
    <?php

        if(!isset ($_SESSION['utilizador'])) {

            ?>

        <form class="bo-form" action="<?= basename(__FILE__); ?>" method="POST">
			<div>
				<label for="utilizador">Utilizador</label>
				<input type="text" name="utilizador">
			</div>
			
			<div>
				<label for="password">Password</label>
				<input type="password" name="password">
			</div>
						
			<div>
				<input type="submit" value="Entrar">
			</div>	
		</form>   
        
        <?php
        } else {
        ?>
        
        <h2>BEM-VINDO ao BACKOFFICE</h2>
        
        <?php
        }
        ?>

	</body>
</html>