  <?php
	require_once('connessione.php');

	if(isset($_POST['id'])){
		$id=$_POST['id'];
	} else{
		$id="";
	}

	$yy="SELECT * FROM scarichi WHERE codPar='".$id."' ORDER BY idScarico DESC";

	$resulty = mysqli_query($conn,$yy);

	$num_rowsy = mysqli_num_rows($resulty);
	$jsonResult='';
			$cntrow=0;
if($num_rowsy>0){
while($rowy = mysqli_fetch_array($resulty) ){

	$idy = $rowy['idScarico'];
	$patente = $rowy['patente'];
	$documento = $rowy['documento'];
	$dataScarico = $rowy['DataScarico'];
	$cf = $rowy['cfg'];
	$prezzo = $rowy['prezzo'];
	$idMezzo = $rowy['idMezzo'];


	if($idMezzo>0){

	$yy="SELECT * FROM mezzi WHERE IdM=".$idMezzo." ORDER BY IdM DESC";

	$resultya = mysqli_query($conn,$yy);

	$num_rowsya = mysqli_num_rows($resultya);
if($num_rowsya>0){

$rowya = mysqli_fetch_array($resultya);

	$idMezzo = $rowya['marca'];
	$idMezzo.= ' '.$rowya['modello'];
	$idMezzo.= ' '.$rowya['disciplina'];

}else{
	$idMezzo = '';
}




	}




			$patente=html_entity_decode($patente,ENT_QUOTES,"UTF-8");
		$documento=html_entity_decode($documento,ENT_QUOTES,"UTF-8");
		$cf=html_entity_decode($cf,ENT_QUOTES,"UTF-8");
		$prezzo=html_entity_decode($prezzo,ENT_QUOTES,"UTF-8");

					if($cntrow==0){
						$jsonResult.='{"scarichi":[';
						$cntrow++;
					}else{
						$jsonResult.=',';
					}

					$jsonResult.='{"id":'.$idy.',"patente":"'.$patente.'","documento":"'.$documento.'", "dataScarico":"'.$dataScarico.'", "cf":"'.$cf.'", "prezzo":"'.$prezzo.'", "idMezzo":"'.$idMezzo.'"}';

}


		if($cntrow>0){
			$jsonResult.=']}';
		}

}





	echo json_encode($jsonResult);
?>
