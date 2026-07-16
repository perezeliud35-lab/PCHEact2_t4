<?php

if (!empty($_POST["btnregistrar"])) {
    
    if (
        !empty($_POST["titulo"]) && 
        !empty($_POST["autor"]) && 
        !empty($_POST["isbn"]) && 
        !empty($_POST["fecha"]) && 
        !empty($_POST["editorial"])
    ) {
        $id        = $_POST["id"];
        $titulo    = $_POST["titulo"];
        $autor     = $_POST["autor"];
        $isbn      = $_POST["isbn"];
        $fecha     = $_POST["fecha"];
        $editorial = $_POST["editorial"];

        $sql = $conexion->query("UPDATE libro SET titulo='$titulo', autor='$autor', isbn='$isbn', fecha_publicacion='$fecha', editorial='$editorial' WHERE id_libro=$id");
        
        if ($sql == 1) {
            header("location:index.php");
            exit();
        } else {
            echo "<div class='alert alert-danger'>Error al modificar el libro</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Campos vacíos</div>";
    }
}

?>