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

	if(isset($_POST['titolo']))
	{
		$titolo=$_POST['titolo'];
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
			$whereQuery.=" AND titolo='".$titolo."' ";
					 $counter=1;
		}
		else
		{
			$whereQuery.=" WHERE titolo='".$titolo."' ";
					 $counter=1;
		}
	}
	if(trim($dataEv)!="")
	{
		if($counter==1)
		{
				$whereQuery.=" AND dataEv='".$dataEv."' ";
		}
		else
		{
			$whereQuery.=" WHERE dataEv='".$dataEv."' ";
		}
	}
	$x=($pager-1)*10;

	$query="SELECT* FROM eventi ".$whereQuery."";
   $result = mysqli_query($conn,$query);

   $num_rows = mysqli_num_rows($result);

   $paginetotali=floor($num_rows/10);
	$resto=$num_rows%10;
	if($resto>0){
		$paginetotali=$paginetotali+1;
	}


	echo json_encode($paginetotali);



	?>
