<?php
if (!isset($_GET['gramaza'])) {
    echo "0!";
} else {
    $gramaza = $_GET["gramaza"];
    if (!is_numeric ($gramaza)) {
        echo "0";
    } else {
        echo "1";
    }
}
