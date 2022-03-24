		<script type="text/javascript">
		var categoria='';
	var pager=1;
	$(document).ready(function() {
		jQuery.post('viewCategorie.php',  {categoria: categoria,pager: pager}, viewList, 'json');
		jQuery.post('pageCategorie.php',  {categoria: categoria,pager: pager}, pagerView, 'json');
	});

	$( "#cerca" ).click(function() {
		categoria=$("#categoria").val();
		pager=1;
		jQuery.post('viewCategorie.php',  {categoria: categoria,pager: pager}, viewList, 'json');
		jQuery.post('pageCategorie.php',  {categoria: categoria,pager: pager}, pagerView, 'json');
	});
	$( "#prevPager" ).click(function() {
		pager=pager-1;
		categoria=$("#categoria").val();
		jQuery.post('viewCategorie.php',  {categoria: categoria,pager: pager}, viewList, 'json');
		jQuery.post('pageCategorie.php',  {categoria: categoria,pager: pager}, pagerView, 'json');
	});
	$( "#nextPager" ).click(function() {
		pager=pager+1;
		categoria=$("#categoria").val();
		jQuery.post('viewCategorie.php',  {categoria: categoria,pager: pager}, viewList, 'json');
		jQuery.post('pageCategorie.php',  {categoria: categoria,pager: pager}, pagerView, 'json');
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
					var objChild=obj.categorie;

						var x='<table> <tr> <th>Titolo</th> <th>Descrizione</th> <th colspan="2">Gestisci</th> </tr>';
					for(var i=0;i<objChild.length;i++)
					{
						x= x+'<tr id='+objChild[i].id+'><td>'+objChild[i].categoria+'</td><td>'+objChild[i].desc+'</td><td>'+'<a href="updCategoria.php?id='+objChild[i].id+'"><img style="width:40px; height:auto" title="Modifica" src="edit.png"></a>'+'</td><td>'+'<a href="javascript:void(0);" onClick="javascript:clickFn('+objChild[i].id+');"><img style="width:40px; height:auto" title="Elimina" src="delete.png"></a>'+'</td></tr>';
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
						window.location="categorie.php";
					}else{
						alert("Prima di eliminare questo categoria, bisogna eliminare gli eventi associati.");
					}
			}
			}
			xhttp.open("GET", "delCategoria.php?id="+id, true);
			 xhttp.send();
			};
		</script>
