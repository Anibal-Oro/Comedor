<?php
    $inicio= ($pagina>0) ? (($pagina * $registros) - $registros) : 0;
    $tabla="";    

    if(isset($busqueda) && $busqueda!=""){

        $consulta_datos="SELECT * FROM estudiante WHERE ((Nombre LIKE '%$busqueda%' OR Apellido LIKE '%$busqueda%' OR Cedula LIKE '%$busqueda%' OR Carrera LIKE '%$busqueda%')) ORDER BY Nombre ASC LIMIT $inicio, $registros";

        $consulta_total="SELECT COUNT(ID_Estudiante) FROM estudiante WHERE ((Nombre LIKE '%$busqueda%' OR Apellido LIKE '%$busqueda%' OR Cedula LIKE '%$busqueda%' OR Carrera LIKE '%$busqueda%'))";

    }else{
        $consulta_datos = "SELECT * FROM estudiante ORDER BY ID_Estudiante ASC LIMIT $inicio,$registros";

        $consulta_total="SELECT COUNT(ID_Estudiante) FROM estudiante";

    }

    $conexion=conexion();

    $datos=$conexion->query($consulta_datos);
    $datos=$datos->fetchAll();

    $total=$conexion->query($consulta_total);
    $total=(int) $total->fetchColumn();

    $Npaginas=ceil($total/$registros);

    $tabla.='
        <div class="table-container">
            <table class="table is-bordered is-striped is-narrow is-hoverable
            is-fullwidth">
                <thead>
                    <tr class="has-text-centered">
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cedula</th>
                        <th>Carrera</th>
                        <th colspan="2">Opciones</th>
                    </tr>
                </thead>
            
                <tbody>
    ';

    if($total>=1 && $pagina<=$Npaginas){

        $contador=$inicio+1;
		$pag_inicio=$inicio+1;
		foreach($datos as $filas){
			$tabla.='
				<tr class="has-text-centered" >
					<td>'.$contador.'</td>
                    <td>'.$filas['Nombre'].'</td>
                    <td>'.$filas['Apellido'].'</td>
                    <td>'.$filas['Cedula'].'</td>
                    <td>'.$filas['Carrera'].'</td>
                    <td>
                        <a href="index.php?vista=estudiante_actualizar&estudiante_id_up='.$filas['ID_Estudiante'].'" class="button is-success is-rounded is-small">Actualizar</a>
                    </td>
                    <td>
                        <a href="'.$url.$pagina.'&estudiante_id_del='.$filas['ID_Estudiante'].'" class="button is-danger is-rounded is-small">Eliminar</a>
                    </td>
                </tr>
            ';
            $contador++;
		}
		$pag_final=$contador-1;

    }else{
        if($total>=1){

            $tabla.='
                <tr class="has-text-centered" >
                        <td colspan="7">
                            <a href="'.$url.'1" class="button is-link is-rounded
                            is-small mt-4 mb-4">
                                Haga clic acá para recargar el listado
                            </a>
                        </td>
                </tr>
            ';

        }else{

            $tabla.='
                <tr class="has-text-centered" >
                    <td colspan="7">
                        No hay registros en el sistema
                    </td>
                </tr>
            ';

        }
    }

    $tabla.='
                </tbody>
            </table>
        </div>
    ';

    if($total>0 && $pagina<=$Npaginas){
		$tabla.='<p class="has-text-right">Mostrando estudiantes <strong>'.$pag_inicio.'</strong> al <strong>'.$pag_final.'</strong> de un <strong>total de '.$total.'</strong></p>';
	}

    $conexion=null;
    echo $tabla;

    if($total>=1 && $pagina<=$Npaginas){
		echo navegacion($pagina,$Npaginas,$url,10);
	}

?>