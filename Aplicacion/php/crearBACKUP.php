<!DOCTYPE html>
<html lang="es">
<head>
  <title>Crear_Backup</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>




<?php
// variables requeridas

date_default_timezone_set("America/Bogota");

require('config.php');



//Para utilizar Mysqldump y realizar el respaldo, se debe declarar una variable haciendo referencia a la ubicacion del archivo mysqldump.exe
$mysqldump='"../../../MySQL/bin/mysqldump.exe"';
$copia_seguridad = '"../backup/"'.$dbname. "-" .date("Y-m-d-H-i-s"). ".sql";
system("$mysqldump --no-defaults -u $username -p$password $dbname > $copia_seguridad",$output);


//var_dump($output);  //para mostrar el resultado de la operación, 0 satisfactoria, 1 error en path, 2 error en conexión a base de datos


switch($output){
case 0:


?>

<!-- Ventana modal -->
  
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Encabezado -->
        <div class="modal-header">
          <h4 class="modal-title">Proceso satisfactorio</h4>
          <button class="close" onclick="location.href='../index.html'">&times;</button>
        </div>
        
        <!-- Cuerpo -->
        <div class="modal-body">
          
    <?php
        echo 'La base de datos <b>' .$dbname .'</b> Se creo una copia de seguridad exitosamente en... '.getcwd().'/' .$copia_seguridad .'</b>';
    ?>


        </div>
        
        <!-- Pie -->
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='../index.html'">Finalizar</button>
        </div>
        
      </div>
    </div>



 <?php

break;
case 1:


?>

<!-- Ventana modal -->
  
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Proceso insatisfactorio</h4>
          <button class="close" onclick="location.href='../index.html'">&times;</button>
        </div>
        
        <!-- Cuerpo -->
        <div class="modal-body">
          
    <?php
        echo 'Ocurrio un error al exportar el archivo <b>' .$dbname .'</b> a '.getcwd().'/ Asegurese de la ruta correcta: ' .$copia_seguridad .'</b>';
    ?>


        </div>
        
        <!-- Pie -->
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='../index.html'">Finalizar</button>
        </div>
        
      </div>
    </div>



 <?php



break;
case 2:

?>

<!-- The Modal -->
  
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Ventana modal -->
        <div class="modal-header">
          <h4 class="modal-title">Proceso insatisfactorio</h4>
          <button class="close" onclick="location.href='../index.html'">&times;</button>
        </div>
        
        <!-- Cuerpo -->
        <div class="modal-body">
          
    <?php
        echo 'Error de conexion a la Base De Datos, verifique valores de acceso: <br/><br/><table><tr><td>Nombre de la base de datos:</td><td><b>' .$dbname .'</b></td></tr><tr><td>Nombre de usuario MySQL:</td><td><b>' .$username .'</b></td></tr><tr><td>Contraseña MySQL:</td><td><b> '.$password.' </b></td></tr><tr><td>Nombre de host MySQL:</td><td><b>' .$servername .'</b></td></tr></table>';
    ?>


        </div>
        
        <!-- Pie -->
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='../index.html'">Finalizar</button>
        </div>
        
      </div>
    </div>



 <?php


break;
}


mysqli_close($conn);
?>



</BODY>
</HTML>
