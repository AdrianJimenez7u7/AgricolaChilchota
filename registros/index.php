<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="principal/frontend.js" defer></script>
    <script src="modal/modal.js" defer></script>
    <link rel="stylesheet" href="modal/modal.css">
    <link rel="stylesheet" href="assets/estilos.css">
    <link rel="stylesheet" href="assets/jquery/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/jquery/responsive.dataTables.min.css">
</head>
<body>
<?php
session_start();
if (isset($_SESSION["username"])) {
    
}
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    // Si no ha iniciado sesión, redirigir al formulario de inicio de sesión
    header("Location: login.html");
    exit();
}
?>
    <header>
        <div class="barra">
            <h2>Agrícola  <br> Chilchota</h2><img src="assets/imagenes/menu.png">
            <ul>
                <li><a href="#">Registros</a></li>
                <li><a href="#">Vistas</a>
                <ul>
                    <li>
                        <a href="indexJuevesViernes.php">jueves y viernes</a>
                    </li>
                </ul>
                </li>
                <li><a href="indexProductos.php">productos</a></li>
                <li><a href="#">Modificar</a></li>
                <li><a href="#">Opciones</a></li>
                <li><a href='logout.php'>Cerrar sesión</a></li>
            </ul>
        </div>
        <div class="imagen">
            <img src="assets/imagenes/logo.jpg" width="150px" height="150px">   
        </div>
        <div class="support">
            <h3>bienvenido</h3>
            <div class="usuario">
                <?php
                $hostname = "localhost";
                $username = "root";
                $password = "";
                $database = "control_almacen";
                
                // Realizamos la conexión con la base de datos
                $conn = mysqli_connect($hostname, $username, $password, $database);
                $username = $_GET["username"];
                
                if (!$conn) {
                    die("La conexión ha fallado: " . mysqli_connect_error());
                }
                $sql = "SELECT Foto, Nombres FROM empleados WHERE IDempleado = '$username'"; // Consulta para obtener la ruta de la imagen del producto con ID 1
                $resultado = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($resultado);
                $imagen = $row['Foto'];
                $nombre = $row['Nombres']
                ?>
            <img class="imgUser" src="data:image/png;base64,<?php echo base64_encode($imagen); ?>" alt="Imagen del usuario">
            <h2 class="nombre""><?php echo $nombre; ?></h2>
            </div>
        </div>
    </header>
    <div class="container-seccion">
        
        <button id="openModalBtn" class="agregar">Agregar</button>

        <div id="myModal" class="modal">
            <div class="modal-content">
            <span class="close">&times;</span>
                <div class="cabezal">
                <h1>Registrar</h1>
                </div> 
                <div class="inputs" id="inputs">                  
                </div>
            </div>
        </div>

        <button onclick="exportarTabla()" class="excel">Excel</button>
        <button onclick="exportarTablaPDF()" class="PDF">PDF</button>

        <div class="informacion" id="informacion"></div>
        <script src="assets/jquery/jquery-3.5.1.js"></script>
        <script src="assets/jquery/jquery.dataTables.min.js"></script>
        <script src="assets/jquery/dataTables.responsive.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#tablaRegistros').DataTable({
                    responsive: true,
                });
            });
        </script>
    </div>
</body>
</html>
