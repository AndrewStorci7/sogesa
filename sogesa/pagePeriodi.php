
<?php

	require_once('connessione.php');

	if(isset($_POST['periodo']))
	{
		$periodo=$_POST['periodo'];
	}
	else
	{
	$periodo="";
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

	if(trim($periodo)!="")
	{
		$whereQuery.=" WHERE periodi.Titolo='".$periodo. "'";
	}


	$x=($pager-1)*10;

	$y="SELECT * FROM periodi ".$whereQuery."";

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
