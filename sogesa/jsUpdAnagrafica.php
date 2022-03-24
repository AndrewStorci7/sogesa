		<script>
		var id=<?php echo $_GET['id']; ?>;
		var tipoCurr='';
		dtlAnagrafica();
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
		function dtlAnagrafica(){
			$.post("anagraficaDtl.php",  {id:id}, viewEvUpd, "json");
		}
		</script>
		<script>
		$("#conferma").bind('click', function(event){
			$("#nome").removeClass('redBorder');
			$("#cognome").removeClass('redBorder');
			$("#cf").removeClass('redBorder');

			var nome=$("#nome").val();
			nome=$.trim(nome);
			var cognome=$("#cognome").val();
			cognome=$.trim(cognome);
			var cf=$("#cf").val();
			cf=$.trim(cf);
			var luogo=$("#luogo").val();
			var nascita=$("#nascita").val();
			var via=$("#via").val();
			var citta=$("#citta").val();
			var email=$("#email").val();
			var telefono=$("#telefono").val();
			var patente=$("#patente").val();
			var scadpat=$("#scadpat").val();
			var licenza=$("#licenza").val();
			var scadlic=$("#scadlic").val();
				if(nome.length<1)
				{
					$("#nome").addClass('redBorder');
					alert ("Devi completare il campo Titolo");
				}
				else if(cognome.length<1)
				{
					$("#cognome").addClass('redBorder');
					alert ("Devi completare il campo Data");
				}
				else if(cf.length<1)
				{
					$("#cf").addClass('redBorder');
					alert ("Devi completare il campo Data");
				}
				else{
					$.post("anagraficaUpd.php",  {nome:nome, cognome: cognome, cf:cf, luogo:luogo, nascita:nascita, via:via, citta:citta, email:email, telefono:telefono , id:id, patente:patente , scadpat:scadpat, licenza:licenza , scadlic:scadlic}, updFn, "json");
				}
		});
		function updFn(data){
			if(data==1){
				alert('Modifica effettuata');
			}else{
				alert('Si è verificato un errore. Si prega di riprovare.');
			}
		}
$( function() {
    $( "#nascita" ).datepicker({
       dateFormat: 'dd/mm/yy' 
   });
  } );
		</script>
