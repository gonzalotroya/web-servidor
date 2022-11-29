<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Videojuegos</title>
</head>
<body>
    <h1>Editar Videojuegos</h1>
    <a href="{{ route('videojuegos.create') }}" class="btn btn-success">Crear videojuego</a>
    <a href="{{ route('companias.index') }}" class="btn btn-success">Ver compañias</a>
    <a href="{{ route('consolas.index') }}" class="btn btn-success">Ver consolas</a>
    <div class="container">
        <div class="row">
            <div class="col-9">
                <form action="{{ route('videojuegos.update',['videojuego'=>$videojuego ->id]) }}" method="post">
                    {{ method_field('PUT') }}
                    @csrf
                    <label>Titulo</label>
                     <input type="text" name="titulo" value="{{ $videojuego->titulo }}">
                    <br><br>
                    <label>Precio</label>
                    <input type="text" name="precio"  value="{{$videojuego->precio}}">
                    <span class="error">
                            * <?php if(isset($err_precio)) echo $err_precio ?>
                        </span>
                    <br><br>
                    <label>PEGI</label>
                    <select class="form-select" name="pegi"  value="{{$videojuego->pegi}}">
                        <option selected hidden>3</option>
                        <option value="3">+3</option>
                        <option value="10">10+</option>
                        <option value="16">16+</option>
                        <option value="18">18+</option>
                    </select>
                    <span class="error">
                            * <?php if(isset($err_PEGI)) echo $err_PEGI ?>
                        </span>
                    <br><br>
                    <div class="form-group mb-3">
                        <label>Descripcion</label>
                        <span class="error">
                                * <?php if(isset($err_descripcion)) echo $err_descripcion ?>
                            </span>
                        <textarea name="descripcion">{{$videojuego->descripcion}}</textarea>
                    </div>
                    <input type="submit" value="Enviar">
                </form>
            </div>
        </div>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>      
</body>
</html>