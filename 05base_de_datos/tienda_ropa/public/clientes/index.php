<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <?php require '../header.php' 
    ?>
        <h1>Listado de clientes</h1>
        <div class="row">
            <div class="col-9">
                <table class=" table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="table table-dark">Usuario</th>
                            <th class="table table-dark">Nombre</th>
                            <th class="table table-dark">Apellido1</th>
                            <th class="table table-dark">Apellido1</th>
                            <th class="table table-dark">fecha_nacimiento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require '../../utils/database.php';
                            $sql="SELECT * FROM clientes";
                            $resultado=$conexion -> query($sql);

                            if($resultado -> num_rows > 0){
                                while ($fila = $resultado -> fetch_assoc()){
                                    $usuario=$fila["usuario"];
                                    $nombre=$fila["nombre"];
                                    $apellido_1=$fila["apellido_1"];
                                    $apellido_2=$fila["apellido_2"];
                                    $fecha_nacimiento=$fila["fecha_nacimiento"];
                                    ?>
                                        <tr>
                                            <td><?php echo $usuario?></td>
                                            <td><?php echo $nombre?></td>
                                            <td><?php echo $apellido_1?></td>
                                            <td><?php echo $apellido_2?></td>
                                            <td><?php echo $fecha_nacimiento?></td>
                                        </tr>
                                    <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>
</html>