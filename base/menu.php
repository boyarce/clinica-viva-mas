<?php
$_usuario = $_SESSION['loginUser'];
$_usuario = strtolower($_usuario); 
/* Archivo con el código HTML del menú 
/* Recupera la lista de opciones/páginas posibles
 * desde un arreglo, el cual itera creando una lista
 * no ordenada con las opciones de menú. 
 */

    $pagina = htmlentities($_SERVER['PHP_SELF']);
    $paginas = array("inicio","reserva","consulta");

    $menuActual = "inicio";
    $menuAdmin = "administrador";

    if(isset($_GET['menu'])) {
        $menuActual = $_GET['menu'];
    } 

    echo "<ul>";

    foreach($paginas as $item) {
        if($menuActual == $item) {
            echo '<li class="actual">'.ucfirst($item).'</li>';
        }else if($_usuario == $menuAdmin){
            echo '<li><a href="'.$pagina.'?menu='.$item.'">'.ucfirst($item).'</a></li>';
        }else{
            if($_usuario == $item){
                echo '<li><a href="'.$pagina.'?menu='.$item.'">'.ucfirst($item).'</a></li>';
            }
        }
    }

    echo "</ul>";
?>
