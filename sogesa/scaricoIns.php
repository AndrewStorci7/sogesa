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

/* MODIFICHE DI ANDREW drink */
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


$nbox = isset($_POST['nbox']) ? $_POST['nbox'] : "";
$giorni = isset($_POST['giorni']) ? $_POST['giorni'] : "";
$prezzoxgg = isset($_POST['prezzoxgg']) ? $_POST['prezzoxgg'] : "";
$turni = isset($_POST['arrayTurni']) ? $_POST['arrayTurni'] : "";
$turniArray = array();
for($i = 0; $i < count($turni); $i++){
	//$turno = isset($_POST['nturno' . $i]) ?? $_POST['nturno' . $i] :: $turno = "";
	if($turni !== ""){
		$turniArray[$i] = $turni[$i];
		echo $turniArray[$i];
	}
}

$prezzo =  htmlentities($prezzo, ENT_QUOTES, "UTF-8");
$prezzo = my_htmlentities($prezzo);
$cfg =  htmlentities($cfg, ENT_QUOTES, "UTF-8");
$cfg = my_htmlentities($cfg);
$patente =  htmlentities($patente, ENT_QUOTES, "UTF-8");
$patente = my_htmlentities($patente);
$nbox = htmlentities($nbox, ENT_QUOTES, "UTF-8");
$nbox = my_htmlentities($nbox);
$prezzoxgg = htmlentities($prezzoxgg, ENT_QUOTES, "UTF-8");
$prezzoxgg = my_htmlentities($prezzoxgg);
$giorni = htmlentities($giorni, ENT_QUOTES, "UTF-8");
$giorni = my_htmlentities($giorni);
$codEv = htmlentities($codEv, ENT_QUOTES, "UTF-8");
$codEv = my_htmlentities($codEv);
$documento =  htmlentities($documento, ENT_QUOTES, "UTF-8");
$documento = my_htmlentities($documento);

/* FINE MODIFICHE DI ANDREW drink */


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

/* MODIFICHE DI ANDREW drink */
$insertBox = "INSERT INTO scarico_box (id_partecipante, n_box, giorni, prezzo)
							VALUES(" . $id . ", " . $nbox . ", " . $giorni . ", " . $prezzoxgg . ")";
$resultInsertBox = $conn->query($insertBox);

$selectIdBox = "SELECT id FROM scarico_box JOIN partecipanti ON partecipanti.idPartecipante = scarico_box.id_partecipante WHERE id_partecipante = " . $id . " LIMIT 1";
$selectResult = $conn->query($selectIdBox);
$idBox = "";
while($rowSelectIdBox = mysqli_fetch_assoc($selectResult)){
	$idBox = $rowSelectIdBox['id'];
}

for($i = 0; $i < count($turniArray); $i++){
	if($turniArray[$i] !== ""){
		$insertTurniBox = "INSERT INTO turni_box(id_box, n_turno, prezzo)
											 VALUES('" . $idBox . "', '" . $i . "', '" . $turniArray[$i] . "');";
		$resultInsertTurni = $conn->query($insertTurniBox);
	}
}

$query = "INSERT INTO scarichi (patente,documento,DataScarico,cfg,prezzo,codPar,codEv,idMezzo,id_scaricoBox)
VALUES ('".$patente."','".$documento."','".$dataScarico."','".$cfg."','".$prezzo."','".$id."','".$codEv."','".$radioValue."','".$idBox."')";

$selectIdScarico= "SELECT idScarico FROM scarichi ORDER BY idScarico DESC LIMIT 1";
$idScaricoResult= $conn->query($selectIdScarico);
while($rowSelectIdScarico=mysqli_fetch_assoc($idScaricoResult)) {
	$idScarico=$rowSelectIdScarico['idScarico'];
}
$query3= "INSERT INTO `accompagnatori`( `CF`, `Cognome`, `Nome`, `Via`, `Citta`, `DataNascita`, `Telefono`, `Email`, `LuogoNascita`, `patente`, `scadpat`, `licenza`, `scadlic`, `idScarico`)
VALUES ('".$cf_ac."','".$cognome_ac."','".$nome_ac."','".$via_ac."','".$citta_ac."','".$nascita_ac."','".$telefono_ac."','".$email_ac."','".$luogo_ac."','".$patente_ac."','".$scadpat_ac."','".$licenza_ac."','".$scadlic_ac."','".$idScarico."')";
$resultQuery3=$conn->query($query3);
/* FINE MODIFICHE DI ANDREW drink */


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
