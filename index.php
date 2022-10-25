<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
  

?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Instituto de inresos a facultades de medicina e inegnierias. Ubicado en Mendoza">
  <meta name="keywords" content="Ingresos, inegnierias, Medicina, Universidad, UTN, Universidad de Cuyo, Ingreso facultad; ">
  <title>Rulo Caba</title>
  <link rel="stylesheet" href=".//assets/sass/style.css">
  <link rel="shortcut icon" href="./img/XpxXdhVq_400x400.jpg" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body id="body">
  <?php if(!empty($user)): ?>
    <nav class="navbar navbar-expand-lg w-100">
      <div class="container-fluid">
        <a class="navbar-brand text-white" href="index.html"><img src="./img/ruloCaba.png" class="logoNav" alt="icon" width="100px" height="auto"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active text-white" aria-current="page" href="index.html">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="./pages/videos.html">Videos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" id="documentacion" href="#">Documentos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="cursos.php">Cursos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br>Bienvenido!</br>
  <a href="loguot.php">
        Salir
      </a>
    <?php else: ?>

      <nav class="navbar navbar-expand-lg w-100">
        <div class="container-fluid">
      <a class="navbar-brand text-white" href="index.html"><img src="./img/ruloCaba.png" class="logoNav" alt="icon" width="100px" height="auto"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="index.html">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="./pages/videos.html">Videos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" id="documentacion" href="#">Documentos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="login.php">Ver Mas</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <h1>Registrate o inicia sesion</h1>
  <a href="login.php">Iniciar sesion</a> o
  <a href="registro.php">Registrarse</a>
    <?php endif; ?>
      <div class="text-1"><h1>Bienvenido a Rulo Caba</h1></div>
      <div class="carrousel">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="./img/XpxXdhVq_400x400.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="./img/atom.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="./img/ejemplo.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">anterior</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">siguiente</span>
          </button>
        </div>
      </div>
      <div class="materias">
        <h2>Realizamos ingresos de:</h2>
        <ul class="materiasLi">
          <li class="l1"><img src="./img/medicina.jpg" width="150px" height="auto" alt="imgMedicina"><h3>Medicina</h3></li>
          <li class="l2"><img src="./img/Ingenieria-.jpg" width="150px" height="auto" alt="imgInge"><h3>Ingenierias</h3></li>
          <li class="l3"><img src="./img/odontologia.jpg" width="150px" height="auto" alt="imgOdont"><h3>Odontología</h3></li>
        </ul>
      </div>
      <div class="venta">
        <h2 class="h2Venta">Libros que tenemos en venta:</h2>
        <ul class="listaVenta">
          <li class="l1"><a href="https://mpago.la/27oMQr4"><img src="./img/9789701072363.png" width="100px" height="auto" alt="libroIng">Matematica Discreta<h4>Precio: $2000 (ARS)</h4></li></a>
          <li class="l1"><a href="https://mpago.la/27oMQr4"><img src="./img/libroQuimica.jpeg" width="100px" height="auto" alt="LibroMed">Quimica General <h4>Precio: $2800 (ARS)</h4></li></a>
        </ul>
        <h2 class="h2Venta">Cursos:</h2>
        <ul class="listaVenta">
          <li class="l1"><a href="#"><img src="./img/matematicaCursos.png" alt="matematicaCursos"></li></a>
          <li class="l1"><a href="#"><img src="./img/FisicaCursos.png" alt="FisicaCursos"></li></a>
          <li class="l1"><a href="#"><img src="./img/quimicaImagen.jpg" alt="QuimicaCursos" width="100px" height="auto"></li></a>
        </ul>
      </div>
      <footer>
        <div class="footer">
          <img src="./img/ruloCaba.png" alt="logo" width="130px" height="auto" style="border-radius: 30px;">
        </div>
        <ul class="redes">
          <li><a href="https://www.tiktok.com/@rulocaba"><img src="./img/tiktok-icon2.png" alt="tikTok" width="50px" height="auto" style="margin-top:5px; border-radius: 10px;"></li></a>
          <li><a href="https://www.instagram.com/rulocaba/"><img src="./img/logotipo-de-instagram.png" alt="ig" width="60px" height="auto"></li></a>
          <li><a href="https://twitter.com/aulacentro1"><img src="./img/twitterIcon.png" alt="tw" width="70px" height="auto" style="margin-top:-9px;"></li></a>
          <li><a href="https://www.youtube.com/c/RuloCaba1"><img src="./img/ytLogo.png" alt="tw" width="70px" height="auto"></li></a>
        </ul>
        <div class="redes">
          <a href="#"><p>Contacto</p></a>
          <a href="#"><p>Ubicacion</p></a>
        </div>
      </footer>
      <script src="./assets/js/script.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
    </html>