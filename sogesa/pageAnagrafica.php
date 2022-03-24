
  <?php
	require_once('connessione.php');

	if(isset($_POST['nome'])){
		$nome=$_POST['nome'];
	} else{
		$nome="";
	}

	if(isset($_POST['cognome'])){
		$cognome=$_POST['cognome'];
	} else{
		$cognome="";
	}

	if(isset($_POST['cf'])){
		$cf=$_POST['cf'];
	} else{
		$cf="";
	}

	if(isset($_POST['marca'])){
		$marca=$_POST['marca'];
	} else{
		$marca="";
	}

	if(isset($_POST['modello'])){
		$modello=$_POST['modello'];
	} else{
		$modello="";
	}

	if(isset($_POST['disciplina'])){
		$disciplina=$_POST['disciplina'];
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

	$y="SELECT * FROM partecipanti ".$whereQuery."";

	$result = mysqli_query($conn,$y);
	$num_rows = mysqli_num_rows($result);


if($num_rows>0){


$cntrow=0;
while($row = mysqli_fetch_array($result) ){

	$id = $row['idPartecipante'];
	$ctrlItemId=1;

	if((trim($marca)!="")||(trim($modello)!="")||(trim($disciplina)!="")){
		if(trim($marca)!=""){
			$yy="SELECT * FROM mezzi WHERE idPartecipante=".$id." AND marca='".$marca."'";;
			$resulty = mysqli_query($conn,$yy);

			$num_rowsy = mysqli_num_rows($resulty);
			if($num_rowsy>0){
			}else{
				$ctrlItemId=0;
			}
		}
		if(trim($modello)!=""){
			$yy="SELECT * FROM mezzi WHERE idPartecipante=".$id." AND modello='".$modello."'";;
			$resulty = mysqli_query($conn,$yy);

			$num_rowsy = mysqli_num_rows($resulty);
			if($num_rowsy>0){
			}else{
				$ctrlItemId=0;
			}
		}
		if(trim($disciplina)!=""){
			$yy="SELECT * FROM mezzi WHERE idPartecipante=".$id." AND disciplina='".$disciplina."'";;
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
			$cntrow++;
	}
}



}









   $paginetotali=floor($cntrow/10);
	$resto=$cntrow%10;
	if($resto>0){
		$paginetotali=$paginetotali+1;
	}


	echo json_encode($paginetotali);


	?>
