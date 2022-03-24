		<script type="text/javascript">
		var periodo='';
	var pager=1;
	$(document).ready(function() {
		jQuery.post('viewPeriodi.php',  {periodo: periodo,pager: pager}, viewList, 'json');
		jQuery.post('pagePeriodi.php',  {periodo: periodo,pager: pager}, pagerView, 'json');
	});

	$( "#cerca" ).click(function() {
		periodo=$("#periodo").val();
		pager=1;
		jQuery.post('viewPeriodi.php',  {periodo: periodo,pager: pager}, viewList, 'json');
		jQuery.post('pagePeriodi.php',  {periodo: periodo,pager: pager}, pagerView, 'json');
	});
	$( "#prevPager" ).click(function() {
		pager=pager-1;
		periodo=$("#periodo").val();
		jQuery.post('viewPeriodi.php',  {periodo: periodo,pager: pager}, viewList, 'json');
		jQuery.post('pagePeriodi.php',  {periodo: periodo,pager: pager}, pagerView, 'json');
	});
	$( "#nextPager" ).click(function() {
		pager=pager+1;
		periodo=$("#periodo").val();
		jQuery.post('viewPeriodi.php',  {periodo: periodo,pager: pager}, viewList, 'json');
		jQuery.post('pagePeriodi.php',  {periodo: periodo,pager: pager}, pagerView, 'json');
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
						var x='<table> <tr> <th>Titolo</th> <th>Descrizione</th>  <th colspan="2">Gestisci</th> </tr><tr> <td colspan="4" align="center">Nessun elemento trovato</td> </tr></table>';
					}else{
					var obj = JSON.parse(cntFile);
					var objChild=obj.periodi;

						var x='<table> <tr> <th>Titolo</th> <th>Descrizione</th> <th colspan="2">Gestisci</th> </tr>';
					for(var i=0;i<objChild.length;i++)
					{
						x= x+'<tr id='+objChild[i].id+'><td>'+objChild[i].periodo+'</td><td>'+objChild[i].desc+'</td><td>'+'<a href="updPeriodo.php?id='+objChild[i].id+'"><img style="width:40px; height:auto" title="Modifica" src="edit.png"></a>'+'</td><td>'+'<a href="javascript:void(0);" onClick="javascript:clickFn('+objChild[i].id+');"><img style="width:40px; height:auto" title="Elimina" src="delete.png"></a>'+'</td></tr>';
					}
					x=x+'</table>';
					}
		$("#risultato").html(x);
					

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
						window.location="periodi.php";
					}else{
						alert("Prima di eliminare questo periodo, bisogna eliminare gli eventi associati.");
					}
			}
			}
			xhttp.open("GET", "delPeriodo.php?id="+id, true);
			 xhttp.send();
			};
		</script>
