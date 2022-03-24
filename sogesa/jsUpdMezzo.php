		<script>
		var id=<?php echo $_GET['id']; ?>;
		$("#conferma").bind('click', function(event){
			$("#marca").removeClass('redBorder');
			$("#cilindrata").removeClass('redBorder');
			$("#disciplina").removeClass('redBorder');
			$("#massa").removeClass('redBorder');
			$("#modello").removeClass('redBorder');

			var marca=$("#marca").val();
			marca=$.trim(marca);
			var cilindrata=$("#cilindrata").val();
			cilindrata=$.trim(cilindrata);
			var disciplina=$("#disciplina").val();
			disciplina=$.trim(disciplina);
			var massa=$("#massa").val();
			massa=$.trim(massa);
			var modello=$("#modello").val();
			modello=$.trim(modello);
				 if(modello.length<1)
				{
					$("#modello").addClass('redBorder');
					alert ("Devi completare il campo modello");
				}
				else{
					$.post("mezzoUpd.php",  {id:id, marca:marca, cilindrata: cilindrata, disciplina:disciplina, massa:massa, modello:modello}, updFn, "json");
				}
		});
		function updFn(data){
			if(data==1){
				alert('Modifica effettuata');
			}else{
				alert('Si è verificato un errore. Si prega di riprovare.');
			}
		}
		</script>
