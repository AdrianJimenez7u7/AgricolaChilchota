<?php
session_start();
$hostname = "localhost";
$username = "root";  
$password = "";
$database = "control_almacen"; 
$conn = mysqli_connect($hostname, $username, $password, $database);
$user = $_POST["empleado"];
$contraseña = $_POST["contraseña"];

if (!$conn) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}
echo"conexion exitosa";
$username = $_POST["empleado"];
$password = $_POST["contraseña"];

$stmt = $conn->prepare("SELECT IDempleado, Contraseña FROM usuarios WHERE IDempleado = ? AND Contraseña = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    // Inicio de sesión exitoso
    $_SESSION["IDempleado"] = $username;
    $_SESSION["logged_in"] = true;
    
    $response = array("success" => true, "message" => "Inicio de sesión exitoso.");
    //header("Location: index.php");
    header("Location: index.php?username=" . urlencode($username));
} else {
    // Credenciales incorrectas
    $response = array("success" => false, "message" => "Nombre de usuario o contraseña incorrectos.");
    header("Location: login.html");
}

$stmt->close();
$conn->close();

echo json_encode($response);
?>