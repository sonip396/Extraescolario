<!DOCTYPE html>
<?php
  session_start();

  /* Incluimos la conexión predefinida*/
  require_once ("conexion.php");
  require_once ("funciones.php");

  /*HACEMOS UNA LLAMADA A LA BASE DE DATOS PARA EXTRAER INFORMACION*/

    $conUser = "call datosOFR(".$_SESSION['cod'].")";
    $resultado = mysqli_query ($conexion, $conUser);

  /*Directorio en el que se encuentras las imágenes: OJO, se tiene que usar esa barra, si
  pones la otra, no se queja pero no hace nada*/
    $dir = "img/";

    while ($datosUsuario = mysqli_fetch_array($resultado)) {
      $empresaUser = $datosUsuario["empresa"];
      $nickUser = $datosUsuario["nick"];
      $emailUser = $datosUsuario["email"];
      $passUser = $datosUsuario["contrasenya"];
      $telefUser = $datosUsuario["telefono"];
      $fotoUser= $dir.$datosUsuario["foto"];
      $provinciaUser = $datosUsuario["pNombre"];
      $localidadUser = $datosUsuario["lNombre"];
      $direccionUser = $datosUsuario["direccion"];
      $nifUser = $datosUsuario["nif"];
    }
?>


<html lang="es"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Extraescolario Project">
    <meta name="author" content="Extraescolario Team">
    <link rel="icon" href="http://www.iconj.com/ico/n/q/nqjqtckys4.ico">

    <title>Perfil Ofertador</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Fuente de google -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Estilos custom -->
    <link href="css/estilos.css" rel="stylesheet">
    <link href="css//font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="stylesheet" type="text/css" href="">
  </head>

  <body>
    <div class="principal">

      <!-- Header de la página -->
      <header>
        <nav class="navbar navbar-default navbar-main headerPrincipal" role="navigation">
          <div class="container-fluid">

            <!-- Logo y menu minimizado -->
            <div class="navbar-header">
              <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar1">
                <span class="sr-only">Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.html"></a>
            </div>

            <div class="collapse navbar-collapse" id="navbar1">
              <ul class="nav navbar-nav" id="registroOFR">
                <li class="dropdown singleDrop">
                  <a href="#">Oferta tus propias actividades</a>
                </li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li class="active dropdown singleDrop">
                  <a href="index.html">Inicio</a>
                </li>
                <li class="dropdown singleDrop">
                  <a href="#">Ayuda</a>
                </li>
                <li class="dropdown singleDrop">
                  <a href="#">Iniciar sesión</a>
                </li>
              </ul>
            </div> <!-- Fin collapse navbar1-->
          </div>
        </nav>
      </header>

      <!--Cuerpo -->
      <div id="perfilbuscador" class = "container-fluid">
        <div class = "row text-center">
          <h2 class="col-xs-12"> Página personal de <?php echo $nickUser; ?> </h2>
        </div>
        <!--Row tocho que tiene las 3 columnas dentro -->
        <div class= "row">
          <!--Primera gran columna -->
          <div class ="col-md-4">
            <div class = "col-xs-12 row text-left">
          <label>
            <h3>Datos personales</h3>
          </label>
            </div>
            <!--Nick-->
                <div class= "row">
                  <label class="col-xs-6 col-md-4 control-label text-left" for="nick">Nombre de la empresa:</label>
                <p class="con-xs-6 col-md-8 control-label text-left" type="password" for="pass"><?php echo $empresaUser; ?></p>
              </div>
              <div class= "row">
                  <label class="col-xs-6 col-md-4 control-label text-left" for="nick">Nick:</label>
                <p class="con-xs-6 col-md-8 control-label text-left" type="password" for="pass"><?php echo $nickUser; ?></p>
              </div>
              <div class = "row">
                <label class="col-xs-6 col-md-4 control-label text-left" for="correo">Email:</label>
                <p class="col-xs-6 col-md-8 control-label text-left" for="correo"><?php echo $emailUser; ?></p>
              </div>
              <div class ="row">
                  <label class="col-xs-6 col-md-4 control-label text-left" for="cont">Contraseña:</label>
                <p class="con-xs-6 col-md-8 control-label text-left" for="cont"><?php echo $passUser; ?></p>
              </div>
              <div class = "row">
                      <label class="col-xs-6 col-md-4 control-label text-left" for="telf">Teléfono:</label>
                    <p class="con-xs-6 col-md-8 control-label text-left" for="telf"><?php echo $telefUser; ?></p>
              </div>
              <div class = "row">
                      <label class="col-xs-6 col-md-4 control-label text-left" for="prov">Provincia:</label>
                    <p class="con-xs-6 col-md-8 control-label text-left" for="prov"><?php echo $provinciaUser; ?></p>
              </div>
              <div class = "row">
                      <label class="col-xs-6 col-md-4 control-label text-left" for="loc">Localidad:</label>
                    <p class="con-xs-6 col-md-8 control-label text-left" for="loc"><?php echo $localidadUser; ?></p>
              </div>
              <div class = "row">
                      <label class="col-xs-6 col-md-4 control-label text-left" for="dir">Dirección:</label>
                    <p class="con-xs-6 col-md-8 control-label text-left" for="dir"><?php echo $direccionUser; ?></p>
              </div>
              <div class = "row">
                      <label class="col-xs-6 col-md-4 control-label text-left" for="dir">NIF:</label>
                    <p class="con-xs-6 col-md-8 control-label text-left" for="dir"><?php echo $nifUser; ?></p>
              </div>
          </div>
          <!-- Segunda gran columna-->
          <div class ="col-md-4">
            <div class = "row text-left">
              <label>
                <h3>Actividades</h3>
              </label>
            </div>
            <div class="row col-xs-12">
              <label>
                <h3>Publicadas</h3>
              </label>
            </div>
            <div class="row col-xs-12">
              <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1default" data-toggle="tab">Default 1</a></li>
                                <li><a href="#tab2default" data-toggle="tab">Default 2</a></li>
                                <li><a href="#tab3default" data-toggle="tab">Default 3</a></li>
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#tab4default" data-toggle="tab">Default 4</a></li>
                                        <li><a href="#tab5default" data-toggle="tab">Default 5</a></li>
                                    </ul>
                                </li>
                            </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab1default">Default 1</div>
                            <div class="tab-pane fade" id="tab2default">Default 2</div>
                            <div class="tab-pane fade" id="tab3default">Default 3</div>
                            <div class="tab-pane fade" id="tab4default">Default 4</div>
                            <div class="tab-pane fade" id="tab5default">Default 5</div>
                        </div>
                    </div>
              </div>
            </div>
            <div class="row col-xs-12">
              <label>
                <h3>Pendientes de verificación</h3>
              </label>
            </div>
            <div class="row col-xs-12">
              <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1default" data-toggle="tab">Default 1</a></li>
                                <li><a href="#tab2default" data-toggle="tab">Default 2</a></li>
                                <li><a href="#tab3default" data-toggle="tab">Default 3</a></li>
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#tab4default" data-toggle="tab">Default 4</a></li>
                                        <li><a href="#tab5default" data-toggle="tab">Default 5</a></li>
                                    </ul>
                                </li>
                            </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab1default">Default 1</div>
                            <div class="tab-pane fade" id="tab2default">Default 2</div>
                            <div class="tab-pane fade" id="tab3default">Default 3</div>
                            <div class="tab-pane fade" id="tab4default">Default 4</div>
                            <div class="tab-pane fade" id="tab5default">Default 5</div>
                        </div>
                    </div>
              </div>
            </div>
          </div>
          <div class ="col-md-4">
            <div class = "row text-left">
              <label>
                <h3>Foto de perfil</h3>
              </label>
            </div>
            <div class = "row text-left">
              <img src="<?php echo $fotoUser; ?>" width="300px" height="300px"></img>
            </div>
            </div>
          </div>
        </div>
                <!-- Row con los botones-->
        <div class= "row col-xs-12">
          <div class="span4 offset4 text-center">
            <button class="btn btn-primary">Editar Perfil</button>
            <button class="btn btn-default">Volver</button>
          </div>
        </div>
      </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      </div>

      <!-- FOOTER -->
      <footer>
        <div class="footer clearfix">
          <div class="container">
            <div class="row">
              <div class="col-sm-3 col-xs-12">
                <div class="footerContent">
                  <a class="footer-logo" href="index.html">
                    <img src="http://i66.tinypic.com/103ap8k.jpg" alt="Extraescolario" width="177" height="47" />
                  </a>
                  <p>
                    Encuentra las actividades que más te apetezca hacer adaptándose a tu horario, simplemente navega por nuestras recomendaciones
                    y te aseguramos que no te quedarás en casa aburrido.
                  </p>
                </div>
              </div>

              <div class="col-sm-3 col-xs-12">
                <div class="footerContent">
                  <h5>Contacta con nosotros</h5>
                  <p>
                    Estamos a tu disposición los 7 días de la semana.
                  </p>
                  <ul class="list-unlysted">
                    <li>
                      <i class="fa fa-home" aria-hidden="true"></i>
                      <a href="https://www.google.es/maps/@38.383397,-0.5145466,17z">
                        Universidad de Alicante
                      </a>
                    </li>
                    <li><i class="fa fa-phone" aria-hidden="true"></i> 96 590 3400</li>
                    <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailTo:info@extraescolario.com">info@extraescolario.com</a></li>
                  </ul>
                </div>
              </div>

              <div class="col-sm-3 col-xs-12">
                <div class="footerContent">
                  <h5>Descubre extraescolario</h5>
                  <ul class="list-unlysted">
                    <li><a href="#">Información</a></li>
                    <li><a href="#">Trabaja con nosotros</a></li>
                    <li><a href="#">Ayuda</a></li>
                    <li><a href="#">Razones para utilizar extraescolario</a></li>
                  </ul>
                </div>
              </div>

              <div class="col-sm-3 col-xs-12">
                <div class="footerContent">
                  <h5>Newsletter</h5>
                  <p>Suscríbete a nuestro boletín de información semanal para estar al tanto de las últimas actualizaciones</p>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Introduce tu email" aria-describedby="basic-addon21" />
                    <span class="input-group-addon" id="basic-addon21"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                  </div>
                  <ul class="list-inline">
                  <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.js"></script>
    <script src="js/calendario.js"></script>
  </body>
</html>