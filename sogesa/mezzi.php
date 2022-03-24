  <?php
	require_once('connessione.php');

	if(isset($_POST['id'])){
		$id=$_POST['id'];
	} else{
		$id="";
	}

	$yy="SELECT * FROM mezzi WHERE idPartecipante='".$id."'";

	$resulty = mysqli_query($conn,$yy);

	$num_rowsy = mysqli_num_rows($resulty);
	$jsonResult='';
			$cntrow=0;
if($num_rowsy>0){

while($rowy = mysqli_fetch_array($resulty) ){

	$idy = $rowy['IdM'];
	$marca = $rowy['marca'];
	$modello = $rowy['modello'];
	$disciplina = $rowy['disciplina'];
	$cilindrata = $rowy['cilindrata'];
	$massa = $rowy['massa'];


		$marca=html_entity_decode($marca,ENT_QUOTES,"UTF-8");
		$modello=html_entity_decode($modello,ENT_QUOTES,"UTF-8");
		$disciplina=html_entity_decode($disciplina,ENT_QUOTES,"UTF-8");
		$cilindrata=html_entity_decode($cilindrata,ENT_QUOTES,"UTF-8");
		$massa=html_entity_decode($massa,ENT_QUOTES,"UTF-8");
					if($cntrow==0){
						$jsonResult.='{"mezzi":[';
						$cntrow++;
					}else{
						$jsonResult.=',';
					}
					$jsonResult.='{"id":'.$idy.',"modello":"'.$modello.'","disciplina":"'.$disciplina.'", "cilindrata":"'.$cilindrata.'", "marca":"'.$marca.'", "massa":"'.$massa.'"}';

}


		if($cntrow>0){
			$jsonResult.=']}';
		}

}





	echo json_encode($jsonResult);
?>
