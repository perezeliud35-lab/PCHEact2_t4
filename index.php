<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud de Libros en PHP y MySQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/646ac4fad6.js" crossorigin="anonymous"></script>
</head>

<body>
    <script>
        function eliminar(){
            var respuesta=confirm("¿Estás seguro que deseas eliminar este libro?");
            return respuesta;
        }
    </script>
    <h1 class="text-center p-3">BIBLIOTECA - CRUD PHP</h1>
    <?php
    include "Modelo/conexion.php";
    include "Controlador/eliminar_libro.php";
    ?>

    <div class="container-fluid row">
        
        <form class="col-4 p-3" method="POST">

            <h3 class="text-center text-secondary">Registro de Libros</h3>
            
            <?php
            include "Controlador/registro_libro.php";
            ?>

            <div class="mb-3">
                <label class="form-label">Título del libro</label>
                <input type="text" class="form-control" name="titulo">
            </div>

            <div class="mb-3">
                <label class="form-label">Autor del libro</label>
                <input type="text" class="form-control" name="autor">
            </div>

            <div class="mb-3">
                <label class="form-label">ISBN</label>
                <input type="text" class="form-control" name="isbn">
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha de publicación</label>
                <input type="date" class="form-control" name="fecha">
            </div>

            <div class="mb-3">
                <label class="form-label">Editorial</label>
                <input type="text" class="form-control" name="editorial">
            </div>

            <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">
                Registrar Libro
            </button>

        </form>

        <div class="col-8 p-4">
            <table class="table">
                <thead class="bg-info">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">TÍTULO</th>
                        <th scope="col">AUTOR</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">FECHA PUBLICACIÓN</th>
                        <th scope="col">EDITORIAL</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = $conexion->query("SELECT * FROM libro");
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?= $datos->id_libro ?></td>
                            <td><?= $datos->titulo ?></td>
                            <td><?= $datos->autor ?></td>
                            <td><?= $datos->isbn ?></td>
                            <td><?= $datos->fecha_publicacion ?></td>
                            <td><?= $datos->editorial ?></td>
                            <td>
                            <a href="modificar_libro.php?id=<?= $datos->id_libro ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a onclick="return eliminar()" href="index.php?id=<?= $datos->id_libro ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>