		<script>
		$(document).ready(function(){
			dtlEvento();
		});
		var id=<?php echo $_GET['id']; ?>;
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
		function viewEvUpd(data){

			var cntFile = data;
			var obj = JSON.parse(cntFile);
			var objChild=obj.eventi;
			tipoCurr = objChild[0].idTipo;
			listTipi();
			document.getElementById("titolo").value = objChild[0].titolo;
			document.getElementById("datepicker2").value = objChild[0].dataEv;
			$(function() {
    			$("#tipo").val(objChild[0].idTipo);
			});
			document.getElementById("desc").value = objChild[0].desc;
			$(function() {
    			$("#meteo").val(objChild[0].meteo);
			});
		}
		function dtlEvento(){
			$.post("evento.php",  {id:id}, viewEvUpd, "json");
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

			if(dataEv.length>1 && dataEv.length>1){
				$.post("eventoUpd.php",  {titolo:titolo, dataEv: dataEv, tipo:tipo, desc:descr, meteo:meteo , id:id}, updFn, "json");
			}
			else{
				if(titolo.length<1)
				{
					$("#titolo").addClass('redBorder');
					alert ("Devi completare il campo Titolo");
				}
				if(dataEv.length<1)
				{
					$("#datepicker2").addClass('redBorder');
					alert ("Devi completare il campo Data");
				}
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
    $( "#datepicker2" ).datepicker({
       dateFormat: 'dd/mm/yy'
   });
  } );
		</script>
