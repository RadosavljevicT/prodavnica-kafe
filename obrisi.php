<?php
require_once("konekcija.php");
require_once("izgled.php");
gornjiDeo();
$id=$_GET['id'];
$upit="delete from kafa where idkafe=".$id;
    $rezultat = $mysqli->query($upit); 
if($rezultat==true) {
    ?>
<div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo "Odabrana kafa je uspesno obrisana."; ?>
          </div>
    <?php
}
else {?>
<div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Brisanje neuspesno.</strong>
 <?php   
    }
donjiDeo();
?>