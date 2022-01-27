<?php
require_once("izgled.php");
require_once("konekcija.php");

gornjiDeo();


$order='';
$nazivErr=$gramazaErr=$vrstaErr=$zemljaErr= "";
$naziv=$gramza=$vrstaKafe=$zemljaUnos="";

if(isset($_GET["strana"])){
  $strana=$_GET["strana"];
} else {
  $strana="unos";
}
 
switch($strana){
  case "unos":
    {

      if(isset($_POST['sacuvajDugme']) && (!empty($_POST["nazivKafe"])&&!empty($_POST["kolicinaUGramima"])&&!empty($_POST["vrstaKafe"])&&!empty($_POST["zemljaPorekla"]))){
        
        $values=array($_POST["nazivKafe"],$_POST["kolicinaUGramima"],$_POST["vrstaKafe"],$_POST["zemljaPorekla"]);
        $upit=$insert = "INSERT INTO kafa (naziv,gramaza,vrstaKafe,zemljaPorekla)  VALUES('".$values[0]."', ".$values[1].",'".$values[2]."', ".$values[3].")";

          if($mysqli->query($upit)){
          ?>
          <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo "Podaci o kafi su uspesno uneti."; ?>
          </div>
      <?php
        }
        else {?> 
        <div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Greska pri ubacivanju. </strong> <a href="#" class="alert-link"> Podaci o kafi nisu uspesno uneti.</a> Izmenite podatke i pokusajte ponovo.
      </div>
        <?php
          }
       
      }
      else{
        
        if(isset($_POST['sacuvajDugme'])){
         if(empty($_POST["nazivKafe"])){
           $nazivErr = "Morate uneti naziv kafe.";
        } else{
          $naziv=$_POST["nazivKafe"];
        }if(empty($_POST["kolicinaUGramima"])){
           $gramazaErr = "Morate uneti kolicinu kafe.";
        }else{
          $gramza=$_POST["kolicinaUGramima"];
        }
         if(empty($_POST["vrstaKafe"])){
           $vrstaErr = "Morate uneti tip kafe.";
        }else{
          $vrstaKafe=$_POST["vrstaKafe"];
        }
         if(empty($_POST["zemljaPorekla"])){
           $zemljaErr = "Odaberite zemlju uvoza kafe.";
        }else{
          $zemljaUnos=$_POST["zemljaPorekla"];
        }

      }
      

        ?>
      <form action="pocetna.php?strana=unos" method="post">
  <fieldset>
    <legend>Unos nove kafe</legend>
     <hr class="my-7">
  <div class="form-group">
      <label for="nazivKafe">Ime kafe</label>
      <span class="error" id="naEr">* <?php echo $nazivErr;?></span>
      <input type="naziv" class="form-control" id="imeKafe" name="nazivKafe" placeholder="Unesite naziv kafe. " value="<?php echo $naziv ?>">

    </div>
    <div class="form-group">
      <label for="gramaza">Kolicina kafe izrazena u gramima</label>
      <span class="error" id="grEr">* <?php echo $gramazaErr;?></span>
      <input type="gramaza" class="form-control" id="gramaza" name="kolicinaUGramima" placeholder="Unesite kolicinu kafe" value="<?php echo $gramza?>">

    </div>
    <div class="form-group">
      <label for="vrstaKafe">Tip kafe</label>
      <span class="error">* <?php echo $vrstaErr;?></span>    
      <select class="form-control" id="vrstaKafe" name="vrstaKafe">
        <?php if(empty($vrstaKafe)) {?>
        <option disabled selected value>Odaberite vrstu kafe</option>
        <option>Crna kafa</option>
        <option>Macchiato</option>
        <option>Caffe Latte</option>
        <option>Cafe Latte macchiato</option>
        <option>Cappuchino</option>
        <option>Caffe Mocha</option> 
        <?php } else{ ?>
        <option <?php if($vrstaKafe=="Crna kafa"){echo("selected");}?>>Crna kafa</option>
        <option <?php if($vrstaKafe=="Macchiato"){echo("selected");}?>>Macchiato</option>
        <option <?php if($vrstaKafe=="Caffe Latte"){echo("selected");}?>>Caffe Latte</option>
        <option <?php if($vrstaKafe=="Cafe Latte macchiato"){echo("selected");}?>>Cafe Latte macchiato</option>
        <option <?php if($vrstaKafe=="Cappuchino"){echo("selected");}?>>Cappuchino</option>
        <option <?php if($vrstaKafe=="Caffe Mocha"){echo("selected");}?>>Caffe Mocha</option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label for="zemljaPorekla">Zemlja uvoza</label>
      <span class="error">* <?php echo $zemljaErr;?></span>
      <select class="form-control" id="zemljaPorekla" name="zemljaPorekla">
      <?php
     $upit="SELECT * FROM zemlja";
     $zemlja=$mysqli->query($upit);?>
      
      <option disabled selected value>Izaberite zemlju</option>
      <?php
       if(!empty($zemljaUnos)) {
      while($red=$zemlja->fetch_object()){?>
      <option <?php if($zemljaUnos==$red->idzemlje){echo("selected");}?> value='<?php echo $red->idzemlje; ?>' >
      <?php echo $red->naziv; ?></option>
      <?php
      }}else{
        while($red=$zemlja->fetch_object()){?>
      <option value='<?php echo $red->idzemlje; ?>'>
      <?php echo $red->naziv; ?></option>
      <?php
      }}
      ?>
      ?>
      </select>
    </div>
    </fieldset>
    <button type="submit" class="btn btn-primary" name="sacuvajDugme" value="sacuvaj">Sacuvaj</button>
    
  </fieldset>
</form>
        <?php
      }
    } break;
  case "pretraga":{?>
      
  <form>
     <div class="form-group">
      <label for="zemljaPorekla">Zemlja uvoza</label>
      <select class="form-control" id="kombo_drzave">
      <option disabled selected value>Odaberite zemlju.</option>

      <?php
     
       $upit="SELECT * FROM zemlja";
       $zemlja=$mysqli->query($upit);

        while($red=$zemlja->fetch_object()){?>
      <option value='<?php echo $red->idzemlje; ?>'>
      <?php echo $red->naziv; ?></option>
      <?php
      }
      ?>
      </select>
    </div>
    </form>
    <p>
        <div id="popuni">
        </div>
    </p>
<?php

    }break;
    default: echo "greska"; break;
}
 donjiDeo();
 ?>

  