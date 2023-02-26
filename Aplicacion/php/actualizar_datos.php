<!DOCTYPE html>
<html lang="es">
<head>
  <title>Actualizar_Datos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../estilos/estilos.css">
</head>
</head>
<body>

 <?php

require('config.php');

$codigo = $_POST['codigo'];


$sql = "SELECT * FROM tabla12 WHERE codigo=$codigo";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // salida de datos d cD fila
    while($row = mysqli_fetch_assoc($result)) {

      ?>

<table style="width: 600px; margin: 0% auto;">
      <thead>
        <tr>
          <td>
          <div class="container" >
  <h2>Actualización De Productos</h2>
  <form action="actualizando.php" method="POST">
    <div class="form-group">
      <label><B>Codigo:</B></label>
      <input type="text" class="form-control" value=" <?php echo $row['codigo'] ?> " id="codigo" placeholder="Codigo del producto" name="codigo" style="width: 300px" readonly >
    </div>

    <div class="form-group">
      <label><B>Nombre:</B></label>
      <input type="text" class="form-control" value=" <?php echo $row['nombre'] ?> " id="nombre" placeholder="Nombre del producto" name="nombre" style="width: 300px">
    </div>

    <div class="form-group">
      <label><B>Marca:</B></label>
      <input type="text" class="form-control" value=" <?php echo $row['marca'] ?> " id="marca" placeholder="Marca" name="marca" style="width: 300px">
    </div>

    <div class="form-group">
      <label><B>Precio:</B></label>
      <input type="text" class="form-control" value=" <?php echo $row['precio'] ?> " id="precio" placeholder="Precio" name="precio"style="width: 300px">
    </div>

    <div class="form-group">
      <label><B>Cantidad:</B></label>
      <input type="text" class="form-control" value=" <?php echo $row['cantidad'] ?> " id="cantidad" placeholder="Cantidad" name="cantidad" style="width: 300px">
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
  </form>
</div> 
          </td>
        </tr>
      </thead>
</table>

     

  <?php

    }


} else {



?>

<!-- Ventana modal -->
  
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Encabezado -->
        <div class="modal-header">
          <h4 class="modal-title">Ocurrio un Error</h4>
          <button class="close" onclick="location.href='../actualizar.html'">&times;</button>
        </div>
        
        <!-- Cuerpo -->
        <div class="modal-body">
          
 		<?php
        echo "No se encuentra el producto" . "<br>";
		?>


        </div>
        
        <!-- Pie -->
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='../actualizar.html'">Regresar</button>
        </div>
        
      </div>
    </div>



 <?php


}

mysqli_close($conn);
?> 