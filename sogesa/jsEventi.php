<script type="text/javascript">
var titolo='';
var tipo='';
var dataEv='';
var pager=1;
$(document).ready(function() {
	jQuery.post('viewEventi.php',  {titolo: titolo,tipo: tipo,dataEv: dataEv,pager: pager}, viewList, 'json');
	jQuery.post('listTipi.php',  {}, viewTipiCerca, 'json');
	jQuery.post('pageEventi.php',  {titolo: titolo,tipo: tipo,dataEv: dataEv,pager: pager}, pagerView, 'json');
	jQuery.post('calEventi.php',  {}, calendarView, 'json');
});

$( "#cerca" ).click(function() {
	titolo=$("#titolo").val();
	tipo=$("#tipo").val();
	dataEv=$("#data").val();
	pager=1;
	jQuery.post('viewEventi.php',  {titolo: titolo,tipo: tipo,dataEv: dataEv,pager: pager}, viewList, 'json');
	jQuery.post('pageEventi.php',  {titolo: titolo,tipo: tipo,dataEv: dataEv,pager: pager}, pagerView, 'json');
});
$( "#prevPager" ).click(function() {
	pager=pager-1;
	titolo=$("#titolo").val();
	tipo=$("#tipo").val();
	dataEv=$("#data").val();
	jQuery.post('viewEventi.php',  {titolo: titolo,tipo: tipo,dataEv: dataEv,pager: pager}, viewList, 'json');
	jQuery.post('pageEventi.php',  {titolo: titolo,tipo: tipo,dataEv: dataEv,pager: pager}, pagerView, 'json');
});
$( "#nextPager" ).click(function() {
	pager=pager+1;
	titolo=$("#titolo").val();
	tipo=$("#tipo").val();
	dataEv=$("#data").val();
	jQuery.post('viewEventi.php',  {titolo: titolo,tipo: tipo,dataEv: dataEv,pager: pager}, viewList, 'json');
	jQuery.post('pageEventi.php',  {titolo: titolo,tipo: tipo,dataEv: dataEv,pager: pager}, pagerView, 'json');
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
		var x='<table> <tr> <th>Titolo</th> <th>Data</th> <th>Tipo</th> <th>Descrizione</th> <th class="meteo">Meteo</th> <th colspan="3">Gestisci</th> </tr><tr> <td colspan="8" align="center">Nessun elemento trovato</td> </tr></table>';
	}else{
		var obj = JSON.parse(cntFile);
		var objChild=obj.eventi;

		var x='<table> <tr> <th>Titolo</th> <th>Data</th> <th>Tipo</th> <th>Descrizione</th> <th class="meteo">Meteo</th> <th colspan="3">Gestisci</th> </tr>';
		for(var i=0;i<objChild.length;i++)
		{
			x= x+'<tr id='+objChild[i].id+'><td>'+objChild[i].titolo+'</td><td>'+objChild[i].dataEv+'</td><td>'+objChild[i].tipo+'</td><td>'+objChild[i].desc+'</td><td>'+objChild[i].meteo+'</td><td>'+'<a href="dtlEvento.php?id='+objChild[i].id+'"><img style="width:40px; height:auto" title="Visualizza" src="view.png"></a>'+'</td><td>'+'<a href="updEvento.php?id='+objChild[i].id+'"><img style="width:40px; height:auto" title="Modifica" src="edit.png"></a>'+'</td><td>'+'<a href="javascript:void(0);" onClick="javascript:clickFn('+objChild[i].id+');"><img style="width:40px; height:auto" title="Elimina" src="delete.png"></a>'+'</td></tr>';
		}
		x=x+'</table>';
	}
	$("#risultato").html(x);

						var x='<table> <tr> <th>Titolo</th> <th>Data</th> <th>Tipo</th> <th>Descrizione</th> <th class="meteo">Meteo</th> <th colspan="3">Gestisci</th> </tr>';
					for(var i=0;i<objChild.length;i++)
					{
						x= x+'<tr id='+objChild[i].id+'><td>'+objChild[i].titolo+'</td><td>'+objChild[i].dataEv+'</td><td>'+objChild[i].tipo+'</td><td>'+objChild[i].desc+'</td><td>'+objChild[i].meteo+'</td><td>'+'<a href="dtlEvento.php?id='+objChild[i].id+'"><img style="width:40px; height:auto" title="Visualizza" src="view.png"></a>'+'</td><td>'+'<a href="updEvento.php?id='+objChild[i].id+'"><img style="width:40px; height:auto" title="Modifica" src="edit.png"></a>'+'</td><td>'+'<a href="javascript:void(0);" onClick="javascript:clickFn('+objChild[i].id+');"><img style="width:40px; height:auto" title="Elimina" src="delete.png"></a>'+'</td></tr>';
					}
					x=x+'</table>';
					}
		$("#risultato").html(x);


}

function calendarView(data){
	var sp='-';
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //As January is 0.
	var yyyy = today.getFullYear();
	if(dd<10) dd='0'+dd;
	if(mm<10) mm='0'+mm;
	var curday=(yyyy+sp+mm+sp+dd);
	var risultato="function calInit(){ ";
	risultato+="var calendarEl = document.getElementById('calendar');";

	risultato+="var calendar = new FullCalendar.Calendar(calendarEl, {";
	risultato+=" plugins: [ 'interaction', 'dayGrid' ],";
	risultato+=" defaultDate: '"+curday+"',";
	risultato+=" editable: true,";
	risultato+=" eventLimit: true, ";
	risultato+=" events: [";


	var obj = JSON.parse(data);
	var objCal=obj.eventi;

	for (var i=0;i<objCal.length;i++){
		risultato+="{";
		risultato+="title: '"+objCal[i].titolo+"',";
		risultato+="url: 'dtlEvento.php?id="+objCal[i].id+"',";

		var yyyyy=objCal[i].dataEv.substr(6, 4);
		var mmm=objCal[i].dataEv.substr(3, 2);
		var ddd=objCal[i].dataEv.substr(0, 2);
		var curdayy=yyyyy+'-'+mmm+'-'+ddd;

		risultato+="start: '"+curdayy+"'";
		risultato+="}";
		if(i!=objCal.length-1){
			risultato+=",";
		}
	}
	risultato+="]});";
	risultato+="calendar.render();}calInit();";
	$("#cal script").html(risultato);
}

		function viewTipiCerca(data){
			var obj = JSON.parse(data);
			var objCal=obj.tipi;
			var risultato='<option value="">Tutti</option>';
			for (var i=0;i < objCal.length;i++){
				risultato+='<option value="'+objCal[i].id+'">'+objCal[i].tipo+'</option>';
			}
			$(".cerca #tipo").html(risultato);
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
						window.location="index.php";
					}else{
						alert("Prima di cancellare questo evento bisogna cancellare gli scarichi associati.");
					}
				}
			}
			xhttp.open("GET", "delEvento.php?id="+id, true);
			xhttp.send();
		};


		$( function() {
			$( ".cerca #data" ).datepicker({
				dateFormat: 'dd/mm/yy'
			});
		} );
		</script>
