<?php
require_once('../../core/conexion.php');

/*
 Esta clase tiene 2 metodos 1 para hacer el insert y el otro para actualiazar datos
*/
class ProductoModel {
    /**
     * $sql donde esta la consulta
     * $resul te retorna un booleano de verificacion
     * 
     */ 

    public function MostrarListaProductos() {
        $conexion = conectarDB();
        try {
            $sql = "SELECT * FROM producto WHERE disponibilidad=1";
            $result = $conexion->query($sql);
    
            // Verificar si la consulta fue exitosa
            if ($result) {
                // Obtener los resultados como un array asociativo
                $resultados = [];
                while ($row = $result->fetch_assoc()) {
                    $resultados[] = $row; //cada fila de la tabla la almacena en el array Asociativo
                }
                // Liberar el resultado y cerrar la conexión
                $result->free();
                $conexion->close();
                return $resultados;
            } else {
                echo "Error en la consulta: " . $conexion->error;
                $conexion->close();
                return false;
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
/**
 * $stmt variable con la que se va a ejecutar la consulta haciendo  referencia a SqlCommand 
 * 
 */
    public function registrarProducto($nombre, $cantidad,$precio) {
         $conexion=conectarDB();  // hacemos la conexion 
        
         $sql = "INSERT INTO producto (nombre, cantidad, precio) 
         VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('sds', $nombre, $cantidad, $precio);
        return $stmt->execute(); 
        
    }
}
?>