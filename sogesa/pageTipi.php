
<?php

	require_once('connessione.php');

	if(isset($_POST['tipo']))
	{
		$tipo=$_POST['tipo'];
	}
	else
	{
	$tipo="";
	}

	if(isset($_POST['pager']))
	{
		$pager=$_POST['pager'];
		//echo("set");
	}
	else
	{
		$pager=1;
	}

	$whereQuery="";

	if(trim($tipo)!="")
	{
		$whereQuery.=" WHERE tipieventi.Titolo='".$tipo. "'";
	}


	$x=($pager-1)*10;

	$y="SELECT * FROM tipieventi ".$whereQuery."";

   $result = mysqli_query($conn,$y);

	$num_rows = mysqli_num_rows($result);

	$paginetotali=floor($num_rows/10);
	$resto=$num_rows%10;
	if($resto>0)
	{
		$paginetotali=$paginetotali+1;
	}
	echo json_encode($paginetotali);
?>
