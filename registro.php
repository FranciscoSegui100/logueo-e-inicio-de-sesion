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
     $message = 'Usuario creado!!';
   } else {
     $message = 'Error al crear el usuario :(';
   }
 }
?>


<!DOCTYPE html>
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
            <input type="password" name="password" id="nombre" required>
            <p>Confirma tu contraseña</p>
            <input type="password" name="confirmarContraseña" id="nombre" required>
            <input type="submit" value="Registrarse" id="btnEnviar">
            <a href="./login.php"><input type="button" value="Iniciar Sesion" id="btnEnviar"></a>
            <div id="coincidirPass"></div>
        </form>
        <?php if(!empty($message)): ?>
          <p class="newUser"> <?= $message ?></p>
        <?php endif; ?>
    </div>
</body>
</html>