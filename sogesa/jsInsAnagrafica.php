<script>

var idSel=0;

/* MODIFICHE DI ANDREW drink*/
let i = 0;
function addTurni(){
	i++;
	if(i < 1)
		i = 1;
	var div = document.getElementById('turni');
	$('.deleteTurni').remove();
	div.innerHTML += '<div style="float: left !important;" class="fon-itemDtl" id="div' + i + '">' +
												'<h4>Turno numero: </h4>' +
												'<input class="fon-input" style="width:40px !important;" type="text" value="' + i + '" name="nturno' + i + '" id="fon-nturno' + i + '" readonly>' +
												'<span>€ turno</span>' +
												'<input class="fon-input" style="width:60px !important;" type="text" name="pturno' + i + '" id="fon-prezzonturno' + i + '">' +
												'<button onclick="deleteTurni(\'div' + i + '\')" class="deleteTurni" style="border-radius:30px; width:20px; height:auto; background-color:red;">-</button>'
											'</div>';
}

function deleteTurni(id){
	var divDel = document.getElementById(id);
	divDel.remove();
	if(i < 1){
		i = 1;
	}else{
		i--;
		var div = document.getElementById('div' + i);
		div.innerHTML += '<button onclick="deleteTurni(\'div' + i + '\')" class="deleteTurni" style="border-radius:30px; width:20px; height:auto; background-color:red;">-</button>';
	}
}

/*$('#conferma').click(function(){
	var box = $('#fon-box').val();
	var giorni = $('#fon-giorni').val();
	var pxgg = $('#fon-prezzoxgg').val();
	var arrayTurni = new Array();
	for(let y = 0; y < x; y++){
		var idCss = '#div' + y;
		arrayTurni[y] = $(idCss).val();
		console.log(arrayTurni[y]);
	}
});*/

/*$('#aggiungiTurno').click(function(){
	i++;
	console.log(i);
	$('#turni').append('<div class="font-itemDtl">' +
												'<h4>Numero Turno</h4>' +
												'<input class="fon-input" type="text" name="titolo" id="fon-nturno' + i + '">' +
												'<span>€ turno</span>' +
												'<input class="fon-input" type="text" name="titolo" id="fon-prezzonturno' + i + '">' +
											'</div>');
});*/
/* FINE MODIFICHE DI ANDREW drink */



$('.fon-change').bind('keyup', function(event){
	var nomeTrovato;
	var cognomeTrovato;
	document.getElementById("fon-right").innerHTML = "";
	var nome = $("#nome").val();
	var cognome = $("#cognome").val();
	var cf = '';
	jQuery.post('viewAnagrafica.php',  {nome: nome,cognome: cognome,cf: cf,pager: 1}, viewList, 'json');
});
jQuery("#mesefa").bind('keyup', function(event){
	var mesefa = $("#mesefa").val();
	jQuery.post('listEventi.php',  {mesefa:mesefa}, viewEventi, 'json');
});



function selPeople(id){
	idSel=id;
	$.post("anagraficaDtl.php",  {id:id}, viewEvUpd, "json");
	$.post('mezzi.php',{id:id }, listMezziFn, 'json');
}

function listMezziFn(data){
	var cntFile = data;
	var obj = JSON.parse(cntFile);
	var objChild=obj.mezzi;

	var x='<table> <tr> <th>Seleziona</th><th>Categoria</th> <th>Modello</th> <th>Cilindrata</th> <th>Massa</th> <th>Periodo</th> <th>Gestisci</th> </tr>';
	for(var i=0;i<objChild.length;i++)
	{
		x= x+'<tr id='+objChild[i].id+'><td><input onClick="javascript:ctrlRadio();" type="radio" value="'+objChild[i].id+'" name="radioMezzo" id="radioMezzo" /></td><td>'+objChild[i].marca+'</td><td>'+objChild[i].modello+'</td><td>'+objChild[i].cilindrata+'</td><td>'+objChild[i].massa+'</td><td>'+objChild[i].disciplina+'</td><td>'+'<a href="updMezzi.php?id='+objChild[i].id+'"><img style="width:40px; height:auto" title="Modifica" src="edit.png"></a><a href="javascript:void(0);" onClick="javascript:clickFn2('+objChild[i].id+');"><img style="width:40px; height:auto" title="Elimina" src="delete.png"></a>'+'</td></tr>';
	}
	x=x+'</table>';
	$("#listaMezzi").html(x);

}


function viewEvUpd(data){
	var cntFile = data;
	var obj = JSON.parse(cntFile);
	var objChild=obj.anagrafica;
	document.getElementById("nome").value = objChild[0].nome;
	document.getElementById("cognome").value = objChild[0].cognome;
	document.getElementById("cf").value = objChild[0].cf;
	document.getElementById("luogo").value = objChild[0].luogo;
	document.getElementById("nascita").value = objChild[0].nascita;
	document.getElementById("via").value = objChild[0].via;
	document.getElementById("citta").value = objChild[0].citta;
	document.getElementById("email").value = objChild[0].email;
	document.getElementById("telefono").value = objChild[0].telefono;
	document.getElementById("patente").value = objChild[0].patente;
	document.getElementById("scadpat").value = objChild[0].scadpat;
	document.getElementById("licenza").value = objChild[0].licenza;
	document.getElementById("scadlic").value = objChild[0].scadlic;

}
var fonpatente='';
var documento='';
var dataScarico='';
var cfg='';
var prezzo='';
var codEv=0;
var box = 0;
var giorni = 0;
var prezzo = 0;
var arrayTurni = new Array();
//var arrayPrezzi = new Array();

$("#conferma").click(function(){
	$("#nome").removeClass('redBorder');
	$("#cognome").removeClass('redBorder');
	$("#cf").removeClass('redBorder');
	$("#fon-patente").removeClass('redBorder');




	var nome=$("#nome").val();
	nome=$.trim(nome);
	var cognome=$("#cognome").val();
	cognome=$.trim(cognome);
	var cf=$("#cf").val();
	cf=$.trim(cf);


	var patente=$("#patente").val();
	patente=$.trim(patente);
	var scadpat=$("#scadpat").val();
	scadpat=$.trim(scadpat);
	var licenza=$("#licenza").val();
	licenza=$.trim(licenza);
	var scadlic=$("#scadlic").val();
	scadlic=$.trim(scadlic);


	fonpatente=$("#fon-patente").val();
	fonpatente=$.trim(fonpatente);
	var luogo=$("#luogo").val();
	var nascita=$("#nascita").val();
	var via=$("#via").val();
	var citta=$("#citta").val();
	var email=$("#email").val();
	var telefono=$("#telefono").val();
	documento=$("#fon-documento").val();
	dataScarico=$("#dataScarico").val();
	cfg=$("#fon-cfg").val();
	prezzo=$("#fon-prezzo").val();
	codEv=$("#codEv").val();

	/* MODIFICHE DI ANDREW drink */
	box = $('#fon-box').val();
	box = $.trim(box);
	giorni = $('#fon-giorni').val();
	giorni = $.trim(giorni);
	pxgg = $('#fon-prezzoxgg').val();
	pxgg = $.trim(pxgg);
	for(let y = 1; y <= i; y++){
		//var idCss = '#fon-nturno' + y;
		var idCssCosti = '#fon-prezzonturno' + y;
		//arrayPrezzi[y-1] = $(idCssCosti).val();
		arrayTurni[y] = $(idCssCosti).val();
		//console.log(arrayTurni[y-1]);
	}
	/* FINE MODIFICHE DI ANDREW drink */

	if(nome.length<1)
	{
		$("#nome").addClass('redBorder');
		alert ("Devi completare il campo Nome");
	}
	else if(cognome.length<1)
	{
		$("#cognome").addClass('redBorder');
		alert ("Devi completare il campo Cognome");
	}
	else if(cf.length<1)
	{
		$("#cf").addClass('redBorder');
		alert ("Devi completare il campo CF");
	}
	else if(dataScarico.length<1)
	{
		$("#dataScarico").addClass('redBorder');
		alert ("Devi completare il campo Data scarico");
	}
	else{
		if(idSel==0){

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
				$.post("anagraficaIns.php",  {nome:nome, cognome: cognome, cf:cf, luogo:luogo, nascita:nascita, via:via, citta:citta, email:email, telefono:telefono, patente:patente , scadpat:scadpat, licenza:licenza , scadlic:scadlic, modello:modello, disciplina:disciplina, cilindrata:cilindrata, marca:marca, massa:massa}, insFn, "json");
			}
		}else{

			var modello='';
			var disciplina='';
			var cilindrata='';
			var marca='';
			var massa='';



			if(radioValue==0){
				$("#modello").removeClass('redBorder');

				modello=$("#modello").val();
				modello=$.trim(modello);
				disciplina=$("#disciplina").val();
				cilindrata=$("#cilindrata").val();
				marca=$("#marca").val();
				massa=$("#massa").val();
				if(modello.length<1)
				{
					$("#modello").addClass('redBorder');
					alert ("Devi completare il campo Modello o selezionare un mezzo esistente");
				}else{
					$.post("anagraficaUpd.php",  {nome:nome, cognome: cognome, cf:cf, luogo:luogo, nascita:nascita, via:via, citta:citta, email:email, telefono:telefono , id:idSel, patente:patente , scadpat:scadpat, licenza:licenza , scadlic:scadlic , radioValue:radioValue, modello:modello, disciplina:disciplina, cilindrata:cilindrata, marca:marca, massa:massa}, updFn, "json");
				}
			}else{
				$.post("anagraficaUpd.php",  {nome:nome, cognome: cognome, cf:cf, luogo:luogo, nascita:nascita, via:via, citta:citta, email:email, telefono:telefono , id:idSel, patente:patente , scadpat:scadpat, licenza:licenza , scadlic:scadlic , radioValue:radioValue, modello:modello, disciplina:disciplina, cilindrata:cilindrata, marca:marca, massa:massa}, updFn, "json");
			}
		}
	}
});
var radioValue =0;
function ctrlRadio(){

	radioValue = $("input[name='radioMezzo']:checked").val();

}

function insScaricoFn(data){
	if(data>0){
		//window.open('pdfScarico.php?id='+data,'_blank');
		//window.location="anagrafica.php";
		window.Location = "scaricoIns.php";
	}else{
		alert('Si è verificato un errore. Si prega di riprovare.');
	}
}
function insScarico2Fn(data){
	if(data>0){
		//window.open('pdfScarico.php?id='+data,'_blank');
		//window.location="anagrafica.php";
		window.Location = "scaricoIns.php";
	}else{
		alert('Si è verificato un errore. Si prega di riprovare.');
	}
}
function insFn(data){
	if(data>0){
		$.post("scaricoIns.php",  {patente:fonpatente, documento: documento, dataScarico:dataScarico, cfg:cfg, prezzo:prezzo , id:data,codEv:codEv,radioValue:radioValue, nbox:box, giorni:giorni, prezzoxgg:pxgg, arrayTurni:arrayTurni}, insScarico2Fn, "json");
	}else{
		alert('Si è verificato un errore. Si prega di riprovare.');
	}
}
function updFn(data){
	if(data==1){
		$.post("scaricoIns.php",  {patente:fonpatente, documento: documento, dataScarico:dataScarico, cfg:cfg, prezzo:prezzo , id:idSel,codEv:codEv,radioValue:radioValue, nbox:box, giorni:giorni, prezzoxgg:pxgg, arrayTurni:arrayTurni}, insScaricoFn, "json");
	}else{
		alert('Si è verificato un errore. Si prega di riprovare.');
	}
}
$(document).ready(function() {
	var mesefa = $("#mesefa").val();
	jQuery.post('listEventi.php',  {mesefa:mesefa}, viewEventi, 'json');
});

function viewEventi(data){
	var obj = JSON.parse(data);
	var objCal=obj.eventi;
	var risultato='<option value="0">Tutti</option>';
	for (var i=0;i < objCal.length;i++){
		risultato+='<option value="'+objCal[i].id+'">'+objCal[i].titolo+'</option>';
	}
	$("#codEv").html(risultato);
}
function viewList(data){

	var cntFile = data;

	if(cntFile!=''){
		var obj = JSON.parse(cntFile);
		var objChild=obj.anagrafica;

		var x='';
		for(var i=0;i<objChild.length;i++){
			x= x+'<p><a href="javascript:void(0);" onClick="javascript:selPeople('+objChild[i].id+')">'+objChild[i].nome+' '+objChild[i].cognome+'</a></p>';
		}
		$("#fon-right").html(x);
	}
}


$( function() {
	$( "#nascita" ).datepicker({
		dateFormat: 'dd/mm/yy'
	});
});
$( function() {
	$( "#dataScarico" ).datepicker({
		dateFormat: 'dd/mm/yy'
	});
});

</script>
