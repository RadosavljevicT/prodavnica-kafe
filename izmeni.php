 <?php
require_once("izgled.php");
$id=$_GET['id'];
include("konekcija.php");
gornjiDeo();

$query="Select * from kafa where idkafe=".$id;
$rezultat=$mysqli->query($query);
$red=$rezultat->fetch_object();
 if(isset($_POST["izmenaDugme"])){
        $podaci=array($_POST["idkafe"],$_POST["naziv"],$_POST["gramaza"],$_POST["vrstaKafe"],$_POST["zemljaPorekla"]);
        $upit="UPDATE kafa SET naziv='".$podaci[1]."', gramaza=".$podaci[2].", vrstaKafe='".$podaci[3]."',zemljaPorekla=".$podaci[4]." WHERE idkafe=".$podaci[0];//;
        if($mysqli->query($upit)){?>
           <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo  "Odabrana kafa je uspesno izmenjena."; ?>
          </div>
          <?php
        }
        else{?>
          <div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Greska pri ubacivanju. </strong> <a href="#" class="alert-link"> podaci o kafi nisu uspesno uneti.</a> Izmenite podatke i pokusajte ponovo.
        </div>
        <?php
        }
      }
      else{
         ?>
      <form method="post">
      <fieldset>
    <legend>Izmena kafe</legend>
     <hr class="my-7">
      <div class="form-group">
      <label for="Id:">Id kafe:</label>
      <input type="naziv" class="form-control" id="idkafe" name="idkafe"  value="<?php echo $red->idkafe; ?>" readonly>
    </div>
    <div class="form-group">
      <label for="nazivKafe">Naziv:</label>
      <input type="naziv" class="form-control" id="naziv" name="naziv"  value="<?php echo $red->naziv; ?>">
    </div>
    <div class="form-group">
      <label for="gramaza">Kolicina u gramima: </label>
      <input type="gramaza" class="form-control" id="gramaza" name="gramaza" value="<?php echo $red->gramaza; ?>">
       <small id="gramazaHelp" class="form-text text-muted">Unesite kolicinu kafe u gramima. </small>
    </div>
   <?php $selectedVrsta=$red->vrstaKafe ?>
    <div class="form-group">
      <label for="vrstaKafe">Izaberite vrstu kafe:</label>
      <select class="form-control" id="vrstaKafe" name="vrstaKafe">
        <option <?php if($selectedVrsta=="Crna kafa"){echo("selected");}?>>Crna kafa</option>
        <option <?php if($selectedVrsta=="Macchiato"){echo("selected");}?>>Macchiato</option>
        <option <?php if($selectedVrsta=="Caffe Latte"){echo("selected");}?>>Caffe Latte</option>
        <option <?php if($selectedVrsta=="Cafe Latte macchiato"){echo("selected");}?>>Cafe Latte macchiato</option>
        <option <?php if($selectedVrsta=="Cappuchino"){echo("selected");}?>>Cappuchino</option>
        <option <?php if($selectedVrsta=="Caffe Mocha"){echo("selected");}?>>Caffe Mocha</option>
      </select>
    </div>
    <div class="form-group">
      <label for="zemljaPorekla">Zemlja porekla</label>
      <select class="form-control" id="zemljaPorekla" name="zemljaPorekla">
      <?php
      $result=$zemlja=$mysqli->query("select * from zemlja");
      $selectedZemlja=$red->zemljaPorekla;
        while($row=$result->fetch_object()){?>
      <option <?php if($selectedZemlja==$row->idzemlje){echo("selected");}?> value='<?php echo $row->idzemlje; ?>' >
      <?php echo $row->naziv; ?></option>
      <?php
      }
      ?>
      </select>
    </div>
    </fieldset>
    <button type="submit" class="btn btn-primary" id="izmenaDugme" name="izmenaDugme">Izmeni</button>

</form>

      <?php
      donjiDeo();
      }?>

