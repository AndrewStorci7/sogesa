<?php

require_once('connessione.php');
$idPartecipante = $_GET['id'];

$query = "SELECT codEv FROM scarichi WHERE codPar = '".$idPartecipante."'";
$risultato = mysqli_query($conn,$query);
$num_rowsy = mysqli_num_rows($risultato);
if($num_rowsy>0){
	while($rowy = mysqli_fetch_array($risultato) ){
		$codEv = $rowy['codEv'];
		if($codEv>0){
			$querys =' UPDATE  eventi 
				SET nPartecipanti= nPartecipanti-1
					WHERE IdEvento ="'.$codEv.'"';
			
			$results = mysqli_query($conn,$querys);

		}
	}
}

$query = "DELETE FROM scarichi WHERE codPar = '".$idPartecipante."'";
$risultato = mysqli_query($conn,$query);


$query = "DELETE FROM partecipanti WHERE idPartecipante = '".$idPartecipante."'";
$risultato = mysqli_query($conn,$query);

if (mysqli_affected_rows($conn) > 0) {
    echo "1";
} else {
    echo "0";
}

?> 