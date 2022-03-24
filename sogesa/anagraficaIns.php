<?php

require_once('connessione.php');
	
	$Cognome = $_POST['cognome'];
	$Nome = $_POST['nome'];
	$cf = $_POST['cf'];
	$luogo = $_POST['luogo'];
	$nascita = $_POST['nascita'];
	$via = $_POST['via'];
	$citta = $_POST['citta'];
	$Email = $_POST['email'];
	$telefono = $_POST['telefono'];
	$patente = $_POST['patente'];
	$scadpat = $_POST['scadpat'];
	$licenza = $_POST['licenza'];
	$scadlic = $_POST['scadlic'];

	$modello = $_POST['modello'];
	$disciplina = $_POST['disciplina'];
	$cilindrata = $_POST['cilindrata'];
	$marca = $_POST['marca'];
	$massa = $_POST['massa'];


		$Cognome =  htmlentities($Cognome, ENT_QUOTES, "UTF-8");
	  $Cognome = my_htmlentities($Cognome);
	$Nome =  htmlentities($Nome, ENT_QUOTES, "UTF-8");
	  $Nome = my_htmlentities($Nome);
	$cf =  htmlentities($cf, ENT_QUOTES, "UTF-8");
	  $cf = my_htmlentities($cf);
	$luogo =  htmlentities($luogo, ENT_QUOTES, "UTF-8");
	  $luogo = my_htmlentities($luogo);
	$nascita =  htmlentities($nascita, ENT_QUOTES, "UTF-8");
	  $nascita = my_htmlentities($nascita);
	$via =  htmlentities($via, ENT_QUOTES, "UTF-8");
	  $via = my_htmlentities($via);
	$citta =  htmlentities($citta, ENT_QUOTES, "UTF-8");
	  $citta = my_htmlentities($citta);
	$telefono =  htmlentities($telefono, ENT_QUOTES, "UTF-8");
	  $telefono = my_htmlentities($telefono);
	$Email =  htmlentities($Email, ENT_QUOTES, "UTF-8");
	  $Email = my_htmlentities($Email);
	$patente =  htmlentities($patente, ENT_QUOTES, "UTF-8");
	  $patente = my_htmlentities($patente);
	$scadpat =  htmlentities($scadpat, ENT_QUOTES, "UTF-8");
	  $scadpat = my_htmlentities($scadpat);
	$licenza =  htmlentities($licenza, ENT_QUOTES, "UTF-8");
	  $licenza = my_htmlentities($licenza);
	$scadlic =  htmlentities($scadlic, ENT_QUOTES, "UTF-8");
	  $scadlic = my_htmlentities($scadlic);

	$modello =  htmlentities($modello, ENT_QUOTES, "UTF-8");
	  $modello = my_htmlentities($modello);
	$disciplina =  htmlentities($disciplina, ENT_QUOTES, "UTF-8");
	  $disciplina = my_htmlentities($disciplina);
	$cilindrata =  htmlentities($cilindrata, ENT_QUOTES, "UTF-8");
	  $cilindrata = my_htmlentities($cilindrata);
	$marca =  htmlentities($marca, ENT_QUOTES, "UTF-8");
	  $marca = my_htmlentities($marca);
	$massa =  htmlentities($massa, ENT_QUOTES, "UTF-8");
	  $massa = my_htmlentities($massa);




	$query = "INSERT INTO partecipanti (Cognome,Nome,CF,LuogoNascita,DataNascita,Via,Citta,Telefono,Email,patente,scadpat,licenza,scadlic)
			  VALUES ('".$Cognome."','".$Nome."','".$cf."','".$luogo."','".$nascita."','".$via."','".$citta."','".$telefono."','".$Email."','".$patente."','".$scadpat."','".$licenza."','".$scadlic."')";



    $result = mysqli_query($conn,$query);
	if (!$result)
	{
		echo "0";
		die();

	}else{
	$y="SELECT * FROM partecipanti ORDER BY idPartecipante DESC";

	$resulta = mysqli_query($conn,$y);

	$num_rowsa = mysqli_num_rows($resulta);
if($num_rowsa>0){


$rowa = mysqli_fetch_array($resulta);
	$ida = $rowa['idPartecipante'];


		$query = "INSERT INTO mezzi (`marca`, `modello`, `disciplina`, `cilindrata`, `massa`, `idPartecipante`) VALUES
			  ('".$marca."', '".$modello."', '".$disciplina."', '".$cilindrata."', '".$massa."', '".$ida."');";

		$result = mysqli_query($conn,$query) or die("0");


}else{
	$ida=0;
}

echo $ida;
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
