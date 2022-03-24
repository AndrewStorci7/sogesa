		<script>
		$( document ).ready(function() {
  			listTipi();
		});
		var tipoCurr='';
		function viewListTipo(data){
		var cntFile = data;
		var obj = JSON.parse(cntFile);
		var objChild=obj.tipi;
		var strRes='';
		for(var i=0;i<objChild.length;i++){
			if(tipoCurr==objChild[i].id){
				strRes+='<option selected value="'+objChild[i].id+'">'+objChild[i].tipo+'</option>';
			}else{
				strRes+='<option value="'+objChild[i].id+'">'+objChild[i].tipo+'</option>';
			}
		}
		$('#tipo').html(strRes);
		}
		function listTipi(){
			$.post("listTipi.php",  {}, viewListTipo, "json");
		}
		</script>
		<script>
		$("#conferma").bind('click', function(event){
			$("#titolo").removeClass('redBorder');
			$("#datepicker2").removeClass('redBorder');

			var titolo=$("#titolo").val();
			titolo=$.trim(titolo);
			var dataEv=$("#datepicker2").val();
			dataEv=$.trim(dataEv);
			var tipo=$("#tipo").val();
			var descr=$("#desc").val();
			var meteo=$("#meteo").val();

				if(titolo.length<1)
				{
					$("#titolo").addClass('redBorder');
					alert ("Devi completare il campo Titolo");
				}
				else if(dataEv.length<1)
				{
					$("#datepicker2").addClass('redBorder');
					alert ("Devi completare il campo Data");
				}else{
				$.post("eventoIns.php",  {titolo:titolo, dataEv: dataEv, tipo:tipo, desc:descr, meteo:meteo}, updFn, "json");
				}
		});
		function updFn(data){
			if(data==1){
				window.location="index.php";
			}else{
				alert('Si è verificato un errore. Si prega di riprovare.');
			}
		}
$( function() {
    $( "#datepicker2" ).datepicker({
       dateFormat: 'dd/mm/yy' 
   });
  } );
	</script>
