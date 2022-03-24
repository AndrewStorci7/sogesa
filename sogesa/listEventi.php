
<?php
require_once('connessione.php');


/*$titolo = $_POST['Titolo'];
$tipo = $_POST['tipo']; 
$dataev = $_POST['dataev'];
$pager = $_POST['pager'];*/
$date= getdate();
$gg=$date['mday'];
$mm=$date['mon'];
$aa=$date['year'];

if(isset($_POST['mesefa'])){
	$mesefa = intval($_POST['mesefa']);
}else{
	$mesefa=1;
}
$query = "	SELECT *
			FROM eventi ORDER BY IdEvento DESC" ;

$result = mysqli_query($conn,$query);

if(!$result) {
	
	echo("Errore nell'esecuzione della query.");
	
	} 
	
$lista='{"eventi":[';
$countriga=0;
while($row=mysqli_fetch_assoc($result)){
	
	$titolo=$row['Titolo'];
		$titolo=html_entity_decode($titolo,ENT_QUOTES,"UTF-8");
	$dataEv=$row['DataI'];
	$annoev = intval(substr($dataEv, -4));
	$meseev = intval(substr($dataEv, 3,2));

$mm=intval($date['mon']);
$aa=intval($date['year']);
$mesecalculate=$mm-$mesefa;	
	if($mesecalculate<1){
		$aa=$aa-1;
		$mesecalculate=(12+$mm)-$mesefa;
	}
	
	
	if((($annoev==$aa)&&($meseev>=$mesecalculate))||($annoev>$aa)){
		if($countriga==0){
			$countriga=1;
		}else{
			$lista.=',';
		}
	
		$lista.='{"id":"'.$row['IdEvento'].'","titolo":"'.$titolo.'"}';
							
	}
}
$lista.=']}';
echo json_encode($lista);	
?>
