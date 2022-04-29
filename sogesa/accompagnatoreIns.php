<?php

require_once('connessione.php');

$nome_ac = isset($_POST['nome_ac']) ? $_POST['nome_ac'] : "";
$cognome_ac = isset($_POST['cognome_ac']) ? $_POST['cognome_ac'] : "";
$cf_ac = isset($_POST['cf_ac']) ? $_POST['cf_ac'] : "";
$luogo_ac = isset($_POST['luogo_ac']) ? $_POST['luogo_ac'] : "";
$nascita_ac = isset($_POST['nascita_ac']) ? $_POST['nascita_ac'] : "";
$via_ac = isset($_POST['via_ac']) ? $_POST['via_ac'] : "";
$citta_ac = isset($_POST['citta_ac']) ? $_POST['citta_ac'] : "";
$email_ac = isset($_POST['email_ac']) ? $_POST['email_ac'] : "";
$telefono_ac = isset($_POST['telefono_ac']) ? $_POST['telefono_ac'] : "";
$patente_ac = isset($_POST['patente_ac']) ? $_POST['patente_ac'] : "";
$scadpat_ac = isset($_POST['scadpat_ac']) ? $_POST['scadpat_ac'] : "";
$licenza_ac = isset($_POST['licenza_ac']) ? $_POST['licenza_ac'] : "";
$scadlic_ac = isset($_POST['scadlic_ac']) ? $_POST['scadlic_ac'] : "";
$idScarico = isset($_POST['idScarico']) ? $_POST['idScarico'] : "";



  $nome_ac =  htmlentities($nome_ac, ENT_QUOTES, "UTF-8");
  $nome_ac = my_htmlentities($nome_ac);
  $cognome_ac =  htmlentities($cognome_ac, ENT_QUOTES, "UTF-8");
  $cognome_ac = my_htmlentities($cognome_ac);
  $cf_ac =  htmlentities($cf_ac, ENT_QUOTES, "UTF-8");
  $cf_ac = my_htmlentities($cf_ac);
  $luogo_ac = htmlentities($luogo_ac, ENT_QUOTES, "UTF-8");
  $luogo_ac = my_htmlentities($luogo_ac);
  $nascita_ac = htmlentities($nascita_ac, ENT_QUOTES, "UTF-8");
  $nascita_ac = my_htmlentities($nascita_ac);
  $via_ac = htmlentities($via_ac, ENT_QUOTES, "UTF-8");
  $via_ac = my_htmlentities($via_ac);
  $email_ac = htmlentities($email_ac, ENT_QUOTES, "UTF-8");
  $email_ac = my_htmlentities($email_ac);
  $telefono_ac =  htmlentities($telefono_ac, ENT_QUOTES, "UTF-8");
  $telefono_ac = my_htmlentities($telefono_ac);
  $patente_ac = htmlentities($patente_ac, ENT_QUOTES, "UTF-8");
  $patente_ac = my_htmlentities($patente_ac);
  $scadpat_ac = htmlentities($scadpat_ac, ENT_QUOTES, "UTF-8");
  $scadpat_ac = my_htmlentities($scadpat_ac);
  $licenza_ac = htmlentities($licenza_ac, ENT_QUOTES, "UTF-8");
  $licenza_ac = my_htmlentities($licenza_ac);
  $scadlic_ac =  htmlentities($scadlic_ac, ENT_QUOTES, "UTF-8");
  $scadlic_ac = my_htmlentities($scadlic_ac);
  $idScarico =  htmlentities($idScarico, ENT_QUOTES, "UTF-8");
  $idScarico = my_htmlentities($idScarico);






  $query3= "INSERT INTO `accompagnatori`( `CF`, `Cognome`, `Nome`, `Via`, `Citta`, `DataNascita`, `Telefono`, `Email`, `LuogoNascita`, `patente`, `scadpat`, `licenza`, `scadlic`, `idScarico`)
  VALUES ('".$cf_ac."','".$cognome_ac."','".$nome_ac."','".$via_ac."','".$citta_ac."','".$nascita_ac."','".$telefono_ac."','".$email_ac."','".$luogo_ac."','".$patente_ac."','".$scadpat_ac."','".$licenza_ac."','".$scadlic_ac."','".$idScarico."')";
  $resultQuery3=$conn->query($query3);


    $result = mysqli_query($conn,$query3);
	if (!$result)
	{
		echo "0";
		die();

	}else{
	$y="SELECT * FROM accompagnatori ORDER BY idAccompagnatore DESC";

	$resulta = mysqli_query($conn,$y);

	$num_rowsa = mysqli_num_rows($resulta);
if($num_rowsa>0){


$rowa = mysqli_fetch_array($resulta);
	$ida = $rowa['idAccompagnatore'];




  	function my_htmlentities($var, $qs = ENT_COMPAT, $charset = 'ISO-8859-1')
{
    $search = array('ì', 'è', 'é', 'ò', 'à', 'ù');
    $replace = array('&igrave;', '&egrave;', '&eacute;', '&ograve;', '&agrave;', '&ugrave;');

    $var = str_replace($search, $replace, $var);
    $var = htmlentities($var, $qs, $charset, false);

    return $var;
}

?>
