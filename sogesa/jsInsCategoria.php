		<script>
		$("#conferma").bind('click', function(event){
			$("#categoria").removeClass('redBorder');

			var categoria=$("#categoria").val();
			categoria=$.trim(categoria);
			var descr=$("#desc").val();

				if(categoria.length<1)
				{
					$("#categoria").addClass('redBorder');
					alert ("Devi completare il campo Titolo");
				}else{
				$.post("categoriaIns.php",  {categoria:categoria, desc:descr}, updFn, "json");
				}
		});
		function updFn(data){
			if(data==1){
				window.location="categorie.php";
			}else{
				alert('Si è verificato un errore. Si prega di riprovare.');
			}
		}
		</script>
