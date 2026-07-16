<?php

if (!empty($_GET["id"])) {
    $id = $_GET["id"];

    $sql = $conexion->query("DELETE FROM libro WHERE id_libro = $id");

    if ($sql == 1) {
        echo '<div class="alert alert-success">Libro eliminado correctamente</div>';
    } else {
        echo '<div class="alert alert-danger">Error al eliminar el libro</div>';
    }
}

?>