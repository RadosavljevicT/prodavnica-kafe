
<?php
require_once("konekcija.php");
require_once("izgled.php");
gornjiDeo();
if(isset($_GET['sort'])){
        if($_GET['sort']=='ascend')
        $order='order by naziv asc';
        elseif($_GET['sort']=='descend'){
        $order='order by naziv desc';
        }
      }
      $rezultat=$mysqli->query("select k.idkafe,k.naziv,k.gramaza,k.vrstaKafe, z.naziv as nazivZ from kafa k join zemlja z on z.idzemlje=k.zemljaPorekla ".$order);
      ?>

      <div class="btn-group-horizontal" data-toggle="buttons">
    <button type="button" class="btn btn-link"><a class="dropdown-item" href="ponuda.php?sort=ascend">Rastuce</a></button>
    <button type="button" class="btn btn-link"><a class="dropdown-item" href="ponuda.php?sort=descend">Opadajuce</a></button>
  </div>
  <table class="table table-hover">
  <thead>
    <tr class="table-dark">
      <th scope="col">Id</th>
      <th scope="col">Ime kafe</th>
      <th scope="col">Kolicina kafe izrazena u gramima</th>
      <th scope="col">Tip kafe</th>
      <th scope="col">Zemlja uvoza</th>
    </tr>
  </thead>
  <?php
  while($red=$rezultat->fetch_object()){
    ?>
    <tr>
      <th scope="row"><?php echo $red->idkafe; ?></th>
      <td><?php echo $red->naziv; ?></td>
      <td><?php echo $red->gramaza; ?></td>
      <td><?php echo $red->vrstaKafe;?></td>
      <td><?php echo $red->nazivZ;?></td>
    </tr>
    <?php
  }
  echo "</table>";
  donjiDeo();
  ?>