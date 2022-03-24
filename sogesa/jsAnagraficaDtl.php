		<script type="text/javascript">

		var id=<?php echo $_GET['id']; ?>;
  			$(document).ready(function() {
					
		$.post('anagraficaDtl.php',{id:id }, dtlFn, 'json');

			});
					
					
					
function dtlFn(data){
		var obj = JSON.parse(data);
		var objCal=obj.anagrafica;
		var nome=objCal[0].nome;
		$("#nome").html(nome);
		var cognome=objCal[0].cognome;
		$("#cognome").html(cognome);
		var cf=objCal[0].cf;
		$("#cf").html(cf);
		var nascita=objCal[0].nascita;
		$("#nascita").html(nascita);
		var luogo=objCal[0].luogo;
		$("#luogo").html(luogo);
		var citta=objCal[0].citta;
		$("#citta").html(citta);
		var via=objCal[0].via;
		$("#via").html(via);
		var telefono=objCal[0].telefono;
		$("#telefono").html(telefono);
		var email=objCal[0].email;
		$("#email").html(email);
		var patente=objCal[0].patente;
		$("#patente").html(patente);
		var scadpat=objCal[0].scadpat;
		$("#scadpat").html(scadpat);
		var licenza=objCal[0].licenza;
		$("#licenza").html(licenza);
		var scadlic=objCal[0].scadlic;
		$("#scadlic").html(scadlic);
		$.post('scarichi.php',{id:id }, listScarichiFn, 'json');
		$.post('mezzi.php',{id:id }, listMezziFn, 'json');
}

function listScarichiFn(data){
					var cntFile = data;
					var obj = JSON.parse(cntFile);
					var objChild=obj.scarichi;

						var x='<table> <tr>  <th>Data Scarico</th> <th>Codice fiscale genitore</th> <th>Prezzo</th>  <th>Mezzo</th> <th>Gestisci</th> </tr>';
					for(var i=0;i<objChild.length;i++)
					{
						x= x+'<tr id='+objChild[i].id+'><td>'+objChild[i].dataScarico+'</td><td>'+objChild[i].cf+'</td><td>'+objChild[i].prezzo+'</td><td>'+objChild[i].idMezzo+'</td><td>'+'<a href="javascript:void(0);" onClick="javascript:clickFn('+objChild[i].id+');"><img style="width:40px; height:auto" title="Elimina" src="delete.png"></a><a href="pdfScarico.php?id='+objChild[i].id+'" target="_blank"><img style="width:40px; height:auto" title="Stampa" src="print.png"></a>'+'</td></tr>';
					}
					x=x+'</table>';
		$("#listaScarichi").html(x);
					
}

function listMezziFn(data){
					var cntFile = data;
					var obj = JSON.parse(cntFile);
					var objChild=obj.mezzi;

						var x='<table> <tr> <th>Categoria</th> <th>Modello</th> <th>Cilindrata</th> <th>Massa</th> <th>Periodo</th> <th>Gestisci</th> </tr>';
					for(var i=0;i<objChild.length;i++)
					{
						x= x+'<tr id='+objChild[i].id+'><td>'+objChild[i].marca+'</td><td>'+objChild[i].modello+'</td><td>'+objChild[i].cilindrata+'</td><td>'+objChild[i].massa+'</td><td>'+objChild[i].disciplina+'</td><td>'+'<a href="updMezzi.php?id='+objChild[i].id+'"><img style="width:40px; height:auto" title="Modifica" src="edit.png"></a><a href="javascript:void(0);" onClick="javascript:clickFn2('+objChild[i].id+');"><img style="width:40px; height:auto" title="Elimina" src="delete.png"></a>'+'</td></tr>';
					}
					x=x+'</table>';
		$("#listaMezzi").html(x);
					
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
					}else{
						alert('Cancellazione non riuscita!');
					}
			}
			}
			xhttp.open("GET", "delScarichi.php?id="+id, true);
			 xhttp.send();
			};
			function clickFn2(id){
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
					}else{
						alert('Cancellazione non riuscita!');
					}
			}
			}
			xhttp.open("GET", "delMezzi.php?id="+id, true);
			 xhttp.send();
			};

		$("#insMezz").bind('click', function(event){
			$("#modello").removeClass('redBorder');

			var modello=$("#modello").val();
			modello=$.trim(modello);
			var disciplina=$("#disciplina").val();
			var cilindrata=$("#cilindrata").val();
			var marca=$("#marca").val();
			var massa=$("#massa").val();

				if(modello.length<1)
				{
					$("#modello").addClass('redBorder');
					alert ("Devi completare il campo Modello");
				}else{
				$.post("mezziIns.php",  {modello:modello, disciplina:disciplina, cilindrata:cilindrata, marca:marca, massa:massa, id:id}, updFn, "json");
				}
		});
		function updFn(data){
			if(data==1){
				window.location="anagrafica.php";
			}else{
				alert('Si è verificato un errore. Si prega di riprovare.');
			}
		}
	
</script>