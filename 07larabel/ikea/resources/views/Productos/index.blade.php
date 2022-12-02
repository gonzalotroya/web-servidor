<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Producto</title>
</head>
<body>
    <h1>Index de Producto</h1>
    <a href="{{ route('Productos.create') }}" class="btn btn-success">Crear videojuego</a>
    <a href="{{ route('Categorias.index') }}" class="btn btn-success">Ver categorias</a>
    <form action="{{ route('Productos.search') }}" method="get">
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
              <th>Precio</th>
              <th>Fecha_lanzamiento</th>
              <th>Descripcion</th>
              <th>Categoria</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($productos as $producto)            
                <tr>
                    <td>{{ $producto->nombre}} </td>
                    <td>{{ $producto ->precio }} </td>
                    <td>{{ $producto ->fecha_lanzamiento }} </td>
                    <td>{{ $producto ->descripcion }} </td>
                    <td>{{ $producto ->categoria->nombre }} </td>

                    <td>
                      <form method="get" action="{{ route('Producto.show',['producto'=>$producto->id]) }}">
                        <button class="btn btn-primary" type="submit">Ver</button>
                      </form>
                    </td>
                    <td>
                      <form method="post" action="{{ route('Productos.destroy',['producto'=>$producto->id]) }}">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button class="btn btn-primary" type="submit">Borrar</button>
                      </form>
                    </td>
                </tr>
                <tr>
                  @foreach($productos as $producto)
                  {{$producto ->nombre}} - {{ $producto->categoria->nombre}}            
                  @endforeach
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>  
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>      
</body>
</html>