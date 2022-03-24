<?php include('header.php'); ?>
        <!--Parte Fratta-->
        <div class="lista listaFull">
			<div class="modifica modificaLiam">
            <fieldset class="fon-fieldset">
            <legend>Inserisci Evento</legend>
				<div class="modifica1">
                	<div>
                    	<h4>Titolo Evento</h4>
                        <input class="input" id="titolo" type="text" name="titolo" value="">
                    </div>
					<div>
                        <h4>Data Evento</h4>
                        <input class="input" type="text" name="Data" id="datepicker2">
                    </div>
                    <div>
                        <h4>Descrizione Evento</h4>
                        <textarea class="inputdesc" id="desc"></textarea>
                </div>
				</div>
				<div class="modifica2">
                	<div>
						<h4>Tipo Evento</h4>
                        <select class="input" id="tipo"  name="type" style="border-color: black;">

						</select>
              </div>
                    <div>
                        <h4>Previsione Meteo Evento</h4>
						<select class="input" id="meteo" name="type" style="border-color: black;">
							<option value="Soleggiato">Soleggiato</option>
							<option value="Variabile">Variabile</option>
							<option value="Nuvoloso">Nuvoloso</option>
							<option value="Piovoso">Piovoso</option>
							<option value="Neve">Neve</option>
						</select>

                    </div>
                </div>
				<div class= "contenitore">
                 <div class="bottoneConf" id="conferma">
                	<a style="background-color:#b30000; color:white" href="javascript:void(0);">Conferma Modifiche</a>

                </div>
				</div>
                </fieldset>
                </div>
        </div>
<?php include('jsInsEvento.php'); ?>
<?php include('footer.php'); ?>
