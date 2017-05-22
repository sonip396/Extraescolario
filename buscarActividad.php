<?php
  session_start();
  require 'funciones.php';

  $logeado = isset($_SESSION['cod']);
  if($logeado) {
      $cod = $_SESSION['cod'];
  }

  $sqlBuscaActividades="call obtenTodasActivsVerifs()";
  $actividades = consulta($sqlBuscaActividades);

  //Comprobamos si se debe de filtrar por LOCALIDAD
  if ($_GET["loc"] == null)
      echo "hola";
  else
      echo "CACA";

  /*Ejemplo de Query con turnos en días específicos (aunque estén en distintos horarios)
  /*SELECT DISTINCT ACTIVIDAD.nombre, ACTIVIDAD.cod FROM ACTIVIDAD, TURNO, HORARIO
  WHERE TURNO.rActividad=ACTIVIDAD.cod
  AND TURNO.cod IN (
  SELECT distinct rTurno FROM HORARIO WHERE rDias = 6 OR rDias = 7);*/

  // Empezamos la megaquery de buscar Actividad:
  $sqlBase = "SELECT DISTINCT ACTIVIDAD.cod FROM ACTIVIDAD, TURNO, HORARIO WHERE TURNO.rActividad=ACTIVIDAD.cod ";

  // El Where de la sentencia
  //$sqlWhere = "WHERE ";

  $sqlHorario = "AND TURNO.cod IN (SELECT distinct rTurno FROM HORARIO WHERE rDias = 1 OR rDias = 3)";

  // Filtramos por localidad
  $fromLocalidad =",LOCALIDAD ";
  $sqlLocalidad = "MATCH(Localidad) Against (".$_GET["loc"].")";

  // Filtramos por Actividad
  $sqlActividad = "ACTIVIDAD.Nombre LIKE '%".xxxxxxx."%'";

  // Añadimos el filtro de actividades verificadas
  $sqlFiltro = "ACTIVIDAD.verificar=1";

  //Montamos la secuencia en función de los parámetros
  $sqlBusqueda = $sqlBase.$sqlHorario;
  $actividades=consulta($sqlBusqueda);

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

    <title>Página principal</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Fuente de google -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Estilos custom -->
    <link href="css/estilos.css" rel="stylesheet">
    <link href="css//font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

    <!--Font Awesome (added because you use icons in your prepend/append)-->
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

    <!--Para hacer las tarjetas de las búsquedas de actividades-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Inline CSS based on choices in "Settings" tab -->
    <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>


  </head>

  <body>
    <div class="principal">
    <!-- Header de la página -->
    <?php require_once('header.php'); ?>
    <!-- EMPIEZA EL BODY PRINCIPAL DE LA PÁGINA -->
    <div class="row align-items-center">
      <!-- Columna con el filtro -->
      <div class = "col-xs-12 col-md-3">
        <form class="form">
          <fieldset>
            <!-- Form Name -->
            <legend>Filtros</legend>

            <!-- Precio, con 2 casillas en una línea-->
            <div class="form-group">
              <label class="row-xs-12 control-label" for="Precio">Precio</label>
                <div class= "row-xs-6">
                  <div class="col-md-6">
                    <input id="Precio" name="Precio" type="text" placeholder="0" class="form-control input-md">
                    <span class="help-block">Mínimo</span>
                  </div>
                  <div class="col-md-6">
                    <input id="idMaximo" name="idMaximo" type="text" placeholder="9999" class="form-control input-md">
                    <span class="help-block">Máximo</span>
                  </div>
                  <br><br><br><br>
                </div>
            </div>

            <!-- Checkboxes de selecciónd de edad -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="rangoEdad">Rango de Edad</label>
              <div class="col-md-4">
                <label class="checkbox" for="rangoEdad-0">
                  <input type="checkbox" name="rangoEdad" id="rangoEdad-0" value="4-7 años">
                  4-7 años
                </label>
                <label class="checkbox" for="rangoEdad-1">
                  <input type="checkbox" name="rangoEdad" id="rangoEdad-1" value="8-12 años">
                  8-12 años
                </label>
                <label class="checkbox" for="rangoEdad-2">
                  <input type="checkbox" name="rangoEdad" id="rangoEdad-2" value="13-17 años">
                  13-17 años
                </label>
                <label class="checkbox" for="rangoEdad-3">
                  <input type="checkbox" name="rangoEdad" id="rangoEdad-3" value="+18 años">
                  +18 años
                </label>
                <label class="checkbox" for="rangoEdad-4">
                  <input type="checkbox" name="rangoEdad" id="rangoEdad-4" value="todos los publicos">
                  Todos los públicos
                  <br><br>
                </label>
              </div>
            </div>

            <!-- Valoración mínima-->
            <div class="form-group">
              <label class="col-xs-12 control-label" for="idValoracion">Valoración mínima</label>
              <div class="col-md-12">
                <input id="idValoracion" name="idValoracion" type="text" placeholder="0" class="form-control input-md">
                <span class="help-block">De 0 a 5 estrellas</span>
                <br><br><br>
              </div>
            </div>

            <!-- Cuadro para TAGS y Categorías -->
            <div class="form-group">
              <label class="col-xs-12 control-label" for="idTags">Tags y categorías</label>
              <div class="col-md-12">
                <textarea class="form-control" id="idTags" name="idTags">Introduce aquí los tags y categorías buscados, separados por espacios (Por ejemplo: deportes cartas idiomas etc)</textarea>
              </div>
              <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </div>

            <!-- Button -->
            <div class="form-group">
              <label class="col-md-8 control-label" for="idFiltrar">Filtrar actividades</label>
              <div class="col-md-4">
                <button id="idFiltrar" name="idFiltrar" class="btn btn-primary">Filtrar</button>
              </div>
              <br><br><br><br><br><br>
            </div>
          </fieldset>
        </form>
      </div>
      <!-- Columna con las actividades -->
      <div class = "col-xs-12 col-md-9">

      <?php for ($i=0; $i < sizeof($actividades); $i++)   {  $unaActividad=$actividades[$i]; ?>
        <?php
        $idAct = $actividades[$i][0];

        $datosAct = consulta("call getDatosActividad(".$idAct.");");
        $nombreAct = $datosAct[0]['nombre'];
        $foto = $datosAct[0]['foto'];
        $descripcion = $datosAct[0]['descripcion'];
        $valoracion_media = $datosAct[0]['valoracionMedia'];
        $precio = $datosAct[0]['precio'];
        /* Más datos que puedes poner si quieres, sino se borran y ya
        $tagsAct = consulta("call obtener_tags_actividad(".$idAct.");");
        $catAct = consulta("call obtener_cat_actividad(".$idAct.");");
        $fechaInicio = $datosAct[0]['fechaInicio'];
        $fechaFin = $datosAct[0]['fechaFin'];
        $pagosAceptados = $datosAct[0]['metodoPago'];
        $mensualidades = $datosAct[0]['formaPago'];
        $direccion = $datosAct[0]['direccion'];
        $rangoEdad = $datosAct[0]['rangoEdad'];
        $localidad = $datosAct[0]['localidad'];
        $provincia = $datosAct[0]['provincia'];
        */

        ?>
      <!-- Tarjeta que irá metida dentro un bucle -->
      <div class="w3-panel w3-card">
        <!-- Div que contendrá las 3 columnas de la tarjeta -->
        <div class="row-xs-12">
          <!-- Div con la primera columna y que tiene la foto-->
          <div class="col-xs-3">
            <?php echo('<img src="data:image/jpeg;base64,'.base64_encode( $foto ).'"/ height="150px" width="200px">'); ?>
          </div>
          <!-- Div con la segunda columna con los datos de la actividad-->
          <div class="col-xs-3">
            <h3 style="margin-bottom:0px;"><?php echo($nombreAct) ?></h3>
            <?php //Aquí se pintan las estrellas, parece que no vaya pero es porque me cargué los comentarios sin querer :/
                    //$aux = consulta("select calcula_valoracion_media_actividad(". $idAct .")");
                    //$valoracion_media = $aux[0][0];
                    if($valoracion_media==0) {?>
                      <i class="fa fa-star-o" aria-hidden="true"><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i></i>
                      <?php
                    } else {
                      echo("<i class=\"fa fa-star\" aria-hidden=\"true\">");
                      for($x1=1; $x1<$valoracion_media && $valoracion_media>1; $x1++) {
                        echo("<i class=\"fa fa-star\" aria-hidden=\"true\"></i>");
                      }
                      echo("</i>");
                      if($valoracion_media<5) {
                        echo("<i class=\"fa fa-star-o\" aria-hidden=\"true\">");
                        for($x2=$valoracion_media+1; $x2<5 && $valoracion_media<4; $x2++) {
                          echo("<i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>");
                        }
                      }
                      echo("</i>");
                    }
                     ?>

              <!--  Aquí puedes poner todos los datos que quieras, pero yo no añadiría muchos más, solo los imprescindibles para saber de que va la actividad-->
              <!--  Los horarios no los pongo porque si la actividad tiene 20 queda muy mal-->
             <h6>Duración de la actividad: (hay que sacarlo de bd)<!-- Extraer la duración de un turno de la actividad--> </h6>
             <h4>Precio: <span style="color:grey"><?php echo($precio); ?>€</span></h4>
          </div>
          <!-- Div con la tercera columna con la descripción de la actividad-->
          <div class="col-xs-5">
            <label for="aboutDescription" id="aboutHeading">Descripción:</label>
                <textarea rows="15" cols="50" id="aboutDescription" style="resize: none;">
                  <?php echo($descripcion); ?>
                </textarea>
          </div>
        </div>
      </div>
      <?php } ?>











      </div>
    </div>

















    <!-- FOOTER -->
    <?php require_once('footer.php'); ?>
    </div>
    <script>

    </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.js"></script>
    <script src="js/calendario.js"></script>
</body>
</html>
