<?php
$hostname = "localhost";
$username = "root";  
$password = "";
$database = "control_almacen"; 


// Realizamos la conexión con la base de datos
$conn = mysqli_connect($hostname, $username, $password, $database);

$productos = $_POST['Productos'];
$Precio = $_POST['Precio'];

// Verificamos si se ha establecido la conexión correctamente
if (!$conn) {
    die("La conexión ha fallado: " . mysqli_connect_error());
} else {
    echo "La conexión ha sido exitosa!";
    $sql = "UPDATE `productos` SET `Precio`= '$Precio'  WHERE `Producto` = '$productos'";
    
    if (mysqli_query($conn, $sql)) {
        echo "Los datos se han actualizado correctamente en la base de datos";
        
    } else {
        echo "Error al actualizar los datos: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
header('location:indexProductos.php');
?>
