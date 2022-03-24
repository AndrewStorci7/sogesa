		<script type="text/javascript">

		var id=<?php echo $_GET['id']; ?>;
  			$(document).ready(function() {
					
		$.post('evento.php',{id:id }, dtlFn, 'json');

			});
					
function dtlFn(data){
		var obj = JSON.parse(data);
		var objCal=obj.eventi;
		var titolo=objCal[0].titolo;
		$("#titolo").html(titolo);
		var dataEv=objCal[0].dataEv;
		$("#dataEv").html(dataEv);
		var tipo=objCal[0].tipo;
		$("#tipo").html(tipo);
		var desc=objCal[0].desc;
		$("#desc").html(desc);
		var meteo=objCal[0].meteo;
		$("#previsione").html(meteo);
		var numero=objCal[0].numero;
		$("#numero").html(numero);
}

	$(document).ready(function() {
		jQuery.post('viewAnagraficheEvento.php',  {id: id}, viewList, 'json');
	});
	function viewList(data){

					var cntFile = data;
					var obj = JSON.parse(cntFile);
					var objChild=obj.anagrafica;

						var x='<table> <tr> <th>Nome</th> <th>Cognome</th> <th>Email</th> <th>Gestisci</th></tr>';
					for(var i=0;i<objChild.length;i++)
					{
						x= x+'<tr id='+objChild[i].id+'><td>'+objChild[i].nome+'</td><td>'+objChild[i].cognome+'</td><td>'+objChild[i].email+'</td><td><a href="dtlAnagrafica.php?id='+objChild[i].id+'"><img style="width:40px; height:auto" title="Visualizza" src="view.png"></a></td></tr>';
					}
					x=x+'</table>';
		$("#risultato").html(x);
					

	}

</script>