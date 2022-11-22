<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos</title>
</head>
<body>
    <h1>Index de Videojuegos</h1>
  <table class="table">
    <thead>
      <tr>
        <th>Titulo</th>
        <th>Precio</th>
        <th>PEGI</th>
        <th>Descripcion</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      foreach ($videojuegos as $videojuego) {
          list($nombre,$precio,$pegi,$descripcion)=$videojuego;
      ?>
          <tr>
              <td><?php echo $nombre?></td>
              <td><?php echo $precio?></td>
              <td><?php echo $pegi?></td>
              <td><?php echo $descripcion?></td>
          </tr>
      <?php 
      }
      ?>
    </tbody>
  </table>
</body>
</html>