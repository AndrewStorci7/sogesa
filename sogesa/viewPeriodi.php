
<?php
	require_once('connessione.php');

	if(isset($_POST['periodo']))
	{
		$periodo=$_POST['periodo'];
		$periodo =  htmlentities($periodo, ENT_QUOTES, "UTF-8");
	  $periodo = my_htmlentities($periodo);
		//echo "set";
	}
	else
	{
		$periodo="";
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

	if(trim($periodo)!="")
	{
		$whereQuery="WHERE periodi.Titolo='".$periodo."'";

		//echo "wher";
	}

	$x=($pager-1)*10;

	//echo($x);

	$y="SELECT *
		FROM periodi ".$whereQuery." ORDER BY IdPeriodo DESC LIMIT ".$x.", 10";

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
			$jsonResult='{"periodi":[';
	$cntrow=0;
	while($row = mysqli_fetch_array($result))
	{
		$id = $row['IdPeriodo'];
		$periodo = $row['Titolo'];
		$desc = $row['Descrizione'];

		$periodo=html_entity_decode($periodo,ENT_QUOTES,"UTF-8");
		$desc=html_entity_decode($desc,ENT_QUOTES,"UTF-8");


		if($cntrow==0){
			$cntrow++;
		}else{
			$jsonResult.=',';
		}
		$jsonResult = $jsonResult.'{"id":"'.$id.'","periodo":"'.$periodo.'","desc":"'.$desc.'"}';
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
