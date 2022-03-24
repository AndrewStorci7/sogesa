		<script type="text/javascript">
		var nome='';
		var cognome='';
		var cf='';
		var marca='';
		var modello='';
		var disciplina='';
		var eventilist='';
		var tipo='';
	var pager=1;
	$(document).ready(function() {
		jQuery.post('viewAnagrafica.php',  {nome: nome,cognome: cognome,cf: cf,marca: marca,modello: modello,disciplina: disciplina,eventilist: eventilist,tipo: tipo,pager: pager}, viewList, 'json');
		jQuery.post('pageAnagrafica.php',  {nome: nome,cognome: cognome,cf: cf,marca: marca,modello: modello,disciplina: disciplina,eventilist: eventilist,tipo: tipo,pager: pager}, pagerView, 'json');
		jQuery.post('listTipi.php',  {}, viewTipiCerca, 'json');
		jQuery.post('listEv.php',  {}, viewEventiCerca, 'json');
	});
function viewTipiCerca(data){
		var obj = JSON.parse(data);
		var objCal=obj.tipi;
		var risultato='<option value="">Tutti</option>';
		for (var i=0;i < objCal.length;i++){
			risultato+='<option value="'+objCal[i].id+'">'+objCal[i].tipo+'</option>';
		}
		$(".cerca #tipo").html(risultato);
}
function viewEventiCerca(data){
		var obj = JSON.parse(data);
		var objCal=obj.eventi;
		var risultato='<option value="">Tutti</option>';
		for (var i=0;i < objCal.length;i++){
			risultato+='<option value="'+objCal[i].id+'">'+objCal[i].titolo+'</option>';
		}
		$(".cerca #eventilist").html(risultato);
}

	$( "#cerca" ).click(function() {
		nome=$("#nome").val();
		cognome=$("#cognome").val();
		cf=$("#cf").val();
		marca=$("#marca").val();
		modello=$("#modello").val();
		disciplina=$("#disciplina").val();
		eventilist=$("#eventilist").val();
		tipo=$("#tipo").val();
		pager=1;
		jQuery.post('viewAnagrafica.php',  {nome: nome,cognome: cognome,cf: cf,marca: marca,modello: modello,disciplina: disciplina,eventilist: eventilist,tipo: tipo,pager: pager}, viewList, 'json');
		jQuery.post('pageAnagrafica.php',  {nome: nome,cognome: cognome,cf: cf,marca: marca,modello: modello,disciplina: disciplina,eventilist: eventilist,tipo: tipo,pager: pager}, pagerView, 'json');
		jQuery.post('totaleAnagrafica.php',  {nome: nome,cognome: cognome,cf: cf,marca: marca,modello: modello,disciplina: disciplina,eventilist: eventilist,tipo: tipo,pager: pager}, totaleView, 'json');
	});
	function totaleView(data){
		$("#numtot").html(data);
		$("#txtricerca").html('Totale anagrafiche trovate: ');
	}
	$( "#prevPager" ).click(function() {
		pager=pager-1;
		nome=$("#nome").val();
		cognome=$("#cognome").val();
		cf=$("#cf").val();
		marca=$("#marca").val();
		modello=$("#modello").val();
		disciplina=$("#disciplina").val();
		eventilist=$("#eventilist").val();
		tipo=$("#tipo").val();
		jQuery.post('viewAnagrafica.php',  {nome: nome,cognome: cognome,cf: cf,marca: marca,modello: modello,disciplina: disciplina,eventilist: eventilist,tipo: tipo,pager: pager}, viewList, 'json');
		jQuery.post('pageAnagrafica.php',  {nome: nome,cognome: cognome,cf: cf,marca: marca,modello: modello,disciplina: disciplina,eventilist: eventilist,tipo: tipo,pager: pager}, pagerView, 'json');
	});
	$( "#nextPager" ).click(function() {
		pager=pager+1;
		nome=$("#nome").val();
		cognome=$("#cognome").val();
		cf=$("#cf").val();
		marca=$("#marca").val();
		modello=$("#modello").val();
		disciplina=$("#disciplina").val();
		eventilist=$("#eventilist").val();
		tipo=$("#tipo").val();
		jQuery.post('viewAnagrafica.php',  {nome: nome,cognome: cognome,cf: cf,marca: marca,modello: modello,disciplina: disciplina,eventilist: eventilist,tipo: tipo,pager: pager}, viewList, 'json');
		jQuery.post('pageAnagrafica.php',  {nome: nome,cognome: cognome,cf: cf,marca: marca,modello: modello,disciplina: disciplina,eventilist: eventilist,tipo: tipo,pager: pager}, pagerView, 'json');
	});

	function pagerView(data){
		if(pager==1){
			$( "#prevPager" ).css('display','none');
		}else{
			$( "#prevPager" ).css('display','inline-block');
		}
		if(pager==data){
			$( "#nextPager" ).css('display','none');
		}else{
			$( "#nextPager" ).css('display','inline-block');
		}
		$("#pagerItem").html(pager);
	}
	function viewList(data){

					var cntFile = data;
					if(cntFile==''){
						var x='<table> <tr> <th>Nome</th> <th>Cognome</th> <th>Email</th> <th colspan="3">Gestisci</th> </tr><tr> <td colspan="6" align="center">Nessun elemento trovato</td> </tr></table>';
					}else{
					var obj = JSON.parse(cntFile);
					var objChild=obj.anagrafica;

						var x='<table> <tr> <th>Nome</th> <th>Cognome</th> <th>Email</th> <th colspan="3">Gestisci</th> </tr>';
					for(var i=0;i<objChild.length;i++)
					{
						x= x+'<tr id='+objChild[i].id+'><td>'+objChild[i].nome+'</td><td>'+objChild[i].cognome+'</td><td>'+objChild[i].email+'</td><td>'+'<a href="dtlAnagrafica.php?id='+objChild[i].id+'"><img style="width:40px; height:auto" title="Visualizza" src="view.png"></a>'+'</td><td>'+'<a href="updAnagrafica.php?id='+objChild[i].id+'"><img style="width:40px; height:auto" title="Modifica" src="edit.png"></a>'+'</td><td>'+'<a href="javascript:void(0);" onClick="javascript:clickFn('+objChild[i].id+');"><img style="width:40px; height:auto" title="Elimina" src="delete.png"></a>'+'</td></tr>';
					}
					x=x+'</table>';
					}
		$("#risultato").html(x);
					

	}

			function clickFn(id){
			var annulla = window.confirm("CONFERMARE L'ELIMINAZIONE?");
			if (!annulla) {
			return annulla;
			}
			else {
			$("#item"+id).remove();	
			}
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var cntFile = xhttp.responseText;
					if(cntFile!=0){
						window.location="anagrafica.php";
					}
			}
			}
			xhttp.open("GET", "delAnagrafica.php?id="+id, true);
			 xhttp.send();
			};
	$( "#expCsv" ).click(function() {
		nome=$("#nome").val();
		cognome=$("#cognome").val();
		cf=$("#cf").val();
		marca=$("#marca").val();
		modello=$("#modello").val();
		disciplina=$("#disciplina").val();
		eventilist=$("#eventilist").val();
		tipo=$("#tipo").val();
		jQuery.post('csvAnagrafica.php',  {nome: nome,cognome: cognome,cf: cf,marca: marca,modello: modello,disciplina: disciplina,eventilist: eventilist,tipo: tipo}, csvResult, 'json');
	});
	function csvResult(data){
		
var cntFile = data;
if(cntFile==''){
}else{
var obj = JSON.parse(cntFile);
var objChild=obj.anagrafica;
var x = "data:text/csv;charset=utf-8,";
					for(var i=0;i<objChild.length;i++)
					{
						x= x+''+objChild[i].email+';'+objChild[i].nome+';'+objChild[i].cognome+';'+objChild[i].telefono+';'+objChild[i].citta+';'+objChild[i].tipologia+';'+objChild[i].marca+';'+objChild[i].modello+';'+objChild[i].disciplina+';'+objChild[i].autoutente+';'+';\r\n';
					}
}
var encodedUri = encodeURI(x);
window.open(encodedUri);	
}
		</script>
