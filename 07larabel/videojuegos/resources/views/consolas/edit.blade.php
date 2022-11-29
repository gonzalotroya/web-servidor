<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Consolas</title>
</head>
<body>
    <h1>Editar Consolas</h1>
    <a href="{{ route('videojuegos.create') }}" class="btn btn-success">Crear videojuego</a>
    <a href="{{ route('companias.index') }}" class="btn btn-success">Ver compañias</a>
    <a href="{{ route('consolas.index') }}" class="btn btn-success">Ver consolas</a>
    <div class="container">
        <div class="row">
            <div class="col-9">
                <form action="{{ route('consolas.update',['consola'=>$consolas ->id]) }}" method="post">
                    {{ method_field('PUT') }}
                    @csrf
                    <label>Nombre</label>
                    <input type="text" name="nombre"  value="{{ $consolas->nombre }}">
                    <span class="error">
                            * <?php if(isset($err_nombre)) echo $err_nombre ?>
                        </span>
                    <br><br>
                    <label>Año de salida</label>
                    <input type="date" name="salida"  value="{{ $consolas->salida }}">
                    <span class="error">
                            * <?php if(isset($err_salida)) echo $err_salida ?>
                        </span>
                    <br><br>
                    <div class="form-group mb-3">
                        <label>Generacion</label>
                        <span class="error">
                                * <?php if(isset($err_generacion)) echo $err_generacion ?>
                            </span>
                            <input type="text" name="generacion"  value="{{ $consolas->generacion }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Descripcion</label>
                            <span class="error">
                                    * <?php if(isset($err_descripcion)) echo $err_descripcion ?>
                                </span>
                            <textarea name="descripcion"  value="{{ $consolas->descripcion }}"></textarea>
                        </div>
                    <input type="submit" value="Enviar">
                </form>
            </div>
        </div>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>      
</body>
</html>