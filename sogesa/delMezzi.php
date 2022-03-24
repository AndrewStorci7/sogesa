
<?php
	require_once('connessione.php');
	$IdMezzo = isset($_GET['id']) ? $_GET['id'] : '';
	$query = "DELETE FROM mezzi WHERE IdM = '".$IdMezzo."';";
			
	$result = mysqli_query($conn,$query);
	if (mysqli_affected_rows($conn) > 0) {
		echo "1";
	} else {
		echo "0";
	}
?>
