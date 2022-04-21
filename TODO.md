# TURNI E COSTI DEVONO ESSERE STAMPATI NEL PDF GENERATO IN ANAGRAFICA (quando voglio stampare il file dello scarico).
- In anagrafica se si crea un nuovo scarico.
- In più andranno anche compilati i campi.
- creare una nuova tabella per salvare i turni e i box.
- La tabella dovrà contenere il numero di box, i giorni che si vogliono affittare, il numero di turni e il prezzo corrispettivo; quindi ci sarebbe un record per ogni turno corrispettivo.

# AGGIORNAMENTO 21/04/2022: PER QUESIONE PDF
Nel file ScaricoIns.php ho aggiunto la query per la selezione dell'id del box, ma nella console mi da errore di sintassi SQL...

Aggiungere query per l'inserimento del box nella nuova tabella creata.
Modificare la query di inserimento scarico a riga 106/1'7 aggiungendo l'id del Box.

# AGGIORNAMENTO 21/04/2022 ore 23:20
Nel file ScaricoIns.php da riga 98 a riga 121 sono presenti le modifiche fatte.<br>
__$insertBox__ contiene la query di inserimento dei dati di scarico_box.<-br>
$selectIdBox contiene la query per la selezione dell'id del box che poi andrò ad utilizzare nella query di inserimento degli N turni.<br>
Da riga 110 a riga 116 ho fatto un ciclo for per scorrere il contenuto dell'array, e ad ogni posizione vado a prendere il corrispettivo dato e di conseguenza faccio una query per ogni $i.<br>
Infine dentro $query faccio la query di inserimento per scarichi (già esistente, quello che ho aggiunto e l'id del box).
