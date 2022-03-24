<?php

require_once('connessione.php');
$IdCategoria = $_GET['id'];
$query = "DELETE FROM categorie WHERE IdCategoria = '".$IdCategoria."'";

$risultato = mysqli_query($conn,$query);

if (mysqli_affected_rows($conn) > 0) {
    echo "1";
} else {
    echo "0";
}

?> 