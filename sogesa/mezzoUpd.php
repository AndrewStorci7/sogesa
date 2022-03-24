<?php

require_once('connessione.php');

	$marca = $_POST['marca'];
	$cilindrata = $_POST['cilindrata'];
	$disciplina = $_POST['disciplina'];
	$massa = $_POST['massa'];
	$modello = $_POST['modello'];
	$id = $_POST['id'];


	$query =' UPDATE  mezzi
			SET marca= "'.$marca.'",modello="'.$modello.'",disciplina="'.$disciplina.'",cilindrata="'.$cilindrata.'",massa="'.$massa.'" WHERE IdM ="'.$id.'"';
    $result = mysqli_query($conn,$query);
	if (!$result)
	{
		echo "0";
		die();

	}else{
		echo "1";
}


?>
