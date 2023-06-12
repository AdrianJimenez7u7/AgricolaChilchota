<?php
$hostname = "localhost";
$username = "root";  
$password = "";
$database = "control_almacen"; 
session_start();

// Realizamos la conexión con la base de datos
$conn = mysqli_connect($hostname, $username, $password, $database);

$fecha = $_POST['Fecha'];
$cantidad = $_POST['Cantidad'];
$proveedor = $_POST['Proveedor'];
$noSalida = $_POST['NoSalida'];
$sessionId = 01;
$importe = 1000;
$conceptoSeleccionado = $_POST['Concepto'];
$almacenSeleccionado = $_POST['Almacen'];
$ranchoSeleccionado = $_POST['Rancho'];
$productosSeleccionado = $_POST['Productos'];

// Verificamos si se ha establecido la conexión correctamente
if (!$conn) {
    die("La conexión ha fallado: " . mysqli_connect_error());
} else {
    echo "La conexión ha sido exitosa!";
    $sql = "INSERT INTO entradas_salidas (IDregistro, Fecha, Almacen, Rancho, Productos, Cantidad, Importe, Concepto, Proveedor, FolioSalida, IDempleado)
    VALUES (NULL, '$fecha', '$almacenSeleccionado', '$ranchoSeleccionado', '$productosSeleccionado', '$cantidad', '$importe', '$conceptoSeleccionado', '$proveedor', NULL, '$sessionId')";
    if($conceptoSeleccionado == "Salida"){
        $sql2= "SELECT * FROM productos WHERE Producto = '$productosSeleccionado'";
        $sqlejecutar = mysqli_query($conn, $sql2);    
        while($row = mysqli_fetch_array($sqlejecutar)){
                $existencia = $row['disponible'];
            }
            $existencia = $existencia - $cantidad;   
        $sql3 = "UPDATE `productos` SET `disponible`= '$existencia'  WHERE `Producto` = '$productosSeleccionado'";
        if (mysqli_query($conn, $sql3)) {
            echo "Los datos se han insertado correctamente en la base de datos";
        }
    }else{
        $sql2= "SELECT * FROM productos WHERE Producto = '$productosSeleccionado'";
        $sqlejecutar = mysqli_query($conn, $sql2);    
        while($row = mysqli_fetch_array($sqlejecutar)){
                $existencia = $row['disponible'];
            }
            $existencia = $existencia + $cantidad;   
        $sql3 = "UPDATE `productos` SET `disponible`= '$existencia'  WHERE `Producto` = '$productosSeleccionado'";
        if (mysqli_query($conn, $sql3)) {
            echo "Los datos se han insertado correctamente en la base de datos";
        }
    }
    if (mysqli_query($conn, $sql)) {
        echo "Los datos se han insertado correctamente en la base de datos";
    } else {
        echo "Error al insertar los datos: " . mysqli_error($conn);
    }
}

header('location:index.php');
?>