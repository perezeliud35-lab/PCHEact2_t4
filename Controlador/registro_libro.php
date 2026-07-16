<?php

if (!empty($_POST["btnregistrar"])) {

    if (
        !empty($_POST["titulo"]) &&
        !empty($_POST["autor"]) &&
        !empty($_POST["isbn"]) &&
        !empty($_POST["fecha"]) &&
        !empty($_POST["editorial"])
    ) {

        $titulo    = $_POST["titulo"];
        $autor     = $_POST["autor"];
        $isbn      = $_POST["isbn"];
        $fecha     = $_POST["fecha"];
        $editorial = $_POST["editorial"];

        $sql = $conexion->query("
            INSERT INTO libro(titulo, autor, isbn, fecha_publicacion, editorial)
            VALUES('$titulo', '$autor', '$isbn', '$fecha', '$editorial')
        ");

        if ($sql == 1) {
            echo '<div class="alert alert-success">Libro registrado correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">Error al registrar el libro</div>';
        }

    } else {
        echo '<div class="alert alert-warning">Alguno de los campos está vacío</div>';
    }

}

?>