
<?php
	require_once('connessione.php');
	session_start();
	$IdPeriodo = $_POST["id"];
	$Titolo = $_POST["titolo"];
	$Descrizione = $_POST["desc"];
		$Titolo =  htmlentities($Titolo, ENT_QUOTES, "UTF-8");
	  $Titolo = my_htmlentities($Titolo);
		$Descrizione =  htmlentities($Descrizione, ENT_QUOTES, "UTF-8");
	  $Descrizione = my_htmlentities($Descrizione);
	
	$query = "UPDATE periodi
SET Titolo = '".$Titolo."', Descrizione = '".$Descrizione."'
WHERE IdPeriodo = '".$IdPeriodo."'";
	
	$result = mysqli_query($conn,$query);
	if($result){
		echo "1";
	}else{
		echo "0" . mysqli_error($conn);
	}
	function my_htmlentities($var, $qs = ENT_COMPAT, $charset = 'ISO-8859-1')
{
    $search = array('ì', 'è', 'é', 'ò', 'à', 'ù');
    $replace = array('&igrave;', '&egrave;', '&eacute;', '&ograve;', '&agrave;', '&ugrave;');
    
    $var = str_replace($search, $replace, $var);
    $var = htmlentities($var, $qs, $charset, false);
    
    return $var;
}  

?>