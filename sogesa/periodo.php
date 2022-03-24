
<?php
require_once('connessione.php');
$IdPeriodo = $_POST['id'];

$query = "		SELECT *
				FROM periodi
				WHERE IdPeriodo = '".$IdPeriodo."'";

$risultato = mysqli_query($conn,$query) or die("Errore nell'esecuzione della query.");

while ($row = $risultato->fetch_assoc()) {
		$titolo=$row['Titolo'];
		$desc=$row['Descrizione'];
		$titolo=html_entity_decode($titolo,ENT_QUOTES,"UTF-8");
		$desc=html_entity_decode($desc,ENT_QUOTES,"UTF-8");
	echo json_encode('{"periodi":[
							{"id":"'.$row['IdPeriodo'].'",
							"periodo":"'.$titolo.'",
							"desc":"'.$desc.'"}
							]}');
}
?>
