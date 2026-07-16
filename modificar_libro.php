<?php
include "Modelo/conexion.php";

$id = $_GET["id"];

$sql = $conexion->query("SELECT * FROM libro WHERE id_libro = $id");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <form class="col-4 p-3 m-auto" method="POST">
        <h5 class="text-center alert alert-secondary">Modificar Libro</h5>
        
        <input type="hidden" name="id" value="<?= $_GET["id"] ?>">

        <?php
        include "Controlador/modificar_libro.php";

        while ($datos = $sql->fetch_object()) { ?>
            <div class="mb-1">
                <label class="form-label">Título del libro</label>
                <input type="text" class="form-control" name="titulo" value="<?= $datos->titulo ?>">
            </div>

            <div class="mb-1">
                <label class="form-label">Autor del libro</label>
                <input type="text" class="form-control" name="autor" value="<?= $datos->autor ?>">
            </div>

            <div class="mb-1">
                <label class="form-label">ISBN</label>
                <input type="text" class="form-control" name="isbn" value="<?= $datos->isbn ?>">
            </div>

            <div class="mb-1">
                <label class="form-label">Fecha de publicación</label>
                <input type="date" class="form-control" name="fecha" value="<?= $datos->fecha_publicacion ?>">
            </div>

            <div class="mb-1">
                <label class="form-label">Editorial</label>
                <input type="text" class="form-control" name="editorial" value="<?= $datos->editorial ?>">
            </div>
        <?php } ?>

        <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Modificar Libro</button>
    </form>
</body>

</html>