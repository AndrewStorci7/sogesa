
<?php
	require_once('connessione.php');
	//$Titolo = $_POST["categoria"];
	//$Descrizione = $_POST["desc"];
	if(isset($_POST['categoria']))
	{
		$categoria=$_POST['categoria'];
	}
	else
	{
	$categoria="";	
	}
	
	if(isset($_POST['desc']))
	{
		$Descrizione=$_POST['desc'];
	}
	else
	{
	$Descrizione="";	
	}
	
		$categoria =  htmlentities($categoria, ENT_QUOTES, "UTF-8");
	  $categoria = my_htmlentities($categoria);
		$Descrizione =  htmlentities($Descrizione, ENT_QUOTES, "UTF-8");
	  $Descrizione = my_htmlentities($Descrizione);
	$query = "INSERT INTO categorie (Titolo,Descrizione)
			  VALUES ('".$categoria."','".$Descrizione."')";
	
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