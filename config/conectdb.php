<?php

//Conexion a la base de datos
function conexion(){
    try{
        $conec = new PDO('mysql:host=localhost; dbname=unerg', 'root', '');
        $conec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conec;
        echo "Conexión exitosa <br>";
    }catch (PDOException $e) {
            echo "Error de conexión: ".$e->getMessage();
            return null;
    }
        
};
$conec=conexion();
/*
$conec=conexion();
$conec->query("INSERT INTO comedor(Seco) VALUES('FRODO') ");
*/


//Verificar datos
function verificarD($filtro, $cadena){
    if(preg_match("/^".$filtro."$/",$cadena)){
        return false;
    }else{
        return true;
    }
};
/*
$nombre="Carlos" ;
if(verificarD("[a-zA-Z]{6,10}", $nombre)){
    echo "Los datos no coinciden";
}
*/ 


//limpiar cadenas de texto
function limpiarC($cadena){
    $cadena=trim($cadena);
    $cadena=stripslashes($cadena) ;
    $cadena=str_ireplace("<script>","", $cadena) ;
    $cadena=str_ireplace("</script>","",$cadena) ;
    $cadena=str_ireplace("<script src","", $cadena) ;
    $cadena=str_ireplace("<script type=","",$cadena) ;
    $cadena=str_ireplace("SELECT * FROM","",$cadena);
    $cadena=str_ireplace ("DELETE FROM","",$cadena);
    $cadena=str_ireplace("INSERT INTO","",$cadena);
    $cadena=str_ireplace ("DROP TABLE","", $cadena) ;
    $cadena=str_ireplace("DROP DATABASE","",$cadena);
    $cadena=str_ireplace ("TRUNCATE TABLE","",$cadena);
    $cadena=str_ireplace("SHOW TABLES;","",$cadena);
    $cadena=str_ireplace("SHOW DATABASES;","",$cadena);
    $cadena=str_ireplace("<?php","",$cadena);
    $cadena=str_ireplace("?>","",$cadena);
    $cadena=str_ireplace("--","",$cadena);
    $cadena=str_ireplace("^","",$cadena);
    $cadena=str_ireplace("<","",$cadena);
    $cadena=str_ireplace("[","",$cadena);
    $cadena=str_ireplace("]","",$cadena);
    $cadena=str_ireplace("==","",$cadena);
    $cadena=str_ireplace(";","",$cadena);
    $cadena=str_ireplace("::","",$cadena);
    $cadena=str_ireplace(">","",$cadena);
    $cadena=str_ireplace("{","",$cadena);
    $cadena=str_ireplace("}","",$cadena);
    $cadena=trim($cadena);
    $cadena=stripslashes($cadena);
    return $cadena;
};
/*
$TEX=" WOLA {} TU <script> papa";
echo limpiarC($TEX);
*/


//navegacion
function navegacion($pagina,$Npaginas,$url,$botones){
    $nav='<nav class="pagination is-centered" role="navigation" aria-label="pagination">';

    if($pagina<=1){
        $nav.='
        <a class="pagination-previous is-disabled" diasabled>Anterior</a>
        <ul class="pagination-list">
        ';
    }else{
        $nav.='
        <a class="pagination-previous" href="'.$url.($pagina-1).'">Anterior</a>
        <ul class="pagination-list">
            <li><a class="pagination-link" href="'.$url.'1">1</a></li>
            <li><span class="pagination-ellipsis">&hellip;</span></li>
        ';
    }


    $ci=0;
    for($i=$pagina; $i<=$Npaginas; $i++){
            
        if($ci>=$botones) {
            break;
        }

        if($pagina==$i){
            $nav.='<li> <a class="pagination-link is-current" href="'.$url.$i.'">'
            .$i.'</a></li>';
        }else{
            $nav.=' <li><a class="pagination-link" href="'.$url.$i.'">'.$i. '</a></li>';
        }

        $ci++;
        }
        

    if($pagina<$Npaginas){
        $nav.='
            <li><span class="pagination-ellipsis">&hellip;</span></li>
            <li><a class="pagination-link" href="'.$url.$Npaginas.'">'.$Npaginas.'</a></li>
        <a class="pagination-next" href="'.$url.($pagina+1).'>Siguiente</a>
        ';
    }else{
        $nav.='
        </ul>
        <a class="pagination-next is-disabled" disabled">Siguiente</a>
        ';
    }

    $nav.='</nav>';
    return $nav;
};


//
function formulario(){

};


?>
