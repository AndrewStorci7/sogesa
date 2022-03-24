		<script>
		$("#conferma").bind('click', function(event){
			$("#periodo").removeClass('redBorder');

			var periodo=$("#periodo").val();
			periodo=$.trim(periodo);
			var descr=$("#desc").val();

				if(periodo.length<1)
				{
					$("#periodo").addClass('redBorder');
					alert ("Devi completare il campo Titolo");
				}else{
				$.post("periodoIns.php",  {periodo:periodo, desc:descr}, updFn, "json");
				}
		});
		function updFn(data){
			if(data==1){
				window.location="periodi.php";
			}else{
				alert('Si è verificato un errore. Si prega di riprovare.');
			}
		}
		</script>
