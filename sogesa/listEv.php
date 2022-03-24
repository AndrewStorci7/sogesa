
<?php
require_once('connessione.php');

/*$titolo = $_POST['Titolo'];
$tipo = $_POST['tipo'];
$dataev = $_POST['dataev'];
$pager = $_POST['pager'];*/
$query = "SELECT *, STR_TO_DATE(DataI, '%d/%m/%Y') AS prova FROM eventi ORDER BY prova DESC";

$result = mysqli_query($conn,$query);

if(!$result) {

	echo("Errore nell'esecuzione della query.");

	}

$lista='{"eventi":[';
$countriga=0;
while($row=mysqli_fetch_assoc($result)){

	$titolo=$row['Titolo'];
		$titolo=html_entity_decode($titolo,ENT_QUOTES,"UTF-8");
	$dataEv=$row['DataI'];


		if($countriga==0){
			$countriga=1;
		}else{
			$lista.=',';
		}

		$lista.='{"id":"'.$row['IdEvento'].'","titolo":"'.$titolo.'"}';

}
$lista.=']}';
echo json_encode($lista);
?>
