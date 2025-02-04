<?php
session_start();

include '../config/conectdb.php';

$usuario = $_POST ['usuario'];
$contrasena = $_POST ['contra'];
$contrasena = hash('sha512',$contrasena);

$validar_login = mysqli_query($conexion,"SELECT * FROM usuarios WHERE user = '$usuario' and contrasena = '$contrasena'");

if(mysqli_num_rows($validar_login) > 0){
    $_SESSION['usuario'] = $usuario;

    header("location:../bienvenido.php");

    exit;

}else{
    echo '

    <script> 
        alert("usuario no existe o esta incorrecto");
        window.location = "../index.php";
    </script>

    ';
    exit;

};


?>