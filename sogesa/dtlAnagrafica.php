<?php
require_once('connessione.php');
include('header.php');

 ?>

        <div class="listaanagraficamoruzzi">
        	<div class="modifica" style="height:auto">
            	<fieldset style="height:auto" class="fon-fieldset">
                	<legend class="persona" >Anagrafica</legend>
				<div class="rowDtl">
					<div class="itemDtl">

						<span class="label">Nome </span>
						<span id="nome" class="labcontent"></span>
					</div>
                    <div class="itemDtl">
						<span class="label">Cognome</span>
						<span id="cognome" class="labcontent"></span>
					</div>
                    <div class="itemDtl">
						<span class="label">CF</span>
						<span id="cf" class="labcontent"></span>
					</div>
					<div class="itemDtl">
						<span class="label">Data di nascita</span>
						<span id="nascita" class="labcontent"></span>
					</div>
					<div class="itemDtl">
						<span class="label">Luogo di nascita</span>
						<span id="luogo" class="labcontent"></span>
					</div>
                    <div class="itemDtl">
						<span class="label">Città</span>
						<span id="citta" class="labcontent"></span>
					</div>
                    <div class="itemDtl">
						<span class="label">Via</span>
						<span id="via" class="labcontent"></span>
					</div>
                    <div class="itemDtl">
						<span class="label">Telefono</span>
						<span id="telefono" class="labcontent"></span>
					</div>
                    <div class="itemDtl">
						<span class="label">Email</span>
						<span id="email" class="labcontent"></span>
					</div>
                    <div class="itemDtl" style="clear:both;">
						<span class="label">Patente</span>
						<span id="patente" class="labcontent"></span>
					</div>
                    <div class="itemDtl">
						<span class="label">Scadenza</span>
						<span id="scadpat" class="labcontent"></span>
					</div>
                    <div class="itemDtl">
						<span class="label">Licenza</span>
						<span id="licenza" class="labcontent"></span>
					</div>
                    <div class="itemDtl">
						<span class="label">Scadenza</span>
						<span id="scadlic" class="labcontent"></span>
					</div>

				</div>
				</fieldset>
			</div>
        </div>



				<!--Parte Bozzia Moruzzi Lazzari-->
				<div class="titoloanagraficamoruzzi">
				<h1> Lista scarichi </h1>
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

	$yy="SELECT * FROM categorie ORDER BY IdCategoria ASC";

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
	$yy="SELECT * FROM periodi ORDER BY IdPeriodo ASC";

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
		<div class="inviamezzomoruzzi" >
		<input type="submit" id="insMezz" value="Invia" style="background:#b30000; color:#fff; padding: 3px 10px;"/>
		</div>
		</div>


		<div class="titoloanagraficamoruzzi">
		<h1> Lista mezzi </h1>
		</div>
			<div class="listaanagraficamoruzzi">
				<div class="modificaautomoruzzi" style="height:auto" id="listaMezzi">
                </div>
                </div>

<?php include('jsAnagraficaDtl.php'); ?>
<?php include('footer.php'); ?>
