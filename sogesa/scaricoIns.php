<?php
require_once('connessione.php');
if(isset($_POST['radioValue'])){
	$radioValue=$_POST['radioValue'];
}else{
	$radioValue=0;
}
if(isset($_POST['patente'])){
	$patente=$_POST['patente'];
}else{
	$patente="";
}
if(isset($_POST['nbox'])){
	$n_box = $_POST['nbox'];
}else{
	$n_box = "";
}
if(isset($_POST['documento'])){
	$documento=$_POST['documento'];
}else{
	$documento="";
}
if(isset($_POST['dataScarico'])){
	$dataScarico=$_POST['dataScarico'];
}else{
	$dataScarico="";
}

if(isset($_POST['cfg'])){
	$cfg=$_POST['cfg'];
}else{
	$cfg="";
}
if(isset($_POST['prezzo'])){
	$prezzo=$_POST['prezzo'];
}else{
	$prezzo="";
}

if(isset($_POST['id'])){
	$id=$_POST['id'];
}else{
	$id="";
}

if(isset($_POST['codEv'])){
	$codEv = $_POST['codEv'];
}else{
	$codEv = "";
}
if(isset($_POST['giorni'])){
	$giorni = $_POST['giorni'];
}else{
	$giorni = "";
}

if(isset($_POST['prezzoxgg'])){
	$prezzoxgg = $_POST['prezzoxgg'];
}else{
	$prezzoxgg = "";
}

$turniArray = array();
for($i = 0; $i < 1000; $i++){
	$prezzo = isset($_POST['pturno' . $i]) ?? $_POST['pturno' . $i] :: $prezzo = "";
	$turno = isset($_POST['nturno' . $i]) ?? $_POST['nturno' . $i] :: $turno = "";
	if($prezzo == "" || $turno == ""){
		echo $i;
	} else {
		$turniArray += array(
			'n_turno' => $turno,
			'p_turno' => $prezzo
		);
	}
}

$prezzo =  htmlentities($prezzo, ENT_QUOTES, "UTF-8");
$prezzo = my_htmlentities($prezzo);
$cfg =  htmlentities($cfg, ENT_QUOTES, "UTF-8");
$cfg = my_htmlentities($cfg);
$patente =  htmlentities($patente, ENT_QUOTES, "UTF-8");
$patente = my_htmlentities($patente);
$n_box = htmlentities($n_box, ENT_QUOTES. "UTF-8");
$n_box = my_htmlentities($n_box);
$prezzoxgg = htmlentities($prezzoxgg, ENT_QUOTES, "UTF-8");
$prezzoxgg = my_htmlentities($prezzoxgg);
$giorni = htmlentities($giorni, ENT_QUOTES, "UTF-8");
$giorni = my_htmlentities($giorni);
$codEv = htmlentities($codEv, ENT_QUOTES, "UTF-8");
$codEv = my_htmlentities($codEv);
$documento =  htmlentities($documento, ENT_QUOTES, "UTF-8");
$documento = my_htmlentities($documento);


if($radioValue==0){

	$yy="SELECT * FROM mezzi WHERE idPartecipante=".$id." ORDER BY IdM DESC";

	$resulty = mysqli_query($conn,$yy);

	$num_rowsy = mysqli_num_rows($resulty);
	if($num_rowsy>0){

		$rowy = mysqli_fetch_array($resulty);

		$radioValue = $rowy['IdM'];
	}else{
		$radioValue=0;
	}




}


$query = "INSERT INTO scarichi (patente,documento,DataScarico,cfg,prezzo,codPar,codEv,idMezzo)
VALUES ('".$patente."','".$documento."','".$dataScarico."','".$cfg."','".$prezzo."','".$id."','".$codEv."','".$radioValue."')";
$result = mysqli_query($conn,$query);
if($result){

	$query2="SELECT nPartecipanti FROM eventi WHERE IdEvento='". $codEv ."'";
	$result2 = mysqli_query($conn,$query2);

	$num_rows = mysqli_num_rows($result2);
	if($num_rows>0){

		$row2 = mysqli_fetch_array($result2);
		$nPartecipanti= intval($row2['nPartecipanti']);
		$nPartecipanti=$nPartecipanti+1;

		$query =' UPDATE  eventi
		SET nPartecipanti="'.$nPartecipanti.'"
		WHERE IdEvento ="'.$codEv.'"';
		$result = mysqli_query($conn,$query);


	}


	$yy="SELECT * FROM scarichi ORDER BY idScarico DESC";

	$resulty = mysqli_query($conn,$yy);

	$num_rowsy = mysqli_num_rows($resulty);
	if($num_rowsy>0){

		$rowy = mysqli_fetch_array($resulty);

		$id = $rowy['idScarico'];
	}else{
		$id=0;
	}


	echo $id;
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
