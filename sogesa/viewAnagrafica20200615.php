
  <?php
	require_once('connessione.php');

	if(isset($_POST['nome'])){
		$nome=$_POST['nome'];
		$nome =  htmlentities($nome, ENT_QUOTES, "UTF-8");
	  $nome = my_htmlentities($nome);
	} else{
		$nome="";
	}

	if(isset($_POST['cognome'])){
		$cognome=$_POST['cognome'];
		$cognome =  htmlentities($cognome, ENT_QUOTES, "UTF-8");
	  $cognome = my_htmlentities($cognome);
	} else{
		$cognome="";
	}

	if(isset($_POST['cf'])){
		$cf=$_POST['cf'];
		$cf =  htmlentities($cf, ENT_QUOTES, "UTF-8");
	  $cf = my_htmlentities($cf);
	} else{
		$cf="";
	}

	if(isset($_POST['marca'])){
		$marca=$_POST['marca'];
		$marca =  htmlentities($marca, ENT_QUOTES, "UTF-8");
	  $marca = my_htmlentities($marca);
	} else{
		$marca="";
	}

	if(isset($_POST['modello'])){
		$modello=$_POST['modello'];
		$modello =  htmlentities($modello, ENT_QUOTES, "UTF-8");
	  $modello = my_htmlentities($modello);
	} else{
		$modello="";
	}

	if(isset($_POST['disciplina'])){
		$disciplina=$_POST['disciplina'];
		$disciplina =  htmlentities($disciplina, ENT_QUOTES, "UTF-8");
	  $disciplina = my_htmlentities($disciplina);
	} else{
		$disciplina="";
	}

	if(isset($_POST['eventilist'])){
		$eventilist=intval($_POST['eventilist']);
	} else{
		$eventilist=0;
	}
	if(isset($_POST['tipo'])){
		$tipo=intval($_POST['tipo']);
	} else{
		$tipo=0;
	}
	if(isset($_POST['pager'])){
		$pager=$_POST['pager'];
	} else{
		$pager=1;
	}

	$whereQuery="";
	$counter=0;
	if(trim($nome)!=""){
		$whereQuery.='WHERE Nome="'.$nome.'"';
		$counter=1;
	}

	if(trim($cognome)!=""){
		if($counter==1){
			$whereQuery.="AND Cognome='".$cognome."'";
			$counter=1;
		}else{
			$whereQuery.="WHERE Cognome='".$cognome."'";
			$counter=1;
		}
	}

	if(trim($cf)!=""){
		if($counter==1){
			$whereQuery.="AND CF='".$cf."'";
			$counter=1;
		}else{
			$whereQuery="WHERE CF='".$cf."'";
			$counter=1;
		}
	}



	$x=($pager-1)*10;
	$y=$x+10;

	$y="SELECT * FROM partecipanti ".$whereQuery." ORDER BY idPartecipante DESC LIMIT ".$x.", 10";
				echo $y;
	$result = mysqli_query($conn,$y);

	$num_rows = mysqli_num_rows($result);
	$jsonResult='';
if($num_rows>0){


$cntrow=0;
while($row = mysqli_fetch_array($result) ){

	$id = $row['idPartecipante'];
	$nome = $row['Nome'];
    $cognome = $row['Cognome'];
	$cf = $row['CF'];
	$nascita = $row['DataNascita'];
	$luogo = $row['LuogoNascita'];
	$citta = $row['Citta'];
	$telefono = $row['Telefono'];
	$email = $row['Email'];
	$via = $row['Via'];



		$nome=html_entity_decode($nome,ENT_QUOTES,"UTF-8");
		$cognome=html_entity_decode($cognome,ENT_QUOTES,"UTF-8");
		$cf=html_entity_decode($cf,ENT_QUOTES,"UTF-8");
		$nascita=html_entity_decode($nascita,ENT_QUOTES,"UTF-8");
		$luogo=html_entity_decode($luogo,ENT_QUOTES,"UTF-8");
		$citta=html_entity_decode($citta,ENT_QUOTES,"UTF-8");
		$via=html_entity_decode($via,ENT_QUOTES,"UTF-8");
		$telefono=html_entity_decode($telefono,ENT_QUOTES,"UTF-8");
		$email=html_entity_decode($email,ENT_QUOTES,"UTF-8");



	$ctrlItemId=1;

	if((trim($marca)!="")||(trim($modello)!="")||(trim($disciplina)!="")){
		if(trim($marca)!=""){
			$yy="SELECT * FROM mezzi WHERE idPartecipante=".$id." AND marca='".$marca."'";
			$resulty = mysqli_query($conn,$yy);

			$num_rowsy = mysqli_num_rows($resulty);
			if($num_rowsy>0){
			}else{
				$ctrlItemId=0;
			}
		}
		if(trim($modello)!=""){
			$yy="SELECT * FROM mezzi WHERE idPartecipante=".$id." AND modello='".$modello."'";
			$resulty = mysqli_query($conn,$yy);

			$num_rowsy = mysqli_num_rows($resulty);
			if($num_rowsy>0){
			}else{
				$ctrlItemId=0;
			}
		}
		if(trim($disciplina)!=""){
			$yy="SELECT * FROM mezzi WHERE idPartecipante=".$id." AND disciplina='".$disciplina."'";
			$resulty = mysqli_query($conn,$yy);

			$num_rowsy = mysqli_num_rows($resulty);
			if($num_rowsy>0){
			}else{
				$ctrlItemId=0;
			}
		}
	}
	if($ctrlItemId==1){

	if($eventilist>0){
			$yy="SELECT * FROM scarichi WHERE codPar=".$id." AND codEv='".$eventilist."'";
			$resulty = mysqli_query($conn,$yy);

			$num_rowsy = mysqli_num_rows($resulty);
			if($num_rowsy>0){
			}else{
				$ctrlItemId=0;
			}
	}
	}
	if($ctrlItemId==1){
		if($tipo>0){
				$yy="SELECT * FROM scarichi WHERE codPar=".$id."";
				$resulty = mysqli_query($conn,$yy);

				$num_rowsy = mysqli_num_rows($resulty);

			if($num_rowsy>0){

								$ctrlItemId=0;

				while($rowaaaa = mysqli_fetch_array($resulty) ){

					$codevctrl = $rowaaaa['codEv'];


							$yyzx="SELECT * FROM eventi WHERE IdEvento=".$codevctrl." AND CodTipoE='".$tipo."'";
							$resultyzx = mysqli_query($conn,$yyzx);
							$num_rowsyzx = mysqli_num_rows($resultyzx);
							if($num_rowsyzx>0){
								$ctrlItemId=1;
							}else{
							}


				}
			}



		}
	}

	if($ctrlItemId==1){
		if($cntrow==0){
			$jsonResult.='{"anagrafica":[';
			$cntrow++;
		}else{
			$jsonResult.=',';
		}
		$jsonResult.='{"id":'.$id.',"nome":"'.$nome.'","cognome":"'.$cognome.'","cf":"'.$cf.'","nascita":"'.$nascita.'","luogo":"'.$luogo.'","citta":"'.$citta.'", "telefono":"'.$telefono.'", "email":"'.$email.'"}';
	}
}


		if($cntrow>0){
			$jsonResult.=']}';
		}

}





	echo json_encode($jsonResult);
	function my_htmlentities($var, $qs = ENT_COMPAT, $charset = 'ISO-8859-1')
{
    $search = array('ì', 'è', 'é', 'ò', 'à', 'ù');
    $replace = array('&igrave;', '&egrave;', '&eacute;', '&ograve;', '&agrave;', '&ugrave;');

    $var = str_replace($search, $replace, $var);
    $var = htmlentities($var, $qs, $charset, false);

    return $var;
}
?>
