<?php
$mysql_server = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_db = "kafa";
//ekstenzija mysqli (mysql improved)
$mysqli = new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_db);
//ako postoje greške, ispisujemo poruku da je konekcija neuspešna
// connect_errno ima vrednost 0 ako nije bilo grešaka, a u slučaju da ih jeste bilo, sadrži statusni kod greške
if ($mysqli->connect_errno) {
    printf("Konekcija neuspešna: %s\n", $mysqli->connect_error);
    exit();
}
$mysqli->set_charset("utf8");