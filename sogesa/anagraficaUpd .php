<?php

require_once('connessione.php');
	
	$Cognome = $_POST['cognome'];
	$Nome = $_POST['nome'];
	$cf = $_POST['cf'];
	$luogo = $_POST['luogo'];
	$nascita = $_POST['nascita'];
	$via = $_POST['via'];
	$citta = $_POST['citta'];
	$Email = $_POST['email'];
	$telefono = $_POST['telefono'];
	$id = $_POST['id'];

	$patente = $_POST['patente'];
	$scadpat = $_POST['scadpat'];
	$licenza = $_POST['licenza'];
	$scadlic = $_POST['scadlic'];
	$query =' UPDATE  partecipanti
			SET partecipanti.Cognome= "'.$Cognome.'",partecipanti.Nome="'.$Nome.'",partecipanti.CF="'.$cf.'",partecipanti.LuogoNascita="'.$luogo.'",partecipanti.DataNascita="'.$nascita.'",partecipanti.via="'.$Via.'",partecipanti.Citta="'.$citta.'",partecipanti.Telefono="'.$telefono.'",partecipanti.Email="'.$Email.'",partecipanti.patente="'.$patente.'",partecipanti.scadpat="'.$scadpat.'",partecipanti.licenza="'.$licenza.'",partecipanti.scadlic="'.$scadlic.'"
	         WHERE partecipanti.idPartecipante ="'.$id.'"';
 	echo $query;
    $result = mysqli_query($conn,$query);
	if (!$result)
	{
		echo "0";
		die();

	}else{
		echo "1";
}


?>
