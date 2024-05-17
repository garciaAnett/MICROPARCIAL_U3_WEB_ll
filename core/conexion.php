<?php
 require_once(__DIR__ . '/../config/config.php');


 function conectarDB(){
    global $host, $dbUsuario, $dbContraseña, $dbNombre; // Use global keyword for accessing variables outside the function

    $conexion = new mysqli($host, $dbUsuario, $dbContraseña, $dbNombre);
    
  // Verify connection
  if ($conexion->connect_error) {
    die("La conexión ha fallado: " . $conexion->connect_error);
  } else {
       // echo "Conexion exitosa a la base de datos";
    return $conexion; // Return the connection object
  }
}
?>