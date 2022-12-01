<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Compañias</title>
</head>
<body>
    <h1>Index de Company</h1>
    <p>{{ $mensaje }}</p>
    <a href="{{ route('companias.create') }}" class="btn btn-success">Crear compañia</a>
    <a href="{{ route('videojuegos.index') }}" class="btn btn-success">Ver juegos</a>
    <a href="{{ route('consolas.index') }}" class="btn btn-success">Ver consolas</a>
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
              <th>Sede</th>
              <th>Fecha fundacion</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($companias as $compania)            
                <tr>
                    <td>{{ $compania->nombre }} </td>
                    <td>{{ $compania ->sede }} </td>
                    <td>{{ $compania -> fecha_fundacion }} </td>
                    <td>
                      <form method="get" action="{{ route('companias.show',['compania'=>$compania->id]) }}">
                        <button class="btn btn-primary" type="submit">Ver</button>
                      </form>
                    </td>
                    <td>
                      <form method="post" action="{{ route('companias.destroy',['compania'=>$compania->id]) }}">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button class="btn btn-primary" type="submit">Borrar</button>
                      </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        @foreach($companias as $compania)
                    <ul>
                      <li>
                        {{$compania ->nombre}} - {{ $compania->videojuegos->titulo}}  
                      </li>
                    </ul>
        @endforeach
        
      </div>
    </div>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>      
</body>
</html>