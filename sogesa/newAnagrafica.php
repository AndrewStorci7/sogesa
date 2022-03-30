<?php
require_once('connessione.php');
include('header.php');

?>
<!--Parte Ponzini-->
<div class="fon-listaanagrafica">
	<div class="fon-modifica" style="height:auto">
		<fieldset class="fon-fieldset">
			<legend>Dati Partecipante</legend>
			<div class="fon-left">
				<div class="fon-rowDtl">




					<div class="fon-itemDtl">
						<h4>Nome</h4>
						<input id="nome" class="input fon-change" type="text" name="nome" value="">
					</div>
					<div class="fon-itemDtl">
						<h4>Cognome</h4>
						<input id="cognome" class="input fon-change" type="text" name="cognome" value="">
					</div>
					<div class="fon-itemDtl">
						<h4>CF</h4>
						<input type="text" class="input fon-change" name="cf" id="cf">
					</div>
					<div class="fon-itemDtl">
						<h4>Luogo di nascita</h4>
						<input class="input" id="luogo" type="text" name="luogo" value="">
					</div>
					<div class="fon-itemDtl">
						<h4>Data di nascita</h4>
						<input class="input" type="text" name="nascita" id="nascita">
					</div>
					<div class="fon-itemDtl">
						<h4>Via</h4>
						<input class="input" id="via" type="text" name="via" value="">
					</div>
					<div class="fon-itemDtl">
						<h4>Città</h4>
						<input class="input" type="text" name="citta" id="citta">
					</div>
					<div class="fon-itemDtl">
						<h4>Email</h4>
						<input class="input" id="email" type="text" name="email" value="">
					</div>
					<div class="fon-itemDtl">
						<h4>Telefono</h4>
						<input class="input" type="text" name="telefono" id="telefono">
					</div>
					<div class="fon-itemDtl" style="clear:both;">
						<h4>Patente</h4>
						<input class="input" type="text" name="patente" id="patente">
					</div>
					<div class="fon-itemDtl">
						<h4>Scadenza</h4>
						<input class="input" type="text" name="scadpat" id="scadpat">
					</div>
					<div class="fon-itemDtl">
						<h4>Licenza</h4>
						<input class="input" type="text" name="licenza" id="licenza">
					</div>
					<div class="fon-itemDtl">
						<h4>Scadenza</h4>
						<input class="input" type="text" name="scadlic" id="scadlic">
					</div>

				</div>
			</div>
			<div class="fon-right" id="fon-right"></div>
		</fieldset>

	</div>
</div>
<!--Parte Conforti-->
<div class="fon-lista fon-listaFull fon-modifica">
	<fieldset class="fon-fieldset">
		<legend>Nuovo Scarico</legend>
		<div class="fon-itemDtl" style="display:none;">
			<h4>Patente</h4>
			<input class="fon-input" type="text" name="titolo" id="fon-patente">
		</div>
		<div class="fon-itemDtl" style="display:none;">
			<h4>Documento di riconoscimento</h4>
			<input class="fon-input" name="titolo" type="text" id="fon-documento">
		</div>
		<div class="fon-itemDtl">
			<h4>Data Scarico</h4>
			<input class="fon-input" name="dataScarico" type="text" id="dataScarico">
			<script language="Javascript">

			var data = new Date();

			giorno = data.getDate();
			mese = data.getMonth()+1;
			date= data.getDate();
			year= data.getFullYear();
			if(mese<10){
				mese='0'+mese;
			}
			if(giorno<10){
				giorno='0'+giorno;
			}
			$('#dataScarico').val(giorno+"/"+mese+"/"+year);

			/* MODIFICHE DI ANDREW drink*/
			let i = 0;
			function addTurni(){
				i++;
				var div = document.getElementById('turni');
				div.innerHTML += '<div style="float: left !important;" class="fon-itemDtl" id="div' + i + '">' +
															'<h4>Turno numero: ' + i + '</h4>' +
															//'<input class="fon-input" style="width:40px !important;" type="text" name="titolo" id="fon-nturno' + i + '">' +
															'<span>€ turno</span>' +
															'<input class="fon-input" style="width:60px !important;" type="text" name="titolo" id="fon-prezzonturno' + i + '">' +
															'<button onclick="deleteTurni(\'div' + i + '\')" style="border-radius:30px; width:20px; height:auto; background-color:red;">-</button>'
														'</div>';
			}

			function deleteTurni(id){
				var divDel = document.getElementById(id);
				divDel.style.display = "none";
				i--;
			}

			/*$('#aggiungiTurno').click(function(){
				i++;
				console.log(i);
				$('#turni').append('<div class="font-itemDtl">' +
															'<h4>Numero Turno</h4>' +
															'<input class="fon-input" type="text" name="titolo" id="fon-nturno' + i + '">' +
															'<span>€ turno</span>' +
															'<input class="fon-input" type="text" name="titolo" id="fon-prezzonturno' + i + '">' +
														'</div>');
			});*/
			/* FINE MODIFICHE DI ANDREW drink */
			</script>
		</div>
		<div class="fon-itemDtl">
			<h4>Codice fiscale genitore</h4>
			<input class="fon-input" type="text" name="titolo" id="fon-cfg">
		</div>
		<div class="fon-itemDtl">
			<h4>Prezzo</h4>
			<input class="fon-input" type="text" id="fon-prezzo">
		</div>
		<div class="fon-itemDtl">
			<h4>Evento</h4>
			<select id="codEv">
			</select>
			<input type="text" id="mesefa" value="1" style="width:50px; margin-left:20px; margin-right:5px;" /><span>mesi precedenti</span>
		</div>
		<div class="fon-itemDtl">
			<h4>Numero del box</h4>
			<input class="fon-input" type="text" id="fon-box">
		</div>
		<div class="fon-itemDtl">
			<h4>gg</h4>
			<input class="fon-input" type="text" id="fon-giorni">
			<span>€ per gg</span>
			<input class="fon-input" type="text" id="fon-prezzoxgg" style="width:70px;">
		</div>
		<div class="fon-bottoneConf" id="aggiungiTurno">
			<a style="background-color:#408A2F; color:white" href="javascript:void(0);" onclick="addTurni()" class="confermaModifiche" >Aggiungi turno</a>
		</div>
		<div id="turni">

		</div>
	</fieldset>
</div>
</div>

<div class="nuovomezzo">

	<div class="listaanagraficamoruzzi">
		<div class="modifica" style="height:auto" id="listaScarichi">
		</div>
	</div>
</div>

<div class="titoloanagraficamoruzzi">
	<h1> Crea nuovo mezzo </h1>
</div>
<div class="nuovomezzomoruzzi">
	<div>
		<div class="creamezzomoruzzi">
			<span class="mezzonamemoruzzi"> Categoria: </span>
			<select id="marca" name="creazionemezzo" class="creazionemezzo">
				<?php

				$yy="SELECT * FROM categorie  ORDER BY IdCategoria ASC";

				$resulty = mysqli_query($conn,$yy);

				$num_rowsy = mysqli_num_rows($resulty);
				$jsonResult='';
				$cntrow=0;
				if($num_rowsy>0){

					while($rowy = mysqli_fetch_array($resulty) ){

						$IdCategoria = $rowy['IdCategoria'];
						$titolo=$rowy['Titolo'];


						$titolo=html_entity_decode($titolo,ENT_QUOTES,"UTF-8");
						?>
						<option value="<?php echo $titolo; ?>"><?php echo $titolo; ?></option>
						<?php
					}
				}
				?>
			</select>
		</div>
		<div class="creamezzomoruzzi">
			<span class="mezzonamemoruzzi"> Modello: </span>
			<input type="text" id="modello" name="creazionemezzo" class="creazionemezzo" value="" placeholder="Modello">
		</div>
		<div class="creamezzomoruzzi">
			<span class="mezzonamemoruzzi"> Cilindrata: </span>
			<input type="text" id="cilindrata" name="creazionemezzo" class="creazionemezzo" value="" placeholder="Cilindrata">
		</div>
		<div class="creamezzomoruzzi">
			<span class="mezzonamemoruzzi"> Massa: </span>
			<input type="text" id="massa" name="creazionemezzo" class="creazionemezzo" value="" placeholder="Massa">
		</div>
		<div class="creamezzomoruzzi">
			<span class="mezzonamemoruzzi"> Periodo: </span>
			<select id="disciplina" name="creazionemezzo" class="creazionemezzo">
				<?php
				$yy="SELECT * FROM periodi  ORDER BY IdPeriodo ASC";

				$resulty = mysqli_query($conn,$yy);

				$num_rowsy = mysqli_num_rows($resulty);
				$jsonResult='';
				$cntrow=0;
				if($num_rowsy>0){

					while($rowy = mysqli_fetch_array($resulty) ){

						$IdPeriodo = $rowy['IdPeriodo'];
						$titolo=$rowy['Titolo'];


						$titolo=html_entity_decode($titolo,ENT_QUOTES,"UTF-8");
						?>
						<option value="<?php echo $titolo; ?>"><?php echo $titolo; ?></option>
						<?php
					}
				}
				?>
			</select>
		</div>
	</div>
</div>


<div class="titoloanagraficamoruzzi">
	<h1> Lista mezzi </h1>
</div>
<div class="listaanagraficamoruzzi">
	<div class="modificaautomoruzzi" style="height:auto" id="listaMezzi">
	</div>
</div>

<div class="fon-bottoneConf">
	<a style="background-color:#b30000; color:white" href="javascript:void(0);" class="confermaModifiche" id="conferma">Conferma Modifiche</a>

</div>
<?php include('jsInsAnagrafica.php'); ?>
<?php include('footer.php'); ?>
