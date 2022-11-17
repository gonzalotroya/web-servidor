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
        
    <?php  session_start();
    require '../header.php';
    ?>
        <h1>Listado de clientes</h1>
        <div class="row">
            <div class="col-9">
                <?php
                if(!isset($_SESSION["usuario"]) || ($_SESSION["rol"])!=='administrador'){
                    header("location: http://localhost/05base_de_datos/tienda_ropa/public/iniciar_sesion.php");
                    
                }else{
                echo "<p> Has iniciado sesión ". $_SESSION["usuario"]."</p>"; 
                }
               
                ?>
                <table class=" table table-striped table-hover ">
                    <thead class="table table-dark">
                        <tr>
                            <th>Usuario</th>
                            <th></th>
                            <th>Nombre</th>
                            <th>Apellido1</th>
                            <th>Apellido1</th>
                            <th>fecha_nacimiento</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require '../../utils/database.php';
                            if($_SERVER["REQUEST_METHOD"]=="POST"){
                                $id=$_POST["id"];
                                $sql="SELECT imagen FROM clientes WHERE id='$id'";
                                $resultado=$conexion ->query($sql);
                                if($resultado -> num_rows >0){
                                    while ($fila = $resultado -> fetch_assoc()) {
                                        $imagen=$fila["imagen"];
                                    }
                                    unlink("../.." . $imagen);
                                }
                                $sql ="DELETE FROM clientes WHERE id='$id'";
                                $resultado=$conexion ->query($sql);
                                if($conexion -> query($sql)){
                                    ?><div class="alert alert-success" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><?php echo "<p>Registro borrado</p>";?></button></div><?php 
                                
                                }else{
                                    ?><div class="alert alert-danger" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><?php echo "<p>Error al borrar</p>";?></button></div><?php 
                                }
                            }

                            $sql="SELECT * FROM clientes";
                            $resultado=$conexion -> query($sql);

                            if($resultado -> num_rows > 0){
                                while ($fila = $resultado -> fetch_assoc()){
                                    $usuario=$fila["usuario"];
                                    $nombre=$fila["nombre"];
                                    $apellido_1=$fila["apellido_1"];
                                    $apellido_2=$fila["apellido_2"];
                                    $fecha_nacimiento=$fila["fecha_nacimiento"];
                                    $imagen=$fila["imagen"];                
                                    

                                    if (empty($imagen))
                                            {
                                                $imagen ="/resources/images/avatar/default.jpg";
                                            }
                                    
                                    ?>
                                        <tr>
                                            <td><?php echo $usuario?></td>
                                            <td><img width="50" height="60" src="../../<?php  echo $imagen ?>"></td>
                                            <td><?php echo $nombre?></td>
                                            <td><?php echo $apellido_1?></td>
                                            <td><?php echo $apellido_2?></td>
                                            <td><?php echo $fecha_nacimiento?></td>
                                            <td>
                                                <form action="mostrar_clientes.php" method="get">
                                                    <button class="btn btn-primary" type="submit">Ver</button>
                                                    <input type="hidden" name="id" value="<?php echo $fila["id"]?>">
                                                </form>
                                            </td>
                                            <td>
                                                <form action="" method="post">
                                                    <button class="btn btn-danger" type="submit">Borrar</button>
                                                    <input type="hidden" name="id" value="<?php echo $fila["id"]?>">
                                                </form>
                                            </td>
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