<?php 
    require_once "./config/conectdb.php";
    //$conec=conexion();
    
    if (isset($_POST['login_usuario']) && isset($_POST['login_contraseña'])){

        function validate ($data){
            $data = trim($data);
            $data = stripslashes($data) ;
            $data = htmlspecialchars($data);
            return $data;
        }

        $usuario = validate($_POST['login_usuario']);
        $clave = validate($_POST['login_contraseña']);

        if (empty($usuario)){
            header("Location: ./view/login.php?error-El Usuario es requerido");
            exit();
        }elseif (empty($clave)){
            header("Location: ./view/login.php?error-La Contraseña es requeriada");
            exit();
        }else{

            $sql = "SELECT * FROM usuario WHERE Usuario = :usuario AND clave = :clave";
            $stmt = $conec->prepare($sql);
            $stmt->execute([':usuario' => $usuario, ':clave' => $clave]);

            if ($stmt->rows() === 1){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['usuario'] = $row['usuario'];
                $_SESSION['id'] = $row['id'];
                header("Location: index.php?view=home");
                exit();
            }else {
                header("Location: ./view/login.php?error-El usuario o la clave son incorrectas");
                exit();
            }
        }
    }else {
        header("Location: ./view/login.php");
        exit();
    }


/*
$Clave - nd5 ($Clave);
            $Sql="SELECT * FROM usuario WHERE Usuario='$usuario' AND clave='$clave'";
            $result= mysqli_query ($conexion, $Sql);

    
            if (mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);
                if ($row['usuario'] === $usuario && $row['clave'] === $clave){
                    $_SESSION['usuario'] = $row['usuario'];
                    $_ SESSION['Id'] = $row['id'];
                    header("Location: home.php");
                    exit();
                }else {
                    header("Location: ./view/login.php?error-El usuario o la clave son incorrectas");
                    exit();
                }
            }else {
                header("Location: ./view/login.php?error-El usuario o la clave son incorrectas");
                exit();
            }
        }
    }else {
        header("Location: ./view/login.php");
        exit();
    }




    //Almacenando datos
    $usuario=limpiarC($_POST['login_usuario']);
    $contraseña=limpiarC($_POST['login_contraseña']);

    //Verificando campos obligatorios
    if(empty($usuario) || empty($contraseña)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }

    //Verificando integridad de los datos
    if(verificarD("[a-zA-Z0-9$@.-]{4,20}",$usuario)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El Usuario no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if(verificarD("[a-zA-Z0-9$@.-]{7,100}",$contraseña)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La Contraseña no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    $check_usuario=conexion();
    $check_usuario->query("SELECT * FROM usuario WHERE usuario='$usuario' AND clave='$contraseña'");

    if($check_usuario->rowCount()==1){
        $check_usuario=$check_usuario->fetch();

        $_SESSION['id']=$check_usuario['id'];
        $_SESSION['nombre']=$check_usuario['usuario'];
        
        if(headers_sent()){
            echo "<script> window.location.href='index.php?view=home';
            </script>";
        }else{
            header("Location: index.php?view=home");
        }
    }else{
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            Usuario o Contraseña incorrectos
        </div>
    ';
    }
    $check_usuario=null;
*/

?>