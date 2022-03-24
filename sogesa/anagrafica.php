<?php include('header.php'); ?>
<?php include('topAnagrafica.php'); ?>

        <!--Parte Fratta-->
        <div class="lista listaFull listaAnagrafica">
		<div class="titoloanagraficamoruzzi">
				<h1> Lista Anagrafiche </h1>
  <?php
	require_once('connessione.php');

	$y="SELECT Count(idPartecipante) FROM partecipanti";
	$result = mysqli_query($conn,$y);
	$row = mysqli_fetch_array($result);
	echo '<h3><span id="txtricerca">Totale anagrafiche:</span> <span id="numtot">'.$row['Count(idPartecipante)'].'</span></h3>';


?>
			</div>

            <div id="risultato" style="width:100%">
        </div>
			</div>
        <!-- Calendario -->

        <div class="paginat">
        	<a href="javascript:void(0);" id="prevPager">&laquo;</a>
            <a href="javascript:void(0);" id="pagerItem">1</a>
            <a href="javascript:void(0);" id="nextPager">&raquo;</a>
        </div>

<?php include('jsAnagrafica.php'); ?>
<?php include('footer.php'); ?>
