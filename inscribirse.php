<?php
session_start();
require 'funciones.php';

  if (!isset($_SESSION['cod'])){
    header('Location: login.php');
  }
 ?>

 <!DOCTYPE html>
 <html lang="es"><head>
 <meta http-equiv="content-type" content="text/html; charset=UTF-8">
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="Extraescolario Project">
     <meta name="author" content="Extraescolario Team">
     <link rel="icon" href="http://www.iconj.com/ico/n/q/nqjqtckys4.ico">

     <title>Inscribirse</title>

     <!-- Bootstrap core CSS -->
     <link href="css/bootstrap.css" rel="stylesheet">

     <!-- Fuente de google -->
     <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

     <!-- Estilos custom -->
     <link href="css/estilos.css" rel="stylesheet">
     <link href="css//font-awesome/css/font-awesome.min.css" rel="stylesheet">
   </head>

   <body>
     <?php
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           if(isset($_POST['radio'])) {
             $turno = $_POST['radio'];
             $idAct = $_POST['idAct'];
             $logeado = isset($_SESSION['cod']);
             $yaInscrito = 0;
             if($logeado) {
               $cod = $_SESSION['cod'];
               $yaInscrito = consulta("select comprobarBuscadorInscrito(".$_SESSION['cod']. "," .$idAct.");");
             }

             if($yaInscrito == 1) {
                ?>
                <div class="row">
                  <div class="col-md-offset-1 col-md-9">
                    <h1>Ya te habías inscrito en esta actividad anteriormente,
                      <h2>¿Te está gustando tanto que desearías ir dos veces? ;)</h2>
                    </h1>
                    <a href="http://localhost/Extraescolario/perfilActividad.php?cod=<?php echo($idAct) ?>">
                      <button type="button" class="btn btn-primary btn-lg">Volver</button>
                    </a>

                  </div>
                </div>
                <?php
             } else {
               consulta("call inscribirBuscador(".$_SESSION['cod']. "," .$idAct. "," .$turno.");");
                ?>
                <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                    <h1>Enhorabuena! Te has inscrito en una actividad, esperamos que la disfrutes. </h1>
                    <a href="http://localhost/Extraescolario/perfilActividad.php?cod=<?php echo($idAct) ?>">
                      <button type="button" class="btn btn-primary btn-lg">Volver</button>
                    </a>

                  </div>
                </div>
                <?php
             }

           }

         } else {
           require "index.php";
       }
      ?>
   </body>


     <!--  Javascript del star rating-->
     <!-- <div id="stars-existing" class="starrr" data-rating='3'></div>
     <h5 style="margin-top: 2px;">Tu puntuación: <span id="count-existing">4</span></h5> -->

     <!-- Bootstrap core JavaScript
     ================================================== -->
     <script src="js/jquery.js"></script>
     <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
     <script src="js/bootstrap.js"></script>
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAS0MzQVgs_yEYyaslU5S5vrl9l8MkmsJQ&callback=myMap"></script>
     <script src="js/star_rating.js"></script>
   </body>
 </html>
