
<?php
require_once('connessione.php');
$idScarico = $_GET['id'];

	$yy="SELECT * FROM scarichi WHERE idScarico='".$idScarico."'";
				
	$resulty = mysqli_query($conn,$yy);
	
	$num_rowsy = mysqli_num_rows($resulty);
	$jsonResult='';
			$cntrow=0;
if($num_rowsy>0){
	
$rowy = mysqli_fetch_array($resulty);
	$codEv = $rowy['codEv'];
if($codEv>0){
	
		$yy="SELECT * FROM eventi WHERE IdEvento='".$codEv."'";
				
	$resulty = mysqli_query($conn,$yy);
	
	$num_rowsy = mysqli_num_rows($resulty);
if($num_rowsy>0){
	
$rowy = mysqli_fetch_array($resulty);
	
	$nPartecipanti = $rowy['nPartecipanti'];
	$nPartecipanti--;
		$query =' UPDATE  eventi 
		SET nPartecipanti= "'.$nPartecipanti.'"
			WHERE IdEvento ="'.$codEv.'"';
 	
    $result = mysqli_query($conn,$query);

}
	
}
}


$query = "DELETE  FROM scarichi WHERE idScarico = '".$idScarico."'";
$risultato = mysqli_query($conn,$query);

if (mysqli_affected_rows($conn) > 0) {

    echo "1";
} else {
    echo "0";
}
?> 
