<?php include('header.php'); ?>
<?php include('topEventi.php'); ?>

        <!--Parte Fratta-->
        <div class="lista">
		<div class="titoloanagraficamoruzzi">
				<h1> Lista eventi </h1>
			</div>
            <div id="risultato" style="width:100%">
        </div>
			</div>
        <!-- Calendario -->

        <div class="calendario">
            <div class="calendarioBox">
                <div id="calendar">
                </div>
            </div>
        </div>
        <div id="cal"><script></script></div>
        <div id="scriptCalendar"></div>
        <div class="paginat">
        	<a href="javascript:void(0);" id="prevPager">&laquo;</a>
            <a href="javascript:void(0);" id="pagerItem">1</a>
            <a href="javascript:void(0);" id="nextPager">&raquo;</a>
        </div>

<?php include('jsEventi.php'); ?>
<?php include('footer.php'); ?>
