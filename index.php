<?php require "./models/session.php"; 
$backgroundImage = './style/img/fondo.png';
?>

<!DOCTYPE html>
<html lang="es">
<head>
   <?php  include "./models/head.php" ?>
</head>
<body>

    <?php 
        if(!isset($_GET['view']) || $_GET['view']==""){
            $_GET['view']="login" ;
        }

        if(is_file("./view/".$_GET['view'].".php") && $_GET['view']
            !="login" &&$_GET['view']!="pendejo"){

            include "./models/navbar.php";

            include "./view/".$_GET["view"].".php" ;
            
            }else{
                if($_GET['view']=="login"){
                    include "./view/login.php";
                }
                    else{
                        include "./view/404.php";
                     }
            }
    ?>

<style>
  body{
    background-image: url('<?php echo $backgroundImage; ?>');
    background-size: cover; 
    background-repeat: no-repeat; 
    background-position: center center; 
  }
</style>

</body>
</html>