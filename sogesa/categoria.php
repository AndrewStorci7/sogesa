
<?php
require_once('connessione.php');
$IdCategoria = $_POST['id'];

$query = "		SELECT *
				FROM categorie
				WHERE IdCategoria = '".$IdCategoria."'";

$risultato = mysqli_query($conn,$query) or die("Errore nell'esecuzione della query.");

while ($row = $risultato->fetch_assoc()) {
		$titolo=$row['Titolo'];
		$desc=$row['Descrizione'];
		$titolo=html_entity_decode($titolo,ENT_QUOTES,"UTF-8");
		$desc=html_entity_decode($desc,ENT_QUOTES,"UTF-8");
	echo json_encode('{"categorie":[
							{"id":"'.$row['IdCategoria'].'",
							"categoria":"'.$titolo.'",
							"desc":"'.$desc.'"}
							]}');
}
?>
