<?php

require_once('connessione.php');
$IdTipoE = $_GET['id'];
$query = "DELETE FROM tipieventi WHERE IdTipoE = '".$IdTipoE."'";

$risultato = mysqli_query($conn,$query);

if (mysqli_affected_rows($conn) > 0) {
    echo "1";
} else {
    echo "0";
}

?> 