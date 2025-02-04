<!-- ?php
if (session_status() == PHP_SESSION_NONE) {
    session_name('Comedor');
    session_start();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  ?php  include "./models/head.php" ?>
  <style:
</head>
<body>
    ?php
        include './config/conectdb.php';
    ?>



<div>
    <form class="Login" action="./models/iniciar_sesion.php" method="POST">
      <h1 class=" title is-5 has-text-centered">UNIVERSIDAD RÓMULO GALLEGOS</h1>
      <label for="name">Usuario:</label>
      <input type="email" id="username" name="login_usuario" maxlength="30" autocomplete="off" required><br><br>
      <label for="Contraseña">Constraseña:</label>
      <input type="password" id="password" name="login_contraseña" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="50" autocomplete="off" required><br><br>
      <input type="submit" value="Iniciar sesión">
      ?php
            if (isset($_GET['error'])) {
            ?>
            <p class="error">
                ?php
                echo $_GET['error']


                ?>
            </p>
        ?php
            }
        ?>
         
-->

<?php

if (session_status() == PHP_SESSION_NONE) {
    session_name('Comedor');
    session_start();
}
//session_start();

if(isset($_SESSION['usuario'])){
    header("location: bienvenido.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="../vistas/styles.css">
</head>
<body>

        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="models/login_usuario.php" class="formulario__login" method="POST">
                        <h2>Iniciar Sesión</h2>
                        <input type="text" placeholder="Usuario" name="usuario">
                        <input type="password" placeholder="Contraseña" name = "contra">
                        <button>Entrar</button>
                    </form>

                    <!--Register-->
                    <form action="models/register_usuario.php" class="formulario__register" method="POST">
                        <h2>Regístrarse</h2>
                        <input type="text" placeholder="Nombre completo" name="nombre">
                        <input type="text" placeholder="Cedula" name="cedula">
                        <input type="text" placeholder="Usuario" name ="usuario">
                        <input type="password" placeholder="Contraseña" name="contra">
                        <button>Regístrarse</button>
                    </form>
                </div>
            </div>

        </main>

        <script src="../vistas/scrips.js"></script>
</body>
</html>


</body>
</html>
