<!DOCTYPE html>
<html>
<body>

<?php
echo "Qualquer coisaaaaaaaaaaa!"; // Isto é um comentário de linha
echo "<br>Outra cena."; # Isto é um comentário de linha 
/*
Comentar
várias
linhas
*/

echo "<br><br>";
$nome = "João";
echo $nome;

echo "<br><br>";
$idade = 41;
echo "O " . $nome . " tem " . $idade . " anos";
echo "<br>";
echo "O " . $nome . " nasceu em " . 2021-$idade;
echo "<br>";
echo "O " . $nome . " nasceu em " . date("Y")-$idade;
echo "<br>";
echo "O $nome tem $idade anos";
echo "<br>";
echo "O \$nome tem \$idade \\\\ anos";

echo "<br><br>";
$nome = "Joao Lobato Cancio";
echo strlen($nome);
echo "<br>";
echo str_word_count($nome);
echo "<br>";
echo strrev($nome);
echo "<br>";
echo strpos($nome, "Lobato");
echo "<br>";
echo str_replace("Lobato", "Cenas", $nome);

/*
5 == 5   ... true
5 == "5" ... true
5 == 5.0 ... true

5 === 5   ... true
5 === "5" ... false
5 === 5.0 ... false

5 <=> 3 ... 1
5 <=> 5 ... 0
5 <=> 7 ... -1
*/

$nome = "João";
$nome .= " Lobato";
$nome .= " Câncio";
echo "<br><br>";
echo $nome;

echo "<br><br>";
$nota = 17;

if ($nota >= 0 and $nota <= 20){
	if ($nota < 10){
		echo "Negativa";
	} elseif($nota < 15) {
		echo "Suficiente";
	} elseif($nota < 18) {
		echo "Bom";
	} else {
		echo "Excelente";
	}
} else {
	echo "Valores inválidos seu este seu aquele!";
}

echo "<br><br><h1>LOOPS</h1>";

$x = 4;


for($i = 1 ; $i <= 10 ; $i++){
	for($j = 1 ; $j <= 10 ; $j++){
		echo $i . " x " . $j . " = " . $i * $j . "<br>";
	}
}

echo "<br><br>";

$i = 1;
while($i <= 10){
	echo $i;
	$i++;
}

echo "<br><br>";

$i = 11;
do{
	echo $i;
	$i++;
} while($i <= 20);

echo "<br><br><h1>ARRAYS</h1>";

$carros = array(  // ARRAY UNIDIMENSIONAL INDEXADO
	"BMW", 
	"Renault", 
	"Ferrari", 
	"Audi", 
	"Opel"
);

echo $carros[1];
echo "<br>O meu $carros[0] está sem gasolina";

echo "<br><br>";

$carros = array(   // ARRAY UNIDIMENSIONAL ASSOCIATIVO
	"negocios" => "BMW", 
	"citadino" => "Renault", 
	"desportivo" => "Ferrari", 
	"pintas" => "Audi", 
	"familiar" => "Opel"
);

echo $carros["pintas"];
echo "<br>O meu " . $carros["desportivo"] . " está sem gasolina";

echo "<br><br>";

$imagens = array(
	array("foto01.jpg", "Bife com Molho"),
	array("foto02.jpg", "Sushi"),
	array("foto03.jpg", "Sobremesa"),
	array("foto04.jpg", "Citrinos")

);

/*
for($i = 0 ; $i < count($imagens) ; $i++){
	echo "<img src='imagens/" . $imagens[$i] . "' style='width:200px;'>";
}

echo "<br><br>";
*/

foreach($imagens as $value){
	echo "<img src='imagens/" . $value[0] . "' style='width:200px;'>";
	echo "<h5>" . $value[1] . "</h5>";
}


echo "<br><br>";

$imagens_assoc = array(
	array("ficheiro" => "foto01.jpg", "titulo" => "Bife com Molho"),
	array("ficheiro" => "foto02.jpg", "titulo" => "Sushi"),
	array("ficheiro" => "foto03.jpg", "titulo" => "Sobremesa"),
	array("ficheiro" => "foto04.jpg", "titulo" => "Citrinos"),
	array("ficheiro" => "foto05.jpg", "titulo" => "Citrinos"),
	array("ficheiro" => "foto06.jpg", "titulo" => "Citrinos"),
	array("ficheiro" => "foto07.jpg", "titulo" => "Citrinos"),
	array("ficheiro" => "foto08.jpg", "titulo" => "Citrinos"),
	array("ficheiro" => "foto09.jpg", "titulo" => "Citrinos"),
	array("ficheiro" => "foto10.jpg", "titulo" => "Citrinos")

);


foreach($imagens_assoc as $value){
	echo "<img src='imagens/" . $value["ficheiro"] . "' style='width:200px;'>";
	echo "<h5>" . $value["titulo"] . "</h5>";
}


?>


<table>
	<tr>
	
<?php
	$i = 1;
	foreach($imagens_assoc as $value){
?>

		<td>
			<img src="imagens/<?= $value["ficheiro"] ?>" style="width:200px; height:150px; object-fit: cover;<?php if ($i % 2 == 0){ ?> border: 5px solid green;<?php } ?>">
			<h5><?= $value["titulo"] ?></h5>
		</td>
		
<?php
		if ($i % 4 == 0){
			echo "</tr><tr>";
		}
		$i++;
	}
?>
	</tr>
</table>


<?php
echo "<br><br><h1>FUNCTIONS</h1>";	

function calcularIVA($valor){
	$iva = 0.23;
	$valorIVA = $valor * $iva;
	return $valor + $valorIVA;
}

echo calcularIVA(10);


echo "<br><br><h1>BASE DE DADOS</h1>";

$servidor = "localhost";
$baseDados = "pweb06_site";
$userBaseDados = "pweb06_site_user";
$passwordBaseDados = "teste123";
	
//Estabelecer ligação e guardar a mesma
$ligacaoBD = mysqli_connect($servidor, $userBaseDados, $passwordBaseDados, $baseDados) 
	or die("Erro de acesso à Base de Dados.");

$sql = "SELECT titulo, ficheiro
		FROM conteudo
		INNER JOIN tipo ON conteudo.id_tipo = tipo.id_tipo
		WHERE tipo.tipo LIKE 'Galeria' ";
		
$listaRegistos = mysqli_query($ligacaoBD, $sql);

while($linha = mysqli_fetch_assoc($listaRegistos)){
	//echo $linha['titulo'] . "<br>";
	//echo $linha['ficheiro'] . "<br>";
?>	
	
	<div style="float:left;width:200px;padding:4px;">
		<img src="imagens/upload/<?= $linha['ficheiro'] ?>" style="width:200px;height:150px;object-fit:cover;">
		<h5><?= $linha['titulo'] ?></h5>
	</div>
	
<?php
}


?>



<br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>
