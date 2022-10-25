<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Usuario Creado correctamente';
    } else {
      $message = 'No pudimos crear tu usuario. Ponte en contacto con nosotros si el problema persiste';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rulo Caba - Registro</title>
    <link rel="stylesheet" href=".//assets/sass/style.css">
  </head>
  <body id="bodyForms">


    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Registrate</h1>
    <span>o <a href="login.php">Inicia Sesion</a></span>
    <div id="formulario">
      <form action="registro.php" method="POST">
        <p>Ingresa tu email</p>
        <input name="email" type="text">
        <p>Ingresa tu contraseña</p>
        <input name="password" type="password">
        <p>Confirma tu contraseña</p>
        <input type="password" name="confirmarContraseña">
        <input type="submit" value="Registrarse" id="btnEnviar">
      </form>
    </div>

  </body>
</html>


<!-- <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href=".//assets/sass/style.css">
</head>
<body id="bodyForms">

    
    
    <h1>Registrate ó</h1>
    <a href="login.php">Inicia sesion</a>
    <div id="formulario">
        <form action="registro.php" method="POST" id="formularios">
            <p>Ingresa tu email</p>
            <input type="email" name="email" id="nombre"required>
            <p>Ingresa tu contraseña</p>
            <input type="password" name="password" id="nombre2" required>
            <p>Confirma tu contraseña</p>
            <input type="password" name="confirmarContraseña" id="contraseña" required>
            <a href="https://mpago.la/27oMQr4" id="continuar"><input  type="button" value="Colaborar" class="boton1"></a>
            <input type="submit" value="Registrarse" id="btnEnviar">
            <!-- <a href="./login.php"><input type="button" value="Iniciar Sesion" id="btnEnviar"></a> -->
            <!-- <div id="coincidirPass"></div>
        </form>
    </div>
</body>
</html>