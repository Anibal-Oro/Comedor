<?php
	require_once "../config/conectdb.php";
   
   //Almacenando datos
   $Menu=limpiarC($_POST['Menu']);
   $Seco=limpiarC($_POST['Seco']);
   $Salado=limpiarC($_POST['Salado']);
   $Acompañante=limpiarC($_POST['Acompañante']);
   $Bebida=limpiarC($_POST['Bebida']);
   $Cantidad=limpiarC($_POST['Cantidad']);
   $Disponible=limpiarC($_POST['Disponible']);

    //Verificando campos obligatorios
    if(empty($Menu) || empty($Seco) || empty($Cantidad) || empty($Disponible)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }


    //Verificando integridad de los datos
    if (!is_numeric($Menu) || !is_numeric($Cantidad) || !is_numeric($Disponible)) {
        echo 'La Cantidad y Disponible deben ser números enteros.';
        exit();
    }

    if(verificarD("[1-9]{1,2}",$Menu)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El Menu no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if(verificarD("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,50}",$Seco)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El Seco no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if(verificarD("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,50}",$Salado)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El Salado no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if(verificarD("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,50}",$Acompañante)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El Acompañante no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if(verificarD("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,50}",$Bebida)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La Bebida no coincide con el formato solicitado
            </div>
        ';
        exit();
    }
    
    if(verificarD("[0-9][0-9]{0,3}",$Cantidad)){
	    echo '
	        <div class="notification is-danger is-light">
	             <strong>¡Ocurrio un error inesperado!</strong><br>
                 La Cantidad de Comida no coincide con el formato solicitado
	        </div>
	        ';
	    exit();
	}
    

    if(verificarD("[0-9][0-9]{0,3}",$Disponible)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La Cantidad Disponible no coincide con el formato solicitado
            </div>
        ';
        exit();
    }


    //Verificando Menu
    $check_Menu=conexion();
    $check_Menu=$check_Menu->query("SELECT Menu FROM comedor WHERE Menu='$Menu'");
    if($check_Menu->rowCount()>0){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El Menu ingresado ya se encuentra registrado, por favor elija otro
            </div>
        ';
        exit();
    }
    $check_Menu=null;


   //Guardando datos
   $guardar_comida=conexion();
   $guardar_comida=$guardar_comida->prepare("INSERT INTO comedor (Menu, Seco, Salado, Acompañante, Bebida, Cantidad, Disponible) VALUES(:Menu, :Seco, :Salado, :Acompañante, :Bebida, :Cantidad, :Disponible)");
        
    $marcadores = [
        ":Menu" => (int)$Menu,
        ":Seco" => $Seco,
        ":Salado" => $Salado,
        ":Acompañante" => $Acompañante,
        ":Bebida" => $Bebida,
        ":Cantidad" => (int)$Cantidad,
        ":Disponible" => (int)$Disponible
    ];
    echo "<pre>"; print_r($marcadores); echo"</pre>";


    // Imprimir la consulta SQL y los valores a insertar
    echo "<pre>"; print_r($guardar_comida); echo "</pre>";


    //$guardar_comida->execute($marcadores);

    if (!$guardar_comida->execute($marcadores)) {
        echo "Error al ejecutar la consulta: ";
        print_r($guardar_comida->errorInfo());
        exit();
    } else {
        echo 'Consulta ejecutada correctamente.';
    }

    if ($guardar_comida->rowCount() == 1) {
        echo '
            <div class="notification is-info is-light">
                <strong>¡MENU REGISTRADO!</strong><br>
                El Menu se registró con éxito
            </div>
        ';
        echo "<pre>"; print_r($guardar_comida->errorInfo()); echo "</pre>";
    } else {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo registrar el menu, por favor intente nuevamente
            </div>
        ';
    
    echo "<pre>"; print_r($guardar_comida->errorInfo()); echo "</pre>";
    }

$guardar_comida = null;