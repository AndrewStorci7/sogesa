<?php

require_once('connessione.php');
$IdEvento = $_GET['id'];
$query = "DELETE FROM eventi WHERE IdEvento = '".$IdEvento."'";

$risultato = mysqli_query($conn,$query);

if (mysqli_affected_rows($conn) > 0) {
    echo "1";
} else {
    echo "0";
}

?> 