
<?php
require_once('connessione.php');


/*$titolo = $_POST['Titolo'];
$tipo = $_POST['tipo']; 
$dataev = $_POST['dataev'];
$pager = $_POST['pager'];*/

$query = "	SELECT *
			FROM tipieventi ORDER BY Titolo ASC" ;

$result = mysqli_query($conn,$query);

if(!$result) {
	
	echo("Errore nell'esecuzione della query.");
	
	} 
	
$lista='{"tipi":[';
$countriga=0;
while($row=mysqli_fetch_assoc($result)){
	if($countriga==0){
		$countriga=1;
	}else{
		$lista.=',';
	}
	$titolo=$row['Titolo'];
		$titolo=html_entity_decode($titolo,ENT_QUOTES,"UTF-8");
	$lista.='{"id":"'.$row['IdTipoE'].'",
							"tipo":"'.$titolo.'"}';
}
$lista.=']}';
echo json_encode($lista);	
?>
