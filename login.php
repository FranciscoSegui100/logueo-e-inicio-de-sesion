<?php
require 'database.php';

session_start();

if (isset($_SESSION['user_id'])) {
  header('Location: /php-login');
}

if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $records = $connect()->prepare('SELECT * FROM users WHERE email = :email AND password = password');
  $records->bindParam(':email', $_POST['email']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $message = '';

  if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
    $_SESSION['user_id'] = $results['id'];
    header("Location: /php-login");
  } else {
    $message = 'No se encontro el usuario';
  }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
    <link rel="stylesheet" href=".//assets/sass/style.css">
</head>
<body id="bodyForms">
<?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Inicia sesion ó</h1>
    <a href="registro.php">Registrate</a>
    <div id="formulario">
        <form action="login.php" method="POST" id="formularios">
            <p>Ingresa tu email</p>
            <input type="email" name="mail" id="nombre" required>
            <p>Ingresa tu contraseña</p>
            <input type="password" name="password" id="nombre" required>
            <input type="submit" value="Entrar" id="btnEnviar">
        </form>
    </div>
</body>
</html>