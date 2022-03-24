
<?php

	require_once('connessione.php');

	$idUtente = $_POST['id'];
	//$idUtente="ugosugo";

	$query = ' SELECT `idPartecipante`, `CF`, `Cognome`, `Nome`, `Via`, `Citta`, `DataNascita`, `Telefono`, `Email`, `PatenteLicenza`, `DocumentoRiconoscimento`, `Password`, `Autorizzazione`, `DomandaSegreta`, `RispostaSegreta`, `Privacy`, `LuogoNascita`, `patente`, `scadpat`, `licenza`, `scadlic`

				from  partecipanti
				where partecipanti.idPartecipante="'.$idUtente.'"';

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
			$jsonResult.='{"anagrafica":[';
	$cntrow=0;
	while($row=mysqli_fetch_assoc($result))
	{
		$id = $row['idPartecipante'];
		$nome = $row['Nome'];
		$cognome = $row['Cognome'];

		$CF= $row['CF'];

		$data = $row['DataNascita'];
		$luogo = $row['LuogoNascita'];
		$citta = $row['Citta'];
		$via = $row['Via'];
		$telefono = $row['Telefono'];
		$email = $row['Email'];
		$patente = $row['patente'];
		$scadpat = $row['scadpat'];
		$licenza = $row['licenza'];
		$scadlic = $row['scadlic'];

		$nome=html_entity_decode($nome,ENT_QUOTES,"UTF-8");
		$cognome=html_entity_decode($cognome,ENT_QUOTES,"UTF-8");
		$CF=html_entity_decode($CF,ENT_QUOTES,"UTF-8");
		$data=html_entity_decode($data,ENT_QUOTES,"UTF-8");
		$luogo=html_entity_decode($luogo,ENT_QUOTES,"UTF-8");
		$citta=html_entity_decode($citta,ENT_QUOTES,"UTF-8");
		$via=html_entity_decode($via,ENT_QUOTES,"UTF-8");
		$telefono=html_entity_decode($telefono,ENT_QUOTES,"UTF-8");
		$email=html_entity_decode($email,ENT_QUOTES,"UTF-8");
		$patente=html_entity_decode($patente,ENT_QUOTES,"UTF-8");
		$scadpat=html_entity_decode($scadpat,ENT_QUOTES,"UTF-8");
		$licenza=html_entity_decode($licenza,ENT_QUOTES,"UTF-8");
		$scadlic=html_entity_decode($scadlic,ENT_QUOTES,"UTF-8");

		if($cntrow==0){
			$cntrow++;
		}else{
			$jsonResult.=',';
		}
		$jsonResult.='{"id":"'.$id.'","nome":"'.$nome.'", "cognome":"'.$cognome.'", "cf":"'.$CF.'", "nascita":"'.$data.'", "luogo":"'.$luogo.'", "citta":"'.$citta.'", "via":"'.$via.'", "telefono":"'.$telefono.'", "email":"'.$email.'", "patente":"'.$patente.'", "scadpat":"'.$scadpat.'", "licenza":"'.$licenza.'", "scadlic":"'.$scadlic.'"}';
	}
			$jsonResult.=']}';
	}
	echo(json_encode($jsonResult));


?>
