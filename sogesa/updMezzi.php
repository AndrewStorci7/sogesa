<?php
require_once('connessione.php');
$idmezzo=$_GET['id'];
	$yy="SELECT * FROM mezzi WHERE IdM='".$idmezzo."'";

	$resulty = mysqli_query($conn,$yy);

	$num_rowsy = mysqli_num_rows($resulty);
	$jsonResult='';
			$cntrow=0;
if($num_rowsy>0){

while($rowy = mysqli_fetch_array($resulty) ){

	$idPart = $rowy['idPartecipante'];
	$marca = $rowy['marca'];
	$modello = $rowy['modello'];
	$disciplina = $rowy['disciplina'];
	$cilindrata = $rowy['cilindrata'];
	$massa = $rowy['massa'];


		$marca=html_entity_decode($marca,ENT_QUOTES,"UTF-8");
		$modello=html_entity_decode($modello,ENT_QUOTES,"UTF-8");
		$disciplina=html_entity_decode($disciplina,ENT_QUOTES,"UTF-8");
		$cilindrata=html_entity_decode($cilindrata,ENT_QUOTES,"UTF-8");
		$massa=html_entity_decode($massa,ENT_QUOTES,"UTF-8");
}
}



include('header.php'); ?>


        <!--Parte Fratta-->
        <div class="lista listaFull">
			<div class="modifica modificaLiam">
            <fieldset class="fon-fieldset">
            <legend>Modifica Mezzo</legend>
				<div class="modifica1">
                	<div>
                    	<h4>Categoria</h4>
		<select id="marca" name="marca" class="input">
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
		$selected='';
		if(trim($titolo)==trim($marca)){
			$selected='selected';
		}
		?>
		<option value="<?php echo $titolo; ?>" <?php echo $selected; ?>><?php echo $titolo; ?></option>
		<?php
}
}
			?>
        </select>
                    </div>
					<div>
                        <h4>Cilindrata</h4>
                        <input class="input" type="text" name="cilindrata" id="cilindrata" value="<?php echo $cilindrata; ?>">
                    </div>
                    <div>
                        <h4>Periodo</h4>
		<select id="disciplina" name="disciplina" class="input">
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
		$selected='';
		if(trim($titolo)==trim($disciplina)){
			$selected='selected';
		}
		?>
		<option value="<?php echo $titolo; ?>" <?php echo $selected; ?>><?php echo $titolo; ?></option>
		<?php
}
}
			?>
        </select>
                    </div>



				</div>
				<div class="modifica2">
                	<div>
						<h4>Modello</h4>
                        <input class="input" id="modello" type="text" name="modello"  value="<?php echo $modello; ?>">
              </div>
                    <div>
                        <h4>Massa</h4>
                        <input class="input" id="massa" type="text" name="massa"  value="<?php echo $massa; ?>">
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
<?php include('jsUpdMezzo.php'); ?>
<?php include('footer.php'); ?>
