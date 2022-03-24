		<script>
		$("#conferma").bind('click', function(event){
			$("#tipo").removeClass('redBorder');

			var tipo=$("#tipo").val();
			tipo=$.trim(tipo);
			var descr=$("#desc").val();

				if(tipo.length<1)
				{
					$("#tipo").addClass('redBorder');
					alert ("Devi completare il campo Titolo");
				}else{
				$.post("tipoIns.php",  {tipo:tipo, desc:descr}, updFn, "json");
				}
		});
		function updFn(data){
			if(data==1){
				window.location="tipi.php";
			}else{
				alert('Si è verificato un errore. Si prega di riprovare.');
			}
		}
		</script>
