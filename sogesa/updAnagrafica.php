<?php include('header.php'); ?>

        <!--Parte Fratta-->
        <div class="lista listaFull">
			<div class="modifica modificaLiam">
            <fieldset class="fon-fieldset">
            <legend>Modifica Anagrafica</legend>
				<div class="modifica1">
                	<div>
                    	<h4>Nome</h4>
                        <input class="input" id="nome" type="text" name="nome" value="">
                    </div>
					<div>
                        <h4>CF</h4>
                        <input class="input" type="text" name="cf" id="cf">
                    </div>
                    <div>
                        <h4>Data di nascita</h4>
                        <input class="input" type="text" name="nascita" id="nascita">
                    </div>
                    <div>
                        <h4>Città</h4>
                        <input class="input" type="text" name="citta" id="citta">
                    </div>
                    <div>
                        <h4>Telefono</h4>
                        <input class="input" type="text" name="telefono" id="telefono">
                    </div>
                    <div>
                        <h4>Patente</h4>
                        <input class="input" type="text" name="patente" id="patente">
                    </div>
                    <div>
                        <h4>Licenza</h4>
                        <input class="input" type="text" name="licenza" id="licenza">
                    </div>





				</div>
				<div class="modifica2">
                	<div>
						<h4>Cognome</h4>
                        <input class="input" id="cognome" type="text" name="cognome" value="">
              </div>
                    <div>
                        <h4>Luogo di nascita</h4>
                        <input class="input" id="luogo" type="text" name="luogo" value="">
                    </div>
                    <div>
                        <h4>Via</h4>
                        <input class="input" id="via" type="text" name="via" value="">
                    </div>
                    <div>
                        <h4>Email</h4>
                        <input class="input" id="email" type="text" name="email" value="">
                    </div>
                    <div style="height:74px;">&nbsp;</div>
                    <div>
                        <h4>Scadenza</h4>
                        <input class="input" type="text" name="scadpat" id="scadpat">
                    </div>
                    <div>
                        <h4>Scadenza</h4>
                        <input class="input" type="text" name="scadlic" id="scadlic">
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
<?php include('jsUpdAnagrafica.php'); ?>
<?php include('footer.php'); ?>
