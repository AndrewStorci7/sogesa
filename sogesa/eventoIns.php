
<?php
	require_once('connessione.php');

	if(isset($_POST['titolo']))
	{
		$titolo=$_POST['titolo'];
	}
	else
	{
	$titolo="";	
	}
	
	if(isset($_POST['dataEv']))
	{
		$dataEv=$_POST['dataEv'];
	}
	else
	{
	$dataEv="";	
	}
	
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
		$desc=$_POST['desc'];
	}
	else
	{
	$desc="";	
	}
	
	if(isset($_POST['meteo']))
	{
		$meteo=$_POST['meteo'];
	}
	else
	{
	$meteo="";	
	}
		$titolo =  htmlentities($titolo, ENT_QUOTES, "UTF-8");
	  $titolo = my_htmlentities($titolo);
	$desc =  htmlentities($desc, ENT_QUOTES, "UTF-8");
	  $desc = my_htmlentities($desc);

	$query = "INSERT INTO eventi (Titolo,DataI,CodTipoE,Meteo,Descr)
			  VALUES ('".$titolo."','".$dataEv."','".$tipo."','".$meteo."','".$desc."')";
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