		<script>
		var id=<?php echo $_GET['id']; ?>;
		dtlEvento();
		function viewEvUpd(data){
			var cntFile = data;
			var obj = JSON.parse(cntFile);
			var objChild=obj.periodi;
			document.getElementById("titolo").value = objChild[0].periodo;
			document.getElementById("desc").value = objChild[0].desc;
		}
		function dtlEvento(){
			$.post("periodo.php",  {id:id}, viewEvUpd, "json");
		}
		</script>
		<script>
		$("#conferma").bind('click', function(event){
			$("#titolo").removeClass('redBorder');

			var titolo=$("#titolo").val();
			titolo=$.trim(titolo);
			var descr=$("#desc").val();
				if(titolo.length<1)
				{
					$("#titolo").addClass('redBorder');
					alert ("Devi completare il campo Titolo");
				}else{
					$.post("periodoUpd.php",  {titolo:titolo, desc:descr, id:id}, updFn, "json");
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
