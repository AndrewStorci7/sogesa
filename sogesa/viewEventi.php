
<?php
	require_once('connessione.php');

	if(isset($_POST['tipo']))
	{
		$tipo=$_POST['tipo'];
		$tipo =  htmlentities($tipo, ENT_QUOTES, "UTF-8");
	  $tipo = my_htmlentities($tipo);
	}
	else
	{
	$tipo="";
	}

	if(isset($_POST['titolo']))
	{
		$titolo=$_POST['titolo'];
		$titolo =  htmlentities($titolo, ENT_QUOTES, "UTF-8");
	  $titolo = my_htmlentities($titolo);
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
	$data="";
	}
	if(isset($_POST['pager']))
	{
		$pager=$_POST['pager'];
	}
	else
	{
		$pager=1;
	}
	$whereQuery="";
	$counter=0;
	if(trim($tipo)!="")
	{
		$whereQuery.=" WHERE CodTipoE='".$tipo."' ";
					 $counter=1;
	}
	if(trim($titolo)!="")
	{
		if($counter==1)
		{
			$whereQuery.=" AND Titolo='".$titolo."' ";
					 $counter=1;
		}
		else
		{
			$whereQuery.=" WHERE Titolo='".$titolo."' ";
					 $counter=1;
		}
	}
	if(trim($dataEv)!="")
	{
		if($counter==1)
		{
				$whereQuery.=" AND DataI='".$dataEv."' ";
		}
		else
		{
			$whereQuery.=" WHERE DataI='".$dataEv."' ";
		}
	}
	$x=($pager-1)*10;

	$query="SELECT* FROM eventi ".$whereQuery." ORDER BY IdEvento DESC LIMIT $x, 10";



   $result = mysqli_query($conn,$query);

	$num_rows = mysqli_num_rows($result);
		$jsonResult='';
if($num_rows>0){
		$jsonResult.='{"eventi":[';
$cntrow=0;
while($row = mysqli_fetch_array($result) ){
	$id = $row['IdEvento'];
    $titolo = $row['Titolo'];
	$dataEv = $row['DataI'];

	$tipoId = $row['CodTipoE'];

	//query su tabella tipi con where id=$tipoId
	//prendi il titolo e lo salvi in $tipo
	$query2="SELECT Titolo FROM tipieventi WHERE IdTipoE='". $tipoId ."'";
	$result2 = mysqli_query($conn,$query2);

	$row2 = mysqli_fetch_array($result2);
	$tipo= $row2['Titolo'];

	$desc = $row['Descr'];
	$meteo = $row['Meteo'];
	if($cntrow==0){
		$cntrow++;
	}else{
		$jsonResult.=',';
	}


		$titolo=html_entity_decode($titolo,ENT_QUOTES,"UTF-8");
		$tipo=html_entity_decode($tipo,ENT_QUOTES,"UTF-8");
		$desc=html_entity_decode($desc,ENT_QUOTES,"UTF-8");



	$jsonResult.='{"id":"'.$id.'","titolo":"'.$titolo.'","dataEv":"'.$dataEv.'","tipo":"'.$tipo.'","desc":"'.$desc.'","meteo":"'.$meteo.'"}';
}
		$jsonResult.=']}';

}


//echo $jsonResult;



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
