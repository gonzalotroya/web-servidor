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
    <h1>Index de Consola</h1>
    <p>{{ $mensaje }}</p>
    <a href="{{ route('consolas.create') }}" class="btn btn-success">Crear consola</a>
    <a href="{{ route('videojuegos.index') }}" class="btn btn-success">Ver juegos</a>
    <a href="{{ route('companias.index') }}" class="btn btn-success">Ver compañia</a>
    <form>
      <div class="row">
        <div class="col-3">
          <label class="from-control">Buscar por nombre -></label>
        </div>
        <div class="col-3">
          <input class="form-control" type="text" name="nombre">
        </div>
        <div class="col-3">
          <button class="btn btn-secondary" type="submit">Buscar</button>
        </div>
      </div>
  </form>
    <div class="row">
      <div class="col-9">
        <table class="table">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Salida</th>
              <th>Generacion</th>
              <th>Descripcion</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($consolas as $consola)            
                <tr>
                    <td>{{ $consola->nombre }} </td>
                    <td>{{ $consola -> salida }} </td>
                    <td>{{ $consola -> generacion }} </td>
                    <td>{{ $consola -> descripcion }} </td>
                    <td>
                      <form method="get" action="{{ route('consolas.show',['consola'=>$consola->id]) }}">
                        <button class="btn btn-primary" type="submit">Ver</button>
                      </form>
                    </td>
                    <td>
                      <form method="post" action="{{ route('consolas.destroy',['consola'=>$consola->id]) }}">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button class="btn btn-primary" type="submit">Borrar</button>
                      </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>      
</body>
</html>