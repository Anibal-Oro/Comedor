<?php

include '../config/conectdb.php';

$nombre_completo = $_POST ['nombre'];
$cedula = $_POST ['cedula'];
$usuario = $_POST ['usuario'];
$contrasena = $_POST ['contra'];
//encriptmiento de la contrasena
$contrasena = hash('sha512',$contrasena);


$query = "INSERT INTO usuarios (nombre,cedula,user,contrasena)
VALUES ('$nombre_completo','$cedula','$usuario','$contrasena')";

//verificar cedula

$verificar_cedula= mysqli_query($conexion,"SELECT * FROM usuarios WHERE cedula = '$cedula' ");

if(mysqli_num_rows($verificar_cedula) > 0){

    echo
    '
    <script> 
        alert("la cedula ya existe,intenta con otro diferente");
        window.location = "../view/login.php";
    </script>
        ';
        exit();
}

//verificar usuario

$verificar_usuario= mysqli_query($conexion,"SELECT * FROM usuarios WHERE user = '$usuario' ");

if(mysqli_num_rows($verificar_usuario) > 0){

    echo
    '
    <script> 
        alert("el usuario ya existe,intenta con otro diferente");
        window.location = "../index.php";
    </script>
        ';
        exit();
}

//ejecutar

$ejecutar = mysqli_query($conexion,$query);

if($ejecutar){
    echo '

    <script> 
        alert("conectado exitosamente");
        window.location = "../index.php";
    </script>

    ';
}else {
    echo '

    <script> 
        alert("no se ha podido conectar");
        window.location = "../index.php";
    </script>
    ';

}

mysqli_close($conexion);
?>