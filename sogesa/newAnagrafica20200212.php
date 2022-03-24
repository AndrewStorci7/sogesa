<?php include('header.php'); ?>
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
                	<div class="fon-itemDtl">
                    	<h4>Patente</h4>
                        <input class="fon-input" type="text" name="titolo" id="fon-patente">
                    </div>
					<div class="fon-itemDtl">
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
                </fieldset>
                </div>
        </div>
                 <div class="fon-bottoneConf">
                	<a style="background-color:#b30000; color:white" href="javascript:void(0);" class="confermaModifiche" id="conferma">Conferma Modifiche</a>
                
                </div>
<?php include('jsInsAnagrafica.php'); ?>
<?php include('footer.php'); ?>
