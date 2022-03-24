
<?php
	require_once('connessione.php');

	if(isset($_POST['tipo']))
	{
		$tipo=$_POST['tipo'];
		$tipo =  htmlentities($tipo, ENT_QUOTES, "UTF-8");
	  $tipo = my_htmlentities($tipo);
		//echo "set";
	}
	else
	{
		$tipo="";
		//echo "unset";
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

	if(trim($tipo)!="")
	{
		$whereQuery="WHERE tipieventi.Titolo='".$tipo."'";

		//echo "wher";
	}

	$x=($pager-1)*10;

	//echo($x);

	$y="SELECT *
		FROM tipieventi ".$whereQuery." ORDER BY IdTipoE DESC LIMIT ".$x.", 10";

   $result = mysqli_query($conn,$y);

   if(!$result)
   {
	   echo "Errore";
	   die();
   }
   $num_rows = mysqli_num_rows($result);
   if($num_rows==0)
   {
	   echo "";
   }
   //echo($num_rows);

	$jsonResult='';
	if($num_rows>0){
			$jsonResult='{"tipi":[';
	$cntrow=0;
	while($row = mysqli_fetch_array($result))
	{
		$id = $row['IdTipoE'];
		$tipo = $row['Titolo'];
		$desc = $row['Descrizione'];

		$tipo=html_entity_decode($tipo,ENT_QUOTES,"UTF-8");
		$desc=html_entity_decode($desc,ENT_QUOTES,"UTF-8");


		if($cntrow==0){
			$cntrow++;
		}else{
			$jsonResult.=',';
		}
		$jsonResult = $jsonResult.'{"id":"'.$id.'","tipo":"'.$tipo.'","desc":"'.$desc.'"}';
	}
		$jsonResult.=']}';

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
