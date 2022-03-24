
<?php

	require_once('connessione.php');

	//$query = "SELECT eventi.IdEvento, eventi.DataI, eventi.DataO, eventi.Titolo, tipieventi.Titolo AS titoloTipo, eventi. Descr,eventi.Meteo FROM eventi INNER JOIN tipieventi ON eventi.CodTipoE = tipieventi.IdTipoE WHERE YEAR(CURDATE()) = YEAR(eventi.DataI)";
	$query = "SELECT * FROM eventi WHERE DataI LIKE '%".date('Y')."%'";


	$result = mysqli_query($conn,$query);

	if (!$result)
	{
		echo "";
		die();
	}

	if(mysqli_num_rows($result)==0)
	{
		echo "";
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
		$dataEv = $row['DataI'];

		$tipo= $row['CodTipoE'];

		$desc = $row['Descr'];
		$meteo = $row['Meteo'];

		$titolo=html_entity_decode($titolo,ENT_QUOTES,"UTF-8");
		$tipo=html_entity_decode($tipo,ENT_QUOTES,"UTF-8");
		$desc=html_entity_decode($desc,ENT_QUOTES,"UTF-8");



		if($cntrow==0){
			$cntrow++;
		}else{
			$jsonResult.=',';
		}
		$jsonResult.='{"id":"'.$id.'","titolo":"'.$titolo.'","dataEv":"'.$dataEv.'","tipo":"'.$tipo.'","desc":"'.$desc.'","meteo":"'.$meteo.'"}';
	}
			$jsonResult.=']}';
	}
	echo(json_encode($jsonResult));
	?>
