
  <?php
	require_once('connessione.php');

	if(isset($_POST['id'])){
		$id=$_POST['id'];
	} else{
		$id="";
	}

	$yy="SELECT * FROM scarichi WHERE codEv='".$id."'";

	$resulty = mysqli_query($conn,$yy);

	$num_rowsy = mysqli_num_rows($resulty);
	$jsonResult='';
			$cntrow=0;
if($num_rowsy>0){

while($rowy = mysqli_fetch_array($resulty) ){

	$idy = $rowy['codPar'];



	$y="SELECT * FROM partecipanti WHERE idPartecipante='".$idy."' ORDER BY Nome ASC";

	$result = mysqli_query($conn,$y);

	$num_rows = mysqli_num_rows($result);
			if($num_rows>0){


			while($row = mysqli_fetch_array($result) ){

					$id = $row['idPartecipante'];
					$nome = $row['Nome'];
					$cognome = $row['Cognome'];
					$email = $row['Email'];

		$nome=html_entity_decode($nome,ENT_QUOTES,"UTF-8");
		$cognome=html_entity_decode($cognome,ENT_QUOTES,"UTF-8");
		$email=html_entity_decode($email,ENT_QUOTES,"UTF-8");


					if($cntrow==0){
						$jsonResult.='{"anagrafica":[';
						$cntrow++;
					}else{
						$jsonResult.=',';
					}
					$jsonResult.='{"id":'.$id.',"nome":"'.$nome.'","cognome":"'.$cognome.'", "email":"'.$email.'"}';
			}
		}

}


		if($cntrow>0){
			$jsonResult.=']}';
		}

}





	echo json_encode($jsonResult);
?>
