<?php
if (!isset($_GET['naziv'])) {
    echo "Parametar Naziv nije prosleđen!";
}
else{
    
    $naziv = $_GET["naziv"];
    require_once "konekcija.php";
    $upit = "SELECT * FROM kafa WHERE naziv LIKE '$naziv'";
    $rezultat = $mysqli->query($upit);
    // ako postoji takva država u bazi
    if ( $rezultat->num_rows != 0 ) {
        echo "0";
    } else {
        echo "1";
    }
    $mysqli->close();
}
