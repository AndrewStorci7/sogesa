<?php
//http://localhost/xampp/query%20luca%20anas%20riccardo%20ray/mezziIns.php?marca=BMW&modello=E39%20528i&disciplina=AutoCross&cilindrata=2800&massa=1500&id=8
	require_once('connessione.php');
	$marca = isset($_POST['marca']) ? $_POST['marca'] : ''; //"BMW";
	$modello = isset($_POST['modello']) ? $_POST['modello'] : ''; //"E39 528i";
	$disciplina = isset($_POST['disciplina']) ? $_POST['disciplina'] : ''; //"AutoCross";
	$cilindrata = isset($_POST['cilindrata']) ? $_POST['cilindrata'] : ''; //2800;
	//$potenza = $_GET['potenza']; //193;
	$massa = isset($_POST['massa']) ? $_POST['massa'] : ''; //1250;
	//$anno = $_GET['anno']; //1998;
	//$categoria = $_GET['categoria']; //"Auto";
	//$CF = $_GET['codicefiscale']; //"aaaa";
	//$qPar = "SELECT partecipanti.idPartecipante FROM partecipanti WHERE partecipanti.CF = '". $CF ."'";
	$id = isset($_POST['id']) ? $_POST['id'] : '';;
	//$rPar = mysqli_query($conn,$qPar);
	//if(mysqli_num_rows($rPar) == true){
		//$row =mysqli_fetch_assoc($rPar);
		//$idPartecipante = $row['idPartecipante'];
		//Inserimento di evento solo nel caso il tipo esista
		$marca =  htmlentities($marca, ENT_QUOTES, "UTF-8");
	  $marca = my_htmlentities($marca);
		$modello =  htmlentities($modello, ENT_QUOTES, "UTF-8");
	  $modello = my_htmlentities($modello);
		$disciplina =  htmlentities($disciplina, ENT_QUOTES, "UTF-8");
	  $disciplina = my_htmlentities($disciplina);
		$cilindrata =  htmlentities($cilindrata, ENT_QUOTES, "UTF-8");
	  $cilindrata = my_htmlentities($cilindrata);
		$massa =  htmlentities($massa, ENT_QUOTES, "UTF-8");
	  $massa = my_htmlentities($massa);
		$query = "INSERT INTO mezzi (`marca`, `modello`, `disciplina`, `cilindrata`, `massa`, `idPartecipante`) VALUES
			  ('".$marca."', '".$modello."', '".$disciplina."', '".$cilindrata."', '".$massa."', '".$id."');";
			  
		$result = mysqli_query($conn,$query) or die("0");//bisogna ritornare in json encode 0 oppure idevento
		/*$qq = "SELECT mezzi.IdM FROM mezzi ORDER BY mezzi.IdM DESC LIMIT 1";
		$qr =mysqli_query($conn, $qq);
		$r = mysqli_fetch_assoc($qr);
		echo $r['IdM'];*/
		if (mysqli_affected_rows($conn) > 0) {
			echo "1";
		} else {
			echo "0";
		}
	//} else {
		//echo json_encode(0);
	//}
	function my_htmlentities($var, $qs = ENT_COMPAT, $charset = 'ISO-8859-1')
{
    $search = array('ì', 'è', 'é', 'ò', 'à', 'ù');
    $replace = array('&igrave;', '&egrave;', '&eacute;', '&ograve;', '&agrave;', '&ugrave;');
    
    $var = str_replace($search, $replace, $var);
    $var = htmlentities($var, $qs, $charset, false);
    
    return $var;
}  

?>
