<?php
require_once('../model/ProductoModel.php');

class ProductoController {
  /* 2 funciones que instancias al ProductoModel: Registrar y Actualizar la tabla
   */
    public function registrar($nombre, $cantidad, $precio) {
       
       
        $model = new ProductoModel();
        $model->registrarProducto($nombre, $cantidad, $precio);
        if ($model) {  // verificar que se han insertado
            
            header("Location: ../view/InsertarProducto.php");
            exit();
        } else {
            echo "NO SE HA PODIDO REGISTRAR EL PRODUCTO.";
        
        }
    }

    public function mostrarRegistro() {
        $model = new ProductoModel();
        return $model->MostrarListaProductos(); 
    }
}

// Crear una instancia del controlador
$controller = new ProductoController();

if (isset($_POST['action'])) {
    if ($_POST['action'] === 'registrar') { 
 // se pregunta si el formulario enviado es de tipo 'registrar' para llamar a la Clase Controlador
        $controller->registrar($_POST['nom'], $_POST['cant'], $_POST['pre']);
    }
}

// No es necesario incluir el controlador aquí nuevamente
?>
