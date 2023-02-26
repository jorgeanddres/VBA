<!DOCTYPE html>
<html lang="es">
<head>
  <title>Ingresar Datos</title>
    <title>Ingresar Datos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
</head>
<body>



 <?php

require('config.php');

$cod = $_POST['codigo'];
$nom = $_POST['nombre'];
$mar = $_POST['marca'];
$pre = $_POST['precio'];
$can = $_POST['cantidad'];



$sql = "INSERT INTO tabla12 (codigo, nombre, marca, precio, cantidad) VALUES ('$cod', '$nom', '$mar', '$pre', '$can')";

if (mysqli_query($conn, $sql)) {
 
?>

<!-- Ventana Modal -->
  
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Encabezado -->
        <div class="modal-header">
          <h4 class="modal-title">HECHO !!!</h4>
          <button class="close" onclick="location.href='../ingresar.html'">&times;</button>
        </div>
        
        <!-- Cuerpo -->
        <div class="modal-body">
          Informacion almacenada correctamente
        </div>
        
        <!-- Pie -->
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='../ingresar.html'">Finalizar</button>
        </div>
        
      </div>
    </div>

 <?php
} else 

{

?>

<!-- Ventana Modal -->
  
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Encabezado -->
        <div class="modal-header">
          <h4 class="modal-title">Atencion...</h4>
          <button class="close" onclick="location.href='../ingresar.html'">&times;</button>
        </div>
        
        <!-- Cuerpo -->
        <div class="modal-body">
          <?php
          echo "Ocurrio un error y no se almacenaron los datos <br>" . $sql . "<br>" . mysqli_error($conn);
          ?> 

        </div>

        
        <!-- Pie -->
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='../ingresar.html'">Salir</button>
        </div>
        
      </div>
    </div>



 <?php

 //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 //  echo '<script language="javascript">alert("Datos grabados satisfactoriamente'.$i.'");window.location.href="form_insertar.html"</script>';

}

mysqli_close($conn);

?> 