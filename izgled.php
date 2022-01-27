<?php
function gornjiDeo(){


?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.6.1/superhero/bootstrap.min.css" integrity="sha512-kmhf+vQd79E65jPQgcm00GVyd27dtzqE++i3X1AXDHp7eXJPbzLGMOLZYdor7874/q886/3q7l5x7A8IWgouug==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!--klijentska skripta za proveru Imena kafe-->
    <script type="text/javascript">

        $(document).ready(function() {
            $("#imeKafe").blur(function() {
                var vrednost = $("#imeKafe").val();
                $.get("proveraImena.php", {
                        naziv: vrednost
                    },
                    function(data) {
                        if (data == 0) {
                          $("#naEr").html("Kafa sa tim imenom postoji u bazi. ");
                           $("#naEr").css("color", "red");
                            $("#imeKafe").focus();
                        }
                        if (data == 1) {
                            $("#naEr").html("Ime kafe je dostupno. ");
                             $("#naEr").css("color", "green");
                        }
                    });
            });
        });
    </script>

<!-- klijentska skripta za gramazu-->
     <script type="text/javascript">

        $(document).ready(function() {
            $("#gramaza").blur(function() {
                var vrednost = $("#gramaza").val();
                $.get("proveraGramaze.php", {
                        gramaza: vrednost
                    },
                    function(data) {
                        if (data == 0) {
                            $("#grEr").css("color", "red");
                            $("#grEr").html("Unesite kolicinu u odgovarajucem formatu.");

                        }
                        if (data == 1) {
                            $("#grEr").css("color", "green");
                            $("#grEr").html("Uneta kolicina je u odgovarajucem formatu.");
                        }
                    });
            });
        });
    </script>

    <!-- klijentska skripta za combo drzava -->
    <script type="text/javascript">
   
    $(document).ready(function(){
        $("#kombo_drzave").change(function(){
            
            var $vrednost=$("#kombo_drzave").val();
            $.ajax({
                url: "prikaziZemlju.php",
                type: "get",//http metoda
                data:{
                  id:$vrednost
                },
                success: function(data) {
                    $("#popuni").html(data);
                }
            });
        });
    });

    </script>

<style>
  .error{
    color: red;
  }
</style>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-left:10px; margin-right:10px;">
  <a class="navbar-brand" href="#">Prodavnica kafe</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="pocetna.php?strana=unos">Unos kafe</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ponuda.php?sort=ascend">Sve kafe</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="pocetna.php?strana=pretraga">Pretraga kafe</a>
      </li>
    </ul>
  </div>
</nav>



  <h6 class="display-3" style="margin-left:30px;">Dobrodosli na sajt prodavnice kafe!</h6>
  
   <div class="jumbotron" style="margin-left:80px; margin-right:80px;">
  <div class="container">
   <div class="row">
  

  
  <div class="col-md-2 col-ld-2"></div>
  <div class="col-md-7 col-ld-7">
  <?php
}
function donjiDeo(){
    ?>
</div>
  <div class="col-md-2 col-ld-2"></div>
  </div>
</div>
</div>
</body>

</html>



    <?php
}
  ?>
  