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
    <h1>Mostrar Consola</h1>
    <a href="{{ route('videojuegos.create') }}" class="btn btn-success">Crear videojuego</a>
    <a href="{{ route('companias.index') }}" class="btn btn-success">Ver compañias</a>
    <a href="{{ route('consolas.index') }}" class="btn btn-success">Ver consolas</a>
    <div class="container">
        <div class="row">
            <div class="col-9">
                <p>{{ $consolas->nombre }} </p>
                <p>{{ $consolas -> salida }} </p>
                <p>{{ $consolas -> generacion }} </p>
                <p>{{ $consolas -> descripcion }} </p>
                <form method="get" action="{{route('consolas.edit',['consola' => $consolas ->id])}}">
                    <button class="btn btn-primary" type="submit">Editar<button>
                </form>
            </div>
        </div>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>      
</body>
</html>