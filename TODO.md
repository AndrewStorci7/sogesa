# TURNI E COSTI DEVONO ESSERE STAMPATI NEL PDF GENERATO IN ANAGRAFICA (quando voglio stampare il file dello scarico).
- In anagrafica se si crea un nuovo scarico.
- In più andranno anche compilati i campi.
- creare una nuova tabella per salvare i turni e i box.
- La tabella dovrà contenere il numero di box, i giorni che si vogliono affittare, il numero di turni e il prezzo corrispettivo; quindi ci sarebbe un record per ogni turno corrispettivo.

# AGGIORNAMENTO 21/04/2022: PER QUESIONE PDF
Nel file ScaricoIns.php ho aggiunto la query per la selezione dell'id del box, ma nella console mi da errore di sintassi SQL...

Aggiungere query per l'inserimento del box nella nuova tabella creata.
Modificare la query di inserimento scarico a riga 106/1'7 aggiungendo l'id del Box.
