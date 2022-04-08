<?php
require_once("connection.php");
if (isset($_POST['radioValue'])) {
	$radioValue = $_POST['radioValue'];
} else {
	$radioValue = 0;
}
if (isset($_POST['patente'])) {
	$patente = $_POST['patente'];
} else {
	$patente = "";
}

if (isset($_POST['documento'])) {
	$documento = $_POST['documento'];
} else {
	$documento = "";
}
if (isset($_POST['dataScarico'])) {
	$dataScarico = $_POST['dataScarico'];
} else {
	$dataScarico = "";
}

if (isset($_POST['cfg'])) {
	$cfg = $_POST['cfg'];
} else {
	$cfg = "";
}
if (isset($_POST['prezzo'])) {
	$prezzo = $_POST['prezzo'];
} else {
	$prezzo = "";
}

if (isset($_POST['id'])) {
	$id = $_POST['id'];
} else {
	$id = "";
}

if (isset($_POST['codEv'])) {
	$codEv = $_POST['codEv'];
} else {
	$codEv = "";
}

if (isset($_POST['boxN'])) {
	$boxN = $_POST['boxN'];
} else {
	$boxN = "";
}

if (isset($_POST['gg'])) {
	$gg = $_POST['gg'];
} else {
	$gg = "";
}

if (isset($_POST['prezzoGG'])) {
	$prezzoGG = $_POST['prezzoGG'];
} else {
	$prezzoGG = "";
}

$prezzo =  htmlentities($prezzo, ENT_QUOTES, "UTF-8");
$prezzo = my_htmlentities($prezzo);
$cfg =  htmlentities($cfg, ENT_QUOTES, "UTF-8");
$cfg = my_htmlentities($cfg);
$patente =  htmlentities($patente, ENT_QUOTES, "UTF-8");
$patente = my_htmlentities($patente);
$documento =  htmlentities($documento, ENT_QUOTES, "UTF-8");
$documento = my_htmlentities($documento);
$boxN =  htmlentities($boxN, ENT_QUOTES, "UTF-8");
$boxN = my_htmlentities($boxN);
$gg =  htmlentities($gg, ENT_QUOTES, "UTF-8");
$gg = my_htmlentities($gg);
$prezzoGG =  htmlentities($prezzoGG, ENT_QUOTES, "UTF-8");
$prezzoGG = my_htmlentities($prezzoGG);


if ($radioValue == 0) {

	$yy = "SELECT * FROM mezzi WHERE idPartecipante=" . $id . " ORDER BY IdM DESC";

	$resulty = mysqli_query($conn, $yy);

	$num_rowsy = mysqli_num_rows($resulty);
	if ($num_rowsy > 0) {

		$rowy = mysqli_fetch_array($resulty);

		$radioValue = $rowy['IdM'];
	} else {
		$radioValue = 0;
	}
}


$query = "INSERT INTO scarichi (patente,documento,DataScarico,cfg,prezzo,codPar,codEv,numBox,gg,prezzoGG,idMezzo)
			  VALUES ('" . $patente . "','" . $documento . "','" . $dataScarico . "','" . $cfg . "','" . $prezzo . "','" . $id . "','" . $codEv . "','".$boxN."','".$gg."','".$prezzoGG."','" . $radioValue . "')";
$result = mysqli_query($conn, $query);
if ($result) {

	$query2 = "SELECT nPartecipanti FROM eventi WHERE IdEvento='" . $codEv . "'";
	$result2 = mysqli_query($conn, $query2);

	$num_rows = mysqli_num_rows($result2);
	if ($num_rows > 0) {

		$row2 = mysqli_fetch_array($result2);
		$nPartecipanti = intval($row2['nPartecipanti']);
		$nPartecipanti = $nPartecipanti + 1;

		$query = ' UPDATE  eventi 
		SET nPartecipanti="' . $nPartecipanti . '"
			WHERE IdEvento ="' . $codEv . '"';
		$result = mysqli_query($conn, $query);
	}


	$yy = "SELECT * FROM scarichi ORDER BY idScarico DESC";

	$resulty = mysqli_query($conn, $yy);

	$num_rowsy = mysqli_num_rows($resulty);
	if ($num_rowsy > 0) {

		$rowy = mysqli_fetch_array($resulty);

		$id = $rowy['idScarico'];
	} else {
		$id = 0;
	}


	echo $id;
} else {
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
