<div class="container is-fluid mb-6">
    <h1 class="title">Estudaintes</h1>
    <h2 class="subtitle">Lista de estudiantes</h2>
</div>

<div class="container pb-6 pt-6">

    <?php
        require_once "./config/conectdb.php";

        if(!isset($_GET['page'])){
            $pagina=1;
        }else{
            $pagina=(int) $_GET['page'];
            if($pagina<=1){
                $pagina=1;
            }
        }

        $pagina=limpiarC($pagina);
        $url="index.php?view=estudiante_ver&page=";
        $registros=30;
        $busqueda="";

        require_once "./models/estudiante_lista.php";
    ?>

    

</diV>