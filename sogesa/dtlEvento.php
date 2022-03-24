<?php include('header.php'); ?>
  
        <div class="listaanagraficamoruzzi">
        	<div class="modifica" style="height:auto">
            	<fieldset style="height:auto" class="fon-fieldset">
                	<legend class="persona" >Evento</legend>
				<div class="rowDtl">
					<div class="itemDtl">
						<span class="label">Titolo Evento </span>
						<span id="titolo" class="labcontent"></span>
					</div>
                    <div class="itemDtl">
						<span class="label">Tipo Evento</span>
						<span id="tipo" class="labcontent"></span>
					</div>
                    <div class="itemDtl">
						<span class="label">Data Evento</span>
						<span id="dataEv" class="labcontent"></span>
					</div>
					<div class="itemDtl">
						<span class="label">Numero Partecipanti</span>
						<span id="numero" class="labcontent"></span>
					</div>
					<div class="itemDtl">
						<span class="label">Previsione Meteo Evento</span>
						<span id="previsione" class="labcontent"></span>
					</div>
                    <div class="itemDtl">
						<span class="label">Descrizione Evento</span>
						<span id="desc" class="labcontent"></span>
					</div>
					
				</div>
				
			</div>
        </div>
        </div>

        <div class="lista listaFull">
		<div class="titoloanagraficamoruzzi">
				<h1> Lista Anagrafiche </h1>
			</div>
            <div id="risultato" style="width:100%">
        </div>
			</div>


<?php include('jsEventoDtl.php'); ?>
<?php include('footer.php'); ?>
