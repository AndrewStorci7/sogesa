<?php include('header.php'); ?>
        <!--Parte Fratta-->
        <div class="lista listaFull">
			<div class="modifica modificaLiam">
            <fieldset class="fon-fieldset">
            <legend>Modifica Tipo Evento</legend>
				<div class="modifica1">
                	<div>
                    	<h4>Titolo</h4>
                        <input class="input" id="titolo" type="text" name="titolo" value="">
                    </div>
				</div>
				<div class="modifica2">
                    <div>
                        <h4>Descrizione Evento</h4>
                        <textarea class="inputdesc" id="desc"></textarea>
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
<?php include('jsUpdTipo.php'); ?>
<?php include('footer.php'); ?>
