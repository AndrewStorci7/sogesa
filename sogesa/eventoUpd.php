<?php
require_once('connessione.php');

	$Id = $_POST['id'];
	$DataI = $_POST['dataEv'];
	//$DataO = $_POST['DataO'];
	$Titolo = $_POST['titolo'];
	$CodTipoE = $_POST['tipo'];
	$Meteo = $_POST['meteo'];
	$descr = $_POST['desc'];
	//$nPartecipanti=$_POST['nPartecipanti'];

		$Titolo =  htmlentities($Titolo, ENT_QUOTES, "UTF-8");
	  $Titolo = my_htmlentities($Titolo);
	$descr =  htmlentities($descr, ENT_QUOTES, "UTF-8");
	  $descr = my_htmlentities($descr);

	$query =' UPDATE  eventi
		SET DataI= "'.$DataI.'",
			Titolo="'.$Titolo.'",CodTipoE="'.$CodTipoE.'",
			Meteo="'.$Meteo.'",Descr="'.$descr.'"
			WHERE IdEvento ="'.$Id.'"';

    $result = mysqli_query($conn,$query);
	if (!$result)
	{
		echo "0";
		die();

	}else{
		echo "1";
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
