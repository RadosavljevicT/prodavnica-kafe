<?php

// proveravamo da li je prosleđen parametar pod ključem ID u GET zahtevu
if (!isset($_GET['id'])) {
    echo "Parametar ID nije prosleđen!";
} else {
    // ako jeste prosleđen, čuvamo ga u promenljivoj $pomocna
    include "konekcija.php";
    $pomocna = $_GET["id"];?>
   
   <table class="table table-hover">
  <thead>
    <tr class="table-dark">
      <th scope="col">ID kafe</th>
      <th scope="col">Naziv</th>
      <th scope="col">Gramaza</th>
      <th scope="col">Vrsta kafe</th>
      <th scope="col">Zemlja porekla</th>
      <th scope="col"></th>
    </tr>
  </thead>
    <?php
$upit = "SELECT k.idkafe, k.naziv as nazivK,k.gramaza,k.vrstaKafe,z.naziv as nazivZ FROM kafa k join zemlja z on z.idzemlje=k.zemljaPorekla WHERE z.idzemlje= '$pomocna'";
    // čuvamo rezultat prethodnog upita
    $rezultat = $mysqli->query($upit); 
       while ($red = $rezultat->fetch_object()) {
       ?>

    <tr>
      
      <td><?php echo $red->idkafe; ?></td>
      <td><?php echo $red->nazivK; ?></td>
      <td><?php echo $red->gramaza; ?></td>
      <td><?php echo $red->vrstaKafe;?></td>
      <td><?php echo $red->nazivZ;?></td>
      <td><a href="obrisi.php?id=<?php echo $red->idkafe?>" style="text-decoration: none";><h6>✂ Brisanje</h6></a>
        <a href="izmeni.php?id=<?php echo $red->idkafe?>" style="text-decoration: none";><h6>✎ Izmena</h6></a></td>
    </tr>
    <?php
  }
  echo "</table>";


	

}
?>