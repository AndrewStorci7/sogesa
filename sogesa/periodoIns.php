
<?php
	require_once('connessione.php');
	//$Titolo = $_POST["periodo"];
	//$Descrizione = $_POST["desc"];
	if(isset($_POST['periodo']))
	{
		$periodo=$_POST['periodo'];
	}
	else
	{
	$periodo="";	
	}
	
	if(isset($_POST['desc']))
	{
		$Descrizione=$_POST['desc'];
	}
	else
	{
	$Descrizione="";	
	}
	
		$periodo =  htmlentities($periodo, ENT_QUOTES, "UTF-8");
	  $periodo = my_htmlentities($periodo);
		$Descrizione =  htmlentities($Descrizione, ENT_QUOTES, "UTF-8");
	  $Descrizione = my_htmlentities($Descrizione);
	$query = "INSERT INTO periodi (Titolo,Descrizione)
			  VALUES ('".$periodo."','".$Descrizione."')";
	
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