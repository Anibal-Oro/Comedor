<?php
if (session_status() == PHP_SESSION_NONE) {
    session_name('Comedor');
    session_start();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <?php  include "./models/head.php" ?>
  <style:
</head>
<body>
    <?php
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
      <?php
            if (isset($_GET['error'])) {
            ?>
            <p class="error">
                <?php
                echo $_GET['error']
                ?>
            </p>
        <?php
            }
        ?>

      <!-- ?php 
            //style
            .error{
                background-color: rgb(175, 74, 74);
                color: black;
                padding: 10px;
                width: 95%;
                border-radius: 5px;
                margin: 20px auto;
            }
                


        if(isset($_POST['login_usuario']) && isset($_POST['login_contraseña'])){
            require_once "./config/conectdb.php";
            require_once "./models/iniciar_sesion.php";
        }

      ?> -->

    </form>
</div>

<!--
#login_text{
   border:solid 1px #CCCCCC;
   /* Aqui están los famosos márgenes negativos*/
/*    padding:2px; */
   background:#FFFFFF; /* Le damos un color de fondo */
color:#000000;
-moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    behavior:url(border-radius.htc)
}



#login-form {
    display: block;
padding-top:20px;
}
#login-form div.row {
    clear: left;
    line-height: 36px;
    margin: 3px 0 0 2em;

}
#login-form .row label {
    float: left;
    font-weight: bold;
    margin: 2px 2px 2px -8em;
    position: relative;
    text-align: right;
    width: 14em;

}
#login-form .row .field {
    background: none repeat scroll 0 0 #EAEAEA;
    border-radius: 6px 6px 6px 6px;
    display: inline-block;
    padding: 1px 3px;

}
#login-form input.text, #login-form input.password {
    background-color: #FFFFFF;
    padding: 8px;
    width: 25em;

    
}

#login-form div.submit {
    margin-top: 10px;

}
#login-form div.submit .button {
    vertical-align: top;

}
#login-form div.row p {
    clear: both;
    font-size: 85%;
    line-height: 150%;
    margin: 5px 0 0;
}
#login-form .error .field, #update-form div.error {
    background: none repeat scroll 0 0 rgba(171, 41, 32, 0.5);
}
#login-form .error input, #update-form .error textarea {
    border: 1px solid #AB2920;

}
-->

</body>
</html>
