
<?php
	require_once('connessione.php');
	//$Titolo = $_POST["tipo"];
	//$Descrizione = $_POST["desc"];
	if(isset($_POST['tipo']))
	{
		$tipo=$_POST['tipo'];
	}
	else
	{
	$tipo="";	
	}
	
	if(isset($_POST['desc']))
	{
		$Descrizione=$_POST['desc'];
	}
	else
	{
	$Descrizione="";	
	}
	
		$tipo =  htmlentities($tipo, ENT_QUOTES, "UTF-8");
	  $tipo = my_htmlentities($tipo);
		$Descrizione =  htmlentities($Descrizione, ENT_QUOTES, "UTF-8");
	  $Descrizione = my_htmlentities($Descrizione);
	$query = "INSERT INTO tipieventi (Titolo,Descrizione)
			  VALUES ('".$tipo."','".$Descrizione."')";
	
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