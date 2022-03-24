
		<?php
	require_once('connessione.php');

		$idEvento = $_POST['id'];
		//$idEvento = 'ev01';

		$query = "SELECT IdEvento, Titolo, DataI, Descr, nPartecipanti, Meteo,codTipoE
				  FROM eventi WHERE IdEvento = '".$idEvento."'";



		$result = mysqli_query($conn,$query);

		if (!$result)
		{
			echo "Errore nella esecuzione della query SQL";
			die();
		}

		if(mysqli_num_rows($result)==0)
		{
			echo "Nessun evento trovato";
			die();
		}

		$num_rows = mysqli_num_rows($result);
		$jsonResult='';
		if($num_rows>0){
				$jsonResult.='{"eventi":[';
		$cntrow=0;
		while($row=mysqli_fetch_assoc($result))
		{
			$id = $row['IdEvento'];
			$titolo = $row['Titolo'];
			$titolo=html_entity_decode($titolo,ENT_QUOTES,"UTF-8");
			$dataEv = $row['DataI'];


			$desc = $row['Descr'];
			$desc=html_entity_decode($desc,ENT_QUOTES,"UTF-8");
			$meteo = $row['Meteo'];
			$num = $row['nPartecipanti'];
			$idTipo = $row['codTipoE'];

			$query2 = "SELECT Titolo
				  FROM tipieventi WHERE IdTipoE = '".$idTipo."'";



		$result2 = mysqli_query($conn,$query2);
	$num_rows2 = mysqli_num_rows($result2);
		if($num_rows2>0){
		while($row2=mysqli_fetch_assoc($result2))
		{
			$tipo = $row2['Titolo'];
			$tipo=html_entity_decode($tipo,ENT_QUOTES,"UTF-8");
		}
		}





			if($cntrow==0){
				$cntrow++;
			}else{
				$jsonResult.=',';
			}
			$jsonResult.='{"id":"'.$id.'","titolo":"'.$titolo.'","dataEv":"'.$dataEv.'","tipo":"'.$tipo.'","idTipo":"'.$idTipo.'","desc":"'.$desc.'","meteo":"'.$meteo.'","numero":"'.$num.'"}';
		}
				$jsonResult.=']}';
		}
		echo(json_encode($jsonResult));

	?>
