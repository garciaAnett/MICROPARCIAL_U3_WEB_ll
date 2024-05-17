<?php
/**
 * Se requiere llamar a la funcion a traves del valor de referencia del ProductoConroller
 * */
require_once('../controller/ProductoController.php');
$control = new ProductoController();
$productos = $control->mostrarRegistro();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Management</title>
    <link rel="stylesheet" href="../../public/css/style.css">

</head>
<body>
   
    <div id="titulo1">
        <h2>DESAYUNOS MARIA ELENA</h2>
    </div>
    <div id="body">
  <div id="nav">
     <a href="#" class="navIcon"><h3>VENTAS</h3> </a>
      <img src="../../public/imgs/vendedor.png" alt="venta Icon">

      <a href="#" class="navIcon"><h3 style="color: aliceblue;">CLIENTES</h3></a>
      <img src="../../public/imgs/clients.jpg" alt="">

      <a href="#" class="navIcon"><h3>DESAYUNOS</h3></a>
      <img src="../../public/imgs/break.png" alt="">

      <a href="" class="navIcon"><h3>EMPLEADOS</h3> </a>
      <img src="../../public/imgs/employee.png" alt="">

      <a href="" class="navIcon"><h3>USUARIOS</h3></a>
      <img src="../../public/imgs/user.jpg" alt="">
      
  </div>
  <div id="sec">
        <div id="register">
        <form action="../controller/ProductoController.php" method="POST">
         <input type="Hidden" name="action" value="registrar">
         
            <label>Nombre:</label> 
            <input type="text" name="nom" id="name">
            <label>Cantidad:</label>
            <input type="text" name="cant" id="stock">
            <label>Precio:</label>
            <input type="text" name="pre" id="price">
           
           
            <br><br><input type="submit" value="REGISTRAR" id="regis">
           
        </form>  

        </div>
        <div class="users-table">
        <h2 >Productos registrados</h2>
        <table>
            <thead>
                <tr>
                   
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio Bs.</th>
                   
                 
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $row): ?>
                    <tr>
                        
                        <td><?= $row['nombre'] ?></td>
                        <td><?= $row['cantidad'] ?></td>
                        <td><?= $row['precio'] ?></td>
                           </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
  </div>
</div>
</body>
</html>
