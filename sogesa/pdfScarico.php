
<?php
require_once('connessione.php');

if(isset($_GET['id']))
{
	$idy=intval($_GET['id']);


	$yy="SELECT * FROM scarichi WHERE idScarico='".$idy."'";

	$resulty = mysqli_query($conn,$yy);

	$num_rowsy = mysqli_num_rows($resulty);
	if($num_rowsy>0){

		$rowy = mysqli_fetch_array($resulty);

		$id = $rowy['codPar'];
	}else{
		$id=0;
	}

	$query = ' SELECT idPartecipante, CF, Cognome, Nome, Via, Citta, DataNascita, Telefono, Email, PatenteLicenza, DocumentoRiconoscimento, Password, Autorizzazione, DomandaSegreta, RispostaSegreta, Privacy, LuogoNascita, patente, licenza
	FROM  partecipanti
	WHERE partecipanti.idPartecipante = "'.$id.'"';

	$result = mysqli_query($conn,$query);

	if (!$result)
	{
		echo "Errore nella esecuzione della query SQL";
		die();
	}

	if(mysqli_num_rows($result)==0)
	{
		echo "Nessun evento trovato";
		die();
	}

	$num_rows = mysqli_num_rows($result);
	$jsonResult='';
	if($num_rows>0){
		$cntrow=0;
		while($row=mysqli_fetch_assoc($result))
		{
			$id = $row['idPartecipante'];
			$nome = $row['Nome'];
			$cognome = $row['Cognome'];
			$CF= $row['CF'];
			$data = $row['DataNascita'];
			$luogo = $row['LuogoNascita'];
			$citta = $row['Citta'];
			$via = $row['Via'];
			$telefono = $row['Telefono'];
			$email = $row['Email'];
			$patente = $row['patente'];
			$licenza = $row['licenza'];
			$patente=html_entity_decode($patente,ENT_QUOTES,"UTF-8");
			$licenza=html_entity_decode($licenza,ENT_QUOTES,"UTF-8");
			$nome=html_entity_decode($nome,ENT_QUOTES,"UTF-8");
			$cognome=html_entity_decode($cognome,ENT_QUOTES,"UTF-8");
			$CF=html_entity_decode($CF,ENT_QUOTES,"UTF-8");
			$data=html_entity_decode($data,ENT_QUOTES,"UTF-8");
			$luogo=html_entity_decode($luogo,ENT_QUOTES,"UTF-8");
			$citta=html_entity_decode($citta,ENT_QUOTES,"UTF-8");
			$via=html_entity_decode($via,ENT_QUOTES,"UTF-8");
			$telefono=html_entity_decode($telefono,ENT_QUOTES,"UTF-8");
			$email=html_entity_decode($email,ENT_QUOTES,"UTF-8");

		}
	}


	$yy="SELECT * FROM scarichi WHERE idScarico='".$idy."' ORDER BY idScarico DESC";

	$resulty = mysqli_query($conn,$yy);

	$num_rowsy = mysqli_num_rows($resulty);
	if($num_rowsy>0){

		$rowy = mysqli_fetch_array($resulty);

		$id = $rowy['codPar'];
		$idy = $rowy['idScarico'];
		//$patente = $rowy['patente'];
		$documento = $rowy['documento'];
		$dataScarico = $rowy['DataScarico'];
		$idMezzo = $rowy['idMezzo'];
		$cf = $rowy['cfg'];
		$prezzo = $rowy['prezzo'];
		$codEv = $rowy['codEv'];
		$tip='Prove libere';

		if($idMezzo>0){


			$yy="SELECT * FROM mezzi WHERE IdM=".$idMezzo." ORDER BY IdM DESC";

			$resulty = mysqli_query($conn,$yy);

			$num_rowsy = mysqli_num_rows($resulty);
			if($num_rowsy>0){

				$rowy = mysqli_fetch_array($resulty);

				$catmezzo = $rowy['marca'];
				$modello= ' '.$rowy['modello'];
				$anno= ' '.$rowy['massa'];
				$disciplina = $rowy['disciplina'];

			}else{
				$catmezzo = '';
				$modello = '';
				$anno = '';
				$disciplina = '';
			}








		}





		if($codEv>0){

			$query = "SELECT IdEvento, Titolo, DataI, Descr, nPartecipanti, Meteo,codTipoE
			FROM eventi WHERE IdEvento = '".$codEv."'";
			$resulty = mysqli_query($conn,$query);

			$num_rowsy = mysqli_num_rows($resulty);
			if($num_rowsy>0){

				$rowy = mysqli_fetch_array($resulty);

				$codTipoE = $rowy['codTipoE'];
				if($codTipoE>0){
					$query2 = "SELECT Titolo
					FROM tipieventi WHERE IdTipoE = '".$codTipoE."'";
					$resulty = mysqli_query($conn,$query2);

					$num_rowsy = mysqli_num_rows($resulty);
					if($num_rowsy>0){

						$rowy = mysqli_fetch_array($resulty);

						$tip = $rowy['Titolo'];
					}
				}
			}


		}



		//$patente=html_entity_decode($patente,ENT_QUOTES,"UTF-8");
		$documento=html_entity_decode($documento,ENT_QUOTES,"UTF-8");
		$cf=html_entity_decode($cf,ENT_QUOTES,"UTF-8");
		$prezzo=html_entity_decode($prezzo,ENT_QUOTES,"UTF-8");




	}





	?>
	<html>
	<head>
		<title>Scarico</title>
	</head>
	<body>

		<style>
		body{
			font-size:8px;
			font-family:Arial, Helvetica, sans-serif;
			margin:0;
			padding:0;
		}
		p{margin:0;padding:0;}
		.center{text-align:center;}
		.left{float:left;}
		.grey{background:#eee;font-style:italic;}
		table,tr,td{font-weight:bold;}
		table{width:100%;font-size:9px;}
		h3,h4{font-size:9px;margin:0;padding:0;}
	</style>
	<h3 class="center">DICHIARAZIONE LIBERATORIA NEI CONFRONTI DELLA SO.GE.S.A. S.R.L.</h3>

	<h4 class="center"><span class="left">AGG: 26/02/2019</span>SI PREGA DI COMPILARE IN STAMPATELLO ED IN MANIERA LEGGIBILE</h4>

	<h4 class="center">Il sottoscritto</h4>

	<table cellpadding="5" cellspacing="0" border="1">
		<tr>
			<td width="20%" class="grey">Nome Cognome</td>
			<td width="28%"><?php echo $nome.' '.$cognome; ?></td>
			<td width="12%" class="grey">Nato/a</td>
			<td width="20%"><?php echo $luogo; ?></td>
			<td width="10%" class="grey">Il</td>
			<td width="10%"><?php echo $data; ?></td>
		</tr>
		<tr>
			<td width="20%" class="grey">MAIL</td>
			<td width="28%"><?php echo $email; ?></td>
			<td width="12%" class="grey">Tel/Cell</td>
			<td width="40%" colspan="3"><?php echo $telefono; ?></td>
		</tr>
		<tr>
			<td width="20%" class="grey">Indirizzo</td>
			<td width="28%"><?php echo $via; ?></td>
			<td width="12%" class="grey">Citt&agrave;</td>
			<td width="40%" colspan="3"><?php echo $citta; ?></td>
		</tr>
		<tr>
			<td width="20%" class="grey">Patente</td>
			<td width="28%"><?php echo $patente; ?></td>
			<td width="12%" class="grey">Licenza</td>
			<td width="40%" colspan="3"><?php echo $licenza; ?></td>
		</tr>
		<tr>
			<td width="20%" class="grey">Cat. Mezzo</td>
			<td width="28%"><?php echo $catmezzo; ?></td>
			<td width="12%" class="grey">Modello</td>
			<td width="20%"><?php echo $modello; ?></td>
			<td width="10%" class="grey">Anno</td>
			<td width="10%"><?php echo $disciplina; ?></td>
		</tr>
		<tr>
			<td width="20%" class="grey">Organizzazione</td>
			<td width="28%">SO.GE.S.A. srl</td>
			<td width="12%" class="grey">Tip. giornata</td>
			<td width="20%"><?php echo $tip; ?></td>
			<td width="10%" class="grey">del</td>
			<td width="10%"><?php echo $dataScarico; ?></td>
		</tr>
	</table>

	<p><strong>usando a sua richiesta la pista con il veicolo sopraindicato, come conduttore e/o passeggero (nel caso in cui guidassero i piloti di riserva, dichiara di essere a perfetta conoscenza:</strong></p>
	<p><strong>1)</strong> del regolamento per l'uso della pista per prove libere, e a cui dichiara di conformarsi integralmente;</p>

	<p><strong>2)</strong> delle relative tariffe e delle altre condizioni in vigore;</p>

	<p><strong>3)</strong> delle norme e delle cautele da osservarsi per chi usa la pista e dichiara che il veicolo che intende usare &egrave; perfettamente idoneo alla prova da effettuare;</p>

	<p><strong>4)</strong> che &egrave; obbligatorio l'uso del casco sia per il pilota che per eventuali passeggeri trasportati ed inoltre che &egrave; tassativamente vietato invertire la marcia o girare in senso contrario a quello previsto (antiorario);</p>

	<p><strong>5)</strong> che i conduttori di moto e motocicli devono obbligatoriamente indossare sempre l'abbigliamento completo in pelle, guanti e stivaletti;</p>

	<p><strong>6)</strong> che &egrave; vietato fermarsi sulla pista e che in caso di arresto forzoso il veicolo dovr&agrave; essere spinto sulle fasce laterali o a lato della pista e fuori dalle traiettorie di altri eventuali utenti;</p>

	<p><strong>7)</strong> che &egrave; vietato effettuare rifornimenti o riparazioni all'interno del circuito e che &egrave; tassativamente vietato attraversare la pista sia a piedi che con il veicolo (anche per gli accompagnatori, i meccanici ecc.) se non nei momenti consentiti e appositamente regolamentati;</p>

	<p><strong>8) <u>che sono vietate gare e scommesse tra gli utenti della pista;</u></strong></p>

	<p><strong>9)</strong> che la societ&agrave; di gestione dell'Autodromo non garantisce in occasione delle prove, a meno che non sia stata espressamente e preventivamente richiesta, la presenza dei servizi di segnalazione a mezzo bandiere, di assistenza medica, di antincendio, di ambulanza ecc.</p>

	<p><strong>10)</strong> che la pista non &egrave; completamente recintata, per cui non possono escludersi in modo assoluto attraversamenti della stessa da parte di animali o persone non autorizzate; di essere altres&igrave; a perfetta conoscenza che la manutenzione della pista pu&ograve; essere temporaneamente carente, per cui non possono escludersi banchine non raccordate, guardrails non completamente installati a regola d'arte e pavimentazione non in perfette condizioni. In conseguenza di ci&ograve; il sottoscritto, dopo avere personalmente verificato le attuali condizioni della pista dichiara di accettarle e di assumersi ogni responsabilit&agrave; per gli eventuali incidenti e per i conseguenti danni che derivassero alla propria persona o alle proprie cose ovvero a terzi e alle cose di terzi, compresi i piloti e le persone eventualmente trasportate gli accompagnatori, meccanici ecc..., nonch&egrave; alle strutture dell'Autodromo, sollevando la SO.GE.S.A. S.r.l. e il personale addetto da ogni relativa responsabilit&agrave;.</p>

	<p><strong>11) <u>di essere a perfetta conoscenza che il rumore tollerato allo scarico in occasione di prove libere &egrave; 98/102 db(A), misurato secondo norme ACISPORT/FMI.</u></strong></p>

	<p><strong>12)</strong> che l'eventuale partecipazione a corsi di guida sportiva in pista (sia di auto che di moto) non modifica o elude le prescrizioni e gli obblighi di cui sopra nei confronti del sottoscrittore, il quale assume personalmente ogni responsabilit&agrave; derivante dalla partecipazione stessa, sollevando SO.GE.S.A. srl da qualsiasi responsabilit&agrave; in merito.</p>

	<p><strong>13)</strong> SO.GE.S.A. S.r.l. si riserva la facolt&agrave; di eseguire direttamente o indirettamente tramite i propri incaricati o partner tecnici, nonch&egrave; di utilizzare fotografie, riprese video, cinematografiche, web, sia d'assieme che di dettaglio della Manifestazione/Evento, di eventi collaterali, dei box, del paddock, delle tribune, dei parcheggi, ecc., senza che l'Organizzatore/Partecipante abbia titolo per richiedere alcun compenso, tenendo, altresì, indenne SO.GE.S.A. S.r.l. da analoghe richieste che dovessero pervenire da terzi collegati allo stesso Organizzatore/Partecipante a qualsiasi titolo. SO.GE.S.A. S.r.l. potr&agrave;, inoltre, autorizzare una o pi&ugrave; emittenti televisive, radiofoniche o quanto altro, a riprendere e/o registrare e/o fotografare per l'utilizzo nella propria programmazione e attivit&agrave;, senza una liberatoria aggiuntiva. SO.GE.S.A. srl potr&agrave; utilizzare il materiale audio e/o video e/o fotografico per fini informativi, promozionali e commerciali. La sottoscrizione in calce costituisce, a tutti gli effetti e con ogni conoscenza del caso e di legge, dichiarazione liberatoria per quanto sopra specificato.</p>

	<p><strong>14) <u>che, nel caso si ritiri e si installi sulla vettura/moto il transponder per la rilevazione dei tempi sul giro, tutti i dati raccolti potranno essere utilizzati da SO.GE.S.A. per le pubblicazioni del caso (documentazione cartacea, internet, ect.) e si autorizza pertanto specificamente il trattamento dei propri dati personali a tale fine.</u></strong></p>


	<p>Il sottoscritto con la presente dichiarazione firmata si assoggetta a tutto quanto sopra indicato ed assolve la SO.GE.SA S.r.l. che gestisce l'Autodromo "R. Paletti" e il personale addetto da ogni responsabilit&agrave; che dovesse insorgere in conseguenza della prova che intende effettuare e per qualsiasi danno che subisse o che arrecasse a terzi nella stessa occasione.</p>

	<table cellpadding="15" cellspacing="0" border="1">
		<tr>
			<td width="50%">Varano de' Melegari, <?php echo $dataScarico; ?></td>
			<td width="50%">FIRMA:</td>
		</tr>
	</table>
	<p><strong>Sottoscrivo specificamente ai sensi dell'art. 1341 codice civile le clausole n. 10-13 (limitazione di responsabilit&agrave; della SO.GE.S.A. S.r.l., per danni a persone o a cose – riprese fotografiche video) e dichiaro essere state oggetto di specifica trattativa individuale. Dichiaro, previa informativa ricevuta, ai sensi del Reg UE 2016/679 GDPR, di prestare consenso al trattamento dei dati personali nei termini e con le finalit&agrave; individuate dalla normativa vigente</strong></p>
	<table cellpadding="15" cellspacing="0" border="1">
		<tr>
			<td width="50%">Varano de' Melegari, <?php echo $dataScarico; ?></td>
			<td width="50%">FIRMA:</td>
		</tr>
	</table>

	<p>&nbsp;</p>
	<table cellpadding="5" cellspacing="0" border="1">
		<tr>
			<td width="75%" rowspan="2"><b><i>Intestazione fattura</i></b></td>
			<td width="10%"><b>P.I.</b></td>
			<td width="15%"><b></b></td>
		</tr>
		<tr>
			<td width="10%"><b>C.F.</b></td>
			<td width="15%"><b></b></td>
		</tr>
		<tr>
			<td width="75%" bgcolor="#999" ><b>Codice UNIVOCO fatturazione elettronica (OBBLIGATORIO)</b>
				<p>Nel caso in cui non venga comunicato da parte Vostra alcun canale telematico (CODICE UNIVOCO e/o PEC), So.Ge.S.A. S.r.l. utilizzer&agrave; il codice generico (0000000)</p></td>
				<td width="25%" colspan="2"></td>
			</tr>
		</table>
		<table cellpadding="5" cellspacing="0" border="1">
			<tr>
				<td width="30%" ><b>Tipo di Pagamento:</b></td>
				<td width="30%"><b>Tel/Fax</b></td>
				<td width="40%"><b>Email PEC</b></td>
			</tr>
		</table>
		<div style="padding:10px 0;">
			<p style="width:28%; display:inline-block;padding:10px 0 0 0;"><b>Affitto Box n&quot;</b></p>
			<p style="width:28%; display:inline-block;padding:10px 0 0 0;"><b>gg. _______ x &euro; _______</b></p>
			<p style="width:10%; float:right; border:1px solid #000;padding:10px 0;">&nbsp;</p>
			<p style="width:30%; float:right; text-align:right;padding:10px 0 0 0;"><b>Tot. Box =&euro;&euro;&nbsp;&nbsp;</b></p>
		</div>
		<table cellpadding="5" cellspacing="0" border="0">
			<tr>
				<td width="40%" >
					<table cellpadding="5" cellspacing="0" border="1">
						<tr>
							<td width="100%" colspan="2">Numero turno<br>&nbsp;<br>&nbsp;<br>
							</td>
						</tr>
						<td width="70%">Totale turni effettuati<br>
						</td>
						<td width="30%">
						</td>

					</tr></table>
				</td>
				<td width="20%">
				</td>
				<td width="40%" valign="top" style="padding:0; margin:0;">
					<p style="width:25%; float:right; border:1px solid #000;padding:10px 0;">&nbsp;</p>
					<p style="width:70%; float:right; text-align:right;padding:10px 0 0 0;"><b>N&quot; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Turni da &euro;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&euro;&euro;&nbsp;&nbsp;</b></p>
					<div style="clear:both; height:0px;">&nbsp;</div>
					<p style="width:25%; float:right; border:1px solid #000;padding:10px 0;">&nbsp;</p>
					<p style="width:70%; float:right; text-align:right;padding:10px 0 0 0;"><b>N&quot; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Turni da &euro;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&euro;&euro;&nbsp;&nbsp;</b></p>
					<div style="clear:both; height:0px;">&nbsp;</div>
					<p style="width:95%; float:right; border:1px solid #000;padding:10px 0; text-align:left;">TOTALE SCHEDA&nbsp;&nbsp;&nbsp;=&euro;</p>
				</td>
			</tr>
		</table>

		<table cellpadding="5" cellspacing="0" border="1">
			<tr>
				<td width="40%"><b>TOTALE CUMULATIVO SCHEDE</b><br></td>
				<td width="60%"></td>
			</tr>
		</table>

		<!--<p><img src="fine.png" style="width:100%;" /></p>
		<p><img src="fine2.png" style="width:90%;" /></p>-->
		<script>
		window.print();
	</script>
</body>
</html>

<?php

}
else
{
}

?>
