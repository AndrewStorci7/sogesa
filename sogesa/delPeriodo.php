<?php

require_once('connessione.php');
$IdPeriodo = $_GET['id'];
$query = "DELETE FROM periodi WHERE IdPeriodo = '".$IdPeriodo."'";

$risultato = mysqli_query($conn,$query);

if (mysqli_affected_rows($conn) > 0) {
    echo "1";
} else {
    echo "0";
}

?> 